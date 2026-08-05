<?php

namespace MessageBird\Wire\Model;

class EmailStatsByBroadcastResponse
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
     * The date range the server actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     * 
     *
     * @var EmailStatsPeriod|null
     */
    protected $period;
    /**
     * Broadcast breakdown rows, ranked by the `sort` metric (default `processed`) descending. Empty when no broadcast messages were active in the period.
     *
     * @var list<EmailBroadcastStatsPoint>|null
     */
    protected $data;
    /**
     * Total number of distinct broadcasts with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped; raise `limit` (up to 200) or narrow the window to see more.
     * 
     *
     * @var int|null
     */
    protected $total;
    /**
     * The date range the server actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     * 
     *
     * @return EmailStatsPeriod|null
     */
    public function getPeriod(): ?EmailStatsPeriod
    {
        return $this->period;
    }
    /**
     * The date range the server actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     *
     * @param EmailStatsPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?EmailStatsPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Broadcast breakdown rows, ranked by the `sort` metric (default `processed`) descending. Empty when no broadcast messages were active in the period.
     *
     * @return list<EmailBroadcastStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Broadcast breakdown rows, ranked by the `sort` metric (default `processed`) descending. Empty when no broadcast messages were active in the period.
     *
     * @param list<EmailBroadcastStatsPoint>|null $data
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
     * Total number of distinct broadcasts with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped; raise `limit` (up to 200) or narrow the window to see more.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of distinct broadcasts with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped; raise `limit` (up to 200) or narrow the window to see more.
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
