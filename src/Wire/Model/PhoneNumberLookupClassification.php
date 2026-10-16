<?php

namespace MessageBird\Wire\Model;

/**
 * The allocated service of the number's range. Returned when you request the
 * `classification` property.
 * 
 * This sits beside `line_type` rather than replacing it, so you can always see
 * which source answered. The `line_type` property is included in the base lookup
 * and comes from the carrier platform. The `classification` property is
 * separately billed and comes from an intelligence source.
 */
class PhoneNumberLookupClassification extends LookupClassification
{
}
