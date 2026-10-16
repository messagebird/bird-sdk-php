<?php

namespace MessageBird\Wire\Model;

/**
 * Open and click counts for a breakdown row whose dimension is resolved from engagement events only. `opens`, `opens_non_prefetched`, and `clicks` count each event. The same recipient opening or clicking more than once counts each time. The `unique_*` fields count distinct recipients instead, so a recipient who opened five times only counts once there. Rates and unsubscribe counts are not included here. A per-dimension delivered count is unavailable as a rate's denominator, and an unsubscribe event has none of the information this breakdown is grouped by, so it cannot be placed on a row.
 */
class EmailLocationStatsPointEngagement extends EmailEngagementCounts
{
}
