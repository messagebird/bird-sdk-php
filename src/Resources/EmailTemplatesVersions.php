<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * A template's draft and its published versions. Its own operations are
 * generated on EmailTemplatesVersionsBase; this parent adds the nested
 * `$bird->email->templates->versions->languages`.
 */
final class EmailTemplatesVersions extends EmailTemplatesVersionsBase
{
    public readonly EmailTemplatesVersionsLanguages $languages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->languages = new EmailTemplatesVersionsLanguages($client);
    }
}
