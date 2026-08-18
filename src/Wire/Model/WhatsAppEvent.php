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
     * Type of an event in a WhatsApp message's delivery timeline. `whatsapp.accepted`: Bird accepted the request. `whatsapp.sent`: handed to the WhatsApp network. `whatsapp.delivered`: delivery confirmed to the recipient's device. `whatsapp.read`: the recipient opened the message (this does not change the message `status`, which never becomes `read`). `whatsapp.failed`: terminal permanent failure. `whatsapp.rejected`: Bird refused the message before sending it, so it was never charged. `whatsapp.received`: an inbound message arrived from the contact. Open enum, new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
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
     * Type of an event in a WhatsApp message's delivery timeline. `whatsapp.accepted`: Bird accepted the request. `whatsapp.sent`: handed to the WhatsApp network. `whatsapp.delivered`: delivery confirmed to the recipient's device. `whatsapp.read`: the recipient opened the message (this does not change the message `status`, which never becomes `read`). `whatsapp.failed`: terminal permanent failure. `whatsapp.rejected`: Bird refused the message before sending it, so it was never charged. `whatsapp.received`: an inbound message arrived from the contact. Open enum, new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of an event in a WhatsApp message's delivery timeline. `whatsapp.accepted`: Bird accepted the request. `whatsapp.sent`: handed to the WhatsApp network. `whatsapp.delivered`: delivery confirmed to the recipient's device. `whatsapp.read`: the recipient opened the message (this does not change the message `status`, which never becomes `read`). `whatsapp.failed`: terminal permanent failure. `whatsapp.rejected`: Bird refused the message before sending it, so it was never charged. `whatsapp.received`: an inbound message arrived from the contact. Open enum, new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
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
