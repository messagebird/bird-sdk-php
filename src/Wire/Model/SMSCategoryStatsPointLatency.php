<?php

namespace MessageBird\Wire\Model;

/**
 * Latency percentiles in milliseconds for the requested scope:
 * 
 * - `processing`: From acceptance to carrier handoff.
 * - `delivery`: From carrier handoff to delivery confirmation.
 * - `total`: From acceptance to delivery confirmation.
 * 
 * Each family is omitted when no qualifying event contributes a measurement.
 * Individual percentiles can also be null.
 */
class SMSCategoryStatsPointLatency extends SMSLatencyStats
{
}
