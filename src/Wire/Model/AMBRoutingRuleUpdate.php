<?php

namespace MessageBird\Wire\Model;

class AMBRoutingRuleUpdate
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
     * Queue label used for routing and filtering conversations.
     *
     * @var string|null
     */
    protected $queue;
    /**
     * Change this rule's evaluation order among the business's other rules.
     *
     * @var int|null
     */
    protected $precedence;
    /**
     * Set to true to make this the rule that catches a conversation matching nothing else, or to false to stop it from being the default. Setting it true while the business already has a different default rule returns a `409`.
     * 
     *
     * @var bool|null
     */
    protected $isDefault;
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
     * Change this rule's evaluation order among the business's other rules.
     *
     * @return int|null
     */
    public function getPrecedence(): ?int
    {
        return $this->precedence;
    }
    /**
     * Change this rule's evaluation order among the business's other rules.
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
     * Set to true to make this the rule that catches a conversation matching nothing else, or to false to stop it from being the default. Setting it true while the business already has a different default rule returns a `409`.
     * 
     *
     * @return bool|null
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }
    /**
     * Set to true to make this the rule that catches a conversation matching nothing else, or to false to stop it from being the default. Setting it true while the business already has a different default rule returns a `409`.
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
