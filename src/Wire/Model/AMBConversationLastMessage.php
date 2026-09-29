<?php

namespace MessageBird\Wire\Model;

class AMBConversationLastMessage extends \ArrayObject
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
     * Whether a message was sent by the business or received from the customer:
     * 
     * - `outbound`: A reply the business sent into the conversation.
     * - `inbound`: A message the customer sent.
     * 
     *
     * @var string|null
     */
    protected $direction;
    /**
     * The same `created_at` returned when reading the message. This reference and the conversation transcript use message creation order. Processing an older message again does not move the reference backwards.
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
     * Whether a message was sent by the business or received from the customer:
     * 
     * - `outbound`: A reply the business sent into the conversation.
     * - `inbound`: A message the customer sent.
     * 
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
    * Whether a message was sent by the business or received from the customer:
    
    - `outbound`: A reply the business sent into the conversation.
    - `inbound`: A message the customer sent.
    
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
     * The same `created_at` returned when reading the message. This reference and the conversation transcript use message creation order. Processing an older message again does not move the reference backwards.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * The same `created_at` returned when reading the message. This reference and the conversation transcript use message creation order. Processing an older message again does not move the reference backwards.
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
