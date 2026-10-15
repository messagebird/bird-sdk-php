<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/** Apple Messages template identities, versions, and language content. */
final class AmbTemplates extends AmbTemplatesBase
{
    public readonly AmbTemplatesVersions $versions;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->versions = new AmbTemplatesVersions($client);
    }
}
