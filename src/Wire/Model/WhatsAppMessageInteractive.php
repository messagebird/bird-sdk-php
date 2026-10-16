<?php

namespace MessageBird\Wire\Model;

/**
 * Interactive content of a WhatsApp message: body text plus something the recipient can tap. The field named by `type` is the one that is present, except on `location_request_message` and `request_contact_info`, which name no field: each is a single button asking the recipient for something, so `body_text` is the whole message. Outbound only, and so an echo of what the send asked for: a contact cannot send interactive content, and a tap on it reads as `interactive_reply`, or on a location or contact request as the message the recipient shared in answer. Unlike the send schema, this one does not pin each `type` to its field. The vocabulary in `type` is open, so dispatch on it and treat an unrecognized value as a kind added since. Only the discriminator is open: this schema declares no additional properties, so a new kind's own payload field arrives here in the same change that introduces the kind, which is additive.
 */
class WhatsAppMessageInteractive extends WhatsAppInteractive
{
}
