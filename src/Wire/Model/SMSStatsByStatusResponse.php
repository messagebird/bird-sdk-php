<?php

namespace MessageBird\Wire\Model;

class SMSStatsByStatusResponse
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
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @var SMSStatsSummaryPeriod|null
     */
    protected $period;
    /**
     * Status breakdown rows, one per lifecycle status with activity, ordered by count descending. Empty when no messages had activity in the period.
     *
     * @var list<SMSStatusStatsPoint>|null
     */
    protected $data;
    /**
     * Number of distinct lifecycle statuses with activity in the period (at most seven). Equal to the number of rows returned, since this breakdown is never capped.
     *
     * @var int|null
     */
    protected $total;
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     * 
     *
     * @return SMSStatsSummaryPeriod|null
     */
    public function getPeriod(): ?SMSStatsSummaryPeriod
    {
        return $this->period;
    }
    /**
     * The window the server actually computed against. The summary serves two window grains: calendar days (bounds are YYYY-MM-DD) and hours (bounds are RFC 3339 instants on the hour). The grain of `from` and `to` mirrors the grain of the request's bounds.
     *
     * @param SMSStatsSummaryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?SMSStatsSummaryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Status breakdown rows, one per lifecycle status with activity, ordered by count descending. Empty when no messages had activity in the period.
     *
     * @return list<SMSStatusStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Status breakdown rows, one per lifecycle status with activity, ordered by count descending. Empty when no messages had activity in the period.
     *
     * @param list<SMSStatusStatsPoint>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Number of distinct lifecycle statuses with activity in the period (at most seven). Equal to the number of rows returned, since this breakdown is never capped.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Number of distinct lifecycle statuses with activity in the period (at most seven). Equal to the number of rows returned, since this breakdown is never capped.
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
}
