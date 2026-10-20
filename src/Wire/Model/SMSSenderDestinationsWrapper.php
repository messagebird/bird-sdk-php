<?php

namespace MessageBird\Wire\Model;

/**
 * Where this sender stands with the destinations it is set up for, grouped by whose move is
 * next.
 * 
 * These are not every country the sender could reach. `pending` and `needs_attention` cover
 * only countries you hold a registration for, so a country you could register for but have not,
 * or one you have simply not switched on, appears in none of the three: there is nothing
 * outstanding there. To see everything reachable and what each country would take, read
 * [Get sender requirements](/docs/api/reference/list-workspace-sms-sender-requirements).
 */
class SMSSenderDestinationsWrapper extends SMSSenderDestinations
{
}
