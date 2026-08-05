<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\RealtimeChannelInfo;
use MessageBird\Wire\Model\RealtimeChannelMembers;
use MessageBird\Wire\Model\RealtimeChannelsList;

/**
 * Read the channels of a realtime app. Reached as `$bird->realtime->channels`.
 */
final class RealtimeChannels extends RealtimeResource
{
    /**
     * @param array<string, mixed>|null $query `prefix` to filter, `include` for extra fields
     */
    public function list(string $appId, ?array $query = null, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): RealtimeChannelsList
    {
        return $this->single('GET', '/v1/realtime/apps/' . rawurlencode($appId) . '/channels', RealtimeChannelsList::class, null, $query, $this->auth($credentials, $options));
    }

    /**
     * @param array<string, mixed>|null $query `include` for extra fields
     */
    public function get(string $appId, string $channelName, ?array $query = null, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): RealtimeChannelInfo
    {
        return $this->single('GET', '/v1/realtime/apps/' . rawurlencode($appId) . '/channels/' . rawurlencode($channelName), RealtimeChannelInfo::class, null, $query, $this->auth($credentials, $options));
    }

    public function members(string $appId, string $channelName, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): RealtimeChannelMembers
    {
        return $this->single('GET', '/v1/realtime/apps/' . rawurlencode($appId) . '/channels/' . rawurlencode($channelName) . '/members', RealtimeChannelMembers::class, null, null, $this->auth($credentials, $options));
    }
}
