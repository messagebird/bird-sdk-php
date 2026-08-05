<?php

// HAND-WRITTEN example source for the SMS methods. Each `bird:snippet` region
// is the single source of truth for that key (the op's x-snippet-key): the
// surfacegen PHP writer injects it as the @example on the generated method,
// and the docs pipeline extracts it for the API-reference code tabs. The
// scenarios mirror the other SDKs' sms examples. `send` / `sendBatch` are
// hand-written on the Sms parent, so their regions here are authored for docs
// use rather than injected.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\SMSMessageSendRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->sms->send(
    to: '+15551234567',
    text: 'Your verification code is 123456.',
    category: 'authentication',
);
echo $message->getId(), ' ', $message->getStatus();

$batch = $bird->sms->sendBatch([
    (new SMSMessageSendRequest())->setTo('+15551111111')->setText('Hi Alice!')->setCategory('marketing'),
    (new SMSMessageSendRequest())->setTo('+15552222222')->setText('Hi Bob!')->setCategory('marketing'),
]);
foreach ($batch->getData() ?? [] as $item) {
    echo $item->getId(), ' ', $item->getStatus(), "\n";
}

$message = $bird->sms->get('sms_01krdgeqcxet5s7t44vh8rt9mg');
echo $message->getStatus();

foreach ($bird->sms->list(['direction' => 'outbound']) as $message) {
    echo $message->getId(), ' ', $message->getStatus(), "\n";
}
