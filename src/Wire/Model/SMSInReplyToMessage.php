<?php

namespace MessageBird\Wire\Model;

/**
 * The outbound message a received message was paired with. Bird pairs a reply with the last message the messaging profile sent this subscriber from the receiving number, within the profile's outbound-matching window. The pairing is inferred from timing; the subscriber does not report which message they answered.
 */
class SMSInReplyToMessage
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
     * Text of the outbound message as Bird stored it. Authentication messages read `**REDACTED**`. Absent once that message is past the read window.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * Time Bird handed the outbound message to the carrier; the matching window counts from here. Absent once that message is past the read window.
     * 
     *
     * @var \DateTime|null
     */
    protected $sentAt;
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
     * Text of the outbound message as Bird stored it. Authentication messages read `**REDACTED**`. Absent once that message is past the read window.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Text of the outbound message as Bird stored it. Authentication messages read `**REDACTED**`. Absent once that message is past the read window.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Time Bird handed the outbound message to the carrier; the matching window counts from here. Absent once that message is past the read window.
     * 
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * Time Bird handed the outbound message to the carrier; the matching window counts from here. Absent once that message is past the read window.
     *
     * @param \DateTime|null $sentAt
     *
     * @return self
     */
    public function setSentAt(?\DateTime $sentAt): self
    {
        $this->initialized['sentAt'] = true;
        $this->sentAt = $sentAt;
        return $this;
    }
}
