#!/usr/bin/env python3
"""Deploy Nero Network global site footer (MU-plugin)."""

from __future__ import annotations

import shlex
import sys
from pathlib import Path

from deploy import connect_ssh, run_remote, upload_via_sftp
from credentials import require_credential


def main() -> int:
    project_root = Path(__file__).resolve().parent.parent
    remote_site_root = require_credential("REMOTE_SITE_ROOT").rstrip("/")
    mu_dir = f"{remote_site_root}/wp-content/mu-plugins"

    files = (
        ("nero-network-site-footer.php", project_root / "wordpress/mu-plugins/nero-network-site-footer.php"),
        ("nero-network-site-footer-inc.php", project_root / "wordpress/mu-plugins/nero-network-site-footer-inc.php"),
    )

    ssh = connect_ssh()
    try:
        run_remote(ssh, f"mkdir -p {shlex.quote(mu_dir)}")
        for name, local in files:
            if not local.exists():
                print(f"Missing: {local}", file=sys.stderr)
                return 1
            remote = f"{mu_dir}/{name}"
            print(f"Uploading {name} -> {remote}")
            upload_via_sftp(ssh, local, remote)

        run_remote(ssh, f"cd {shlex.quote(remote_site_root)} && wp cache flush")
        print("Cache flushed. Global footer MU-plugin deployed.")
    finally:
        ssh.close()
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
