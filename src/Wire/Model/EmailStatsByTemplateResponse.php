<?php

namespace MessageBird\Wire\Model;

class EmailStatsByTemplateResponse
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
     * One row per template, ranked by the `sort` metric (`processed` by default) descending. Empty when no messages were sent with a template during the period.
     * 
     *
     * @var list<EmailTemplateStatsPoint>|null
     */
    protected $data;
    /**
     * How many distinct templates had activity in the period, regardless of `limit`. When this is higher than the number of rows in `data`, the ranking got cut off. Raise `limit` (up to 200), or narrow the date range, to see the rest.
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
     * One row per template, ranked by the `sort` metric (`processed` by default) descending. Empty when no messages were sent with a template during the period.
     * 
     *
     * @return list<EmailTemplateStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * One row per template, ranked by the `sort` metric (`processed` by default) descending. Empty when no messages were sent with a template during the period.
     *
     * @param list<EmailTemplateStatsPoint>|null $data
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
     * How many distinct templates had activity in the period, regardless of `limit`. When this is higher than the number of rows in `data`, the ranking got cut off. Raise `limit` (up to 200), or narrow the date range, to see the rest.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * How many distinct templates had activity in the period, regardless of `limit`. When this is higher than the number of rows in `data`, the ranking got cut off. Raise `limit` (up to 200), or narrow the date range, to see the rest.
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
