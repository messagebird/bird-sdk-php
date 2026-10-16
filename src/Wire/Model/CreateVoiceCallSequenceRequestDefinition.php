<?php

namespace MessageBird\Wire\Model;

/**
 * Complete sequence definition to run once after the recipient answers. It must pass the same checks as publishing a sequence, is frozen when the call is accepted, and creates no saved sequence.
 */
class CreateVoiceCallSequenceRequestDefinition extends VoiceSequenceDefinition
{
}
