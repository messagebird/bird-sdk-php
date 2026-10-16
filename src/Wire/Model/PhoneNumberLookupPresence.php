<?php

namespace MessageBird\Wire\Model;

/**
 * Whether the number is live on its network right now. Returned when you
 * request the `presence` property.
 * 
 * The result reflects a real-time query to the network where the number is
 * registered.
 */
class PhoneNumberLookupPresence extends LookupPresence
{
}
