<?php

// The first send a customer makes from the dashboard's onboarding step. Unlike
// quickstart-email.php this carries the key inline: the dashboard fills it with
// the workspace's real key, so the placeholder is what a reader sees before it
// is substituted, not advice to hardcode a secret.

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
