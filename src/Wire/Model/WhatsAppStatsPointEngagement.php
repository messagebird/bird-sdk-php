<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp engagement counts for a time bucket, attributed by send time. A message accepted on Monday and read on Tuesday counts in Monday's bucket. Read rates are available only for the whole period. Very large counts are close estimates rather than exact tallies.
 */
class WhatsAppStatsPointEngagement extends WhatsAppEngagementCounts
{
}
