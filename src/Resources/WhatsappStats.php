<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Aggregate statistics over the workspace's WhatsApp traffic. The outbound reads
 * are generated on WhatsappStatsBase; this parent adds the nested resource reached
 * as `$bird->whatsapp->stats->inbound`, which counts what the workspace's numbers
 * received rather than what it sent.
 */
final class WhatsappStats extends WhatsappStatsBase
{
    public readonly WhatsappStatsInbound $inbound;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->inbound = new WhatsappStatsInbound($client);
    }
}
