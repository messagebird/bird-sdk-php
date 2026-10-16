<?php

namespace MessageBird\Wire\Model;

/**
 * A message whose content we do not model, named so it is visible in the message log rather than arriving empty. Never on a message sent through Bird.
 */
class WhatsAppMessageUnsupported extends WhatsAppUnsupported
{
}
