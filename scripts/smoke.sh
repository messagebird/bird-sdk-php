#!/usr/bin/env bash
# Post-publish smoke test for github.com/messagebird/bird-sdk-php.
#
# From a throwaway project, require the just-tagged version from Packagist and
# run a script that references the public client class. This proves the tag is
# resolvable through Packagist and the exported package autoloads with no
# monorepo context — the standalone equivalent of "did the release actually
# produce something installable". Import-only by design: it validates packaging,
# not API calls (a real call would need credentials and a live API).
#
# Usage: smoke.sh <version-without-leading-v>
# Called by: the mirror release workflow after the tag is pushed.
set -euo pipefail
ver="${1:?usage: smoke.sh <version-without-leading-v>}"

tmp="$(mktemp -d)"
trap 'rm -rf "$tmp"' EXIT
cd "$tmp"

# php-http/discovery's composer plugin is denied on purpose: allowed, it would
# try to pin a PSR-18 client at install time, which a bare smoke project has no
# reason to do (the SDK discovers one at runtime).
cat > composer.json <<'JSON'
{
  "name": "bird/php-smoke",
  "require": {},
  "config": { "allow-plugins": { "php-http/discovery": false } }
}
JSON

# Packagist can lag a just-pushed tag while its webhook indexes the new version,
# so retry for ~5 minutes. Print composer's own output on the last attempt:
# swallowing it makes propagation lag look identical to a packaging break.
attempts=10
for attempt in $(seq 1 "$attempts"); do
	if out=$(composer require "messagebird/sdk:${ver}" --no-interaction --no-progress 2>&1); then
		break
	fi
	if [ "$attempt" -eq "$attempts" ]; then
		echo "smoke: messagebird/sdk:${ver} not resolvable after ${attempts} attempts (~5m); last error:" >&2
		printf '%s\n' "$out" | sed 's/^/  /' >&2
		exit 1
	fi
	echo "smoke: messagebird/sdk:${ver} not available yet — retrying in 30s (attempt ${attempt}/${attempts})"
	sleep 30
done

cat > smoke.php <<'PHPSMOKE'
<?php

require __DIR__ . '/vendor/autoload.php';

// Reference the public client so autoloading proves the class and the package
// are present in the published version; do not construct against the API.
if (!class_exists(\MessageBird\Bird::class)) {
    fwrite(STDERR, "smoke: MessageBird\\Bird not autoloadable from the published package\n");
    exit(1);
}
echo 'messagebird/sdk smoke OK', "\n";
PHPSMOKE

php smoke.php
