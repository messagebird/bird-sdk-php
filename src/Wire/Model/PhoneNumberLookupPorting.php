<?php

namespace MessageBird\Wire\Model;

/**
 * Whether the number has ever moved network, when it last did, and its full porting record. Returned when you request the `porting` property. The base lookup only reports whether the number has ever ported, through the `ported` flag.
 */
class PhoneNumberLookupPorting extends LookupPorting
{
}
