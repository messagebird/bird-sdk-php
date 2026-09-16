<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EmailCompetitive extends EmailCompetitiveBase
{
    public readonly EmailCompetitiveBrands $brands;
    public readonly EmailCompetitiveWatchlistResource $watchlist;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->brands = new EmailCompetitiveBrands($client);
        $this->watchlist = new EmailCompetitiveWatchlistResource($client);
    }
}
