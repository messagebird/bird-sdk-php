<?php

namespace MessageBird\Wire\Model;

/**
 * A send-by-template reference. Identify the template by `id` or `slug`, or use the deprecated `name` for a legacy built-in template. Supply exactly one reference, optionally select a language, and pass variable values in `parameters`.
 */
class SMSMessageSendRequestTemplate extends SMSTemplateSend
{
}
