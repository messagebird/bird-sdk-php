<?php

namespace MessageBird\Wire\Model;

/**
 * A text message: a body, an optional subject, and files placed in the body. Next to `interactive`, it is sent first as its own text bubble. Next to `rich_link`, the card takes the place of the first copy of its URL in `body`, splitting the text around it, or follows the text when `body` does not contain that URL. Later copies of that URL are removed.
 */
class AMBMessageSendRequestText extends AMBText
{
}
