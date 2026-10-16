<?php

namespace MessageBird\Wire\Model;

/**
 * Meta's own messaging health for this account. `can_send_message` is Meta's aggregate: `blocked` if any entity is blocked, else `limited` if any is limited, else `available`. Read `entities` to see which node carries the verdict and why.
 */
class WhatsAppBusinessAccountMetaHealthStatus extends WhatsAppMetaHealthStatus
{
}
