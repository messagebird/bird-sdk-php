<?php

// HAND-WRITTEN example source for the generated voice methods. Each
// `bird:snippet` region is the single source of truth for that key (the op's
// x-snippet-key): the surfacegen PHP writer injects it as the @example on the
// generated method, and the docs pipeline extracts it for the API-reference
// code tabs. Calls are placed by your own SIP equipment rather than through
// the API, so the call log is a read surface.

declare(strict_types=1);

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$call = $bird->voice->get('vcl_01k0p3v9wera3v6q6xw3e9y2mh');
// A call still ringing or connected carries no economics yet.
echo $call->getStatus(), ' ', $call->getDurationMs() ?? 'in flight';

foreach ($bird->voice->list(['status' => ['ringing', 'in_progress']]) as $call) {
    echo $call->getId(), ' ', $call->getStatus(), "\n";
}
