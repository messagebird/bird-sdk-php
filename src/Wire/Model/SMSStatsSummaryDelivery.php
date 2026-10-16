<?php

namespace MessageBird\Wire\Model;

/**
 * SMS lifecycle counts and rates for a whole period or breakdown. Counts use the message send time, so a later delivery stays attributed to the bucket in which the message was sent. Rates are null when their denominator is zero.
 */
class SMSStatsSummaryDelivery extends SMSDeliveryStats
{
}
