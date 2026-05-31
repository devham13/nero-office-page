#!/usr/bin/env python3
"""Patch kadence page-*.php: CTA helpers, hero buttons, scoped CSS variables."""

from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / "shared"))

from deploy import connect_ssh, resolve_theme_directory, run_remote, upload_via_sftp  # noqa: E402
from credentials import get_credential, require_credential  # noqa: E402

REQUIRE_LINE = "require_once get_stylesheet_directory() . '/includes/nn-cta.php';"
SUPPORT_STYLE = "<?php echo nn_longread_support_styles(); ?>\n"

GETENV_REPLACEMENTS = [
    (r"getenv\(\s*'PRIMARY_CTA_URL'\s*\)\s*\?:\s*''", "nn_cta_url('primary')"),
    (r"getenv\(\s*\"PRIMARY_CTA_URL\"\s*\)\s*\?:\s*''", 'nn_cta_url("primary")'),
    (r"getenv\(\s*'PRIMARY_CTA_LABEL'\s*\)\s*\?:\s*'[^']*'", "nn_cta_label('primary')"),
    (r"getenv\(\s*'SECONDARY_CTA_URL'\s*\)", "nn_cta_url('secondary')"),
    (r"getenv\(\s*'SECONDARY_CTA_LABEL'\s*\)\s*\?:\s*'[^']*'", "nn_cta_label('secondary')"),
    (r"<\?php if \(\s*getenv\(\s*'SECONDARY_CTA_URL'\s*\)\s*\)\s*:\s*\?>", "<?php if ( nn_cta_url('secondary') ) : ?>"),
]

TELEGRAM_ANCHOR_RE = re.compile(
    r'<a\s+class="telegram-button"[^>]*href="[^"]*"[^>]*>.*?</a>',
    re.DOTALL | re.IGNORECASE,
)

PAGE_CLASS_RE = re.compile(r"\.([a-z0-9-]+-page)\s*\{")


def extract_page_class(content: str) -> str | None:
    match = PAGE_CLASS_RE.search(content)
    return match.group(1) if match else None


def patch_content(content: str) -> str:
    if REQUIRE_LINE not in content:
        content = re.sub(
            r"(<\?php\s*\n/\*\*.*?\*/\s*\n)",
            r"\1\n" + REQUIRE_LINE + "\n",
            content,
            count=1,
            flags=re.DOTALL,
        )
        if REQUIRE_LINE not in content:
            content = content.replace("<?php\n", "<?php\n" + REQUIRE_LINE + "\n", 1)

    page_class = extract_page_class(content)
    if page_class and ":root {" in content:
        content = content.replace(":root {", f".{page_class} {{", 1)
        content = content.replace(
            f".{page_class} :root {{",
            f".{page_class} {{",
        )

    if "nn_longread_support_styles" not in content:
        content = content.replace("<style>", "<style>\n" + SUPPORT_STYLE, 1)

    for pattern, repl in GETENV_REPLACEMENTS:
        content = re.sub(pattern, repl, content)

    if "nn_hero_cta_buttons" not in content and "telegram-button" in content:
        content = TELEGRAM_ANCHOR_RE.sub(
            '<?php echo nn_hero_cta_buttons(); ?>',
            content,
            count=1,
        )

    return content


def main() -> int:
    local_cta = ROOT / "wordpress" / "includes" / "nn-cta.php"
    if not local_cta.is_file():
        print("Missing", local_cta)
        return 1

    ssh = connect_ssh()
    remote_site_root = require_credential("REMOTE_SITE_ROOT")
    theme_dir = resolve_theme_directory(ssh, remote_site_root)
    includes_dir = f"{theme_dir}/includes"
    remote_cta = f"{includes_dir}/nn-cta.php"

    run_remote(ssh, f"mkdir -p {includes_dir}")
    upload_via_sftp(ssh, local_cta, remote_cta)
    print(f"Uploaded {remote_cta}")

    out, _, _ = run_remote(ssh, f"ls {theme_dir}/page-*.php")
    paths = [p.strip() for p in out.splitlines() if p.strip().endswith(".php")]

    for remote_path in paths:
        name = Path(remote_path).name
        raw_out, err, code = run_remote(ssh, f"cat {remote_path}")
        if code != 0:
            print(f"SKIP {name}: {err}")
            continue
        patched = patch_content(raw_out)
        if patched == raw_out:
            print(f"OK (no changes) {name}")
            continue
        tmp = ROOT / ".cursor" / f"patch-{name}"
        tmp.parent.mkdir(parents=True, exist_ok=True)
        tmp.write_text(patched, encoding="utf-8")
        upload_via_sftp(ssh, tmp, remote_path)
        print(f"PATCHED {name}")

    ssh.close()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
