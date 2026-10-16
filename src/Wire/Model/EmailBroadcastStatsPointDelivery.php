<?php

namespace MessageBird\Wire\Model;

/**
 * Delivery counts and rates for the scope of the containing row (a time bucket, a breakdown dimension, or the whole period). Lifecycle counts identify distinct recipients that reached the named stage in scope; `oob_bounces` counts distinct failure events. Period summaries count each identity once per metric across the whole window, so adding time-bucket distinct counts can overstate the summary. Event time determines attribution; send time does not. A recipient delivered on Monday counts in Monday's row. A recipient who bounced and then succeeded on a retry can appear in both `bounced` and `delivered`. Very large counts are close estimates rather than exact tallies.
 * 
 * These counts are successive lifecycle stages, so a recipient can appear in more than one:
 * 
 * - `rejected`: Happens before any send attempt, from suppression, policy, or a generation failure.
 * - `deferred`: A temporary in-flight delay that is still being retried.
 * - `bounced`: A delivery failure, with its own hard, soft, admin, block, and undetermined sub-types.
 * - `complained`: Post-delivery spam feedback.
 * 
 * Each rate is a fraction in the range 0 to 1 and is null when its denominator is zero. `accepted` is reported only where it can be attributed (time buckets and the period summary). Breakdown rows omit it.
 */
class EmailBroadcastStatsPointDelivery extends EmailDeliveryStats
{
}
