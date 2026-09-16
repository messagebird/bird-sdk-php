<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/** Versions and language content under an SMS template. */
final class SmsTemplatesVersions extends SmsTemplatesVersionsBase
{
    public readonly SmsTemplatesVersionsLanguages $languages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->languages = new SmsTemplatesVersionsLanguages($client);
    }
}
