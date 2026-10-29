<?php

namespace MessageBird\Wire\Model;

/**
 * What the customer answered on an interactive message: their choice, time slot, form answers, payment result, sign-in result or custom app reply, under the same key as the request. Inbound only; a message that offers something to tap reads as `interactive` instead.
 */
class AMBMessageInteractiveReply extends AMBInteractiveReply
{
}
