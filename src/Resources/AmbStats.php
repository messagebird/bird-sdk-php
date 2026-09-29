<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class AmbStats extends AmbStatsBase
{
    public readonly AmbStatsConversations $conversations;
    public readonly AmbStatsInbound $inbound;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->conversations = new AmbStatsConversations($client);
        $this->inbound = new AmbStatsInbound($client);
    }
}
