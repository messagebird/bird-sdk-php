<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveVolumeSeries
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
     * The period the response describes. Most reports resolve a rolling window when
     * requested; send-time and notable reports can carry the panel's own window.
     * These bounds describe coverage, not a guarantee of measurement freshness.
     * 
     *
     * @var EmailCompetitivePeriod|null
     */
    protected $period;
    /**
     * Your own line first, then the requested brands in the order they were asked for. Your line is present once your workspace has sent email. Every line carries the same days in the same order, so they can be plotted against one axis without aligning them first.
     * 
     *
     * @var list<EmailCompetitiveBrandSeries>|null
     */
    protected $data;
    /**
     * The period the response describes. Most reports resolve a rolling window when
     * requested; send-time and notable reports can carry the panel's own window.
     * These bounds describe coverage, not a guarantee of measurement freshness.
     * 
     *
     * @return EmailCompetitivePeriod|null
     */
    public function getPeriod(): ?EmailCompetitivePeriod
    {
        return $this->period;
    }
    /**
    * The period the response describes. Most reports resolve a rolling window when
    requested; send-time and notable reports can carry the panel's own window.
    These bounds describe coverage, not a guarantee of measurement freshness.
    
    *
    * @param EmailCompetitivePeriod|null $period
    *
    * @return self
    */
    public function setPeriod(?EmailCompetitivePeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Your own line first, then the requested brands in the order they were asked for. Your line is present once your workspace has sent email. Every line carries the same days in the same order, so they can be plotted against one axis without aligning them first.
     * 
     *
     * @return list<EmailCompetitiveBrandSeries>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Your own line first, then the requested brands in the order they were asked for. Your line is present once your workspace has sent email. Every line carries the same days in the same order, so they can be plotted against one axis without aligning them first.
     *
     * @param list<EmailCompetitiveBrandSeries>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
