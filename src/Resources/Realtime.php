<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\RealtimeBatchPublish;
use MessageBird\Wire\Model\RealtimeBatchPublishResult;
use MessageBird\Wire\Model\RealtimePublish;
use MessageBird\Wire\Model\RealtimePublishResult;

/**
 * Publish events to a realtime app and inspect its channels. Reached as
 * `$bird->realtime`; channel and member reads hang off `->channels` and
 * `->members`. Every call takes the app id (`rap_…`) first.
 */
final class Realtime extends RealtimeResource
{
    public readonly RealtimeChannels $channels;
    public readonly RealtimeMembers $members;

    public function __construct(Bird $client, ?RealtimeOptions $config = null)
    {
        parent::__construct($client, $config);
        $this->channels = new RealtimeChannels($client, $config);
        $this->members = new RealtimeMembers($client, $config);
    }

    public function publish(string $appId, RealtimePublish $params, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): RealtimePublishResult
    {
        return $this->single('POST', '/v1/realtime/apps/' . rawurlencode($appId) . '/events', RealtimePublishResult::class, $params, null, $this->auth($credentials, $options));
    }

    public function publishBatch(string $appId, RealtimeBatchPublish $params, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): RealtimeBatchPublishResult
    {
        return $this->single('POST', '/v1/realtime/apps/' . rawurlencode($appId) . '/batch-events', RealtimeBatchPublishResult::class, $params, null, $this->auth($credentials, $options));
    }
}
