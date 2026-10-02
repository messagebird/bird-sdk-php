<?php

namespace MessageBird\Wire\Model;

class AMBConversationRoutingChange extends \ArrayObject
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
     * Group carried by the message. Null when the message carried only an intent.
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * Intent carried by the message. Null when the message carried only a group.
     *
     * @var string|null
     */
    protected $intentId;
    /**
     * Configured entry point matching the message's group and intent. Null when none matched.
     *
     * @var string|null
     */
    protected $entryPoint;
    /**
     * Queue routing rules selected for the message's group and intent when it arrived. Null when no rule matched.
     *
     * @var string|null
     */
    protected $queue;
    /**
     * @var string|null
     */
    protected $messageId;
    /**
     * When that message was received.
     *
     * @var \DateTime|null
     */
    protected $receivedAt;
    /**
     * Group carried by the message. Null when the message carried only an intent.
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * Group carried by the message. Null when the message carried only an intent.
     *
     * @param string|null $groupId
     *
     * @return self
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
    /**
     * Intent carried by the message. Null when the message carried only a group.
     *
     * @return string|null
     */
    public function getIntentId(): ?string
    {
        return $this->intentId;
    }
    /**
     * Intent carried by the message. Null when the message carried only a group.
     *
     * @param string|null $intentId
     *
     * @return self
     */
    public function setIntentId(?string $intentId): self
    {
        $this->initialized['intentId'] = true;
        $this->intentId = $intentId;
        return $this;
    }
    /**
     * Configured entry point matching the message's group and intent. Null when none matched.
     *
     * @return string|null
     */
    public function getEntryPoint(): ?string
    {
        return $this->entryPoint;
    }
    /**
     * Configured entry point matching the message's group and intent. Null when none matched.
     *
     * @param string|null $entryPoint
     *
     * @return self
     */
    public function setEntryPoint(?string $entryPoint): self
    {
        $this->initialized['entryPoint'] = true;
        $this->entryPoint = $entryPoint;
        return $this;
    }
    /**
     * Queue routing rules selected for the message's group and intent when it arrived. Null when no rule matched.
     *
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }
    /**
     * Queue routing rules selected for the message's group and intent when it arrived. Null when no rule matched.
     *
     * @param string|null $queue
     *
     * @return self
     */
    public function setQueue(?string $queue): self
    {
        $this->initialized['queue'] = true;
        $this->queue = $queue;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }
    /**
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
     * When that message was received.
     *
     * @return \DateTime|null
     */
    public function getReceivedAt(): ?\DateTime
    {
        return $this->receivedAt;
    }
    /**
     * When that message was received.
     *
     * @param \DateTime|null $receivedAt
     *
     * @return self
     */
    public function setReceivedAt(?\DateTime $receivedAt): self
    {
        $this->initialized['receivedAt'] = true;
        $this->receivedAt = $receivedAt;
        return $this;
    }
}
