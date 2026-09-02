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
use MessageBird\Wire\Model\SMSKeywordRuleCreate;
use MessageBird\Wire\Model\SMSKeywordRuleUpdate;
use MessageBird\Wire\Model\SMSMessageSendRequest;
use MessageBird\Wire\Model\SMSSuppressionCreate;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$message = $bird->sms->send(
    from: '+15557654321',
    to: '+15551234567',
    text: 'Your verification code is 123456.',
    category: 'authentication',
);
echo $message->getId(), ' ', $message->getStatus();

$message = $bird->sms->send(
    to: '+15551234567',
    template: 'bird_otp_verification',
    parameters: ['code' => '123456'],
);
echo $message->getId(), ' ', $message->getStatus();

$batch = $bird->sms->sendBatch(messages: [
    (new SMSMessageSendRequest())
        ->setFrom('+15557654321')
        ->setTo('+15551111111')
        ->setText('Hi Alice!')
        ->setCategory('marketing'),
    (new SMSMessageSendRequest())
        ->setFrom('+15557654321')
        ->setTo('+15552222222')
        ->setText('Hi Bob!')
        ->setCategory('marketing'),
]);
foreach ($batch->getData() ?? [] as $item) {
    echo $item->getId(), ' ', $item->getStatus(), "\n";
}

$message = $bird->sms->get('sms_01krdgeqcxet5s7t44vh8rt9mg');
echo $message->getStatus();

foreach ($bird->sms->list(['direction' => 'outbound']) as $message) {
    echo $message->getId(), ' ', $message->getStatus(), "\n";
}

$events = $bird->sms->listEvents('sms_abc123');
foreach ($events->getData() ?? [] as $event) {
    echo $event->getType(), ' ', $event->getOccurredAt()?->format(DATE_ATOM), PHP_EOL;
}

$summary = $bird->sms->stats->summary(['from' => '2026-05-01', 'to' => '2026-05-31']);
echo $summary->getDelivery()?->getAccepted(), ' ', $summary->getDelivery()?->getDeliveryRate();

$daily = $bird->sms->stats->daily(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($daily->getData() ?? [] as $point) {
    echo $point->getBucket(), PHP_EOL;
}

$hourly = $bird->sms->stats->hourly(['from' => '2026-05-30T00:00:00Z', 'to' => '2026-05-31T00:00:00Z']);
foreach ($hourly->getData() ?? [] as $point) {
    echo $point->getBucket(), PHP_EOL;
}

$byCountry = $bird->sms->stats->byCountry([
    'from' => '2026-05-01',
    'to' => '2026-05-31',
    'sort' => 'delivery_rate',
]);
foreach ($byCountry->getData() ?? [] as $row) {
    echo $row->getCountry(), ' ', $row->getDelivery()?->getDeliveryRate(), PHP_EOL;
}

$byCarrier = $bird->sms->stats->byCarrier(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($byCarrier->getData() ?? [] as $row) {
    echo $row->getCarrier(), ' ', $row->getDelivery()?->getDelivered(), PHP_EOL;
}

$byCategory = $bird->sms->stats->byCategory(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($byCategory->getData() ?? [] as $row) {
    echo $row->getCategory(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$byOriginator = $bird->sms->stats->byOriginator(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($byOriginator->getData() ?? [] as $row) {
    echo $row->getOriginator(), ' ', $row->getDelivery()?->getDeliveryRate(), PHP_EOL;
}

$byStatus = $bird->sms->stats->byStatus(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($byStatus->getData() ?? [] as $row) {
    echo $row->getStatus(), ' ', $row->getCount(), PHP_EOL;
}

$byErrorCode = $bird->sms->stats->byErrorCode(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($byErrorCode->getData() ?? [] as $row) {
    // The same value as the error_code filter on $bird->sms->list().
    echo $row->getErrorCode(), ' ', $row->getDelivery()?->getFailed(), PHP_EOL;
}

$byTag = $bird->sms->stats->byTag(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($byTag->getData() ?? [] as $row) {
    // A message carrying several tags counts once under each, so rows do not sum
    // to the period total.
    echo $row->getTag(), ' ', $row->getDelivery()?->getAccepted(), PHP_EOL;
}

$inbound = $bird->sms->stats->inbound->summary(['from' => '2026-05-01', 'to' => '2026-05-31']);
echo $inbound->getReceived();

$inboundDaily = $bird->sms->stats->inbound->daily(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundDaily->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getReceived(), PHP_EOL;
}

$inboundHourly = $bird->sms->stats->inbound->hourly([
    'from' => '2026-05-30T00:00:00Z',
    'to' => '2026-05-31T00:00:00Z',
]);
foreach ($inboundHourly->getData() ?? [] as $point) {
    echo $point->getBucket(), ' ', $point->getReceived(), PHP_EOL;
}

$inboundByCountry = $bird->sms->stats->inbound->byCountry(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundByCountry->getData() ?? [] as $row) {
    echo $row->getCountry(), ' ', $row->getReceived(), PHP_EOL;
}

$inboundByOperator = $bird->sms->stats->inbound->byOperator(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundByOperator->getData() ?? [] as $row) {
    // Messages whose operator the carrier did not report are excluded, so these
    // rows can sum to less than the inbound summary for the same period.
    echo $row->getMccMnc(), ' ', $row->getReceived(), PHP_EOL;
}

$inboundByNumber = $bird->sms->stats->inbound->byNumber(['from' => '2026-05-01', 'to' => '2026-05-31']);
foreach ($inboundByNumber->getData() ?? [] as $row) {
    echo $row->getNumber(), ' ', $row->getReceived(), PHP_EOL;
}

foreach ($bird->smsSuppressions->list() as $suppression) {
    echo $suppression->getOriginator(), ' ', $suppression->getDestination(), PHP_EOL;
}

$suppression = $bird->smsSuppressions->get('sup_abc123');
echo $suppression->getReason(), ' ', var_export($suppression->getBlocking(), true);

// A suppression covers one sender and one subscriber, so stopping every sender
// means one call per sender.
$suppression = $bird->smsSuppressions->add(
    (new SMSSuppressionCreate())
        ->setDestination('+15550001234')
        ->setOriginator('+15557654321'),
);
echo $suppression->getId();

// Only a `manual` suppression can be ended: a subscriber's own stop keyword and
// a carrier's opt-out are refused.
$bird->smsSuppressions->remove('sup_abc123');
$rules = $bird->smsKeywordRules->list(['country' => 'NL']);
foreach ($rules->getData() ?? [] as $rule) {
    echo $rule->getOperation(), ' ', implode(',', $rule->getKeywords() ?? []), PHP_EOL;
}

$rule = $bird->smsKeywordRules->get('skr_abc123');
echo $rule->getOperation(), ' ', $rule->getReply();

$rule = $bird->smsKeywordRules->create(
    (new SMSKeywordRuleCreate())
        ->setOperation('stop')
        ->setCountry('NL')
        ->setReply('You are unsubscribed from MyBrand. Reply START to resume.'),
);
// getEffectiveKeywords() is Bird's set plus any of your own.
echo $rule->getId(), ' ', implode(',', $rule->getEffectiveKeywords() ?? []);

// Omitting keywords leaves the set alone; an empty array clears your additions
// back to Bird's.
$rule = $bird->smsKeywordRules->update(
    'skr_abc123',
    (new SMSKeywordRuleUpdate())->setReply('You are unsubscribed. Reply START to resume.'),
);
echo $rule->getReply();

$bird->smsKeywordRules->delete('skr_abc123');
