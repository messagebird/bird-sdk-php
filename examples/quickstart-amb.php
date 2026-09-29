<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\AMBMessageSendRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');
$conversation = $bird->amb->conversations->get(getenv('AMB_CONVERSATION_ID') ?: '');
$businessAccountId = $conversation->getBusinessAccountId();
if ($businessAccountId === null) {
    throw new RuntimeException('The conversation did not include a business account ID.');
}
$business = $bird->amb->businessAccounts->get($businessAccountId);
if ($business->getStatus() === 'disconnected' || $conversation->getStatus() !== 'open' || !$business->getAppleBusinessId() || !$conversation->getRecipient()?->getOpaqueUserId()) {
    throw new RuntimeException('A configured, connected business account and an open conversation are required.');
}
$message = $bird->amb->send(
    (new AMBMessageSendRequest())
        ->setFrom($business->getAppleBusinessId())
        ->setTo($conversation->getRecipient()->getOpaqueUserId())
        ->setContent(['type' => 'text', 'body' => 'Your order is ready.']),
);
echo $message->getId() . PHP_EOL;
$messageId = $message->getId();
if ($messageId === null) {
    throw new RuntimeException('The send response did not include a message ID.');
}
$events = $bird->amb->listEvents($messageId);
var_dump($events);
