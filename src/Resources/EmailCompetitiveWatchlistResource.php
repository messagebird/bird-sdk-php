<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EmailCompetitiveWatchlistResource extends EmailCompetitiveWatchlistResourceBase
{
    public readonly EmailCompetitiveWatchlistBrands $brands;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->brands = new EmailCompetitiveWatchlistBrands($client);
    }
}
