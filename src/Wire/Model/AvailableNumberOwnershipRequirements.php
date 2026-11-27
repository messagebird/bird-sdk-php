<?php

namespace MessageBird\Wire\Model;

/**
 * Where to read what this number's ownership paperwork asks for, before you buy it. Call the named operation with `params` to get the form for the number's country and number type: every field, the documents it takes and its guidance, unanswered. That read needs compliance read access, which this search does not. Present when a form is published for the number's country and number type, including when `ownership_registration_required` is false because your organization is exempt from the paperwork. Omitted when no form is published, when the form could not be looked up for this response, and on admin supplier searches.
 */
class AvailableNumberOwnershipRequirements extends NextAction
{
}
