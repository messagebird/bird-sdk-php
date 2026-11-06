<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;

$bird = new Bird('bk_XXXXXXXXXXXXXXXXXXXXXXXX');

$message = $bird->whatsapp->send(
    to: '+15551234567',
    template: 'bird_delivery_update',
    parameters: ['ref' => 'A1B2C3D4', 'date' => '10 Jul 2026'],
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
