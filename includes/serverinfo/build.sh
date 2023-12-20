#!/bin/bash
pkg -t node18-linuxstatic-arm64 -o ./bin-arm -C GZip index.js
pkg -t node18-linuxstatic-x64 -o ./bin-x64 -C GZip index.js
pkg -t node18-mac-arm64 -o ./bin-mac -C GZip index.js