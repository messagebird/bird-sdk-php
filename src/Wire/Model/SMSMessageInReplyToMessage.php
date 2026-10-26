<?php

namespace MessageBird\Wire\Model;

/**
 * Preview feature: the outbound message a received message was paired with. Bird pairs a reply with the last message the messaging profile sent this subscriber from the receiving number, within the profile's outbound-matching window. The pairing is inferred from timing; the subscriber does not report which message they answered.
 */
class SMSMessageInReplyToMessage extends SMSInReplyToMessage
{
}
