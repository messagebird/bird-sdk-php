<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model\VoiceTrunkIPACLCreate;
use MessageBird\Wire\Model\DestinationSetting;
use MessageBird\Wire\Model\VoiceDestinationsUpdate;
use MessageBird\Wire\Model\VoiceNumberUpdate;
use MessageBird\Wire\Model\VoiceTrunkCreate;
use MessageBird\Wire\Model\VoiceTrunkUpdate;
use MessageBird\Wire\Model\VoiceTrunkGatewayCreate;
use MessageBird\Wire\Model\VoiceTrunkGatewayUpdate;
use MessageBird\Wire\Model\VoiceCallerIDVerifyRequest;
use MessageBird\Wire\Model\CreateVoiceCallRequest;
use MessageBird\Wire\Model\CreateVoiceCallSequenceRequest;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$call = $bird->voice->legs->get('vcl_01k0p3v9wera3v6q6xw3e9y2mh');
// A call still ringing or connected carries no economics yet.
echo $call->getStatus(), ' ', $call->getDurationMs() ?? 'in flight';

foreach ($bird->voice->legs->list() as $leg) {
    echo $leg->getId(), ' ', $leg->getStatus(), "\n";
}

foreach ($bird->voice->trunks->list() as $trunk) {
    // A trunk with no allow list and no session credentials admits nothing.
    echo $trunk->getId(), ' ', $trunk->getDomain() ?? 'no domain yet', "\n";
}

$trunk = $bird->voice->trunks->update(
    'spt_01krdgeqcxet5s7t44vh8rt9mg',
    // Each list replaces the previous one, so send what you want to end up with.
    (new VoiceTrunkUpdate())->setIpAcls([
        (new VoiceTrunkIPACLCreate())->setCidr('203.0.113.0/24')->setDescription('Amsterdam PBX'),
    ]),
);
echo count($trunk->getIpAcls() ?? []), "\n";

$destinations = $bird->voice->destinations->list();
foreach ($destinations->getData() ?? [] as $destination) {
    echo $destination->getCountryCode(), ' ', $destination->getEnabled() ? 'on' : 'off', "\n";
}

$credential = $bird->voice->sessionCredentials->create();
// The password is returned once. Until expires_at it can place billed calls.
echo $credential->getUsername(), ' ', $credential->getRealm(), "\n";

$trunk = $bird->voice->trunks->create(
    (new VoiceTrunkCreate())->setName('Lisbon office')->setOutboundEnabled(true)->setInboundEnabled(true),
);
echo $trunk->getId(), ' ', $trunk->getDomain(), "\n";

$trunk = $bird->voice->trunks->get('trunk-id');
echo $trunk->getName(), ' ', $trunk->getInboundEnabled() ? 'in' : '-', "\n";

$bird->voice->trunks->delete('trunk-id');

$gateways = $bird->voice->trunks->gateways->list('TRUNK_ID');
foreach ($gateways->getData() ?? [] as $gateway) {
    echo $gateway->getId(), ' ', $gateway->getPriority(), "\n";
}

$gateway = $bird->voice->trunks->gateways->get('TRUNK_ID', 'GATEWAY_ID');
echo $gateway->getId(), ' ', $gateway->getPriority(), "\n";

$gateway = $bird->voice->trunks->gateways->create(
    'TRUNK_ID',
    (new VoiceTrunkGatewayCreate())
        ->setSipUri('sip:pbx.example.com:5060')
        ->setPriority(0)
        ->setDestinationFormat('1234#{number}'),
);
echo $gateway->getId(), ' ', $gateway->getPriority(), "\n";

$gateway = $bird->voice->trunks->gateways->update(
    'TRUNK_ID', 'GATEWAY_ID', (new VoiceTrunkGatewayUpdate())->setPriority(10),
);
echo $gateway->getId(), ' ', $gateway->getPriority(), "\n";

$bird->voice->trunks->gateways->delete('TRUNK_ID', 'GATEWAY_ID');

foreach ($bird->voice->numbers->list() as $number) {
    echo $number->getId(), ' ', $number->getPhoneNumber(), "\n";
}

$number = $bird->voice->numbers->get('number-id');
echo $number->getPhoneNumber(), "\n";

$number = $bird->voice->numbers->update('number-id', (new VoiceNumberUpdate())->setName('Support line'));
echo $number->getId(), ' ', $number->getName() ?? '', "\n";

foreach ($bird->voice->callerIds->list() as $callerId) {
    echo $callerId->getId(), ' ', $callerId->getPhoneNumber(), "\n";
}

$callerId = $bird->voice->callerIds->get('caller-id');
echo $callerId->getPhoneNumber(), ' ', $callerId->getStatus(), "\n";

$callerId = $bird->voice->callerIds->verify(
    'CALLER_ID', (new VoiceCallerIDVerifyRequest())->setCode('123456'),
);
echo $callerId->getId(), ' ', $callerId->getStatus(), "\n";

$destinations = $bird->voice->destinations->update(
    (new VoiceDestinationsUpdate())->setDestinations([
        (new DestinationSetting())->setCountryCode('PT')->setEnabled(true),
    ]),
);
echo count($destinations->getData() ?? []), "\n";

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
