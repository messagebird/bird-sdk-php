<?php

namespace MessageBird\Wire\Model;

/**
 * Latency percentiles (p50, p95, p99) in milliseconds for the messages in this breakdown row, for breakdowns whose dimension is known only from delivery onward (sending IP, mailbox provider).
 * 
 * - `delivery`: Time from handing the message off to the receiving mail server accepting it. Null when no deliveries occurred for this row in the period.
 * - `total`: End-to-end time from accepting the send to delivery. Null when no deliveries occurred for this row in the period.
 * 
 * These breakdowns have no `processing` latency family. A message's row identifies which sending IP carried it or which mailbox provider received it. This becomes known only after the receiving mail server reports a delivery, bounce, deferral, or late bounce. The accept-to-processed phase ends before that attribution is known, preventing row-level processing latency. Use `GET /v1/email/stats/daily` for processing-latency percentiles across the whole workspace.
 */
class EmailMailboxProviderStatsPointLatency extends EmailDeliveryLatencyStats
{
}
