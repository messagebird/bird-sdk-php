<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupSimSwap extends \ArrayObject
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
    protected $status;
    /**
     * When the SIM was last changed. Absent when only a recency band is known.
     *
     * @var \DateTime|null
     */
    protected $lastSwappedAt;
    /**
     * The lower bound, in days, of how long ago the SIM was last changed. Networks that do not release an exact date report a band instead; absent when no lower bound is known.
     *
     * @var int|null
     */
    protected $minDays;
    /**
     * The upper bound, in days, of how long ago the SIM was last changed. Absent when no upper bound is known; with a lower bound present, that means the change was at least `min_days` ago.
     *
     * @var int|null
     */
    protected $maxDays;
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When the SIM was last changed. Absent when only a recency band is known.
     *
     * @return \DateTime|null
     */
    public function getLastSwappedAt(): ?\DateTime
    {
        return $this->lastSwappedAt;
    }
    /**
     * When the SIM was last changed. Absent when only a recency band is known.
     *
     * @param \DateTime|null $lastSwappedAt
     *
     * @return self
     */
    public function setLastSwappedAt(?\DateTime $lastSwappedAt): self
    {
        $this->initialized['lastSwappedAt'] = true;
        $this->lastSwappedAt = $lastSwappedAt;
        return $this;
    }
    /**
     * The lower bound, in days, of how long ago the SIM was last changed. Networks that do not release an exact date report a band instead; absent when no lower bound is known.
     *
     * @return int|null
     */
    public function getMinDays(): ?int
    {
        return $this->minDays;
    }
    /**
     * The lower bound, in days, of how long ago the SIM was last changed. Networks that do not release an exact date report a band instead; absent when no lower bound is known.
     *
     * @param int|null $minDays
     *
     * @return self
     */
    public function setMinDays(?int $minDays): self
    {
        $this->initialized['minDays'] = true;
        $this->minDays = $minDays;
        return $this;
    }
    /**
     * The upper bound, in days, of how long ago the SIM was last changed. Absent when no upper bound is known; with a lower bound present, that means the change was at least `min_days` ago.
     *
     * @return int|null
     */
    public function getMaxDays(): ?int
    {
        return $this->maxDays;
    }
    /**
     * The upper bound, in days, of how long ago the SIM was last changed. Absent when no upper bound is known; with a lower bound present, that means the change was at least `min_days` ago.
     *
     * @param int|null $maxDays
     *
     * @return self
     */
    public function setMaxDays(?int $maxDays): self
    {
        $this->initialized['maxDays'] = true;
        $this->maxDays = $maxDays;
        return $this;
    }
}
