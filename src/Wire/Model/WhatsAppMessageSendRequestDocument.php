<?php

namespace MessageBird\Wire\Model;

/**
 * A free-form document to send, with an optional caption and filename. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppMessageSendRequestDocument extends WhatsAppDocumentSend
{
}
