<?php

namespace MessageBird\Wire\Model;

class AMBConversationTypingRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The typing signal to send. `typing_start` tells the customer's device that an operator is composing a reply. `typing_end` tells it composition stopped without a message following. Apple expects at most one `typing_start` before the reply it precedes; sending it again before that reply is not meaningful and may be dropped. `typing_end`'s behavior against a live conversation is unproven: the legacy platform's implementation was disabled after it caused issues, so treat it as best-effort.
     * 
     *
     * @var string|null
     */
    protected $event;
    /**
     * The typing signal to send. `typing_start` tells the customer's device that an operator is composing a reply. `typing_end` tells it composition stopped without a message following. Apple expects at most one `typing_start` before the reply it precedes; sending it again before that reply is not meaningful and may be dropped. `typing_end`'s behavior against a live conversation is unproven: the legacy platform's implementation was disabled after it caused issues, so treat it as best-effort.
     * 
     *
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }
    /**
     * The typing signal to send. `typing_start` tells the customer's device that an operator is composing a reply. `typing_end` tells it composition stopped without a message following. Apple expects at most one `typing_start` before the reply it precedes; sending it again before that reply is not meaningful and may be dropped. `typing_end`'s behavior against a live conversation is unproven: the legacy platform's implementation was disabled after it caused issues, so treat it as best-effort.
     *
     * @param string|null $event
     *
     * @return self
     */
    public function setEvent(?string $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
}
