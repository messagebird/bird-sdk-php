<?php

namespace MessageBird\Wire\Model;

/**
 * Why a change to a group did not take effect. Meta documents no code vocabulary for a group refusal, since every sample payload carries an undocumented `code` beside its message, so this relays what it said rather than classifying it, the way a template submission failure does.
 */
class WhatsAppGroupJoinRequestFailureError extends WhatsAppGroupError
{
}
