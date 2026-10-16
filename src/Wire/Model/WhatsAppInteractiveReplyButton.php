<?php

namespace MessageBird\Wire\Model;

/**
 * A reply button's label and the handle it carries back. On the echo of a message Bird sent, the pair the send declared; on an inbound `interactive_reply`, the pair the contact tapped. No length is declared here, because a tap can echo a template's quick-reply button, whose label runs longer than an interactive message's own allows.
 */
class WhatsAppInteractiveReplyButton extends WhatsAppInteractiveQuickReplyButton
{
}
