<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveCampaignFeed extends \ArrayObject
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
     * Whether panel figures are available for a row, and when they are not, why.
     * 
     * `ok` means the panel reported figures for the requested period. `not_in_panel`
     * means the panel does not track the sending domain at all, which is common for
     * smaller and newer senders. `no_data` means the panel tracks the domain but
     * observed no mail from it in the period. `unavailable` means the figures could
     * not be retrieved this time and the same request may well succeed on a retry.
     * 
     *
     * @var string|null
     */
    protected $panelStatus;
    /**
     * Number of eligible campaigns in the first 300 newest panel rows for each tracked domain. This sampled value is independent of the returned page.
     * 
     *
     * @var int|null
     */
    protected $captured;
    /**
     * Fraction of captured campaigns whose subject leads with a discount. Null when captured is zero. This sampled value is independent of the returned page.
     * 
     *
     * @var float|null
     */
    protected $promoRate;
    /**
     * Whether the sampled statistics or returned page omit part of the requested collection. Use next_cursor to determine whether another page is available.
     * 
     *
     * @var bool|null
     */
    protected $truncated;
    /**
     * Campaigns in this page, in the requested order.
     *
     * @var list<EmailCompetitiveCampaign>|null
     */
    protected $data;
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
     * Whether panel figures are available for a row, and when they are not, why.
     * 
     * `ok` means the panel reported figures for the requested period. `not_in_panel`
     * means the panel does not track the sending domain at all, which is common for
     * smaller and newer senders. `no_data` means the panel tracks the domain but
     * observed no mail from it in the period. `unavailable` means the figures could
     * not be retrieved this time and the same request may well succeed on a retry.
     * 
     *
     * @return string|null
     */
    public function getPanelStatus(): ?string
    {
        return $this->panelStatus;
    }
    /**
    * Whether panel figures are available for a row, and when they are not, why.
    
    `ok` means the panel reported figures for the requested period. `not_in_panel`
    means the panel does not track the sending domain at all, which is common for
    smaller and newer senders. `no_data` means the panel tracks the domain but
    observed no mail from it in the period. `unavailable` means the figures could
    not be retrieved this time and the same request may well succeed on a retry.
    
    *
    * @param string|null $panelStatus
    *
    * @return self
    */
    public function setPanelStatus(?string $panelStatus): self
    {
        $this->initialized['panelStatus'] = true;
        $this->panelStatus = $panelStatus;
        return $this;
    }
    /**
     * Number of eligible campaigns in the first 300 newest panel rows for each tracked domain. This sampled value is independent of the returned page.
     * 
     *
     * @return int|null
     */
    public function getCaptured(): ?int
    {
        return $this->captured;
    }
    /**
     * Number of eligible campaigns in the first 300 newest panel rows for each tracked domain. This sampled value is independent of the returned page.
     *
     * @param int|null $captured
     *
     * @return self
     */
    public function setCaptured(?int $captured): self
    {
        $this->initialized['captured'] = true;
        $this->captured = $captured;
        return $this;
    }
    /**
     * Fraction of captured campaigns whose subject leads with a discount. Null when captured is zero. This sampled value is independent of the returned page.
     * 
     *
     * @return float|null
     */
    public function getPromoRate(): ?float
    {
        return $this->promoRate;
    }
    /**
     * Fraction of captured campaigns whose subject leads with a discount. Null when captured is zero. This sampled value is independent of the returned page.
     *
     * @param float|null $promoRate
     *
     * @return self
     */
    public function setPromoRate(?float $promoRate): self
    {
        $this->initialized['promoRate'] = true;
        $this->promoRate = $promoRate;
        return $this;
    }
    /**
     * Whether the sampled statistics or returned page omit part of the requested collection. Use next_cursor to determine whether another page is available.
     * 
     *
     * @return bool|null
     */
    public function getTruncated(): ?bool
    {
        return $this->truncated;
    }
    /**
     * Whether the sampled statistics or returned page omit part of the requested collection. Use next_cursor to determine whether another page is available.
     *
     * @param bool|null $truncated
     *
     * @return self
     */
    public function setTruncated(?bool $truncated): self
    {
        $this->initialized['truncated'] = true;
        $this->truncated = $truncated;
        return $this;
    }
    /**
     * Campaigns in this page, in the requested order.
     *
     * @return list<EmailCompetitiveCampaign>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Campaigns in this page, in the requested order.
     *
     * @param list<EmailCompetitiveCampaign>|null $data
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
