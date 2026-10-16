<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp engagement counts and the derived read rate for the scope of the containing row (the whole requested period or a breakdown dimension). The `read` field is the number of distinct messages confirmed read by the recipient. Send time determines attribution; the instant the read receipt arrived does not. A read is counted in the period its message was accepted in, alongside that message's own delivery when one arrived. The read rate divides reads by messages delivered in the same scope and is null when its denominator is zero. Very large counts are close estimates rather than exact tallies.
 */
class WhatsAppTemplateCategoryStatsPointEngagement extends WhatsAppEngagementStats
{
}
