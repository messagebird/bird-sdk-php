<?php

declare(strict_types=1);

namespace MessageBird;

/**
 * Per-call overrides threaded through a single request.
 */
final class RequestOptions
{
    /**
     * @param array<string, string> $headers extra request headers
     * @param string|null $idempotencyKey override the generated key for a write
     * @param int|null $maxRetries override the client's retry budget for this call
     * @param RealtimeOptions|null $realtime Realtime app credentials the core stamps as
     *   X-Realtime-Key/Secret (reserved, so a caller header can't overwrite them). The
     *   realtime resource sets this from the client config or a per-call override.
     */
    public function __construct(
        public readonly array $headers = [],
        public readonly ?string $idempotencyKey = null,
        public readonly ?int $maxRetries = null,
        public readonly ?RealtimeOptions $realtime = null,
    ) {
    }
}
