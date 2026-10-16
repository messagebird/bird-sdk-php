<?php

namespace MessageBird\Wire\Model;

/**
 * The change in each headline metric from the preceding period to the requested one. A `*_pct_change` field is a signed relative change in a count, computed as `(current - previous) / previous`, so `0.5` means 50% higher and `-0.2` means 20% lower. It is null when the previous period's count was zero because a relative change cannot be computed. A `*_rate_pp` field is the signed difference between the two periods' rate values. Each value is expressed as a fraction. A value of `0.012` means the rate rose by 1.2 percentage points. A value of `-0.003` means it fell by 0.3 points. The field is null when either period's rate is undefined, because its denominator was zero. `delivery_rate_pp` and `bounce_rate_pp` range from `-1` to `1`, because the rates behind them cannot exceed 1. The engagement deltas have no fixed bound, because events are counted when they arrive rather than when the message was sent, which can push their rate above 1.
 */
class EmailStatsComparisonDeltaWrapper extends EmailStatsComparisonDelta
{
}
