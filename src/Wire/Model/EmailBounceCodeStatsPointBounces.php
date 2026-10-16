<?php

namespace MessageBird\Wire\Model;

/**
 * Breakdown of `bounced` by failure type. Each field counts distinct bounced recipients of that type in this row's scope; the five types approximately partition `bounced`.
 */
class EmailBounceCodeStatsPointBounces extends EmailBounceStats
{
}
