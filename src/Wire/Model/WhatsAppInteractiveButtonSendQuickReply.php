<?php

namespace MessageBird\Wire\Model;

/**
 * One tappable reply button. Tapping it sends `slug` back as an inbound message, which reads as an `interactive_reply`.
 */
class WhatsAppInteractiveButtonSendQuickReply extends WhatsAppInteractiveQuickReplyButtonSend
{
}
