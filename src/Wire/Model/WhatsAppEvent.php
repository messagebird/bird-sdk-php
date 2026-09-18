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
     * - `whatsapp.read`: The message was read. On an outbound message the recipient
     *   opened it; on an inbound one Bird acknowledged it to WhatsApp for the
     *   business, which is what a read receipt records.
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
     * The participant this confirmation is about, on a group message. Present only on `whatsapp.delivered` and `whatsapp.read`, the two events a group send fans out: one per participant, so a group of eight produces up to eight of each. The rest describe the message as a whole and carry no recipient, because there is one hand-off to the WhatsApp network and one way for that to be refused. Absent on a one-to-one message, whose `to` already names its recipient. Never carries `group_id`: the group belongs to the message's `to`, not to a participant.
     * 
     *
     * @var WhatsAppEventRecipient|null
     */
    protected $recipient;
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
     * - `whatsapp.read`: The message was read. On an outbound message the recipient
     *   opened it; on an inbound one Bird acknowledged it to WhatsApp for the
     *   business, which is what a read receipt records.
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
    - `whatsapp.read`: The message was read. On an outbound message the recipient
     opened it; on an inbound one Bird acknowledged it to WhatsApp for the
     business, which is what a read receipt records.
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
     * The participant this confirmation is about, on a group message. Present only on `whatsapp.delivered` and `whatsapp.read`, the two events a group send fans out: one per participant, so a group of eight produces up to eight of each. The rest describe the message as a whole and carry no recipient, because there is one hand-off to the WhatsApp network and one way for that to be refused. Absent on a one-to-one message, whose `to` already names its recipient. Never carries `group_id`: the group belongs to the message's `to`, not to a participant.
     * 
     *
     * @return WhatsAppEventRecipient|null
     */
    public function getRecipient(): ?WhatsAppEventRecipient
    {
        return $this->recipient;
    }
    /**
     * The participant this confirmation is about, on a group message. Present only on `whatsapp.delivered` and `whatsapp.read`, the two events a group send fans out: one per participant, so a group of eight produces up to eight of each. The rest describe the message as a whole and carry no recipient, because there is one hand-off to the WhatsApp network and one way for that to be refused. Absent on a one-to-one message, whose `to` already names its recipient. Never carries `group_id`: the group belongs to the message's `to`, not to a participant.
     *
     * @param WhatsAppEventRecipient|null $recipient
     *
     * @return self
     */
    public function setRecipient(?WhatsAppEventRecipient $recipient): self
    {
        $this->initialized['recipient'] = true;
        $this->recipient = $recipient;
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
