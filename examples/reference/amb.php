<?php

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\Wire\Model;

$bird = new Bird(getenv('BIRD_API_KEY') ?: '');

$bird->amb->businessAccounts->delete('abz_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->businessAccounts->reconnect('abz_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->amb->businessAccounts->events->list('abz_01krdgeqcxet5s7t44vh8rt9mg', ['limit' => '20']) as $item) {
    var_dump($item);
}

$bird->amb->businessAccounts->settings->get('abz_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->businessAccounts->settings->update('abz_01krdgeqcxet5s7t44vh8rt9mg', (new Model\AMBChannelSettingsUpdate())->setBrandName('Acme Support')->setLogoAssetId(null));

foreach ($bird->amb->businessAccounts->submissions->list('abz_01krdgeqcxet5s7t44vh8rt9mg', ['limit' => '2']) as $item) {
    var_dump($item);
}

$bird->amb->businessAccounts->submissions->create(
    'abz_01krdgeqcxet5s7t44vh8rt9mg',
    (new Model\AMBBusinessAccountSubmissionCreate())
        ->setReadinessAttachmentId('tca_01krdgeqcxet5s7t44vh8rt9mg')
        ->setUseCasesAttachmentId('tca_01krdgeqcxet5s7t44vh8rt9mh')
        ->setVideoAttachmentId('tca_01krdgeqcxet5s7t44vh8rt9mj'),
);


$bird->amb->businessAccounts->get('abz_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->businessAccounts->update('abz_01krdgeqcxet5s7t44vh8rt9mg', (new Model\AMBBusinessAccountUpdate())->setName('Acme Support'));

foreach ($bird->amb->businessAccounts->list(['limit' => '2']) as $item) {
    var_dump($item);
}

$bird->amb->businessAccounts->create((new Model\AMBBusinessAccountCreate())->setName('Acme Retail')->setAppleBusinessId('b52d6267-2b62-4f8a-8842-0533d0f1dc07'));

$bird->amb->conversations->get('acv_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->conversations->update('acv_01krdgeqcxet5s7t44vh8rt9mg', (new Model\AMBConversationUpdate())->setAssignedTo(null)->setLabels([])->setInboxStatus('resolved'));

foreach ($bird->amb->conversations->listMessages('acv_01krdgeqcxet5s7t44vh8rt9mg', ['limit' => '2']) as $item) {
    var_dump($item);
}

$bird->amb->conversations->typing('acv_01krdgeqcxet5s7t44vh8rt9mg', (new Model\AMBConversationTypingRequest())->setEvent('typing_start'));

foreach ($bird->amb->conversations->list(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg', 'limit' => '2']) as $item) {
    var_dump($item);
}

$bird->amb->listEvents('amb_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->get('amb_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->list(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg', 'limit' => '2']);

$bird->amb->send((new Model\AMBMessageSendRequest())->setFrom('b52d6267-2b62-4f8a-8842-0533d0f1dc07')->setTo('opaque-customer')->setContent(['type' => 'text', 'body' => 'Your order is ready.']));

$bird->amb->routingRules->get('arr_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->routingRules->update('arr_01krdgeqcxet5s7t44vh8rt9mg', (new Model\AMBRoutingRuleUpdate())->setQueue('sales')->setPrecedence(0)->setIsDefault(false));

$bird->amb->routingRules->delete('arr_01krdgeqcxet5s7t44vh8rt9mg');

$rules = $bird->amb->routingRules->list(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg']);
var_dump($rules->getData());

$bird->amb->routingRules->create((new Model\AMBRoutingRuleCreate())->setBusinessAccountId('abz_01krdgeqcxet5s7t44vh8rt9mg')->setMatchKind('intent')->setMatchIntentId('support')->setQueue('support')->setPrecedence(0)->setIsDefault(false)->setMatchGroupId(null));

$bird->amb->stats->byBusiness(['limit' => '2']);

$bird->amb->stats->byCategory(['limit' => '2']);

$bird->amb->stats->conversations->daily();

$bird->amb->stats->conversations->hourly();

$bird->amb->stats->conversations->summary();

$bird->amb->stats->daily(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg']);

$bird->amb->stats->byErrorCode(['limit' => '2']);

$bird->amb->stats->byGroup(['limit' => '2']);

$bird->amb->stats->hourly(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg']);

$bird->amb->stats->inbound->byBusiness(['limit' => '2']);

$bird->amb->stats->inbound->daily();

$bird->amb->stats->inbound->hourly();

$bird->amb->stats->inbound->byIntent(['limit' => '2']);

$bird->amb->stats->inbound->summary();

$bird->amb->stats->byIntent(['limit' => '2']);

$bird->amb->stats->byMessageKind(['limit' => '2']);

$bird->amb->stats->summary(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg']);

$bird->amb->stats->byTag(['limit' => '2']);

$bird->amb->suppressions->get('asp_01krdgeqcxet5s7t44vh8rt9mg');

$bird->amb->suppressions->delete('asp_01krdgeqcxet5s7t44vh8rt9mg');

foreach ($bird->amb->suppressions->list(['business_account_id' => 'abz_01krdgeqcxet5s7t44vh8rt9mg', 'limit' => '2']) as $item) {
    var_dump($item);
}

$bird->amb->suppressions->create((new Model\AMBSuppressionCreate())->setAddress('opaque-customer')->setAddressType('opaque_user_id'));
