<?php

namespace MessageBird\Wire\Model;

/**
 * The price you displayed to the buyer. When set and the workspace's current resolved price differs, the order is refused with a conflict instead of charging a different amount. Catches billing-rate changes, which move independently of the offer revision.
 */
class EsimOrderCreateExpectedPrice extends Money
{
}
