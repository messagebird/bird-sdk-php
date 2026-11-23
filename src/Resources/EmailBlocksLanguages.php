<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * A block's per-language drafts. Its own operations are generated on
 * EmailBlocksLanguagesBase; this parent adds the nested
 * `$bird->email->blocks->languages->revisions`.
 */
final class EmailBlocksLanguages extends EmailBlocksLanguagesBase
{
    public readonly EmailBlocksLanguagesRevisions $revisions;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->revisions = new EmailBlocksLanguagesRevisions($client);
    }
}
