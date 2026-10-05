<?php

namespace MessageBird\Wire\Model;

class WhatsAppAgentNotification
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
     * Unique identifier for the notification.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The contact the notification was about: the phone number or business-scoped user ID you addressed it to, in the same shape a message's `to` uses.
     * 
     *
     * @var WhatsAppAgentNotificationTo|null
     */
    protected $to;
    /**
     * Your own name for what happened, as you sent it.
     *
     * @var string|null
     */
    protected $name;
    /**
     * What happened, as you sent it.
     *
     * @var string|null
     */
    protected $description;
    /**
     * The data you attached, as you sent it.
     *
     * @var string|null
     */
    protected $payload;
    /**
     * Where the notification stands. `accepted` from the moment Bird takes it, then one of the three final states once WhatsApp has answered.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * WhatsApp's own account of why the agent chose to say nothing, passed through. Present only when `status` is `skipped`. Show it to the person who sent the notification; never match on its text.
     * 
     *
     * @var string|null
     */
    protected $skippedReason;
    /**
     * Why the notification failed. Present only when `status` is `failed`.
     *
     * @var WhatsAppAgentNotificationErrorWrapper|null
     */
    protected $error;
    /**
     * When Bird accepted the notification.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Unique identifier for the notification.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier for the notification.
     *
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
     * The contact the notification was about: the phone number or business-scoped user ID you addressed it to, in the same shape a message's `to` uses.
     * 
     *
     * @return WhatsAppAgentNotificationTo|null
     */
    public function getTo(): ?WhatsAppAgentNotificationTo
    {
        return $this->to;
    }
    /**
     * The contact the notification was about: the phone number or business-scoped user ID you addressed it to, in the same shape a message's `to` uses.
     *
     * @param WhatsAppAgentNotificationTo|WhatsAppAddress|array|null $to
     *
     * @return self
     */
    public function setTo($to): self
    {
        $this->initialized['to'] = true;
        $this->to = \MessageBird\Core\ModelWrapper::normalize($to, WhatsAppAgentNotificationTo::class);
        return $this;
    }
    /**
     * Your own name for what happened, as you sent it.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your own name for what happened, as you sent it.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * What happened, as you sent it.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * What happened, as you sent it.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The data you attached, as you sent it.
     *
     * @return string|null
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }
    /**
     * The data you attached, as you sent it.
     *
     * @param string|null $payload
     *
     * @return self
     */
    public function setPayload(?string $payload): self
    {
        $this->initialized['payload'] = true;
        $this->payload = $payload;
        return $this;
    }
    /**
     * Where the notification stands. `accepted` from the moment Bird takes it, then one of the three final states once WhatsApp has answered.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where the notification stands. `accepted` from the moment Bird takes it, then one of the three final states once WhatsApp has answered.
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
     * WhatsApp's own account of why the agent chose to say nothing, passed through. Present only when `status` is `skipped`. Show it to the person who sent the notification; never match on its text.
     * 
     *
     * @return string|null
     */
    public function getSkippedReason(): ?string
    {
        return $this->skippedReason;
    }
    /**
     * WhatsApp's own account of why the agent chose to say nothing, passed through. Present only when `status` is `skipped`. Show it to the person who sent the notification; never match on its text.
     *
     * @param string|null $skippedReason
     *
     * @return self
     */
    public function setSkippedReason(?string $skippedReason): self
    {
        $this->initialized['skippedReason'] = true;
        $this->skippedReason = $skippedReason;
        return $this;
    }
    /**
     * Why the notification failed. Present only when `status` is `failed`.
     *
     * @return WhatsAppAgentNotificationErrorWrapper|null
     */
    public function getError(): ?WhatsAppAgentNotificationErrorWrapper
    {
        return $this->error;
    }
    /**
     * Why the notification failed. Present only when `status` is `failed`.
     *
     * @param WhatsAppAgentNotificationErrorWrapper|WhatsAppAgentNotificationError|array|null $error
     *
     * @return self
     */
    public function setError($error): self
    {
        $this->initialized['error'] = true;
        $this->error = \MessageBird\Core\ModelWrapper::normalize($error, WhatsAppAgentNotificationErrorWrapper::class);
        return $this;
    }
    /**
     * When Bird accepted the notification.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When Bird accepted the notification.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
