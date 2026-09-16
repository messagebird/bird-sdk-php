<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSpamTrapTypeCount
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
     * What kind of spam trap was hit. `pristine` addresses were never used by a real person and never subscribed to anything, so a hit means the address was harvested or guessed rather than collected. `recycled` addresses belonged to a real person once and were retired, so hits point at stale list data. `typo` addresses catch misspellings of real domains, `parked` addresses sit on domains that are registered but not used for real mail, and `mixed` covers hits the trap network reports without a single kind. The trap network decides this set and can add to it, so treat an unrecognised value as a label to show rather than a case to exhaust. A hit whose kind is new is still a hit worth acting on.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * Hits of this kind over the period. A zero is a measured zero, not missing data: no pristine hits is a genuinely good result rather than an empty state.
     * 
     *
     * @var int|null
     */
    protected $hits;
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
     * Hits of this kind over the period. A zero is a measured zero, not missing data: no pristine hits is a genuinely good result rather than an empty state.
     * 
     *
     * @return int|null
     */
    public function getHits(): ?int
    {
        return $this->hits;
    }
    /**
     * Hits of this kind over the period. A zero is a measured zero, not missing data: no pristine hits is a genuinely good result rather than an empty state.
     *
     * @param int|null $hits
     *
     * @return self
     */
    public function setHits(?int $hits): self
    {
        $this->initialized['hits'] = true;
        $this->hits = $hits;
        return $this;
    }
}
