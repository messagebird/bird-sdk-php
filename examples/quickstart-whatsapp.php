<?php

// Send your first WhatsApp template message. Set BIRD_API_KEY in your
// environment, then run:
//   php examples/quickstart-whatsapp.php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MessageBird\Bird;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponent;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->whatsapp->send(
    to: '+14155550100',
    template: 'bird_otp',
    components: [
        (new WhatsAppMessageTemplateComponent())
            ->setType('body')
            ->setParameters([
                (new WhatsAppMessageTemplateComponentParameter())->setType('text')->setText('123456'),
            ]),
    ],
);

echo $message->getId(), ' ', $message->getStatus(), "\n";
