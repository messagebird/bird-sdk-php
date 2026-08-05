<?php

// HAND-WRITTEN example source for the Realtime methods. Each `bird:snippet`
// region is the source of truth for that key (the op's x-snippet-key): the docs
// pipeline extracts it for the API-reference code tabs. Realtime is a hand-written
// resource (not a generated facade), so these regions are authored for docs use
// rather than injected as @example. The scenarios mirror the other SDKs' realtime
// examples. Credentials are the app's own key/secret, passed as client config.

declare(strict_types=1);

use MessageBird\Bird;
use MessageBird\RealtimeOptions;
use MessageBird\Wire\Model\RealtimeBatchEvent;
use MessageBird\Wire\Model\RealtimeBatchPublish;
use MessageBird\Wire\Model\RealtimeMemberPublish;
use MessageBird\Wire\Model\RealtimePublish;

$bird = new Bird(
    getenv('BIRD_API_KEY') ?: '',
    realtime: new RealtimeOptions(
        key: getenv('BIRD_REALTIME_KEY') ?: '',
        secret: getenv('BIRD_REALTIME_SECRET') ?: '',
    ),
);

$appId = 'rap_01krdgeqcxet5s7t44vh8rt9mg';

$result = $bird->realtime->publish($appId, (new RealtimePublish())
    ->setEvent('message.created')
    ->setChannels(['room-42'])
    ->setData(['text' => 'Hello, room!']));
echo count($result->getData() ?? []), ' channel(s)';

$batch = $bird->realtime->publishBatch($appId, (new RealtimeBatchPublish())
    ->setEvents([
        (new RealtimeBatchEvent())->setEvent('message.created')->setChannel('room-1')->setData(['text' => 'hi']),
        (new RealtimeBatchEvent())->setEvent('message.created')->setChannel('room-2')->setData(['text' => 'yo']),
    ]));
echo count($batch->getData() ?? []), ' event(s)';

foreach ($bird->realtime->channels->list($appId, ['prefix' => 'room-'])->getData() ?? [] as $channel) {
    echo $channel->getName(), ' ', $channel->getMemberCount(), "\n";
}

$channel = $bird->realtime->channels->get($appId, 'room-42');
echo $channel->getMemberCount(), ' members';

foreach ($bird->realtime->channels->members($appId, 'room-42')->getMembers() ?? [] as $member) {
    echo $member->getMemberId(), "\n";
}

$bird->realtime->members->send($appId, 'usr_01krdgeqcxet5s7t44vh8rt9mg', (new RealtimeMemberPublish())
    ->setEvent('order-shipped')
    ->setData(['order_id' => 'ord_123']));

$bird->realtime->members->disconnect($appId, 'usr_01krdgeqcxet5s7t44vh8rt9mg');
