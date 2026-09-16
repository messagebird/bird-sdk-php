<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveNotableFeed
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
     * Up to 100 campaigns selected across watched brands. Selection takes turns across
     * brands in watchlist order until the response is full, prioritizing spam placement,
     * biggest sends, then read-rate standouts within each brand. Within one signal, rows
     * compare the matching spam rate, volume ratio, or read rate descending; missing values
     * sort last and ties retain tracked-domain and source order. Selected rows are returned
     * in watchlist order, then biggest-send, read-rate, and spam signal order, followed by
     * tracked-domain and source order.
     * 
     * One campaign may appear once per signal because each row carries different evidence.
     * Empty when nothing qualified; check `panel_status` to distinguish that from an
     * unavailable panel.
     * 
     *
     * @var list<EmailCompetitiveNotableCampaign>|null
     */
    protected $data;
    /**
     * Whether Bird omitted eligible panel findings to keep this response to 100 rows. False does not promise that the panel observed every qualifying campaign in the period.
     * 
     *
     * @var bool|null
     */
    protected $truncated;
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
     * Up to 100 campaigns selected across watched brands. Selection takes turns across
     * brands in watchlist order until the response is full, prioritizing spam placement,
     * biggest sends, then read-rate standouts within each brand. Within one signal, rows
     * compare the matching spam rate, volume ratio, or read rate descending; missing values
     * sort last and ties retain tracked-domain and source order. Selected rows are returned
     * in watchlist order, then biggest-send, read-rate, and spam signal order, followed by
     * tracked-domain and source order.
     * 
     * One campaign may appear once per signal because each row carries different evidence.
     * Empty when nothing qualified; check `panel_status` to distinguish that from an
     * unavailable panel.
     * 
     *
     * @return list<EmailCompetitiveNotableCampaign>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
    * Up to 100 campaigns selected across watched brands. Selection takes turns across
    brands in watchlist order until the response is full, prioritizing spam placement,
    biggest sends, then read-rate standouts within each brand. Within one signal, rows
    compare the matching spam rate, volume ratio, or read rate descending; missing values
    sort last and ties retain tracked-domain and source order. Selected rows are returned
    in watchlist order, then biggest-send, read-rate, and spam signal order, followed by
    tracked-domain and source order.
    
    One campaign may appear once per signal because each row carries different evidence.
    Empty when nothing qualified; check `panel_status` to distinguish that from an
    unavailable panel.
    
    *
    * @param list<EmailCompetitiveNotableCampaign>|null $data
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
     * Whether Bird omitted eligible panel findings to keep this response to 100 rows. False does not promise that the panel observed every qualifying campaign in the period.
     * 
     *
     * @return bool|null
     */
    public function getTruncated(): ?bool
    {
        return $this->truncated;
    }
    /**
     * Whether Bird omitted eligible panel findings to keep this response to 100 rows. False does not promise that the panel observed every qualifying campaign in the period.
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
}
