<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;

$bird = new Bird('bk_XXXXXXXXXXXXXXXXXXXXXXXX');

$message = $bird->email->send(
    from: 'Bird <onboarding@messagebird.dev>',
    to: ['delivered@messagebird.dev'],
    subject: 'Hello World',
    html: '<p>You made your <strong>first email fly</strong>. Congratulations!</p>',
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
