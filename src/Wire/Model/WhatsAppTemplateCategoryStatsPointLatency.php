<?php

namespace MessageBird\Wire\Model;

/**
 * Latency percentiles in milliseconds for the requested scope:
 * 
 * - `processing`: From acceptance to WhatsApp handoff.
 * - `delivery`: From WhatsApp handoff to delivery confirmation.
 * - `total`: From acceptance to delivery confirmation.
 * 
 * Each family is omitted when no qualifying message contributes a measurement.
 * Individual percentiles can also be null. `delivery` is measured on a best-effort basis, so
 * it can be absent for a scope whose `processing` and `total` are present.
 */
class WhatsAppTemplateCategoryStatsPointLatency extends WhatsAppLatencyStats
{
}
