<?php

namespace MessageBird\Wire\Model;

/**
 * The acknowledgement Bird accepted. There is no status to poll afterwards: WhatsApp reports nothing about a read receipt.
 */
class WhatsAppReadReceipt
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
     * Whether a typing indicator was requested alongside the read receipt.
     *
     * @var bool|null
     */
    protected $typingIndicator;
    /**
     * Whether a typing indicator was requested alongside the read receipt.
     *
     * @return bool|null
     */
    public function getTypingIndicator(): ?bool
    {
        return $this->typingIndicator;
    }
    /**
     * Whether a typing indicator was requested alongside the read receipt.
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
