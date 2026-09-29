<?php

namespace MessageBird\Wire\Model;

class AMBRoutingRuleCreate
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
     * The entry point intent to match, as sent in Apple's `intentID`. Required when `match_kind` is `intent` or `both`, and rejected when it is `group`.
     * 
     *
     * @var string|null
     */
    protected $matchIntentId;
    /**
     * The entry point group to match, as sent in Apple's `groupID`. Required when `match_kind` is `group` or `both`, and rejected when it is `intent`.
     * 
     *
     * @var string|null
     */
    protected $matchGroupId;
    /**
     * Queue label used for routing and filtering conversations.
     *
     * @var string|null
     */
    protected $queue;
    /**
     * Evaluation order among this business's rules. The highest-precedence rule a conversation matches wins. Omit it to default to 0.
     * 
     *
     * @var int|null
     */
    protected $precedence = 0;
    /**
     * Set to make this the rule that catches a conversation matching nothing else. A business can have only one; creating a second while one exists returns a `409`.
     * 
     *
     * @var bool|null
     */
    protected $isDefault = false;
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
     * The entry point intent to match, as sent in Apple's `intentID`. Required when `match_kind` is `intent` or `both`, and rejected when it is `group`.
     * 
     *
     * @return string|null
     */
    public function getMatchIntentId(): ?string
    {
        return $this->matchIntentId;
    }
    /**
     * The entry point intent to match, as sent in Apple's `intentID`. Required when `match_kind` is `intent` or `both`, and rejected when it is `group`.
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
     * The entry point group to match, as sent in Apple's `groupID`. Required when `match_kind` is `group` or `both`, and rejected when it is `intent`.
     * 
     *
     * @return string|null
     */
    public function getMatchGroupId(): ?string
    {
        return $this->matchGroupId;
    }
    /**
     * The entry point group to match, as sent in Apple's `groupID`. Required when `match_kind` is `group` or `both`, and rejected when it is `intent`.
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
     * Queue label used for routing and filtering conversations.
     *
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }
    /**
     * Queue label used for routing and filtering conversations.
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
     * Evaluation order among this business's rules. The highest-precedence rule a conversation matches wins. Omit it to default to 0.
     * 
     *
     * @return int|null
     */
    public function getPrecedence(): ?int
    {
        return $this->precedence;
    }
    /**
     * Evaluation order among this business's rules. The highest-precedence rule a conversation matches wins. Omit it to default to 0.
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
     * Set to make this the rule that catches a conversation matching nothing else. A business can have only one; creating a second while one exists returns a `409`.
     * 
     *
     * @return bool|null
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }
    /**
     * Set to make this the rule that catches a conversation matching nothing else. A business can have only one; creating a second while one exists returns a `409`.
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
