<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;

/**
 * Base for the realtime resources. Realtime operations authenticate with an app
 * key/secret sent as `X-Realtime-Key` / `X-Realtime-Secret` — on top of the
 * workspace API key — so this holds the client-level {@see RealtimeOptions} and
 * resolves them per call (a per-call value overriding) for the core to stamp.
 */
abstract class RealtimeResource extends Resource
{
    public function __construct(Bird $client, protected readonly ?RealtimeOptions $config = null)
    {
        parent::__construct($client);
    }

    /**
     * Resolve the app credentials (per-call override wins over the client config)
     * onto the request options for the core to stamp. Throws before the request
     * when none are configured, so the failure names the fix rather than surfacing
     * as an opaque 401 from the API.
     */
    protected function auth(?RealtimeOptions $override, ?RequestOptions $options): RequestOptions
    {
        $key = $this->config?->key;
        $secret = $this->config?->secret;
        if ($override !== null) {
            $key = $override->key ?? $key;
            $secret = $override->secret ?? $secret;
        }
        // Empty counts as missing, like Go's `== ""` and TS's `!key`: the
        // `getenv(...) ?: ''` idiom yields '' when the env var is unset, and that
        // should fail here with a named error rather than as an opaque 401.
        if ($key === null || $key === '' || $secret === null || $secret === '') {
            throw new \InvalidArgumentException(
                'Realtime app credentials are required: pass realtime: new RealtimeOptions(key: ..., secret: ...) '
                . 'to the Bird constructor, or a per-call RealtimeOptions.'
            );
        }

        $headers = $options !== null ? $options->headers : [];

        return new RequestOptions($headers, $options?->idempotencyKey, $options?->maxRetries, new RealtimeOptions($key, $secret));
    }
}
