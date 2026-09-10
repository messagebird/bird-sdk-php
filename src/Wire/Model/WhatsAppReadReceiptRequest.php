<?php

namespace MessageBird\Wire\Model;

class WhatsAppReadReceiptRequest
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
     * Show a typing indicator to the contact as well as marking the message read. WhatsApp clears it when you send your next message, or after 25 seconds, whichever comes first. Only ask for one if you are about to reply.
     * 
     *
     * @var bool|null
     */
    protected $typingIndicator = false;
    /**
     * Show a typing indicator to the contact as well as marking the message read. WhatsApp clears it when you send your next message, or after 25 seconds, whichever comes first. Only ask for one if you are about to reply.
     * 
     *
     * @return bool|null
     */
    public function getTypingIndicator(): ?bool
    {
        return $this->typingIndicator;
    }
    /**
     * Show a typing indicator to the contact as well as marking the message read. WhatsApp clears it when you send your next message, or after 25 seconds, whichever comes first. Only ask for one if you are about to reply.
     *
     * @param bool|null $typingIndicator
     *
     * @return self
     */
    public function setTypingIndicator(?bool $typingIndicator): self
    {
        $this->initialized['typingIndicator'] = true;
        $this->typingIndicator = $typingIndicator;
        return $this;
    }
}
