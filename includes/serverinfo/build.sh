#!/bin/bash
pkg -t node18-linuxstatic-arm64 -o ./bin-arm -C GZip index.js
pkg -t node18-linuxstatic-x64 -o ./bin-x64 -C GZip index.js
pkg -t node18-mac-arm64 -o ./bin-mac -C GZip index.js

rsync --progress ./bin-arm maretimebay:/usr/bin/starshine-status
rsync --progress ./bin-x64 zephyrheights:/usr/bin/starshine-status
rsync --progress ./bin-x64 zephyrheights-testing:/usr/bin/starshine-status
rsync --progress ./bin-x64 bridlewood:/home/fedora/starshine-status

ssh maretimebay chmod +x /usr/bin/starshine-status
ssh zephyrheights chmod +x /usr/bin/starshine-status
ssh zephyrheights-testing chmod +x /usr/bin/starshine-status
ssh bridlewood sudo 'bash -c "mv /home/fedora/starshine-status /usr/bin/starshine-status && chmod +x /usr/bin/starshine-status"'