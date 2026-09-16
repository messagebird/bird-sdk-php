<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveBrandProfile
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
     * One brand on the watchlist, with its figures for the requested period. Your own
     * workspace appears as a row too, so the table can be read as a single ranking.
     * 
     * Every metric is present on every row and is `null` when it is unavailable for
     * that brand, so a `0` is always a real measurement rather than a gap. Check
     * `panel_status` for why a metric is null.
     * 
     * `esp` and `list_size` are the exception. They are populated only when you read a
     * single brand, and are always `null` on the watchlist whatever `panel_status`
     * reports.
     * 
     *
     * @var EmailCompetitiveWatchlistRow|null
     */
    protected $brand;
    /**
     * Placement per mailbox provider, in the order the panel returned them. Empty when the panel published no breakdown for the brand's domains.
     * 
     *
     * @var list<EmailCompetitiveProviderPlacement>|null
     */
    protected $providers;
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
     * One brand on the watchlist, with its figures for the requested period. Your own
     * workspace appears as a row too, so the table can be read as a single ranking.
     * 
     * Every metric is present on every row and is `null` when it is unavailable for
     * that brand, so a `0` is always a real measurement rather than a gap. Check
     * `panel_status` for why a metric is null.
     * 
     * `esp` and `list_size` are the exception. They are populated only when you read a
     * single brand, and are always `null` on the watchlist whatever `panel_status`
     * reports.
     * 
     *
     * @return EmailCompetitiveWatchlistRow|null
     */
    public function getBrand(): ?EmailCompetitiveWatchlistRow
    {
        return $this->brand;
    }
    /**
    * One brand on the watchlist, with its figures for the requested period. Your own
    workspace appears as a row too, so the table can be read as a single ranking.
    
    Every metric is present on every row and is `null` when it is unavailable for
    that brand, so a `0` is always a real measurement rather than a gap. Check
    `panel_status` for why a metric is null.
    
    `esp` and `list_size` are the exception. They are populated only when you read a
    single brand, and are always `null` on the watchlist whatever `panel_status`
    reports.
    
    *
    * @param EmailCompetitiveWatchlistRow|null $brand
    *
    * @return self
    */
    public function setBrand(?EmailCompetitiveWatchlistRow $brand): self
    {
        $this->initialized['brand'] = true;
        $this->brand = $brand;
        return $this;
    }
    /**
     * Placement per mailbox provider, in the order the panel returned them. Empty when the panel published no breakdown for the brand's domains.
     * 
     *
     * @return list<EmailCompetitiveProviderPlacement>|null
     */
    public function getProviders(): ?array
    {
        return $this->providers;
    }
    /**
     * Placement per mailbox provider, in the order the panel returned them. Empty when the panel published no breakdown for the brand's domains.
     *
     * @param list<EmailCompetitiveProviderPlacement>|null $providers
     *
     * @return self
     */
    public function setProviders(?array $providers): self
    {
        $this->initialized['providers'] = true;
        $this->providers = $providers;
        return $this;
    }
}
