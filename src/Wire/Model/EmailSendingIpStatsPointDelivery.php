<?php

namespace MessageBird\Wire\Model;

/**
 * Delivery counts and rates for messages attributed to a single sending IP. Per-IP results omit `accepted` and `processed` counts. The sending IP becomes known only after a message is delivered, bounced, deferred, or bounced late. Those earlier lifecycle states cannot be attributed to a specific IP. Spam complaints and out-of-band bounce notifications also lack per-IP attribution on this breakdown. The `complained` and `oob_bounces` fields therefore read 0. Their rates read 0 when the denominator is non-zero and null when it is zero. The `effective_delivered` field equals `delivered`, and `all_bounces` equals `bounced`.
 */
class EmailSendingIpStatsPointDelivery extends EmailSendingIpDeliveryStats
{
}
