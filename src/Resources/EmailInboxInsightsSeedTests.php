<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EmailInboxInsightsSeedTests extends EmailInboxInsightsSeedTestsResourceBase
{
    public readonly EmailInboxInsightsSeedTestsConfiguration $configuration;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->configuration = new EmailInboxInsightsSeedTestsConfiguration($client);
    }
}
