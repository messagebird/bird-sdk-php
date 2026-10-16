<?php

namespace MessageBird\Wire\Model;

/**
 * The same statistics for the equal-length, inclusive period ending immediately before the requested start, together with the change between the two periods. Present only when `compare=previous_period` is requested. The change is already computed, so a percentage difference needs no second request.
 */
class WhatsAppStatsSummaryComparison extends WhatsAppStatsComparison
{
}
