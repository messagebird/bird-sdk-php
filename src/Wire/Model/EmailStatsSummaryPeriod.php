<?php

namespace MessageBird\Wire\Model;

/**
 * The window this response was actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants). The grain of `from` and `to` mirrors the grain of the request's bounds. Days and hour boundaries follow the requested `timezone` (UTC when omitted).
 */
class EmailStatsSummaryPeriod
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
     * Inclusive start of the window the response covers. A calendar day (YYYY-MM-DD, in the requested `timezone`) for day windows. For hour windows, an RFC 3339 UTC instant marking the start of the first hour, which falls on a local hour boundary when `timezone` is set.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Inclusive end of the window the response covers. A calendar day (YYYY-MM-DD, in the requested `timezone`) for day windows. For hour windows, an RFC 3339 UTC instant marking the start of the last hour, which falls on a local hour boundary when `timezone` is set.
     *
     * @var string|null
     */
    protected $to;
    /**
     * The best-effort refresh time of the statistics in this response; when they come from several rollups, it is the oldest of their latest refreshes. Events recorded before roughly this time are usually reflected, while more recent events may not be yet. Statistics are served from rolling aggregations that usually refresh within a minute, so a response can trail the latest events by a minute or more. Use this field to label data freshness (for example "as of 14:03") rather than assuming the numbers are up to the second. Null when the freshness boundary is not being reported.
     * 
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Inclusive start of the window the response covers. A calendar day (YYYY-MM-DD, in the requested `timezone`) for day windows. For hour windows, an RFC 3339 UTC instant marking the start of the first hour, which falls on a local hour boundary when `timezone` is set.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Inclusive start of the window the response covers. A calendar day (YYYY-MM-DD, in the requested `timezone`) for day windows. For hour windows, an RFC 3339 UTC instant marking the start of the first hour, which falls on a local hour boundary when `timezone` is set.
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
     * Inclusive end of the window the response covers. A calendar day (YYYY-MM-DD, in the requested `timezone`) for day windows. For hour windows, an RFC 3339 UTC instant marking the start of the last hour, which falls on a local hour boundary when `timezone` is set.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Inclusive end of the window the response covers. A calendar day (YYYY-MM-DD, in the requested `timezone`) for day windows. For hour windows, an RFC 3339 UTC instant marking the start of the last hour, which falls on a local hour boundary when `timezone` is set.
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
     * The best-effort refresh time of the statistics in this response; when they come from several rollups, it is the oldest of their latest refreshes. Events recorded before roughly this time are usually reflected, while more recent events may not be yet. Statistics are served from rolling aggregations that usually refresh within a minute, so a response can trail the latest events by a minute or more. Use this field to label data freshness (for example "as of 14:03") rather than assuming the numbers are up to the second. Null when the freshness boundary is not being reported.
     * 
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * The best-effort refresh time of the statistics in this response; when they come from several rollups, it is the oldest of their latest refreshes. Events recorded before roughly this time are usually reflected, while more recent events may not be yet. Statistics are served from rolling aggregations that usually refresh within a minute, so a response can trail the latest events by a minute or more. Use this field to label data freshness (for example "as of 14:03") rather than assuming the numbers are up to the second. Null when the freshness boundary is not being reported.
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
