<?php

namespace MessageBird\Wire\Model;

/**
 * Per-Brand breakdown for the requested period, ranked by the `sort` metric (default `processed`) descending and paginated with the requested `limit` (default 50, max 200).
 */
class EmailStatsByBrandResponse extends \ArrayObject
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
     * The window this Brand breakdown was actually computed against. Bounds are either inclusive calendar days (YYYY-MM-DD in the requested `timezone`, UTC when omitted) or RFC 3339 UTC instants marking the starts of the first and last included 15-minute quarters (aligned to local quarter-hour boundaries when `timezone` is set).
     * 
     *
     * @var EmailStatsBrandPeriod|null
     */
    protected $period;
    /**
     * Brand breakdown rows, ranked by the `sort` metric (default `processed`) descending. Includes a row with `brand_id` set to `null` when historical unbranded traffic occurred in the period.
     *
     * @var list<EmailBrandStatsPoint>|null
     */
    protected $data;
    /**
     * Total number of distinct Brand groups with activity in the period (including the `null` unbranded group when present), regardless of `limit`. Pass `next_cursor` as `starting_after` to request the next page.
     * 
     *
     * @var int|null
     */
    protected $total;
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. `null` when no next page exists.
     *
     * @var string|null
     */
    protected $nextCursor;
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. `null` when no previous page exists.
     *
     * @var string|null
     */
    protected $prevCursor;
    /**
     * Refresh anchor, the first row of this response. Pass back as `ending_before` to fetch what precedes it in the current sort order. On a newest-first sort those are the items that have appeared since; on any other sort they are the items that sort earlier, so refreshing such a list means re-fetching it instead. Non-`null` whenever `data` is non-empty; `null` only on an empty page. Distinct from `prev_cursor`.
     *
     * @var string|null
     */
    protected $refreshCursor;
    /**
     * The window this Brand breakdown was actually computed against. Bounds are either inclusive calendar days (YYYY-MM-DD in the requested `timezone`, UTC when omitted) or RFC 3339 UTC instants marking the starts of the first and last included 15-minute quarters (aligned to local quarter-hour boundaries when `timezone` is set).
     * 
     *
     * @return EmailStatsBrandPeriod|null
     */
    public function getPeriod(): ?EmailStatsBrandPeriod
    {
        return $this->period;
    }
    /**
     * The window this Brand breakdown was actually computed against. Bounds are either inclusive calendar days (YYYY-MM-DD in the requested `timezone`, UTC when omitted) or RFC 3339 UTC instants marking the starts of the first and last included 15-minute quarters (aligned to local quarter-hour boundaries when `timezone` is set).
     *
     * @param EmailStatsBrandPeriod|null $period
     *
     * @return self
     */
    public function setPeriod(?EmailStatsBrandPeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * Brand breakdown rows, ranked by the `sort` metric (default `processed`) descending. Includes a row with `brand_id` set to `null` when historical unbranded traffic occurred in the period.
     *
     * @return list<EmailBrandStatsPoint>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Brand breakdown rows, ranked by the `sort` metric (default `processed`) descending. Includes a row with `brand_id` set to `null` when historical unbranded traffic occurred in the period.
     *
     * @param list<EmailBrandStatsPoint>|null $data
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
     * Total number of distinct Brand groups with activity in the period (including the `null` unbranded group when present), regardless of `limit`. Pass `next_cursor` as `starting_after` to request the next page.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of distinct Brand groups with activity in the period (including the `null` unbranded group when present), regardless of `limit`. Pass `next_cursor` as `starting_after` to request the next page.
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
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. `null` when no next page exists.
     *
     * @return string|null
     */
    public function getNextCursor(): ?string
    {
        return $this->nextCursor;
    }
    /**
     * Cursor for the next page. Pass back as `starting_after` to advance forward. `null` when no next page exists.
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
     * Cursor for the previous page. Pass back as `ending_before` to step backward. `null` when no previous page exists.
     *
     * @return string|null
     */
    public function getPrevCursor(): ?string
    {
        return $this->prevCursor;
    }
    /**
     * Cursor for the previous page. Pass back as `ending_before` to step backward. `null` when no previous page exists.
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
     * Refresh anchor, the first row of this response. Pass back as `ending_before` to fetch what precedes it in the current sort order. On a newest-first sort those are the items that have appeared since; on any other sort they are the items that sort earlier, so refreshing such a list means re-fetching it instead. Non-`null` whenever `data` is non-empty; `null` only on an empty page. Distinct from `prev_cursor`.
     *
     * @return string|null
     */
    public function getRefreshCursor(): ?string
    {
        return $this->refreshCursor;
    }
    /**
     * Refresh anchor, the first row of this response. Pass back as `ending_before` to fetch what precedes it in the current sort order. On a newest-first sort those are the items that have appeared since; on any other sort they are the items that sort earlier, so refreshing such a list means re-fetching it instead. Non-`null` whenever `data` is non-empty; `null` only on an empty page. Distinct from `prev_cursor`.
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
