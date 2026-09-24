<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryResponse
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
     * @var list<EmailStatsQueryGroup>|null
     */
    protected $data;
    /**
     * Normalized half-open period. The response end is exclusive; replay the original inclusive request bounds when following cursors.
     *
     * @var EmailStatsQueryPeriod|null
     */
    protected $period;
    /**
     * Always null for this endpoint. It does not report a refresh boundary, claim completeness, or record request time.
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Pass as starting_after for the next grouped page. Null when no next page exists or the request is ungrouped.
     *
     * @var string|null
     */
    protected $nextCursor;
    /**
     * Pass as ending_before for the previous grouped page. Null when no previous page exists or the request is ungrouped.
     *
     * @var string|null
     */
    protected $prevCursor;
    /**
     * Anchor for the first group. Pass as ending_before to read groups sorting before it. Null for empty or ungrouped results. Ranking can change between reads; refresh by repeating the original query.
     *
     * @var string|null
     */
    protected $refreshCursor;
    /**
     * @return list<EmailStatsQueryGroup>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * @param list<EmailStatsQueryGroup>|null $data
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
     * Normalized half-open period. The response end is exclusive; replay the original inclusive request bounds when following cursors.
     *
     * @return EmailStatsQueryPeriod|null
     */
    public function getPeriod(): ?EmailStatsQueryPeriod
    {
        return $this->period;
    }
    /**
     * Normalized half-open period. The response end is exclusive; replay the original inclusive request bounds when following cursors.
     *
     * @param EmailStatsQueryPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?EmailStatsQueryPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Always null for this endpoint. It does not report a refresh boundary, claim completeness, or record request time.
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * Always null for this endpoint. It does not report a refresh boundary, claim completeness, or record request time.
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
    /**
     * Pass as starting_after for the next grouped page. Null when no next page exists or the request is ungrouped.
     *
     * @return string|null
     */
    public function getNextCursor(): ?string
    {
        return $this->nextCursor;
    }
    /**
     * Pass as starting_after for the next grouped page. Null when no next page exists or the request is ungrouped.
     *
     * @param string|null $nextCursor
     *
     * @return self
     */
    public function setNextCursor(?string $nextCursor): self
    {
        $this->initialized['nextCursor'] = true;
        $this->nextCursor = $nextCursor;
        return $this;
    }
    /**
     * Pass as ending_before for the previous grouped page. Null when no previous page exists or the request is ungrouped.
     *
     * @return string|null
     */
    public function getPrevCursor(): ?string
    {
        return $this->prevCursor;
    }
    /**
     * Pass as ending_before for the previous grouped page. Null when no previous page exists or the request is ungrouped.
     *
     * @param string|null $prevCursor
     *
     * @return self
     */
    public function setPrevCursor(?string $prevCursor): self
    {
        $this->initialized['prevCursor'] = true;
        $this->prevCursor = $prevCursor;
        return $this;
    }
    /**
     * Anchor for the first group. Pass as ending_before to read groups sorting before it. Null for empty or ungrouped results. Ranking can change between reads; refresh by repeating the original query.
     *
     * @return string|null
     */
    public function getRefreshCursor(): ?string
    {
        return $this->refreshCursor;
    }
    /**
     * Anchor for the first group. Pass as ending_before to read groups sorting before it. Null for empty or ungrouped results. Ranking can change between reads; refresh by repeating the original query.
     *
     * @param string|null $refreshCursor
     *
     * @return self
     */
    public function setRefreshCursor(?string $refreshCursor): self
    {
        $this->initialized['refreshCursor'] = true;
        $this->refreshCursor = $refreshCursor;
        return $this;
    }
}
