<?php

namespace MessageBird\Wire\Model;

/**
 * Why a number's connection was refused for good. `code` is the standardized reason. `description` explains the failure where one was recorded, and `meta_error_code` carries WhatsApp's own code when available. It accompanies the `failed` status only; a number still being retried carries no error.
 */
class WhatsAppNumberErrorWrapper extends WhatsAppNumberError
{
}
