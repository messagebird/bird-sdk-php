<?php

namespace MessageBird\Wire\Model;

/**
 * The boundaries this signal's status was judged against. Use them to classify your own slices, such as per-domain or per-tag rates, against the same bands. The `direction` field identifies the risky side of the boundaries: `above` means the status degrades as the value rises past a boundary, as with bounce and complaint rates, and `below` means it degrades as the value falls, as with delivery rate. The boundaries are exclusive, so a value exactly on one keeps the better status. Omitted for a metric with no risk boundaries, such as open rate.
 */
class EmailHealthSignalThresholdsWrapper extends EmailHealthSignalThresholds
{
}
