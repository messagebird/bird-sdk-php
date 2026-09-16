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
     * The period every figure in the response covers, echoed back from the request.
     * 
     * Figures are fetched when the request is made, so they are current as of `to`.
     * The period always ends at the moment of the request rather than at a cached
     * boundary, which is why two requests a minute apart can differ slightly.
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
     * The period every figure in the response covers, echoed back from the request.
     * 
     * Figures are fetched when the request is made, so they are current as of `to`.
     * The period always ends at the moment of the request rather than at a cached
     * boundary, which is why two requests a minute apart can differ slightly.
     * 
     *
     * @return EmailCompetitivePeriod|null
     */
    public function getPeriod(): ?EmailCompetitivePeriod
    {
        return $this->period;
    }
    /**
    * The period every figure in the response covers, echoed back from the request.
    
    Figures are fetched when the request is made, so they are current as of `to`.
    The period always ends at the moment of the request rather than at a cached
    boundary, which is why two requests a minute apart can differ slightly.
    
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
