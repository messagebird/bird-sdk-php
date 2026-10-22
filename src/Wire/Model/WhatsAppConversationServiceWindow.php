<?php

namespace MessageBird\Wire\Model;

/**
 * The 24-hour customer-service window, measured from the most recent message this contact sent. Free-form messages are accepted while it is open; once it closes, only a template can start the conversation again.
 * 
 * This is what Bird observed, not a promise about what WhatsApp will accept: a message Bird never received leaves the window looking shorter than it is, and WhatsApp decides each send on its own.
 */
class WhatsAppConversationServiceWindow extends \ArrayObject
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
     * Whether the customer-service window is open right now.
     * 
     * - `open`: the contact wrote within the last 24 hours, so free-form messages are accepted.
     * - `closed`: the window has passed, or the contact has never written, so only a template can be sent.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When the window closes, or closed. Null when no inbound message has been recorded, in which case `status` is `closed`.
     *
     * @var \DateTime|null
     */
    protected $endsAt;
    /**
     * Whether the customer-service window is open right now.
     * 
     * - `open`: the contact wrote within the last 24 hours, so free-form messages are accepted.
     * - `closed`: the window has passed, or the contact has never written, so only a template can be sent.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether the customer-service window is open right now.
    
    - `open`: the contact wrote within the last 24 hours, so free-form messages are accepted.
    - `closed`: the window has passed, or the contact has never written, so only a template can be sent.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When the window closes, or closed. Null when no inbound message has been recorded, in which case `status` is `closed`.
     *
     * @return \DateTime|null
     */
    public function getEndsAt(): ?\DateTime
    {
        return $this->endsAt;
    }
    /**
     * When the window closes, or closed. Null when no inbound message has been recorded, in which case `status` is `closed`.
     *
     * @param \DateTime|null $endsAt
     *
     * @return self
     */
    public function setEndsAt(?\DateTime $endsAt): self
    {
        $this->initialized['endsAt'] = true;
        $this->endsAt = $endsAt;
        return $this;
    }
}
