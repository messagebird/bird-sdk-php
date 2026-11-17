<?php

declare(strict_types=1);

namespace MessageBird;

/**
 * Media downloaded from a received MMS message. $contentType is what
 * storage declared, which is the message's own mime_type.
 */
final class SMSMediaDownload
{
    public function __construct(
        public readonly string $data,
        public readonly string $contentType,
        public readonly int $contentLength,
    ) {
    }
}
