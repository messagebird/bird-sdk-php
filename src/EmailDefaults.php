<?php

declare(strict_types=1);

namespace MessageBird;

use MessageBird\Wire\Model\EmailAddress;
use MessageBird\Wire\Model\Tag;

/**
 * Channel-level email defaults set once at client construction. A field set here
 * fills the matching argument of `email->send()` / `email->sendBatch()` whenever
 * the per-send call omits it; a value passed to the send always wins. The field
 * names and merge semantics mirror the Go SDK's EmailDefaults and the TypeScript
 * SDK's EmailChannelDefaults.
 */
final class EmailDefaults
{
    /**
     * @param string|array<string, string>|EmailAddress|null       $from
     * @param list<string|array<string, string>|EmailAddress>|null $replyTo
     * @param array<string, string>|null                           $headers
     * @param list<Tag>|null                                       $tags
     * @param array<string, mixed>|null                            $metadata
     */
    public function __construct(
        public readonly string|array|EmailAddress|null $from = null,
        public readonly ?array $replyTo = null,
        public readonly ?string $category = null,
        public readonly ?bool $trackOpens = null,
        public readonly ?bool $trackClicks = null,
        public readonly ?array $headers = null,
        public readonly ?array $tags = null,
        public readonly ?array $metadata = null,
    ) {
    }
}
