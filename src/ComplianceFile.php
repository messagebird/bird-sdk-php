<?php

declare(strict_types=1);

namespace MessageBird;

/**
 * A file downloaded from the compliance API: an uploaded attachment or a blank
 * form. $contentType and $filename are what the server declared for it.
 */
final class ComplianceFile
{
    public function __construct(
        public readonly string $data,
        public readonly string $contentType,
        public readonly ?string $filename,
    ) {
    }
}
