<?php

namespace MessageBird\Wire\Model;

/**
 * An 8-bit binary SMS payload, sent as one segment. `udh` plus `data` must fit 140 octets.
 */
class SMSMessageSendRequestBinary extends SMSBinary
{
}
