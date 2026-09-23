<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\CreateVoiceCallRequest;
use MessageBird\Wire\Model\CreateVoiceCallSequenceRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$call = $bird->voice->legs->get('vcl_01k0p3v9wera3v6q6xw3e9y2mh');
// A call still ringing or connected carries no economics yet.
echo $call->getStatus(), ' ', $call->getDurationMs() ?? 'in flight';

foreach ($bird->voice->legs->list() as $leg) {
    echo $leg->getId(), ' ', $leg->getStatus(), "\n";
}

$call = $bird->voice->calls->create(
    (new CreateVoiceCallRequest())
        ->setFrom('+12025550100')
        ->setTo('+12025550101')
        ->setSequence(
            (new CreateVoiceCallSequenceRequest())
                ->setId('vsq_01krdgeqcxet5s7t44vh8rt9mg')
                ->setEntryNodeId('start')
                ->setTriggerData([]),
        ),
);
echo $call->getId(), ' ', $call->getInitialLegId();
