<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\VerificationCreateRequest;
use MessageBird\Wire\Model\VerificationTo;

$bird = new Bird('bk_XXXXXXXXXXXXXXXXXXXXXXXX');

$verification = $bird->verify->verifications->create(
    (new VerificationCreateRequest())
        ->setTo((new VerificationTo())->setEmailAddress('user@example.com')),
);

echo $verification->getId(), ' ', $verification->getStatus(), "\n";
