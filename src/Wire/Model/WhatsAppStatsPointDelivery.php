<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp lifecycle counts for a time bucket, attributed by send time. A message accepted on Monday and delivered on Tuesday counts in Monday's bucket. The sibling `engagement` block reports read counts. Rates are available only for the whole period. Very large counts are close estimates rather than exact tallies.
 */
class WhatsAppStatsPointDelivery extends WhatsAppDeliveryCounts
{
}
