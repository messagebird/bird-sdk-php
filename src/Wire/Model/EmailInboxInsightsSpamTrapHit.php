<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSpamTrapHit
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
     * When the trap network first observed mail from this domain at this trap.
     *
     * @var \DateTime|null
     */
    protected $firstSeen;
    /**
     * The most recent sighting, or null when the trap was seen only once. On a row with several hits this is the far end of the period they span.
     * 
     *
     * @var \DateTime|null
     */
    protected $lastSeen;
    /**
     * The sending IP the message came from.
     *
     * @var string|null
     */
    protected $ipAddress;
    /**
     * The trap network that observed a hit. The set grows as coverage does, so treat the values as labels rather than a closed list.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * What kind of spam trap was hit. `pristine` addresses were never used by a real person and never subscribed to anything, so a hit means the address was harvested or guessed rather than collected. `recycled` addresses belonged to a real person once and were retired, so hits point at stale list data. `typo` addresses catch misspellings of real domains, `parked` addresses sit on domains that are registered but not used for real mail, and `mixed` covers hits the trap network reports without a single kind. The trap network decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A hit whose kind is new is still a hit worth acting on.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * How many times this trap was hit over the period, so rows do not sum to `total` on their own: one repeatedly hit trap is one row. Absent when the trap network does not break the count out, which is not the same as one hit. A row exists because the trap was reached at least once either way.
     * 
     *
     * @var int|null
     */
    protected $hitCount;
    /**
     * How long the trap address has been a trap, in days, or null when the network does not say. A high age on a recycled trap suggests the address has been dead in the list for a long time.
     * 
     *
     * @var int|null
     */
    protected $trapAgeDays;
    /**
     * When the trap network first observed mail from this domain at this trap.
     *
     * @return \DateTime|null
     */
    public function getFirstSeen(): ?\DateTime
    {
        return $this->firstSeen;
    }
    /**
     * When the trap network first observed mail from this domain at this trap.
     *
     * @param \DateTime|null $firstSeen
     *
     * @return self
     */
    public function setFirstSeen(?\DateTime $firstSeen): self
    {
        $this->initialized['firstSeen'] = true;
        $this->firstSeen = $firstSeen;
        return $this;
    }
    /**
     * The most recent sighting, or null when the trap was seen only once. On a row with several hits this is the far end of the period they span.
     * 
     *
     * @return \DateTime|null
     */
    public function getLastSeen(): ?\DateTime
    {
        return $this->lastSeen;
    }
    /**
     * The most recent sighting, or null when the trap was seen only once. On a row with several hits this is the far end of the period they span.
     *
     * @param \DateTime|null $lastSeen
     *
     * @return self
     */
    public function setLastSeen(?\DateTime $lastSeen): self
    {
        $this->initialized['lastSeen'] = true;
        $this->lastSeen = $lastSeen;
        return $this;
    }
    /**
     * The sending IP the message came from.
     *
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }
    /**
     * The sending IP the message came from.
     *
     * @param string|null $ipAddress
     *
     * @return self
     */
    public function setIpAddress(?string $ipAddress): self
    {
        $this->initialized['ipAddress'] = true;
        $this->ipAddress = $ipAddress;
        return $this;
    }
    /**
     * The trap network that observed a hit. The set grows as coverage does, so treat the values as labels rather than a closed list.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * The trap network that observed a hit. The set grows as coverage does, so treat the values as labels rather than a closed list.
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * What kind of spam trap was hit. `pristine` addresses were never used by a real person and never subscribed to anything, so a hit means the address was harvested or guessed rather than collected. `recycled` addresses belonged to a real person once and were retired, so hits point at stale list data. `typo` addresses catch misspellings of real domains, `parked` addresses sit on domains that are registered but not used for real mail, and `mixed` covers hits the trap network reports without a single kind. The trap network decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A hit whose kind is new is still a hit worth acting on.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * What kind of spam trap was hit. `pristine` addresses were never used by a real person and never subscribed to anything, so a hit means the address was harvested or guessed rather than collected. `recycled` addresses belonged to a real person once and were retired, so hits point at stale list data. `typo` addresses catch misspellings of real domains, `parked` addresses sit on domains that are registered but not used for real mail, and `mixed` covers hits the trap network reports without a single kind. The trap network decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A hit whose kind is new is still a hit worth acting on.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * How many times this trap was hit over the period, so rows do not sum to `total` on their own: one repeatedly hit trap is one row. Absent when the trap network does not break the count out, which is not the same as one hit. A row exists because the trap was reached at least once either way.
     * 
     *
     * @return int|null
     */
    public function getHitCount(): ?int
    {
        return $this->hitCount;
    }
    /**
     * How many times this trap was hit over the period, so rows do not sum to `total` on their own: one repeatedly hit trap is one row. Absent when the trap network does not break the count out, which is not the same as one hit. A row exists because the trap was reached at least once either way.
     *
     * @param int|null $hitCount
     *
     * @return self
     */
    public function setHitCount(?int $hitCount): self
    {
        $this->initialized['hitCount'] = true;
        $this->hitCount = $hitCount;
        return $this;
    }
    /**
     * How long the trap address has been a trap, in days, or null when the network does not say. A high age on a recycled trap suggests the address has been dead in the list for a long time.
     * 
     *
     * @return int|null
     */
    public function getTrapAgeDays(): ?int
    {
        return $this->trapAgeDays;
    }
    /**
     * How long the trap address has been a trap, in days, or null when the network does not say. A high age on a recycled trap suggests the address has been dead in the list for a long time.
     *
     * @param int|null $trapAgeDays
     *
     * @return self
     */
    public function setTrapAgeDays(?int $trapAgeDays): self
    {
        $this->initialized['trapAgeDays'] = true;
        $this->trapAgeDays = $trapAgeDays;
        return $this;
    }
}
