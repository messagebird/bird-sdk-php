<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacementSummaryRawCounts extends \ArrayObject
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
     * Measured placements observed in the inbox.
     *
     * @var int|null
     */
    protected $inbox;
    /**
     * Measured placements observed in spam.
     *
     * @var int|null
     */
    protected $spam;
    /**
     * Measured sends that arrived in neither folder.
     *
     * @var int|null
     */
    protected $missing;
    /**
     * Total measured placements the rates were computed over.
     *
     * @var int|null
     */
    protected $measured;
    /**
     * Measured placements observed in the inbox.
     *
     * @return int|null
     */
    public function getInbox(): ?int
    {
        return $this->inbox;
    }
    /**
     * Measured placements observed in the inbox.
     *
     * @param int|null $inbox
     *
     * @return self
     */
    public function setInbox(?int $inbox): self
    {
        $this->initialized['inbox'] = true;
        $this->inbox = $inbox;
        return $this;
    }
    /**
     * Measured placements observed in spam.
     *
     * @return int|null
     */
    public function getSpam(): ?int
    {
        return $this->spam;
    }
    /**
     * Measured placements observed in spam.
     *
     * @param int|null $spam
     *
     * @return self
     */
    public function setSpam(?int $spam): self
    {
        $this->initialized['spam'] = true;
        $this->spam = $spam;
        return $this;
    }
    /**
     * Measured sends that arrived in neither folder.
     *
     * @return int|null
     */
    public function getMissing(): ?int
    {
        return $this->missing;
    }
    /**
     * Measured sends that arrived in neither folder.
     *
     * @param int|null $missing
     *
     * @return self
     */
    public function setMissing(?int $missing): self
    {
        $this->initialized['missing'] = true;
        $this->missing = $missing;
        return $this;
    }
    /**
     * Total measured placements the rates were computed over.
     *
     * @return int|null
     */
    public function getMeasured(): ?int
    {
        return $this->measured;
    }
    /**
     * Total measured placements the rates were computed over.
     *
     * @param int|null $measured
     *
     * @return self
     */
    public function setMeasured(?int $measured): self
    {
        $this->initialized['measured'] = true;
        $this->measured = $measured;
        return $this;
    }
}
