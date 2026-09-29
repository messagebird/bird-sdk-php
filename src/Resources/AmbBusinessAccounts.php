<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class AmbBusinessAccounts extends AmbBusinessAccountsBase
{
    public readonly AmbBusinessAccountsEvents $events;
    public readonly AmbBusinessAccountsSettings $settings;
    public readonly AmbBusinessAccountsSubmissions $submissions;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->events = new AmbBusinessAccountsEvents($client);
        $this->settings = new AmbBusinessAccountsSettings($client);
        $this->submissions = new AmbBusinessAccountsSubmissions($client);
    }
}
