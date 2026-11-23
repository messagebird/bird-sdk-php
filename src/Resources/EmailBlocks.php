<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Reusable sections templates link. Its own operations are generated on
 * EmailBlocksBase; this parent adds the nested
 * `$bird->email->blocks->languages`.
 */
final class EmailBlocks extends EmailBlocksBase
{
    public readonly EmailBlocksLanguages $languages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->languages = new EmailBlocksLanguages($client);
    }
}
