<?php

namespace MessageBird\Wire\Model;

/**
 * An interactive message: body text plus something for the recipient to tap. Name the kind in `type` and send that kind's field: `buttons`, `list`, `cta_url` or `cards`. `location_request_message` and `request_contact_info` carry only `body_text`.
 */
class WhatsAppMessageSendRequestInteractive extends WhatsAppInteractiveSend
{
}
