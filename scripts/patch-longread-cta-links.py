#!/usr/bin/env python3
"""Fix dead-end footer/mid CTAs: span buttons, empty href, literal ${PRIMARY_CTA_URL}."""

from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / "shared"))

from deploy import connect_ssh, resolve_theme_directory, run_remote, upload_via_sftp  # noqa: E402
from credentials import require_credential  # noqa: E402

REQUIRE_LINE = "require_once get_stylesheet_directory() . '/includes/nn-cta.php';"

PRIMARY_HREF = "<?php echo esc_url( nn_cta_url( 'primary' ) ); ?>"
SECONDARY_HREF = "<?php echo esc_url( nn_cta_url( 'secondary' ) ); ?>"
SECONDARY_LABEL = "<?php echo esc_html( nn_cta_label( 'secondary' ) ); ?>"


def ensure_nn_cta_include(content: str) -> str:
    if REQUIRE_LINE in content:
        return content
    if "nn-cta.php" in content:
        return content
    return content.replace("<?php\n", "<?php\n" + REQUIRE_LINE + "\n", 1)


def patch_content(content: str) -> str:
    content = ensure_nn_cta_include(content)

    content = content.replace("${PRIMARY_CTA_URL}", PRIMARY_HREF)
    content = content.replace("${SECONDARY_CTA_URL}", SECONDARY_HREF)
    content = content.replace("${SECONDARY_CTA_LABEL}", SECONDARY_LABEL)

    content = re.sub(
        r"\$nero_primary_cta\s*=\s*getenv\([^)]+\)\s*\?:[^;]+;",
        "$nero_primary_cta = nn_cta_url( 'primary' );",
        content,
        count=1,
    )

    content = re.sub(
        r'<span class="ym-btn ym-btn-primary"[^>]*>\s*<span>([^<]+)</span>\s*</span>',
        rf'<a class="ym-btn ym-btn-primary" href="{PRIMARY_HREF}" target="_blank" rel="noopener noreferrer"><span>\1</span></a>',
        content,
        flags=re.IGNORECASE | re.DOTALL,
    )

    content = re.sub(
        r'<span class="ym-btn ym-btn-primary"[^>]*>([^<]+)</span>',
        rf'<a class="ym-btn ym-btn-primary" href="{PRIMARY_HREF}" target="_blank" rel="noopener noreferrer"><span>\1</span></a>',
        content,
        flags=re.IGNORECASE,
    )

    content = re.sub(
        r'<span class="ym-btn ym-btn-secondary"[^>]*>([^<]+)</span>',
        rf'<a class="ym-btn ym-btn-secondary" href="{SECONDARY_HREF}" target="_blank" rel="noopener noreferrer"><span>\1</span></a>',
        content,
        flags=re.IGNORECASE,
    )

    content = re.sub(
        r'(<a class="ym-btn ym-btn-primary"[^>]*href=")(?:\s*)(")',
        rf"\1{PRIMARY_HREF}\2",
        content,
    )

    content = re.sub(
        r"getenv\(\s*'PRIMARY_CTA_URL'\s*\)\s*\?:\s*''",
        "nn_cta_url( 'primary' )",
        content,
    )

    return content


def main() -> int:
    local_cta = ROOT / "wordpress" / "includes" / "nn-cta.php"
    ssh = connect_ssh()
    root = require_credential("REMOTE_SITE_ROOT")
    theme_dir = resolve_theme_directory(ssh, root)
    upload_via_sftp(ssh, local_cta, f"{theme_dir}/includes/nn-cta.php")

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
        tmp = ROOT / ".cursor" / f"cta-{name}"
        tmp.parent.mkdir(parents=True, exist_ok=True)
        tmp.write_text(patched, encoding="utf-8")
        upload_via_sftp(ssh, tmp, remote_path)
        print(f"fixed {name}")

    wp = f"cd {root} && wp cache flush 2>/dev/null || true"
    run_remote(ssh, wp)
    ssh.close()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
