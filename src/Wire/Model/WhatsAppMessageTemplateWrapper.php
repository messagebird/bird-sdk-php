<?php

namespace MessageBird\Wire\Model;

/**
 * The template a message was sent from. On reads `slug`, `language`, `category`, and `components` are always present; `components` is an empty array for an authentication template (the filled-in values, for example a verification code, are never returned).
 */
class WhatsAppMessageTemplateWrapper extends WhatsAppMessageTemplate
{
}
