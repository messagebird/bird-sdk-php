<?php

// HAND-WRITTEN example source for the GENERATED lookup methods.
// Each `bird:snippet` region is the single source of truth for that key: the
// surfacegen PHP writer injects it (unmarked) as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' lookup examples.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\EmailLookupRequest;
use MessageBird\Wire\Model\PhoneNumberLookupRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$answer = $bird->lookup->email(
    (new EmailLookupRequest())->setEmail('aisha.khan@example.com'),
);
// result is an open vocabulary; delivery_confidence is always comparable.
echo $answer->getResult(), ' ', $answer->getDeliveryConfidence();

$answer = $bird->lookup->phoneNumber(
    (new PhoneNumberLookupRequest())
        ->setPhoneNumber('+31612345678')
        ->setType(['classification', 'score']),
);
echo $answer->getCountryCode(), ' ', $answer->getLineType();
// Only a block whose status is ok carries a value, and only that one is billed.
if ($answer->getScore()?->getStatus() === 'ok') {
    echo $answer->getScore()->getValue();
}
