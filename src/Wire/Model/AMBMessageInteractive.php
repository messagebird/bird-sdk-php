<?php

namespace MessageBird\Wire\Model;

/**
 * Something for the customer to tap: exactly one of `quick_reply`, `list_picker`, `event` (a time picker), `dynamic` (a form) or `imessage_app`. To introduce it with text or files, send `text` alongside it; that text arrives as its own bubble first. `payment` and `authenticate` are read-only. They appear on existing messages that contain an Apple Pay or identity verification request. Sends and templates do not accept them.
 */
class AMBMessageInteractive extends AMBInteractive
{
}
