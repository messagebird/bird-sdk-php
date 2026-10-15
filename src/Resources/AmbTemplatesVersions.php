<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/** Versions and language content under an Apple Messages template. */
final class AmbTemplatesVersions extends AmbTemplatesVersionsBase
{
    public readonly AmbTemplatesVersionsLanguages $languages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->languages = new AmbTemplatesVersionsLanguages($client);
    }
}
