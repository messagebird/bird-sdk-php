<?php

namespace MessageBird\Wire\Model;

/**
 * Constraints a value must satisfy, where the requirement sets any. Which of these apply follows from its data type: `pattern`, `min_length` and `max_length` constrain `string` and `text` values, `minimum` and `maximum` constrain `number` values, and everything else is `null`. Check these before submitting and you avoid a round trip.
 */
class ComplianceRequirementFieldValidation extends ComplianceFieldValidation
{
}
