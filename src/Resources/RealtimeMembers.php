<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\RealtimeMemberPublish;

/**
 * Act on the members of a realtime app. Reached as `$bird->realtime->members`.
 */
final class RealtimeMembers extends RealtimeResource
{
    /**
     * Deliver an event to a single member on the reserved channel the edge builds
     * server-side — the member, not a channel, is the address.
     */
    public function send(string $appId, string $memberId, RealtimeMemberPublish $params, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): void
    {
        $this->none('POST', '/v1/realtime/apps/' . rawurlencode($appId) . '/members/' . rawurlencode($memberId) . '/events', $params, null, $this->auth($credentials, $options));
    }

    public function disconnect(string $appId, string $memberId, ?RealtimeOptions $credentials = null, ?RequestOptions $options = null): void
    {
        $this->none('POST', '/v1/realtime/apps/' . rawurlencode($appId) . '/members/' . rawurlencode($memberId) . '/disconnect', null, null, $this->auth($credentials, $options));
    }
}
