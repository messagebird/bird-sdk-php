#!/usr/bin/env bash
# Regenerate the PHP wire layer (src/Wire) from the public OpenAPI bundle.
#
#   1. openapi-compat.go: 3.1 public bundle -> 3.0-compat (jane rejects the 3.1
#      version tag; the Go SDK already depends on this downgrade).
#   2. jane-openapi: emit Model/ + Normalizer/ (+ endpoint/client/exception noise).
#   3. strip the noise: keep only the wire layer we drive ourselves.
#   4. canonicalize the casts jane emits as (double), deprecated since PHP 8.5.
set -euo pipefail

here="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
repo_root="$(cd "$here/../.." && pwd)"

bundle="$repo_root/backend/openapi/.generated/openapi.public.bundle.yaml"
gendir="$here/.generated"
compat="$gendir/openapi.public.compat.yaml"
# Write the wire layer into beak's stage when running under beak, so a failed,
# interrupted, or killed run never touches the committed tree — beak swaps the
# staged output in only on success and prunes stale files, exactly like sdk-go.
# A direct invocation (no stage) regenerates in place.
if [ -n "${BEAK_STAGE:-}" ]; then
    wire="$BEAK_STAGE/clients/sdk-php/src/Wire"
else
    wire="$here/src/Wire"
fi

# The wire layer regenerates only with the PHP toolchain (php + the composer-
# installed jane binary). It is committed and its drift is enforced only on CI,
# so a machine without PHP skips cleanly rather than running jane below.
if ! command -v php >/dev/null 2>&1 || [ ! -x "$here/vendor/bin/jane-openapi" ]; then
    echo "==> php/jane toolchain absent — skipping PHP wire regeneration (src/Wire left as committed; CI enforces drift)"
    exit 0
fi

mkdir -p "$gendir"

echo "==> openapi-compat: 3.1 -> 3.0"
( cd "$repo_root/backend" && go run -trimpath scripts/openapi-compat.go \
    "openapi/.generated/openapi.public.bundle.yaml" "$compat" )

echo "==> jane-openapi generate"
# TODO(sdk-php): probe for php/composer + vendor/bin/jane-openapi BEFORE this rm —
# on a machine without them the wire layer is destroyed and never regenerated.
rm -rf "$wire"
mkdir -p "$(dirname "$wire")"
# .jane-openapi honors BIRD_PHP_WIRE_OUT as its output directory, so models land
# in the staged path above (it falls back to src/Wire in place when unset).
( cd "$here" && BIRD_PHP_WIRE_OUT="$wire" php -d error_reporting='E_ALL & ~E_DEPRECATED' \
    vendor/bin/jane-openapi generate )

echo "==> strip non-wire output (keep Model/ Normalizer/ Runtime/Normalizer/)"
rm -rf \
    "$wire/Endpoint" \
    "$wire/Exception" \
    "$wire/Authentication" \
    "$wire/Runtime/Client" \
    "$wire/Client.php"

# jane writes `(double)` for every float field, which PHP 8.5 deprecates in
# favour of `(float)` — a notice in the logs of any customer on 8.5 who reads
# stats or sends SMS. The style config deliberately exempts src/Wire, so this
# names the one rule and the path explicitly rather than holding generated code
# to our bar; the CLI path overrides the config's finder.
echo "==> canonicalize (double) -> (float)"
( cd "$here" && vendor/bin/php-cs-fixer fix "$wire" \
    --rules=short_scalar_cast --using-cache=no --quiet )

# jane parses every date-time with createFromFormat('Y-m-d\TH:i:sP', …), which
# returns FALSE on fractional seconds — and the API always sends them
# ("2026-08-04T07:58:52.99886Z"). FALSE then hits a ?DateTime setter and fatals,
# so before this the SDK could not deserialize a single real response. `new
# \DateTime()` accepts fractional and whole seconds, keeps the microseconds, and
# throws on genuine garbage instead of returning a value the setter rejects.
# Only the date-time format is rewritten; the two `'Y-m-d'` date-only parses are
# untouched, where createFromFormat's carry-over of the current clock time is
# jane's behaviour to own, not something to change under it.
echo "==> lenient date-time parsing (fractional seconds)"
find "$wire" -name '*.php' -exec perl -0pi \
    -e "s/\\\\DateTime::createFromFormat\('Y-m-d\\\\TH:i:sP', ([^)]+)\)/new \\\\DateTime(\$1)/g" {} +

echo "==> done: $(find "$wire" -name '*.php' | wc -l | tr -d ' ') wire files"
