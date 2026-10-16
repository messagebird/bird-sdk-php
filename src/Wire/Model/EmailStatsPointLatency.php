<?php

namespace MessageBird\Wire\Model;

/**
 * Latency percentiles (p50, p95, p99) in milliseconds for the bucket. On the summary endpoint these are computed across the whole period rather than per bucket. Three families are reported:
 * 
 * - `processing`: Time from accepting the send to handing the message off for delivery. Measured per processed recipient; null when no recipient in the bucket has reached the processed stage.
 * - `delivery`: Time from handoff to the receiving mail server accepting the message, dominated by recipient-side delivery behavior. Measured per delivered recipient; null when no deliveries occurred in the bucket.
 * - `total`: End-to-end time from accepting the send to delivery, and the number most worth watching against your own delivery targets. Measured per delivered recipient; null when no deliveries occurred in the bucket.
 * 
 * Each family is reported independently. A family is omitted when no qualifying
 * event contributed a latency measurement in the bucket. This also applies when
 * the workspace has not recorded latency for that stage yet. The `processing`
 * family can therefore be present while `delivery` and `total` are absent. A
 * client must handle a missing family, and a null p50/p95/p99 within a present
 * family, by rendering a placeholder rather than assuming a number.
 */
class EmailStatsPointLatency extends EmailLatencyStats
{
}
