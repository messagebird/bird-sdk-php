<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * Aggregate statistics over the workspace's SMS traffic. The outbound reads are
 * generated on SmsStatsBase; this parent adds the nested resource reached as
 * `$bird->sms->stats->inbound`, which counts what the workspace's numbers
 * received rather than what it sent.
 */
final class SmsStats extends SmsStatsBase
{
    public readonly SmsStatsInbound $inbound;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->inbound = new SmsStatsInbound($client);
    }
}
