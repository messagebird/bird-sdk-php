<?php

namespace MessageBird\Wire\Model;

/**
 * Breakdown of `bounced` by failure type, with each rate as a fraction of `bounced`. Counts are distinct bounced recipients of that type; the five types approximately partition `bounced`, so the five rates sum to roughly 1.0 when `bounced` is non-zero.
 */
class EmailMailboxProviderDeliveryStatsBounces extends EmailBounceStatsWithRates
{
}
