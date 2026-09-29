<?php

namespace MessageBird\Wire\Model;

class AMBConversationStatsCounts
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
     * Count of conversation-started events in scope.
     *
     * @var int|null
     */
    protected $started;
    /**
     * Count of conversation-reopened events in scope.
     *
     * @var int|null
     */
    protected $reopened;
    /**
     * Count of conversation-closed events in scope.
     *
     * @var int|null
     */
    protected $closed;
    /**
     * Distinct conversations with at least one lifecycle event in scope.
     *
     * @var int|null
     */
    protected $conversations;
    /**
     * Count of conversation-started events in scope.
     *
     * @return int|null
     */
    public function getStarted(): ?int
    {
        return $this->started;
    }
    /**
     * Count of conversation-started events in scope.
     *
     * @param int|null $started
     *
     * @return self
     */
    public function setStarted(?int $started): self
    {
        $this->initialized['started'] = true;
        $this->started = $started;
        return $this;
    }
    /**
     * Count of conversation-reopened events in scope.
     *
     * @return int|null
     */
    public function getReopened(): ?int
    {
        return $this->reopened;
    }
    /**
     * Count of conversation-reopened events in scope.
     *
     * @param int|null $reopened
     *
     * @return self
     */
    public function setReopened(?int $reopened): self
    {
        $this->initialized['reopened'] = true;
        $this->reopened = $reopened;
        return $this;
    }
    /**
     * Count of conversation-closed events in scope.
     *
     * @return int|null
     */
    public function getClosed(): ?int
    {
        return $this->closed;
    }
    /**
     * Count of conversation-closed events in scope.
     *
     * @param int|null $closed
     *
     * @return self
     */
    public function setClosed(?int $closed): self
    {
        $this->initialized['closed'] = true;
        $this->closed = $closed;
        return $this;
    }
    /**
     * Distinct conversations with at least one lifecycle event in scope.
     *
     * @return int|null
     */
    public function getConversations(): ?int
    {
        return $this->conversations;
    }
    /**
     * Distinct conversations with at least one lifecycle event in scope.
     *
     * @param int|null $conversations
     *
     * @return self
     */
    public function setConversations(?int $conversations): self
    {
        $this->initialized['conversations'] = true;
        $this->conversations = $conversations;
        return $this;
    }
}
