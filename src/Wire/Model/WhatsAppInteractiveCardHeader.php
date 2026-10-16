<?php

namespace MessageBird\Wire\Model;

/**
 * What the interactive message showed above its body. `type` names the kind and the field that carries it: `text` for a line of copy, `url` for the file every other kind shows. As on the message itself, the read vocabulary is open: dispatch on `type` and treat an unrecognized value as a header kind added since.
 */
class WhatsAppInteractiveCardHeader extends WhatsAppInteractiveHeader
{
}
