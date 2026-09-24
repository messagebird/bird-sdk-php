<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryPeriod
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
     * Inclusive normalized start as a UTC instant.
     *
     * @var \DateTime|null
     */
    protected $from;
    /**
     * Exclusive normalized end as a UTC instant.
     *
     * @var \DateTime|null
     */
    protected $to;
    /**
     * Timezone used to normalize bounds and buckets.
     *
     * @var string|null
     */
    protected $timezone;
    /**
     * Requested grain, or null when no series was requested.
     *
     * @var string|null
     */
    protected $grain;
    /**
     * Inclusive normalized start as a UTC instant.
     *
     * @return \DateTime|null
     */
    public function getFrom(): ?\DateTime
    {
        return $this->from;
    }
    /**
     * Inclusive normalized start as a UTC instant.
     *
     * @param \DateTime|null $from
     *
     * @return self
     */
    public function setFrom(?\DateTime $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Exclusive normalized end as a UTC instant.
     *
     * @return \DateTime|null
     */
    public function getTo(): ?\DateTime
    {
        return $this->to;
    }
    /**
     * Exclusive normalized end as a UTC instant.
     *
     * @param \DateTime|null $to
     *
     * @return self
     */
    public function setTo(?\DateTime $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Timezone used to normalize bounds and buckets.
     *
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }
    /**
     * Timezone used to normalize bounds and buckets.
     *
     * @param string|null $timezone
     *
     * @return self
     */
    public function setTimezone(?string $timezone): self
    {
        $this->initialized['timezone'] = true;
        $this->timezone = $timezone;
        return $this;
    }
    /**
     * Requested grain, or null when no series was requested.
     *
     * @return string|null
     */
    public function getGrain(): ?string
    {
        return $this->grain;
    }
    /**
     * Requested grain, or null when no series was requested.
     *
     * @param string|null $grain
     *
     * @return self
     */
    public function setGrain(?string $grain): self
    {
        $this->initialized['grain'] = true;
        $this->grain = $grain;
        return $this;
    }
}
