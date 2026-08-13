<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\VerificationCheckRequest;
use MessageBird\Wire\Model\VerificationTo;

$bird = new Bird('bk_XXXXXXXXXXXXXXXXXXXXXXXX');

$result = $bird->verify->verifications->check(
    (new VerificationCheckRequest())
        ->setTo((new VerificationTo())->setEmail('user@example.com'))
        ->setCode('123456'),
);

echo $result->getSuccess() ? 'verified' : 'not verified', "\n";
