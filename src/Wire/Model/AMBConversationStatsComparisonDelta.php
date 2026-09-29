<?php

namespace MessageBird\Wire\Model;

class AMBConversationStatsComparisonDelta
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
     * Relative change in conversation starts (`counts.started`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $startedPctChange;
    /**
     * Relative change in conversation reopens (`counts.reopened`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $reopenedPctChange;
    /**
     * Relative change in conversation closes (`counts.closed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $closedPctChange;
    /**
     * Relative change in distinct conversations touched (`counts.conversations`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $conversationsPctChange;
    /**
     * Relative change in conversation starts (`counts.started`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getStartedPctChange(): ?float
    {
        return $this->startedPctChange;
    }
    /**
     * Relative change in conversation starts (`counts.started`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $startedPctChange
     *
     * @return self
     */
    public function setStartedPctChange(?float $startedPctChange): self
    {
        $this->initialized['startedPctChange'] = true;
        $this->startedPctChange = $startedPctChange;
        return $this;
    }
    /**
     * Relative change in conversation reopens (`counts.reopened`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getReopenedPctChange(): ?float
    {
        return $this->reopenedPctChange;
    }
    /**
     * Relative change in conversation reopens (`counts.reopened`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $reopenedPctChange
     *
     * @return self
     */
    public function setReopenedPctChange(?float $reopenedPctChange): self
    {
        $this->initialized['reopenedPctChange'] = true;
        $this->reopenedPctChange = $reopenedPctChange;
        return $this;
    }
    /**
     * Relative change in conversation closes (`counts.closed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getClosedPctChange(): ?float
    {
        return $this->closedPctChange;
    }
    /**
     * Relative change in conversation closes (`counts.closed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $closedPctChange
     *
     * @return self
     */
    public function setClosedPctChange(?float $closedPctChange): self
    {
        $this->initialized['closedPctChange'] = true;
        $this->closedPctChange = $closedPctChange;
        return $this;
    }
    /**
     * Relative change in distinct conversations touched (`counts.conversations`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getConversationsPctChange(): ?float
    {
        return $this->conversationsPctChange;
    }
    /**
     * Relative change in distinct conversations touched (`counts.conversations`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $conversationsPctChange
     *
     * @return self
     */
    public function setConversationsPctChange(?float $conversationsPctChange): self
    {
        $this->initialized['conversationsPctChange'] = true;
        $this->conversationsPctChange = $conversationsPctChange;
        return $this;
    }
}
