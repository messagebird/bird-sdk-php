<?php

namespace MessageBird\Wire\Model;

/**
 * One option in a list's menu. On the echo of a message Bird sent, the row as declared; on an inbound `interactive_reply`, the row the contact chose. No length is declared here: this is what WhatsApp reported, not what a send is held to.
 */
class WhatsAppInteractiveReplyList extends WhatsAppInteractiveListRow
{
}
