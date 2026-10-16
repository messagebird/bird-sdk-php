<?php

namespace MessageBird\Wire\Model;

/**
 * What the contact tapped, on an inbound message answering an interactive message or a template's quick-reply button. `type` names the kind and the field it names carries it, as everywhere else in this arm. Inbound only: a message that offers something to tap reads as `interactive` instead, and the two never appear together.
 */
class WhatsAppMessageInteractiveReply extends WhatsAppInteractiveReply
{
}
