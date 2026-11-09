<?php

namespace MessageBird\Wire\Model;

/**
 * A link with a preview card. Supply your own preview in `rich_link_data`, or ask Apple to build it with `rich_link_construct`. To introduce the link, send `text` alongside it. The card takes the place of the first copy of its URL in that text, or follows the text when it does not contain that URL. Later copies of that URL are removed.
 */
class AMBMessageSendRequestRichLink extends AMBRichLink
{
}
