<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class Amb extends AmbBase
{
    public readonly AmbBusinessAccounts $businessAccounts;
    public readonly AmbConversations $conversations;
    public readonly AmbRoutingRules $routingRules;
    public readonly AmbStats $stats;
    public readonly AmbSuppressions $suppressions;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->businessAccounts = new AmbBusinessAccounts($client);
        $this->conversations = new AmbConversations($client);
        $this->routingRules = new AmbRoutingRules($client);
        $this->stats = new AmbStats($client);
        $this->suppressions = new AmbSuppressions($client);
    }
}
