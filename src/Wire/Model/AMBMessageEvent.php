<?php

namespace MessageBird\Wire\Model;

class AMBMessageEvent
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
     * Message timeline event type:
     * 
     * - `amb.accepted`: The API accepted the request.
     * - `amb.sent`: The message was handed to Apple.
     * - `amb.send_failed`: Apple refused the message, or its send attempts were exhausted.
     * - `amb.rejected`: Bird refused the message before any send attempt.
     * - `amb.received`: An inbound message arrived from the customer.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * When this event occurred.
     *
     * @var \DateTime|null
     */
    protected $occurredAt;
    /**
     * Failure detail for a message or invitation that could not be sent or was rejected.
     *
     * @var AMBError|null
     */
    protected $error;
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
     * Message timeline event type:
     * 
     * - `amb.accepted`: The API accepted the request.
     * - `amb.sent`: The message was handed to Apple.
     * - `amb.send_failed`: Apple refused the message, or its send attempts were exhausted.
     * - `amb.rejected`: Bird refused the message before any send attempt.
     * - `amb.received`: An inbound message arrived from the customer.
     * 
     * This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * Message timeline event type:
    
    - `amb.accepted`: The API accepted the request.
    - `amb.sent`: The message was handed to Apple.
    - `amb.send_failed`: Apple refused the message, or its send attempts were exhausted.
    - `amb.rejected`: Bird refused the message before any send attempt.
    - `amb.received`: An inbound message arrived from the customer.
    
    This is an open enum. Accept unrecognized values.
    
    *
    * @param string|null $type
    *
    * @return self
    */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * When this event occurred.
     *
     * @return \DateTime|null
     */
    public function getOccurredAt(): ?\DateTime
    {
        return $this->occurredAt;
    }
    /**
     * When this event occurred.
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
    /**
     * Failure detail for a message or invitation that could not be sent or was rejected.
     *
     * @return AMBError|null
     */
    public function getError(): ?AMBError
    {
        return $this->error;
    }
    /**
     * Failure detail for a message or invitation that could not be sent or was rejected.
     *
     * @param AMBError|null $error
     *
     * @return self
     */
    public function setError(?AMBError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
