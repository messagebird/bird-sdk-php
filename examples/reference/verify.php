<?php

// HAND-WRITTEN example source for the GENERATED verify methods. Each
// `bird:snippet` region is the single source of truth for that key (the op's
// x-snippet-key): the surfacegen PHP writer injects it as the @example on the
// generated method, and the docs pipeline extracts it for the API-reference
// code tabs. The two-step flow lives under `$bird->verify->verifications`
// (create then check).

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\VerificationCheckRequest;
use MessageBird\Wire\Model\VerificationCreateRequest;
use MessageBird\Wire\Model\VerificationTo;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$verification = $bird->verify->verifications->create(
    (new VerificationCreateRequest())->setTo((new VerificationTo())->setPhoneNumber('+15551234567')),
);
echo $verification->getId(), ' ', $verification->getStatus();

$result = $bird->verify->verifications->check(
    (new VerificationCheckRequest())
        ->setTo((new VerificationTo())->setPhoneNumber('+15551234567'))
        ->setCode('123456'),
);
echo $result->getSuccess() ? 'verified' : 'failed';
