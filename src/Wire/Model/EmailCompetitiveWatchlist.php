<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlist
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
     * Where your sending sits against the brands you watch, over the same period as the
     * rows.
     * 
     * Every figure here is derived from those rows rather than measured separately, so
     * the two always agree. As on a row, each is present and `null` when the rows cannot
     * support it: the peer medians need at least one watched brand the panel reported
     * on, and the share figures need sending of your own to compare.
     * 
     *
     * @var EmailCompetitiveWatchlistSummary|null
     */
    protected $summary;
    /**
     * Your own row first, then each watched brand in the order it was added. Your row is present once your workspace has sent email, since before that there is no sending of yours to compare against. Empty for a workspace that has neither sent nor added a brand.
     * 
     *
     * @var list<EmailCompetitiveWatchlistRow>|null
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
     * Where your sending sits against the brands you watch, over the same period as the
     * rows.
     * 
     * Every figure here is derived from those rows rather than measured separately, so
     * the two always agree. As on a row, each is present and `null` when the rows cannot
     * support it: the peer medians need at least one watched brand the panel reported
     * on, and the share figures need sending of your own to compare.
     * 
     *
     * @return EmailCompetitiveWatchlistSummary|null
     */
    public function getSummary(): ?EmailCompetitiveWatchlistSummary
    {
        return $this->summary;
    }
    /**
    * Where your sending sits against the brands you watch, over the same period as the
    rows.
    
    Every figure here is derived from those rows rather than measured separately, so
    the two always agree. As on a row, each is present and `null` when the rows cannot
    support it: the peer medians need at least one watched brand the panel reported
    on, and the share figures need sending of your own to compare.
    
    *
    * @param EmailCompetitiveWatchlistSummary|null $summary
    *
    * @return self
    */
    public function setSummary(?EmailCompetitiveWatchlistSummary $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * Your own row first, then each watched brand in the order it was added. Your row is present once your workspace has sent email, since before that there is no sending of yours to compare against. Empty for a workspace that has neither sent nor added a brand.
     * 
     *
     * @return list<EmailCompetitiveWatchlistRow>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Your own row first, then each watched brand in the order it was added. Your row is present once your workspace has sent email, since before that there is no sending of yours to compare against. Empty for a workspace that has neither sent nor added a brand.
     *
     * @param list<EmailCompetitiveWatchlistRow>|null $data
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
