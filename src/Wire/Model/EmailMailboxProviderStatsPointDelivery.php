<?php

namespace MessageBird\Wire\Model;

/**
 * Delivery counts and rates for messages attributed to a single recipient mailbox provider. Per-provider results do not include `accepted` or `processed` counts, because we only learn the recipient's mailbox provider once the receiving mail server reports delivery, a bounce, a deferral, or a late bounce. Earlier lifecycle states (accepted, processed) cannot be attributed to a specific provider.
 */
class EmailMailboxProviderStatsPointDelivery extends EmailMailboxProviderDeliveryStats
{
}
