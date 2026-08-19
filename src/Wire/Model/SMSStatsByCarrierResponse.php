<?php

namespace MessageBird\Wire\Model;

class SMSStatsByCarrierResponse
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
     * Carrier breakdown rows, ranked by the `sort` metric (default `accepted`) descending. Empty when no messages were sent in the period.
     *
     * @var list<SMSCarrierStatsPoint>|null
     */
    protected $data;
    /**
     * Total number of distinct carriers with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped; raise `limit` (up to 200) or narrow the window to see more.
     * 
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
     * Carrier breakdown rows, ranked by the `sort` metric (default `accepted`) descending. Empty when no messages were sent in the period.
     *
     * @return list<SMSCarrierStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Carrier breakdown rows, ranked by the `sort` metric (default `accepted`) descending. Empty when no messages were sent in the period.
     *
     * @param list<SMSCarrierStatsPoint>|null $data
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
     * Total number of distinct carriers with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped; raise `limit` (up to 200) or narrow the window to see more.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of distinct carriers with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped; raise `limit` (up to 200) or narrow the window to see more.
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
