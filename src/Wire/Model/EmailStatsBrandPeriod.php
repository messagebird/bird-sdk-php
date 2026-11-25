<?php

namespace MessageBird\Wire\Model;

/**
 * The window this Brand breakdown was actually computed against. Bounds are either inclusive calendar days (YYYY-MM-DD in the requested `timezone`, UTC when omitted) or RFC 3339 UTC instants marking the starts of the first and last included 15-minute quarters (aligned to local quarter-hour boundaries when `timezone` is set).
 */
class EmailStatsBrandPeriod
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
     * Inclusive start of the window the response covers. A calendar day (`YYYY-MM-DD`, in the requested `timezone`) for day windows, or an RFC 3339 UTC instant marking the start of the first included 15-minute quarter (aligned to a local quarter-hour boundary when `timezone` is set).
     *
     * @var string|null
     */
    protected $from;
    /**
     * Inclusive end of the window the response covers. A calendar day (`YYYY-MM-DD`, in the requested `timezone`) for day windows, or an RFC 3339 UTC instant marking the start of the last included 15-minute quarter (covering the 15 minutes from this timestamp; aligned to a local quarter-hour boundary when `timezone` is set).
     *
     * @var string|null
     */
    protected $to;
    /**
     * Always `null` for Brand breakdowns because they read retained reporting events directly rather than asynchronous rollups.
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Inclusive start of the window the response covers. A calendar day (`YYYY-MM-DD`, in the requested `timezone`) for day windows, or an RFC 3339 UTC instant marking the start of the first included 15-minute quarter (aligned to a local quarter-hour boundary when `timezone` is set).
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Inclusive start of the window the response covers. A calendar day (`YYYY-MM-DD`, in the requested `timezone`) for day windows, or an RFC 3339 UTC instant marking the start of the first included 15-minute quarter (aligned to a local quarter-hour boundary when `timezone` is set).
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Inclusive end of the window the response covers. A calendar day (`YYYY-MM-DD`, in the requested `timezone`) for day windows, or an RFC 3339 UTC instant marking the start of the last included 15-minute quarter (covering the 15 minutes from this timestamp; aligned to a local quarter-hour boundary when `timezone` is set).
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Inclusive end of the window the response covers. A calendar day (`YYYY-MM-DD`, in the requested `timezone`) for day windows, or an RFC 3339 UTC instant marking the start of the last included 15-minute quarter (covering the 15 minutes from this timestamp; aligned to a local quarter-hour boundary when `timezone` is set).
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Always `null` for Brand breakdowns because they read retained reporting events directly rather than asynchronous rollups.
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * Always `null` for Brand breakdowns because they read retained reporting events directly rather than asynchronous rollups.
     *
     * @param \DateTime|null $dataAsOf
     *
     * @return self
     */
    public function setDataAsOf(?\DateTime $dataAsOf): self
    {
        $this->initialized['dataAsOf'] = true;
        $this->dataAsOf = $dataAsOf;
        return $this;
    }
}
