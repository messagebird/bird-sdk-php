<?php

namespace MessageBird\Wire\Model;

/**
 * Something for the customer to tap: exactly one of `quick_reply`, `list_picker`, `event` (a time picker), `dynamic` (a form) or `imessage_app`. To introduce it with text or files, send `text` alongside it; that text arrives as its own bubble first. Apple Pay and identity verification requests are created through their conversation endpoints and read back here as `payment` and `authenticate`.
 */
class AMBMessageInteractive extends AMBInteractive
{
}
