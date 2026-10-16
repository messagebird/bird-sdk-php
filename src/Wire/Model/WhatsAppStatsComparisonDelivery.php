<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp lifecycle counts and rates for the requested period, attributed by send time, so a later delivery stays attributed to the period in which its message was accepted, and a recent period under-reports `delivered` while delivery reports are still arriving. The sibling `engagement` block reports read counts and rates. Rates are null when their denominator is zero. Very large counts are close estimates rather than exact tallies.
 */
class WhatsAppStatsComparisonDelivery extends WhatsAppDeliveryStats
{
}
