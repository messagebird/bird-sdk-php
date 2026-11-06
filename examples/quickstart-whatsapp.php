<?php

// Send your first WhatsApp template message. Set BIRD_API_KEY in your
// environment, then run:
//   php examples/quickstart-whatsapp.php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->whatsapp->send(
    to: '+14155550100',
    template: 'bird_otp',
    parameters: ['code' => '123456'],
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
