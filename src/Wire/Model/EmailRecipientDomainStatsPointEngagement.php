<?php

namespace MessageBird\Wire\Model;

/**
 * Engagement counts and rates for the scope of the containing row (a time bucket, a breakdown dimension, or the whole period). `opens`, `opens_non_prefetched` and `clicks` count distinct engagement events (deduplicated occurrences). The `unique_*` fields count distinct recipients. `unsubscribes` counts distinct unsubscribe events. An event counts in the time bucket when it occurs, even if the message was sent in an earlier bucket. Counts are deduplicated with a scalable approximate counting method, so very large counts are close estimates rather than exact tallies. Each rate divides the counts in this scope and is null when its denominator is zero.
 */
class EmailRecipientDomainStatsPointEngagement extends EmailEngagementStats
{
}
