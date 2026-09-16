<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/** SMS template identities, versions, and language content. */
final class SmsTemplates extends SmsTemplatesBase
{
    public readonly SmsTemplatesVersions $versions;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->versions = new SmsTemplatesVersions($client);
    }
}
