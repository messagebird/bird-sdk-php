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
    /**
     * @param string|null $encryptionMasterKey the end-to-end encryption master key
     *   for `private-encrypted-` channels: 32 random bytes, base64-encoded. Yours
     *   alone — it is used locally to seal publishes and to derive each channel's
     *   `shared_secret`, and is never sent to Bird. Losing it makes rotating to a
     *   new one the only recovery.
     */
    public function __construct(
        #[\SensitiveParameter] public readonly ?string $key = null,
        #[\SensitiveParameter] public readonly ?string $secret = null,
        #[\SensitiveParameter] public readonly ?string $encryptionMasterKey = null,
    ) {
    }
}
