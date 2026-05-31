#!/usr/bin/env python3
"""Patch inline hero CSS/JS on all longread page templates (overlap + nested scroll)."""

from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / "shared"))

from deploy import connect_ssh, resolve_theme_directory, run_remote, upload_via_sftp  # noqa: E402
from credentials import require_credential  # noqa: E402

CANVAS_ZONE_CSS = """  position: absolute;
  left: 52%;
  right: 0;
  top: 0;
  bottom: 0;
  width: 48%;
  max-width: 48vw;
  height: 100%;
  z-index: 1;
  pointer-events: none;"""

HERO_COPY_MAX = "min(400px, 36vw)"


def patch_hero_canvas_block(content: str) -> str:
    """Replace full-bleed hero canvas rules (id selectors and section canvas)."""

    def repl_id_canvas(m: re.Match[str]) -> str:
        sel = m.group(1)
        return f"{sel} {{\n{CANVAS_ZONE_CSS}\n}}"

    content = re.sub(
        r"(#(?:hero-[a-z0-9-]+|finops-cap-hero)-canvas)\s*\{[^}]*\}",
        repl_id_canvas,
        content,
        flags=re.DOTALL,
    )
    content = re.sub(
        r"(#[a-z0-9-]+-hero-canvas)\s*\{[^}]*\}",
        repl_id_canvas,
        content,
        flags=re.DOTALL,
    )
    content = re.sub(
        r"(\.(?:sf-hero-bridge|fullscreen-white-office)(?:\.[a-z0-9-]+)?\s+canvas)\s*\{[^}]*\}",
        repl_id_canvas,
        content,
        flags=re.DOTALL,
    )
    content = re.sub(
        r"(\.smb-workflow-hero\s+\.smb-hero-canvas-wrap)\s*\{[^}]*\}",
        lambda m: f"{m.group(1)} {{\n{CANVAS_ZONE_CSS}\n}}",
        content,
        flags=re.DOTALL,
    )
    content = re.sub(
        r"(\.smb-workflow-hero\s+#smb-workflow-hub-canvas)\s*\{[^}]*\}",
        "/* canvas size: parent .smb-hero-canvas-wrap */",
        content,
        count=1,
    )
    return content


def patch_hero_copy_width(content: str) -> str:
    content = re.sub(
        r"max-width:\s*min\(\d+px,\s*92vw\)",
        f"max-width: {HERO_COPY_MAX}",
        content,
    )
    content = re.sub(
        r"max-width:\s*min\(720px,\s*92vw\)",
        f"max-width: {HERO_COPY_MAX}",
        content,
    )
    content = re.sub(
        r"max-width:\s*min\(680px,\s*92vw\)",
        f"max-width: {HERO_COPY_MAX}",
        content,
    )
    content = re.sub(
        r"max-width:\s*min\(640px,\s*92vw\)",
        f"max-width: {HERO_COPY_MAX}",
        content,
    )
    content = re.sub(
        r"max-width:\s*min\(640px,\s*52vw\)",
        f"max-width: {HERO_COPY_MAX}",
        content,
    )
    return content


def patch_declare_after_require(content: str) -> str:
    """declare(strict_types) after require_once is a fatal error in PHP 8."""
    return re.sub(
        r"(require_once\s+get_stylesheet_directory\(\)\s*\.\s*'/includes/nn-cta\.php';\s*)\ndeclare\(strict_types=1\);\s*\n",
        r"\1\n",
        content,
        count=1,
    )


def patch_hero_overflow(content: str) -> str:
    """Hero shells: overflow clip instead of hidden (avoids nested scrollbar)."""

    hero_shell_patterns = [
        r"(\.finops-hero-shell)\s*\{",
        r"(\.finops-hero-office)\s*\{",
        r"(\.fullscreen-white-office\.sf-hero-bridge)\s*\{",
        r"(\.smb-workflow-hero)\s*\{",
        r"(#finops-command-center\.finops-hero-shell)\s*\{",
        r"(\.copilot-mcp-hero)\s*\{",
        r"(\.opus48-orchestra-hero)\s*\{",
        r"(#sf-orchestration-hero\.fullscreen-white-office\.sf-hero-bridge)\s*\{",
    ]
    for pat in hero_shell_patterns:
        content = re.sub(
            pat + r"([^}]*?)overflow:\s*hidden\s*;",
            r"\1 {\2overflow: clip;",
            content,
            count=1,
            flags=re.DOTALL,
        )
    return content


def patch_page_overflow(content: str) -> str:
    content = re.sub(
        r"(\.[a-z0-9-]+-page)\s*\{\s*overflow-x:\s*hidden\s*;",
        r"\1 {\n    overflow-x: clip;\n    overflow-y: visible;",
        content,
        count=1,
    )
    return content


def patch_canvas_cx(content: str) -> str:
    for old, new in [
        ("cx = cw / 2;", "cx = cw * 0.78;"),
        ("cx = cw * 0.5;", "cx = cw * 0.75;"),
        ("cx = cw * 0.52;", "cx = cw * 0.76;"),
        ("cx = cw * 0.58;", "cx = cw * 0.78;"),
        ("cx = cw * 0.68;", "cx = cw * 0.78;"),
        ("cx = cw * 0.70;", "cx = cw * 0.78;"),
        ("cx = cw * 0.72;", "cx = cw * 0.78;"),
    ]:
        if old in content:
            content = content.replace(old, new, 1)
            break
    return content


def patch_content(content: str) -> str:
    content = patch_page_overflow(content)
    content = patch_hero_canvas_block(content)
    content = patch_hero_copy_width(content)
    content = patch_hero_overflow(content)
    content = patch_canvas_cx(content)
    content = patch_declare_after_require(content)
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
        tmp = ROOT / ".cursor" / f"inline-{name}"
        tmp.parent.mkdir(parents=True, exist_ok=True)
        tmp.write_text(patched, encoding="utf-8")
        upload_via_sftp(ssh, tmp, remote_path)
        print(f"patched {name}")

    run_remote(ssh, f"cd {root} && wp cache flush 2>/dev/null || true")
    ssh.close()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
