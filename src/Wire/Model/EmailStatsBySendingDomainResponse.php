<?php

namespace MessageBird\Wire\Model;

class EmailStatsBySendingDomainResponse
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
     * The date range this response was actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     * 
     *
     * @var EmailStatsPeriod|null
     */
    protected $period;
    /**
     * Sending-domain breakdown rows, ranked by the `sort` metric (default `processed`) descending. Empty when no eligible activity occurred in the period.
     *
     * @var list<EmailSendingDomainStatsPoint>|null
     */
    protected $data;
    /**
     * Total number of distinct sending domains with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped. Raise `limit` (up to 200) or narrow the window to see more.
     * 
     *
     * @var int|null
     */
    protected $total;
    /**
     * The date range this response was actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
     * 
     *
     * @return EmailStatsPeriod|null
     */
    public function getPeriod(): ?EmailStatsPeriod
    {
        return $this->period;
    }
    /**
     * The date range this response was actually computed against. Echoed back so clients can render the period without tracking it themselves and so cached responses can be keyed by what was queried.
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
     * Sending-domain breakdown rows, ranked by the `sort` metric (default `processed`) descending. Empty when no eligible activity occurred in the period.
     *
     * @return list<EmailSendingDomainStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Sending-domain breakdown rows, ranked by the `sort` metric (default `processed`) descending. Empty when no eligible activity occurred in the period.
     *
     * @param list<EmailSendingDomainStatsPoint>|null $data
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
     * Total number of distinct sending domains with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped. Raise `limit` (up to 200) or narrow the window to see more.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of distinct sending domains with activity in the period, regardless of `limit`. When it exceeds the number of rows returned, the ranking was capped. Raise `limit` (up to 200) or narrow the window to see more.
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
