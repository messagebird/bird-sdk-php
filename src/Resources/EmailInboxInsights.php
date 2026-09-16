<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EmailInboxInsights extends EmailInboxInsightsBase
{
    public readonly EmailInboxInsightsDomainsResource $domains;
    public readonly EmailInboxInsightsDomainMonitoring $domainMonitoring;
    public readonly EmailInboxInsightsBenchmarks $benchmarks;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->domains = new EmailInboxInsightsDomainsResource($client);
        $this->domainMonitoring = new EmailInboxInsightsDomainMonitoring($client);
        $this->benchmarks = new EmailInboxInsightsBenchmarks($client);
    }
}
