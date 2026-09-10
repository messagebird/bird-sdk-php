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
use MessageBird\Wire\Model\WhatsAppReactionUpsert;
use MessageBird\Wire\Model\WhatsAppReadReceiptRequest;

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

$summary = $bird->whatsapp->stats->summary([
    'from' => '2026-08-01',
    'to' => '2026-08-31',
    'timezone' => 'Europe/Amsterdam',
]);
echo $summary->getDelivery()?->getAccepted(), ' ', $summary->getDelivery()?->getDelivered();

$daily = $bird->whatsapp->stats->daily(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($daily->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getDelivery()?->getAccepted(), PHP_EOL;
}

$hourly = $bird->whatsapp->stats->hourly(['from' => '2026-08-30T00:00:00Z', 'to' => '2026-08-31T00:00:00Z']);
foreach ($hourly->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getDelivery()?->getAccepted(), PHP_EOL;
}

$byErrorCode = $bird->whatsapp->stats->byErrorCode(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byErrorCode->getData() ?? [] as $row) {
    echo $row->getErrorCode(), ' ', $row->getCount(), PHP_EOL;
}

$byTemplate = $bird->whatsapp->stats->byTemplate(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byTemplate->getData() ?? [] as $row) {
    echo $row->getTemplateId(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byTemplateCategory = $bird->whatsapp->stats->byTemplateCategory(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byTemplateCategory->getData() ?? [] as $row) {
    echo $row->getCategory(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byTag = $bird->whatsapp->stats->byTag(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byTag->getData() ?? [] as $row) {
    echo $row->getTag(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byPhoneNumber = $bird->whatsapp->stats->byPhoneNumber(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byPhoneNumber->getData() ?? [] as $row) {
    echo $row->getPhoneNumber(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byCountry = $bird->whatsapp->stats->byCountry(['from' => '2026-08-01', 'to' => '2026-08-31']);
foreach ($byCountry->getData() ?? [] as $row) {
    echo $row->getCountry(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$inbound = $bird->whatsapp->stats->inbound->summary(['from' => '2026-05-01', 'to' => '2026-05-31']);
echo $inbound->getReceived();

$inboundDaily = $bird->whatsapp->stats->inbound->daily(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundDaily->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getReceived(), PHP_EOL;
}

$inboundHourly = $bird->whatsapp->stats->inbound->hourly([
    'from' => '2026-05-30T00:00:00Z',
    'to' => '2026-05-31T00:00:00Z',
]);
foreach ($inboundHourly->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getReceived(), PHP_EOL;
}

$inboundByPhoneNumber = $bird->whatsapp->stats->inbound->byPhoneNumber(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundByPhoneNumber->getData() ?? [] as $row) {
    echo $row->getPhoneNumber(), ' ', $row->getReceived(), PHP_EOL;
}

$media = $bird->whatsapp->messages->media('wam_01kya19eknftrs2s6p82asmvnh', 'waf_01kyb2m4xq7whs0d8n3prv6tez');
file_put_contents('photo.jpg', $media->data);
echo $media->contentType, ' ', $media->contentLength;

$ack = $bird->whatsapp->markRead(
    'wam_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppReadReceiptRequest())->setTypingIndicator(true),
);
var_dump($ack->getTypingIndicator());

$reaction = $bird->whatsapp->reaction->set(
    'wam_01krdgeqcxet5s7t44vh8rt9mg',
    (new WhatsAppReactionUpsert())->setEmoji("\u{1F44D}"),
);
echo $reaction->getId(), ' ', $reaction->getEmoji();

$bird->whatsapp->reaction->remove('wam_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->whatsapp->reaction->listEvents('wam_01krdgeqcxet5s7t44vh8rt9mg') as $event) {
    echo $event->getId(), ' ', $event->getEmoji(), ' ', $event->getStatus(), "\n";
}

foreach ($bird->whatsapp->templates->list() as $template) {
    echo $template->getSlug(), ' ', $template->getStatus(), "\n";
}

$template = $bird->whatsapp->templates->get('bird_otp');
echo $template->getDefaultLanguage();

foreach ($bird->whatsapp->templates->versions->list('bird_otp') as $version) {
    echo $version->getId(), ' ', $version->getVersionNumber(), "\n";
}

$version = $bird->whatsapp->templates->versions->get('bird_otp', 'wav_01ky4x8e4genzb7way45txfkm1');
echo $version->getVersionNumber();

$languages = $bird->whatsapp->templates->versions->languages->list('bird_otp', 'wav_01ky4x8e4genzb7way45txfkm1');
foreach ($languages->getData() ?? [] as $language) {
    echo $language->getLanguage(), ' ', $language->getStatus(), "\n";
}

$language = $bird->whatsapp->templates->versions->languages->get('bird_otp', 'wav_01ky4x8e4genzb7way45txfkm1', 'nl-BE');
foreach ($language->getComponents() ?? [] as $component) {
    echo $component->getType(), "\n";
}
