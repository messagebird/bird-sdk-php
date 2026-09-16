<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EmailCompetitiveWatchlistBrands extends EmailCompetitiveWatchlistBrandsBase
{
    public readonly EmailCompetitiveWatchlistBrandsCampaigns $campaigns;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->campaigns = new EmailCompetitiveWatchlistBrandsCampaigns($client);
    }
}
