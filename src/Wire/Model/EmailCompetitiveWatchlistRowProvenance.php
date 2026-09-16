<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlistRowProvenance
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
    protected $sends;
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
    protected $cadencePerWeek;
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
    protected $inboxPlacementRate;
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
    protected $readRate;
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
    protected $audienceOverlapRate;
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
    protected $lastCampaign;
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
    public function getSends(): ?string
    {
        return $this->sends;
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
    * @param string|null $sends
    *
    * @return self
    */
    public function setSends(?string $sends): self
    {
        $this->initialized['sends'] = true;
        $this->sends = $sends;
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
    public function getCadencePerWeek(): ?string
    {
        return $this->cadencePerWeek;
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
    * @param string|null $cadencePerWeek
    *
    * @return self
    */
    public function setCadencePerWeek(?string $cadencePerWeek): self
    {
        $this->initialized['cadencePerWeek'] = true;
        $this->cadencePerWeek = $cadencePerWeek;
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
    public function getInboxPlacementRate(): ?string
    {
        return $this->inboxPlacementRate;
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
    * @param string|null $inboxPlacementRate
    *
    * @return self
    */
    public function setInboxPlacementRate(?string $inboxPlacementRate): self
    {
        $this->initialized['inboxPlacementRate'] = true;
        $this->inboxPlacementRate = $inboxPlacementRate;
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
    public function getReadRate(): ?string
    {
        return $this->readRate;
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
    * @param string|null $readRate
    *
    * @return self
    */
    public function setReadRate(?string $readRate): self
    {
        $this->initialized['readRate'] = true;
        $this->readRate = $readRate;
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
    public function getAudienceOverlapRate(): ?string
    {
        return $this->audienceOverlapRate;
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
    * @param string|null $audienceOverlapRate
    *
    * @return self
    */
    public function setAudienceOverlapRate(?string $audienceOverlapRate): self
    {
        $this->initialized['audienceOverlapRate'] = true;
        $this->audienceOverlapRate = $audienceOverlapRate;
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
    public function getLastCampaign(): ?string
    {
        return $this->lastCampaign;
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
    * @param string|null $lastCampaign
    *
    * @return self
    */
    public function setLastCampaign(?string $lastCampaign): self
    {
        $this->initialized['lastCampaign'] = true;
        $this->lastCampaign = $lastCampaign;
        return $this;
    }
}
