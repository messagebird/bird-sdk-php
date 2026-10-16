<?php

namespace MessageBird\Wire\Model;

/**
 * Changes from the previous period. A `*_pct_change` value is the signed relative change `(current - previous) / previous` and is null when the previous count is zero. A `*_rate_pp` value is the signed difference between rate fractions and is null when either rate is undefined.
 */
class WhatsAppStatsComparisonDeltaWrapper extends WhatsAppStatsComparisonDelta
{
}
