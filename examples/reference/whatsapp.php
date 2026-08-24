<?php

// HAND-WRITTEN example source for the WhatsApp methods. Each `bird:snippet`
// region is the single source of truth for that key (the op's x-snippet-key):
// the surfacegen PHP writer injects it as the @example on the generated
// method, and the docs pipeline extracts it for the API-reference code tabs.
// The scenarios mirror the other SDKs' whatsapp examples. `send` is hand-
// written on the Whatsapp parent, so its region here is authored for docs use
// rather than injected.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponent;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->whatsapp->send(
    to: '+15551234567',
    template: 'bird_otp',
    language: 'en',
    components: [
        (new WhatsAppMessageTemplateComponent())
            ->setType('body')
            ->setParameters([
                (new WhatsAppMessageTemplateComponentParameter())->setType('text')->setText('123456'),
            ]),
    ],
);
echo $message->getId(), ' ', $message->getStatus();

$message = $bird->whatsapp->get('wamid_01krdgeqcxet5s7t44vh8rt9mg');
echo $message->getStatus();

foreach ($bird->whatsapp->list(['status' => ['delivered']]) as $message) {
    echo $message->getId(), ' ', $message->getStatus(), "\n";
}

$events = $bird->whatsapp->listEvents('wamid_01krdgeqcxet5s7t44vh8rt9mg');
foreach ($events->getData() ?? [] as $event) {
    echo $event->getType(), ' ', $event->getId(), "\n";
}
