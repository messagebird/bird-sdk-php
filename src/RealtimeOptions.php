<?php

declare(strict_types=1);

namespace MessageBird;

/**
 * Realtime app credentials, passed as client config — `new Bird(..., realtime:
 * new RealtimeOptions(key: …, secret: …))` — or per call to reach a second app
 * from one client. Every realtime operation sends them as `X-Realtime-Key` /
 * `X-Realtime-Secret` on top of the workspace API key. They come from the app's
 * credentials (shown once at creation). Mirrors the TS SDK's `realtime` option.
 */
final class RealtimeOptions
{
    public function __construct(
        #[\SensitiveParameter] public readonly ?string $key = null,
        #[\SensitiveParameter] public readonly ?string $secret = null,
    ) {
    }
}
