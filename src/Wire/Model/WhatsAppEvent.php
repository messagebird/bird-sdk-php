<?php

namespace MessageBird\Wire\Model;

class WhatsAppEvent
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
     * - `whatsapp.accepted`: The API accepted the request.
     * - `whatsapp.sent`: The message reached the WhatsApp network.
     * - `whatsapp.delivered`: Delivery to the recipient's device was confirmed.
     * - `whatsapp.read`: The recipient opened the message.
     * - `whatsapp.failed`: Delivery failed permanently.
     * - `whatsapp.rejected`: The message was refused before sending and not charged.
     * - `whatsapp.received`: An inbound message arrived from the contact.
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
     * Failure detail for a message that could not be delivered or was rejected.
     *
     * @var WhatsAppError|null
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
     * - `whatsapp.accepted`: The API accepted the request.
     * - `whatsapp.sent`: The message reached the WhatsApp network.
     * - `whatsapp.delivered`: Delivery to the recipient's device was confirmed.
     * - `whatsapp.read`: The recipient opened the message.
     * - `whatsapp.failed`: Delivery failed permanently.
     * - `whatsapp.rejected`: The message was refused before sending and not charged.
     * - `whatsapp.received`: An inbound message arrived from the contact.
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
    
    - `whatsapp.accepted`: The API accepted the request.
    - `whatsapp.sent`: The message reached the WhatsApp network.
    - `whatsapp.delivered`: Delivery to the recipient's device was confirmed.
    - `whatsapp.read`: The recipient opened the message.
    - `whatsapp.failed`: Delivery failed permanently.
    - `whatsapp.rejected`: The message was refused before sending and not charged.
    - `whatsapp.received`: An inbound message arrived from the contact.
    
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
}
