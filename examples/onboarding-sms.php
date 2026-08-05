<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;

$bird = new Bird('bk_XXXXXXXXXXXXXXXXXXXXXXXX');

$message = $bird->sms->send(
    to: '+15551234567',
    template: 'bird_otp_verification',
    parameters: ['code' => '493021'],
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
