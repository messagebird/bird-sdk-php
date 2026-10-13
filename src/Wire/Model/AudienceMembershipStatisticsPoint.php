<?php

namespace MessageBird\Wire\Model;

class AudienceMembershipStatisticsPoint
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
     * UTC date of the observation, or the requested date for a gap.
     *
     * @var \DateTime|null
     */
    protected $bucket;
    /**
     * Exact number of all members at observation time, or null for a gap.
     *
     * @var int|null
     */
    protected $total;
    /**
     * Actual source observation instant, or null for a gap. This is not a day-close count.
     *
     * @var \DateTime|null
     */
    protected $observedAt;
    /**
     * UTC date of the observation, or the requested date for a gap.
     *
     * @return \DateTime|null
     */
    public function getBucket(): ?\DateTime
    {
        return $this->bucket;
    }
    /**
     * UTC date of the observation, or the requested date for a gap.
     *
     * @param \DateTime|null $bucket
     *
     * @return self
     */
    public function setBucket(?\DateTime $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
        return $this;
    }
    /**
     * Exact number of all members at observation time, or null for a gap.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Exact number of all members at observation time, or null for a gap.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
    /**
     * Actual source observation instant, or null for a gap. This is not a day-close count.
     *
     * @return \DateTime|null
     */
    public function getObservedAt(): ?\DateTime
    {
        return $this->observedAt;
    }
    /**
     * Actual source observation instant, or null for a gap. This is not a day-close count.
     *
     * @param \DateTime|null $observedAt
     *
     * @return self
     */
    public function setObservedAt(?\DateTime $observedAt): self
    {
        $this->initialized['observedAt'] = true;
        $this->observedAt = $observedAt;
        return $this;
    }
}
