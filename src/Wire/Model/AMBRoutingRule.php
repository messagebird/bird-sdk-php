<?php

namespace MessageBird\Wire\Model;

class AMBRoutingRule extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $businessAccountId;
    /**
     * What a routing rule matches against the entry point that started the conversation.
     * 
     * - `intent` matches on the entry point's intent alone: `match_intent_id` is set and `match_group_id` is null.
     * - `group` matches on the entry point's group alone: `match_group_id` is set and `match_intent_id` is null.
     * - `both` matches only when the entry point carries the given intent and the given group together, so `match_intent_id` and `match_group_id` are both set. There are two match fields rather than one because `both` needs to carry an intent and a group at once.
     * 
     *
     * @var string|null
     */
    protected $matchKind;
    /**
     * The entry point intent this rule matches, as sent in Apple's `intentID`. Set when `match_kind` is `intent` or `both`, null when it is `group`.
     * 
     *
     * @var string|null
     */
    protected $matchIntentId;
    /**
     * The entry point group this rule matches, as sent in Apple's `groupID`. Set when `match_kind` is `group` or `both`, null when it is `intent`.
     * 
     *
     * @var string|null
     */
    protected $matchGroupId;
    /**
     * The queue a matching conversation is filed into. A queue is a label your console filters by rather than a resource you create ahead of time, so any value routes.
     * 
     *
     * @var string|null
     */
    protected $queue;
    /**
     * Evaluation order among this business's rules. The highest-precedence rule a conversation matches wins; rules tied on precedence are evaluated by their `id`.
     * 
     *
     * @var int|null
     */
    protected $precedence;
    /**
     * Whether this rule catches a conversation that matches nothing else. A business has at most one. A conversation created or reopened while none exists routes to an empty queue, which the console lists as unrouted.
     * 
     *
     * @var bool|null
     */
    protected $isDefault;
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
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
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * What a routing rule matches against the entry point that started the conversation.
     * 
     * - `intent` matches on the entry point's intent alone: `match_intent_id` is set and `match_group_id` is null.
     * - `group` matches on the entry point's group alone: `match_group_id` is set and `match_intent_id` is null.
     * - `both` matches only when the entry point carries the given intent and the given group together, so `match_intent_id` and `match_group_id` are both set. There are two match fields rather than one because `both` needs to carry an intent and a group at once.
     * 
     *
     * @return string|null
     */
    public function getMatchKind(): ?string
    {
        return $this->matchKind;
    }
    /**
    * What a routing rule matches against the entry point that started the conversation.
    
    - `intent` matches on the entry point's intent alone: `match_intent_id` is set and `match_group_id` is null.
    - `group` matches on the entry point's group alone: `match_group_id` is set and `match_intent_id` is null.
    - `both` matches only when the entry point carries the given intent and the given group together, so `match_intent_id` and `match_group_id` are both set. There are two match fields rather than one because `both` needs to carry an intent and a group at once.
    
    *
    * @param string|null $matchKind
    *
    * @return self
    */
    public function setMatchKind(?string $matchKind): self
    {
        $this->initialized['matchKind'] = true;
        $this->matchKind = $matchKind;
        return $this;
    }
    /**
     * The entry point intent this rule matches, as sent in Apple's `intentID`. Set when `match_kind` is `intent` or `both`, null when it is `group`.
     * 
     *
     * @return string|null
     */
    public function getMatchIntentId(): ?string
    {
        return $this->matchIntentId;
    }
    /**
     * The entry point intent this rule matches, as sent in Apple's `intentID`. Set when `match_kind` is `intent` or `both`, null when it is `group`.
     *
     * @param string|null $matchIntentId
     *
     * @return self
     */
    public function setMatchIntentId(?string $matchIntentId): self
    {
        $this->initialized['matchIntentId'] = true;
        $this->matchIntentId = $matchIntentId;
        return $this;
    }
    /**
     * The entry point group this rule matches, as sent in Apple's `groupID`. Set when `match_kind` is `group` or `both`, null when it is `intent`.
     * 
     *
     * @return string|null
     */
    public function getMatchGroupId(): ?string
    {
        return $this->matchGroupId;
    }
    /**
     * The entry point group this rule matches, as sent in Apple's `groupID`. Set when `match_kind` is `group` or `both`, null when it is `intent`.
     *
     * @param string|null $matchGroupId
     *
     * @return self
     */
    public function setMatchGroupId(?string $matchGroupId): self
    {
        $this->initialized['matchGroupId'] = true;
        $this->matchGroupId = $matchGroupId;
        return $this;
    }
    /**
     * The queue a matching conversation is filed into. A queue is a label your console filters by rather than a resource you create ahead of time, so any value routes.
     * 
     *
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }
    /**
     * The queue a matching conversation is filed into. A queue is a label your console filters by rather than a resource you create ahead of time, so any value routes.
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
     * Evaluation order among this business's rules. The highest-precedence rule a conversation matches wins; rules tied on precedence are evaluated by their `id`.
     * 
     *
     * @return int|null
     */
    public function getPrecedence(): ?int
    {
        return $this->precedence;
    }
    /**
     * Evaluation order among this business's rules. The highest-precedence rule a conversation matches wins; rules tied on precedence are evaluated by their `id`.
     *
     * @param int|null $precedence
     *
     * @return self
     */
    public function setPrecedence(?int $precedence): self
    {
        $this->initialized['precedence'] = true;
        $this->precedence = $precedence;
        return $this;
    }
    /**
     * Whether this rule catches a conversation that matches nothing else. A business has at most one. A conversation created or reopened while none exists routes to an empty queue, which the console lists as unrouted.
     * 
     *
     * @return bool|null
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }
    /**
     * Whether this rule catches a conversation that matches nothing else. A business has at most one. A conversation created or reopened while none exists routes to an empty queue, which the console lists as unrouted.
     *
     * @param bool|null $isDefault
     *
     * @return self
     */
    public function setIsDefault(?bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;
        return $this;
    }
}
