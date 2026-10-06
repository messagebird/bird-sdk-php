<?php

namespace MessageBird\Wire\Model;

class EsimZoneBalance
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
    protected $zoneId;
    /**
     * Total purchased data for the zone, in bytes. Known from the orders, so never null.
     *
     * @var int|null
     */
    protected $totalBytes;
    /**
     * Reported data used in this zone, in bytes. Null if any contributing package lacks a usage report. Read individual package balances for available measurements.
     *
     * @var int|null
     */
    protected $usedBytes;
    /**
     * Data remaining, in bytes. Null under the same condition as `used_bytes`.
     *
     * @var int|null
     */
    protected $remainingBytes;
    /**
     * Freshness of this combined figure - the oldest balance read among the zone's contributing packages. Each package's own balance.as_of can be newer.
     *
     * @var \DateTime|null
     */
    protected $asOf;
    /**
     * Oldest network measurement time among the contributing packages. Null if any package lacks a report or a measurement time. Use `as_of` for the balance update time.
     *
     * @var \DateTime|null
     */
    protected $observedAt;
    /**
     * @return string|null
     */
    public function getZoneId(): ?string
    {
        return $this->zoneId;
    }
    /**
     * @param string|null $zoneId
     *
     * @return self
     */
    public function setZoneId(?string $zoneId): self
    {
        $this->initialized['zoneId'] = true;
        $this->zoneId = $zoneId;
        return $this;
    }
    /**
     * Total purchased data for the zone, in bytes. Known from the orders, so never null.
     *
     * @return int|null
     */
    public function getTotalBytes(): ?int
    {
        return $this->totalBytes;
    }
    /**
     * Total purchased data for the zone, in bytes. Known from the orders, so never null.
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
     * Reported data used in this zone, in bytes. Null if any contributing package lacks a usage report. Read individual package balances for available measurements.
     *
     * @return int|null
     */
    public function getUsedBytes(): ?int
    {
        return $this->usedBytes;
    }
    /**
     * Reported data used in this zone, in bytes. Null if any contributing package lacks a usage report. Read individual package balances for available measurements.
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
     * Data remaining, in bytes. Null under the same condition as `used_bytes`.
     *
     * @return int|null
     */
    public function getRemainingBytes(): ?int
    {
        return $this->remainingBytes;
    }
    /**
     * Data remaining, in bytes. Null under the same condition as `used_bytes`.
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
     * Freshness of this combined figure - the oldest balance read among the zone's contributing packages. Each package's own balance.as_of can be newer.
     *
     * @return \DateTime|null
     */
    public function getAsOf(): ?\DateTime
    {
        return $this->asOf;
    }
    /**
     * Freshness of this combined figure - the oldest balance read among the zone's contributing packages. Each package's own balance.as_of can be newer.
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
     * Oldest network measurement time among the contributing packages. Null if any package lacks a report or a measurement time. Use `as_of` for the balance update time.
     *
     * @return \DateTime|null
     */
    public function getObservedAt(): ?\DateTime
    {
        return $this->observedAt;
    }
    /**
     * Oldest network measurement time among the contributing packages. Null if any package lacks a report or a measurement time. Use `as_of` for the balance update time.
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
