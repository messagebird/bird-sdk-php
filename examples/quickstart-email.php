<?php

// Send your first email. Set BIRD_API_KEY in your environment, then run:
//   php examples/quickstart-email.php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    subject: 'Hello from Bird',
    html: '<p>My first Bird email.</p>',
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
