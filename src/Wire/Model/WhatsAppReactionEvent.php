<?php

namespace MessageBird\Wire\Model;

class WhatsAppReactionEvent
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
     * @var string|null
     */
    protected $id;
    /**
     * The emoji this entry placed, as WhatsApp sent it and not normalized. Null when the entry took a reaction back rather than placing one. Always present, so null is the removal itself rather than a value we are missing.
     * 
     *
     * @var string|null
     */
    protected $emoji;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Who made the change. Your business number on a reaction you placed, the contact on one they placed.
     * 
     *
     * @var WhatsAppReactionEventFrom|null
     */
    protected $from;
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @var WhatsAppError|null
     */
    protected $error;
    /**
     * When the change was made.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The emoji this entry placed, as WhatsApp sent it and not normalized. Null when the entry took a reaction back rather than placing one. Always present, so null is the removal itself rather than a value we are missing.
     * 
     *
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }
    /**
     * The emoji this entry placed, as WhatsApp sent it and not normalized. Null when the entry took a reaction back rather than placing one. Always present, so null is the removal itself rather than a value we are missing.
     *
     * @param string|null $emoji
     *
     * @return self
     */
    public function setEmoji(?string $emoji): self
    {
        $this->initialized['emoji'] = true;
        $this->emoji = $emoji;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
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
     * Who made the change. Your business number on a reaction you placed, the contact on one they placed.
     * 
     *
     * @return WhatsAppReactionEventFrom|null
     */
    public function getFrom(): ?WhatsAppReactionEventFrom
    {
        return $this->from;
    }
    /**
     * Who made the change. Your business number on a reaction you placed, the contact on one they placed.
     *
     * @param WhatsAppReactionEventFrom|null $from
     *
     * @return self
     */
    public function setFrom(?WhatsAppReactionEventFrom $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @return WhatsAppError|null
     */
    public function getError(): ?WhatsAppError
    {
        return $this->error;
    }
    /**
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @param WhatsAppError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
    /**
     * When the change was made.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When the change was made.
     *
     * @param \DateTime|null $occurredAt
     *
     * @return self
     */
    public function setOccurredAt(?\DateTime $occurredAt): self
    {
        $this->initialized['occurredAt'] = true;
        $this->occurredAt = $occurredAt;
        return $this;
    }
}
