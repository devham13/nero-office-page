#!/usr/bin/env python3
"""Fix hero text/canvas overlap and remove nested scrollbars on longread pages."""

from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / "shared"))

from deploy import connect_ssh, resolve_theme_directory, run_remote, upload_via_sftp  # noqa: E402
from credentials import require_credential  # noqa: E402


def patch_overflow_page_wrapper(content: str) -> str:
    # overflow-x: hidden on .xxx-page creates overflow-y: auto → double scrollbar
    content = re.sub(
        r"(\.[a-z0-9-]+-page)\s*\{\s*overflow-x:\s*hidden\s*;",
        r"\1 {\n    overflow-x: clip;\n    overflow-y: visible;",
        content,
        count=1,
    )
    content = re.sub(
        r"(\.[a-z0-9-]+-page)\s*\{\s*overflow-x:\s*hidden\s*;\s*overflow-y:\s*visible\s*;",
        r"\1 {\n    overflow-x: clip;\n    overflow-y: visible;",
        content,
    )
    return content


def patch_hero_canvas_cx(content: str) -> str:
    """Shift hero animation center to the right within canvas (first resizeCanvas block)."""
    replacements = [
        ("cx = cw / 2;", "cx = cw * 0.72;"),
        ("cx = cw * 0.5;", "cx = cw * 0.68;"),
        ("cx = cw * 0.52;", "cx = cw * 0.70;"),
        ("cx = cw * 0.58;", "cx = cw * 0.72;"),
    ]
    for old, new in replacements:
        if old in content:
            content = content.replace(old, new, 1)
            break
    return content


def patch_finops_duplicate_vh(content: str) -> str:
    # Global rule before <main> duplicates hero min-height and can cause layout issues
    content = re.sub(
        r"#finops-command-center\.finops-hero-shell\s*\{\s*min-height:\s*100vh;\s*min-height:\s*100dvh;\s*position:\s*relative;\s*\}",
        "/* finops hero height: see .finops-hero-shell inline styles */",
        content,
        count=1,
    )
    return content


def patch_content(content: str) -> str:
    content = patch_overflow_page_wrapper(content)
    content = patch_hero_canvas_cx(content)
    content = patch_finops_duplicate_vh(content)
    return content


def main() -> int:
    local_cta = ROOT / "wordpress" / "includes" / "nn-cta.php"
    ssh = connect_ssh()
    root = require_credential("REMOTE_SITE_ROOT")
    theme_dir = resolve_theme_directory(ssh, root)
    upload_via_sftp(ssh, local_cta, f"{theme_dir}/includes/nn-cta.php")
    print("Uploaded nn-cta.php")

    out, _, _ = run_remote(ssh, f"ls {theme_dir}/page-*.php")
    for remote_path in out.strip().splitlines():
        name = Path(remote_path).name
        raw, _, code = run_remote(ssh, f"cat {remote_path}")
        if code != 0:
            continue
        patched = patch_content(raw)
        if patched == raw:
            print(f"ok {name}")
            continue
        tmp = ROOT / ".cursor" / f"hero-{name}"
        tmp.parent.mkdir(parents=True, exist_ok=True)
        tmp.write_text(patched, encoding="utf-8")
        upload_via_sftp(ssh, tmp, remote_path)
        print(f"patched {name}")

    run_remote(ssh, f"cd {root} && wp cache flush 2>/dev/null || true")
    ssh.close()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
