<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupPinnedMessage
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
     * The pinned message, as returned in the send response's `id`.
     *
     * @var string|null
     */
    protected $messageId;
    /**
     * When the pin is due to lapse, projected from the `duration_days` the pin was asked for. An entry stays listed until it is unpinned, so a time in the past means WhatsApp has already taken the message off the chat.
     * 
     *
     * @var \DateTime|null
     */
    protected $pinnedUntil;
    /**
     * The pinned message, as returned in the send response's `id`.
     *
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }
    /**
     * The pinned message, as returned in the send response's `id`.
     *
     * @param string|null $messageId
     *
     * @return self
     */
    public function setMessageId(?string $messageId): self
    {
        $this->initialized['messageId'] = true;
        $this->messageId = $messageId;
        return $this;
    }
    /**
     * When the pin is due to lapse, projected from the `duration_days` the pin was asked for. An entry stays listed until it is unpinned, so a time in the past means WhatsApp has already taken the message off the chat.
     * 
     *
     * @return \DateTime|null
     */
    public function getPinnedUntil(): ?\DateTime
    {
        return $this->pinnedUntil;
    }
    /**
     * When the pin is due to lapse, projected from the `duration_days` the pin was asked for. An entry stays listed until it is unpinned, so a time in the past means WhatsApp has already taken the message off the chat.
     *
     * @param \DateTime|null $pinnedUntil
     *
     * @return self
     */
    public function setPinnedUntil(?\DateTime $pinnedUntil): self
    {
        $this->initialized['pinnedUntil'] = true;
        $this->pinnedUntil = $pinnedUntil;
        return $this;
    }
}
