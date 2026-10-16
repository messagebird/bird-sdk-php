<?php

namespace MessageBird\Wire\Model;

/**
 * A send-by-template reference. Identify the template by its `id` or its `slug` (supply exactly one), optionally name a language, and fill its placeholders through `components`.
 */
class WhatsAppMessageSendRequestTemplate extends WhatsAppTemplateSend
{
}
