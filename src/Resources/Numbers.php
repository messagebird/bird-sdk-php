<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The numbers a workspace holds. Reached as `$bird->numbers`; the search for
 * numbers on sale hangs off `->available` and purchases off `->orders`.
 *
 * Buying is an order rather than a direct create: most complete inside the
 * request, but one that has to wait on a carrier comes back pending and is
 * polled through `$bird->numbers->orders->get(...)`.
 */
final class Numbers extends NumbersBase
{
    public readonly NumbersAvailable $available;
    public readonly NumbersOrders $orders;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->available = new NumbersAvailable($client);
        $this->orders = new NumbersOrders($client);
    }
}
