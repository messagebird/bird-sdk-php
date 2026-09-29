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
     * The period the response describes. Most reports resolve a rolling window when
     * requested; send-time and notable reports can carry the panel's own window.
     * These bounds describe coverage, not a guarantee of measurement freshness.
     * 
     *
     * @var EmailCompetitivePeriod|null
     */
    protected $period;
    /**
     * One brand on the watchlist, with its figures for the requested period. Your own
     * workspace appears as a row too, so the table can be read as a single ranking.
     * 
     * Metrics are present on every row. Interpret `null` using each field's
     * description: it can mean unavailable, no observed campaign, or no overlap
     * returned by the panel. A `0` is a measurement rather than a gap.
     * 
     * Your measured sends and cadence cover the workspace. Your panel rates and
     * overlap describe only its highest-volume sending domain.
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
     * One brand on the watchlist, with its figures for the requested period. Your own
     * workspace appears as a row too, so the table can be read as a single ranking.
     * 
     * Metrics are present on every row. Interpret `null` using each field's
     * description: it can mean unavailable, no observed campaign, or no overlap
     * returned by the panel. A `0` is a measurement rather than a gap.
     * 
     * Your measured sends and cadence cover the workspace. Your panel rates and
     * overlap describe only its highest-volume sending domain.
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
    
    Metrics are present on every row. Interpret `null` using each field's
    description: it can mean unavailable, no observed campaign, or no overlap
    returned by the panel. A `0` is a measurement rather than a gap.
    
    Your measured sends and cadence cover the workspace. Your panel rates and
    overlap describe only its highest-volume sending domain.
    
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
