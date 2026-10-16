<?php

namespace MessageBird\Wire\Model;

/**
 * The change from the preceding period to the requested one. The `received_pct_change` field is a signed relative change, computed as `(current - previous) / previous`. A value of `0.5` means 50% higher, and `-0.2` means 20% lower. The field is null when the previous period received none.
 */
class WhatsAppInboundStatsComparisonDeltaWrapper extends WhatsAppInboundStatsComparisonDelta
{
}
