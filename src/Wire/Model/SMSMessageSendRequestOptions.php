<?php

namespace MessageBird\Wire\Model;

/**
 * Settings that change how Bird processes this message. Each option applies to this send only; omit one to use the value of the messaging profile in `messaging_profile_id`, or its default when the profile sets none.
 */
class SMSMessageSendRequestOptions extends SMSSendOptions
{
}
