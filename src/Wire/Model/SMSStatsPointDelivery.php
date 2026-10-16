<?php

namespace MessageBird\Wire\Model;

/**
 * SMS lifecycle counts for a time bucket. Counts use the message send time, so a message accepted on Monday and delivered on Tuesday counts in Monday's bucket. Rates are available only for whole periods and breakdowns.
 */
class SMSStatsPointDelivery extends SMSDeliveryCounts
{
}
