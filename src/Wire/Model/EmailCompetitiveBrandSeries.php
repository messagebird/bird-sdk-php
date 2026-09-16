<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveBrandSeries
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
     * @var string|null
     */
    protected $watchlistBrandId;
    /**
     * True on the line describing your own workspace's sending.
     *
     * @var bool|null
     */
    protected $isWorkspace;
    /**
     * Label for the line: the brand's name, or your sending domain on your own line.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The sending domains the line's figures describe. Always one domain today.
     *
     * @var list<string>|null
     */
    protected $sendingDomains;
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
     * Where a figure came from. `measured` means it is counted from your own
     * sending. `panel` means it is an estimate from an email panel, which observes a
     * sample of real inboxes and scales what it sees up to a whole audience. `none`
     * means there is no figure for this field on this row, so there is nothing to
     * attribute a source to.
     * 
     * Only your own row carries `measured` figures, and only where the metric is counted
     * rather than estimated. Everything about a competitor is a panel estimate.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * One point per day of the period, oldest first, ending with the last whole UTC day rather than the one in progress. A domain the panel tracks but observed nothing for plots as zeros, which is a measured silence rather than a missing measurement. Points are empty only when there was nothing to plot at all, reported by `panel_status` as `not_in_panel` or `unavailable`.
     * 
     *
     * @var list<EmailCompetitiveVolumePoint>|null
     */
    protected $points;
    /**
     * @return string|null
     */
    public function getWatchlistBrandId(): ?string
    {
        return $this->watchlistBrandId;
    }
    /**
     * @param string|null $watchlistBrandId
     *
     * @return self
     */
    public function setWatchlistBrandId(?string $watchlistBrandId): self
    {
        $this->initialized['watchlistBrandId'] = true;
        $this->watchlistBrandId = $watchlistBrandId;
        return $this;
    }
    /**
     * True on the line describing your own workspace's sending.
     *
     * @return bool|null
     */
    public function getIsWorkspace(): ?bool
    {
        return $this->isWorkspace;
    }
    /**
     * True on the line describing your own workspace's sending.
     *
     * @param bool|null $isWorkspace
     *
     * @return self
     */
    public function setIsWorkspace(?bool $isWorkspace): self
    {
        $this->initialized['isWorkspace'] = true;
        $this->isWorkspace = $isWorkspace;
        return $this;
    }
    /**
     * Label for the line: the brand's name, or your sending domain on your own line.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Label for the line: the brand's name, or your sending domain on your own line.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The sending domains the line's figures describe. Always one domain today.
     *
     * @return list<string>|null
     */
    public function getSendingDomains(): ?array
    {
        return $this->sendingDomains;
    }
    /**
     * The sending domains the line's figures describe. Always one domain today.
     *
     * @param list<string>|null $sendingDomains
     *
     * @return self
     */
    public function setSendingDomains(?array $sendingDomains): self
    {
        $this->initialized['sendingDomains'] = true;
        $this->sendingDomains = $sendingDomains;
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
     * Where a figure came from. `measured` means it is counted from your own
     * sending. `panel` means it is an estimate from an email panel, which observes a
     * sample of real inboxes and scales what it sees up to a whole audience. `none`
     * means there is no figure for this field on this row, so there is nothing to
     * attribute a source to.
     * 
     * Only your own row carries `measured` figures, and only where the metric is counted
     * rather than estimated. Everything about a competitor is a panel estimate.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
    * Where a figure came from. `measured` means it is counted from your own
    sending. `panel` means it is an estimate from an email panel, which observes a
    sample of real inboxes and scales what it sees up to a whole audience. `none`
    means there is no figure for this field on this row, so there is nothing to
    attribute a source to.
    
    Only your own row carries `measured` figures, and only where the metric is counted
    rather than estimated. Everything about a competitor is a panel estimate.
    
    *
    * @param string|null $source
    *
    * @return self
    */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * One point per day of the period, oldest first, ending with the last whole UTC day rather than the one in progress. A domain the panel tracks but observed nothing for plots as zeros, which is a measured silence rather than a missing measurement. Points are empty only when there was nothing to plot at all, reported by `panel_status` as `not_in_panel` or `unavailable`.
     * 
     *
     * @return list<EmailCompetitiveVolumePoint>|null
     */
    public function getPoints(): ?array
    {
        return $this->points;
    }
    /**
     * One point per day of the period, oldest first, ending with the last whole UTC day rather than the one in progress. A domain the panel tracks but observed nothing for plots as zeros, which is a measured silence rather than a missing measurement. Points are empty only when there was nothing to plot at all, reported by `panel_status` as `not_in_panel` or `unavailable`.
     *
     * @param list<EmailCompetitiveVolumePoint>|null $points
     *
     * @return self
     */
    public function setPoints(?array $points): self
    {
        $this->initialized['points'] = true;
        $this->points = $points;
        return $this;
    }
}
