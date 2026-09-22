<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupPinnedMessageCreate
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
     * The message to pin. It has to be one this group carries: a message in another group, or a one-to-one message, returns a `422` `WhatsAppMessageNotInGroup`.
     * 
     *
     * @var string|null
     */
    protected $messageId;
    /**
     * How many days the message stays pinned before WhatsApp unpins it, from 1 to 30.
     *
     * @var int|null
     */
    protected $durationDays = 7;
    /**
     * The message to pin. It has to be one this group carries: a message in another group, or a one-to-one message, returns a `422` `WhatsAppMessageNotInGroup`.
     * 
     *
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }
    /**
     * The message to pin. It has to be one this group carries: a message in another group, or a one-to-one message, returns a `422` `WhatsAppMessageNotInGroup`.
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
     * How many days the message stays pinned before WhatsApp unpins it, from 1 to 30.
     *
     * @return int|null
     */
    public function getDurationDays(): ?int
    {
        return $this->durationDays;
    }
    /**
     * How many days the message stays pinned before WhatsApp unpins it, from 1 to 30.
     *
     * @param int|null $durationDays
     *
     * @return self
     */
    public function setDurationDays(?int $durationDays): self
    {
        $this->initialized['durationDays'] = true;
        $this->durationDays = $durationDays;
        return $this;
    }
}
