<?php

// HAND-WRITTEN example source for the preferences methods. Each `bird:snippet`
// region is the single source of truth for that key (the op's x-snippet-key):
// the surfacegen PHP writer injects it as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' preferences examples. `create` and
// `delete` are hand-written on the Preferences parent, so their regions here
// are authored for docs use rather than injected.

declare(strict_types=1);

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

foreach ($bird->preferences->list(['channel' => 'sms', 'handle' => '+15550001234']) as $preference) {
    echo $preference->getStatus(), ' ', $preference->getCoverage(), PHP_EOL;
}

$preference = $bird->preferences->get('prf_01krdgeqcxet5s7t44vh8rt9mg');
echo $preference->getChannel(), ' ', $preference->getStatus();

$result = $bird->preferences->create(
    channel: 'email',
    handle: 'jane@acme.com',
    status: 'granted',
    source: 'signup-form-v2',
    consentedAt: new DateTimeImmutable('2026-08-20T14:03:10Z'),
);
echo var_export($result->getApplied(), true);

// applied:false means a newer statement survived the request; the surviving
// record comes back on the result rather than being deleted out from under it.
$result = $bird->preferences->delete('prf_01krdgeqcxet5s7t44vh8rt9mg');
if ($result->getApplied() === false) {
    $survivor = $result->getPreference();
    echo 'refused: ', $survivor?->getStatus();
}
