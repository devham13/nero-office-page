#!/usr/bin/env python3
"""Scope longread typography to content blocks (not canvas hero) + deploy nn-cta.php."""

from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / "shared"))

from deploy import connect_ssh, resolve_theme_directory, run_remote, upload_via_sftp  # noqa: E402
from credentials import require_credential  # noqa: E402

CONTENT_SCOPES = (
    ".ym-section",
    ".ym-prose",
    ".ym-content-section",
    ".claude-intro-section",
    ".ai-finops-intro-section",
    "[class*='-intro-section']",
    ".ym-faq-section",
    ".ym-cta-panel",
    ".ym-toc-wrap",
)

PAGE_CLASS_RE = re.compile(r"\.([a-z0-9-]+-page)\s*\{")
HEADING_BLOCK_RE = re.compile(
    r"(\.[a-z0-9-]+-page)\s+h1,\s*\n\s*\1\s+h2,[\s\S]*?\1\s+h6\s*\{[^}]+\}",
    re.MULTILINE,
)


def extract_page_class(content: str) -> str | None:
    match = PAGE_CLASS_RE.search(content)
    return match.group(1) if match else None


def scope_headings(content: str, page_class: str) -> str:
    if f".{page_class} .ym-section h1," in content:
        return content
    if f".{page_class} h1," not in content:
        return content
    for i in range(1, 7):
        old = f".{page_class} h{i},"
        if old not in content:
            continue
        new = ",\n".join(f".{page_class} {s} h{i}" for s in CONTENT_SCOPES) + ","
        content = content.replace(old, new, 1)
    return content


def scope_spans(content: str, page_class: str) -> str:
    old = f".{page_class} span:not("
    if old not in content or f".{page_class} .ym-section span:not(" in content:
        return content
    # find full line
    pattern = re.compile(
        rf"(\.{re.escape(page_class)}\s+span:not\([^)]+\)[^\n]+)",
        re.MULTILINE,
    )
    match = pattern.search(content)
    if not match:
        return content
    inner = match.group(1)
    not_part = inner.split("span", 1)[1]  # :not(...)
    scoped = ",\n".join(f".{page_class} {s} span{not_part}" for s in CONTENT_SCOPES)
    return content.replace(inner, scoped, 1)


def scope_paragraphs(content: str, page_class: str) -> str:
    for tag in ("p", "li", "strong", "em"):
        old = f".{page_class} {tag},"
        if old not in content:
            continue
        if f".{page_class} .ym-section {tag}," in content:
            continue
        new = ",\n".join(f".{page_class} {s} {tag}" for s in CONTENT_SCOPES) + ","
        content = content.replace(old, new, 1)
    return content


def fix_remaining_root(content: str, page_class: str) -> str:
    if ":root {" in content:
        content = content.replace(":root {", f".{page_class} {{", 1)
    return content


def patch_file(content: str) -> str:
    page_class = extract_page_class(content)
    if not page_class:
        return content
    content = fix_remaining_root(content, page_class)
    content = scope_headings(content, page_class)
    content = scope_paragraphs(content, page_class)
    content = scope_spans(content, page_class)
    return content


def main() -> int:
    local_cta = ROOT / "wordpress" / "includes" / "nn-cta.php"
    ssh = connect_ssh()
    root = require_credential("REMOTE_SITE_ROOT")
    theme_dir = resolve_theme_directory(ssh, root)
    includes_dir = f"{theme_dir}/includes"
    upload_via_sftp(ssh, local_cta, f"{includes_dir}/nn-cta.php")
    print("Uploaded nn-cta.php")

    out, _, _ = run_remote(ssh, f"ls {theme_dir}/page-*.php")
    for remote_path in out.strip().splitlines():
        if not remote_path.endswith(".php"):
            continue
        name = Path(remote_path).name
        raw, _, code = run_remote(ssh, f"cat {remote_path}")
        if code != 0:
            continue
        patched = patch_file(raw)
        if patched == raw:
            print(f"unchanged {name}")
            continue
        tmp = ROOT / ".cursor" / f"scope-{name}"
        tmp.parent.mkdir(parents=True, exist_ok=True)
        tmp.write_text(patched, encoding="utf-8")
        upload_via_sftp(ssh, tmp, remote_path)
        print(f"scoped {name}")

    run_remote(ssh, f"cd {root} && wp cache flush 2>/dev/null || true")
    ssh.close()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
