<?php

namespace MessageBird\Wire\Model;

/**
 * The quoted price, locked at creation in your billing currency. A `mode: test` order quotes this price and is never charged it, so its `wallet_transaction_id` stays null.
 */
class EsimOrderPrice extends Money
{
}
