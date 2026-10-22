<?php

namespace MessageBird\Wire\Model;

/**
 * A pointer to the most recent message in this conversation, in either direction. It names the message rather than copying it: read the message itself, with its content and delivery status, through the conversation's message list.
 */
class WhatsAppConversationLastMessage extends \ArrayObject
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
     * Whether a message was sent from the workspace (`outbound`) or received by it (`inbound`).
     *
     * @var string|null
     */
    protected $direction;
    /**
     * The message's `created_at`: when it was accepted (outbound) or received (inbound). The conversation list is ordered by it. It only moves forward: a message that arrives late and belongs earlier in the conversation does not pull it back.
     * 
     *
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * Whether a message was sent from the workspace (`outbound`) or received by it (`inbound`).
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Whether a message was sent from the workspace (`outbound`) or received by it (`inbound`).
     *
     * @param string|null $direction
     *
     * @return self
     */
    public function setDirection(?string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
    /**
     * The message's `created_at`: when it was accepted (outbound) or received (inbound). The conversation list is ordered by it. It only moves forward: a message that arrives late and belongs earlier in the conversation does not pull it back.
     * 
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * The message's `created_at`: when it was accepted (outbound) or received (inbound). The conversation list is ordered by it. It only moves forward: a message that arrives late and belongs earlier in the conversation does not pull it back.
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
