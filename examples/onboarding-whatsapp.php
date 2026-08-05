<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponent;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter;

$bird = new Bird('bk_XXXXXXXXXXXXXXXXXXXXXXXX');

$message = $bird->whatsapp->send(
    to: '+15551234567',
    template: 'bird_delivery_update',
    components: [
        (new WhatsAppMessageTemplateComponent())
            ->setType('body')
            ->setParameters([
                (new WhatsAppMessageTemplateComponentParameter())->setType('text')->setName('ref')->setText('A1B2C3D4'),
                (new WhatsAppMessageTemplateComponentParameter())->setType('text')->setName('date')->setText('10 Jul 2026'),
            ]),
    ],
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
