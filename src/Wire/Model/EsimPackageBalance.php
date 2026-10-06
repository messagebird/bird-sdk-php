<?php

namespace MessageBird\Wire\Model;

class EsimPackageBalance
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
     * Total data in bytes, as purchased. Known from the order, so never null.
     *
     * @var int|null
     */
    protected $totalBytes;
    /**
     * Data used in bytes, or null while no network has reported on this package.
     *
     * @var int|null
     */
    protected $usedBytes;
    /**
     * Data remaining in bytes, or null while no network has reported on this package.
     *
     * @var int|null
     */
    protected $remainingBytes;
    /**
     * Share of the total data already used, as a percentage. Null while no network has reported on this package.
     *
     * @var float|null
     */
    protected $usedPercent;
    /**
     * When the balance was last established. Before consumption is reported, this is the package delivery time. Check whether the consumption fields are null before treating this timestamp as a usage update.
     *
     * @var \DateTime|null
     */
    protected $asOf;
    /**
     * Measurement time supplied by the mobile network. Null when no measurement or measurement time is available. Use `as_of` for the balance update time.
     *
     * @var \DateTime|null
     */
    protected $observedAt;
    /**
     * Total data in bytes, as purchased. Known from the order, so never null.
     *
     * @return int|null
     */
    public function getTotalBytes(): ?int
    {
        return $this->totalBytes;
    }
    /**
     * Total data in bytes, as purchased. Known from the order, so never null.
     *
     * @param int|null $totalBytes
     *
     * @return self
     */
    public function setTotalBytes(?int $totalBytes): self
    {
        $this->initialized['totalBytes'] = true;
        $this->totalBytes = $totalBytes;
        return $this;
    }
    /**
     * Data used in bytes, or null while no network has reported on this package.
     *
     * @return int|null
     */
    public function getUsedBytes(): ?int
    {
        return $this->usedBytes;
    }
    /**
     * Data used in bytes, or null while no network has reported on this package.
     *
     * @param int|null $usedBytes
     *
     * @return self
     */
    public function setUsedBytes(?int $usedBytes): self
    {
        $this->initialized['usedBytes'] = true;
        $this->usedBytes = $usedBytes;
        return $this;
    }
    /**
     * Data remaining in bytes, or null while no network has reported on this package.
     *
     * @return int|null
     */
    public function getRemainingBytes(): ?int
    {
        return $this->remainingBytes;
    }
    /**
     * Data remaining in bytes, or null while no network has reported on this package.
     *
     * @param int|null $remainingBytes
     *
     * @return self
     */
    public function setRemainingBytes(?int $remainingBytes): self
    {
        $this->initialized['remainingBytes'] = true;
        $this->remainingBytes = $remainingBytes;
        return $this;
    }
    /**
     * Share of the total data already used, as a percentage. Null while no network has reported on this package.
     *
     * @return float|null
     */
    public function getUsedPercent(): ?float
    {
        return $this->usedPercent;
    }
    /**
     * Share of the total data already used, as a percentage. Null while no network has reported on this package.
     *
     * @param float|null $usedPercent
     *
     * @return self
     */
    public function setUsedPercent(?float $usedPercent): self
    {
        $this->initialized['usedPercent'] = true;
        $this->usedPercent = $usedPercent;
        return $this;
    }
    /**
     * When the balance was last established. Before consumption is reported, this is the package delivery time. Check whether the consumption fields are null before treating this timestamp as a usage update.
     *
     * @return \DateTime|null
     */
    public function getAsOf(): ?\DateTime
    {
        return $this->asOf;
    }
    /**
     * When the balance was last established. Before consumption is reported, this is the package delivery time. Check whether the consumption fields are null before treating this timestamp as a usage update.
     *
     * @param \DateTime|null $asOf
     *
     * @return self
     */
    public function setAsOf(?\DateTime $asOf): self
    {
        $this->initialized['asOf'] = true;
        $this->asOf = $asOf;
        return $this;
    }
    /**
     * Measurement time supplied by the mobile network. Null when no measurement or measurement time is available. Use `as_of` for the balance update time.
     *
     * @return \DateTime|null
     */
    public function getObservedAt(): ?\DateTime
    {
        return $this->observedAt;
    }
    /**
     * Measurement time supplied by the mobile network. Null when no measurement or measurement time is available. Use `as_of` for the balance update time.
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
