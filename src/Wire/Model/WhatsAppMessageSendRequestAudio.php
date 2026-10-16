<?php

namespace MessageBird\Wire\Model;

/**
 * Free-form audio to send, either as a voice note or as a basic audio file. Deliverable only inside an open 24-hour customer service window; outside one, send a template instead.
 */
class WhatsAppMessageSendRequestAudio extends WhatsAppAudioSend
{
}
