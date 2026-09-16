<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlistRow
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
     * True on the row describing your own workspace's sending.
     *
     * @var bool|null
     */
    protected $isWorkspace;
    /**
     * The brand's name as it was when the brand was added to the watchlist.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The brand's industry as it was when the brand was added, or null when the brand is not classified.
     *
     * @var string|null
     */
    protected $industry;
    /**
     * The domains the brand's figures describe. Always one domain today: a brand is tracked by the single one the panel sees the most of its mail from, so a brand that splits its mail across several domains reports less than its full volume.
     * 
     *
     * @var list<string>|null
     */
    protected $sendingDomains;
    /**
     * A sending platform observed on the domain, or null when the panel has none on record. A brand sending through more than one platform reports one of them rather than the list. This is frequently unavailable and updates monthly at best, so treat its absence as normal rather than as pending. Populated only when you read a single brand; on the watchlist it is always null.
     * 
     *
     * @var string|null
     */
    protected $esp;
    /**
     * Estimated number of addresses the brand mails, or null when the panel has no estimate. Populated only when you read a single brand; on the watchlist it is always null.
     * 
     *
     * @var int|null
     */
    protected $listSize;
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
     * Messages sent in the period.
     *
     * @var int|null
     */
    protected $sends;
    /**
     * Change in send volume against the period immediately before this one, as a percentage. Null when the earlier period has nothing to compare against.
     * 
     *
     * @var float|null
     */
    protected $sendsChangePercent;
    /**
     * Average campaigns sent per week over the period.
     *
     * @var float|null
     */
    protected $cadencePerWeek;
    /**
     * Share of the brand's observed mail that reached an inbox rather than a spam folder.
     * 
     *
     * @var float|null
     */
    protected $inboxPlacementRate;
    /**
     * Share of delivered mail that was read.
     *
     * @var float|null
     */
    protected $readRate;
    /**
     * Share of your own audience the panel also sees receiving this brand's mail. Null on your own row, and null for a competitor the panel measured no overlap with, which is an answer rather than a gap.
     * 
     *
     * @var float|null
     */
    protected $audienceOverlapRate;
    /**
     * The most recent campaign observed in the period, or null when none was. Always null on your own row.
     * 
     *
     * @var EmailCompetitiveWatchlistRowLastCampaign|null
     */
    protected $lastCampaign;
    /**
     * Where each figure on the row came from, so a comparison can be labelled
     * honestly. Every field on a competitor's row is a panel estimate. On your own
     * row the source varies by field: what is counted directly is reported as measured,
     * falls back to the panel for what is not, and reports `none` for a field this row
     * never carries at all.
     * 
     * Read rate is a panel estimate even on your own row. Comparing a measured rate
     * against a panel estimate of the same rate is not a like for like
     * comparison, because the two count an open differently, so both sides of the
     * comparison come from the panel.
     * 
     *
     * @var EmailCompetitiveWatchlistRowProvenance|null
     */
    protected $provenance;
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
     * True on the row describing your own workspace's sending.
     *
     * @return bool|null
     */
    public function getIsWorkspace(): ?bool
    {
        return $this->isWorkspace;
    }
    /**
     * True on the row describing your own workspace's sending.
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
     * The brand's name as it was when the brand was added to the watchlist.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The brand's name as it was when the brand was added to the watchlist.
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
     * The brand's industry as it was when the brand was added, or null when the brand is not classified.
     *
     * @return string|null
     */
    public function getIndustry(): ?string
    {
        return $this->industry;
    }
    /**
     * The brand's industry as it was when the brand was added, or null when the brand is not classified.
     *
     * @param string|null $industry
     *
     * @return self
     */
    public function setIndustry(?string $industry): self
    {
        $this->initialized['industry'] = true;
        $this->industry = $industry;
        return $this;
    }
    /**
     * The domains the brand's figures describe. Always one domain today: a brand is tracked by the single one the panel sees the most of its mail from, so a brand that splits its mail across several domains reports less than its full volume.
     * 
     *
     * @return list<string>|null
     */
    public function getSendingDomains(): ?array
    {
        return $this->sendingDomains;
    }
    /**
     * The domains the brand's figures describe. Always one domain today: a brand is tracked by the single one the panel sees the most of its mail from, so a brand that splits its mail across several domains reports less than its full volume.
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
     * A sending platform observed on the domain, or null when the panel has none on record. A brand sending through more than one platform reports one of them rather than the list. This is frequently unavailable and updates monthly at best, so treat its absence as normal rather than as pending. Populated only when you read a single brand; on the watchlist it is always null.
     * 
     *
     * @return string|null
     */
    public function getEsp(): ?string
    {
        return $this->esp;
    }
    /**
     * A sending platform observed on the domain, or null when the panel has none on record. A brand sending through more than one platform reports one of them rather than the list. This is frequently unavailable and updates monthly at best, so treat its absence as normal rather than as pending. Populated only when you read a single brand; on the watchlist it is always null.
     *
     * @param string|null $esp
     *
     * @return self
     */
    public function setEsp(?string $esp): self
    {
        $this->initialized['esp'] = true;
        $this->esp = $esp;
        return $this;
    }
    /**
     * Estimated number of addresses the brand mails, or null when the panel has no estimate. Populated only when you read a single brand; on the watchlist it is always null.
     * 
     *
     * @return int|null
     */
    public function getListSize(): ?int
    {
        return $this->listSize;
    }
    /**
     * Estimated number of addresses the brand mails, or null when the panel has no estimate. Populated only when you read a single brand; on the watchlist it is always null.
     *
     * @param int|null $listSize
     *
     * @return self
     */
    public function setListSize(?int $listSize): self
    {
        $this->initialized['listSize'] = true;
        $this->listSize = $listSize;
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
     * Messages sent in the period.
     *
     * @return int|null
     */
    public function getSends(): ?int
    {
        return $this->sends;
    }
    /**
     * Messages sent in the period.
     *
     * @param int|null $sends
     *
     * @return self
     */
    public function setSends(?int $sends): self
    {
        $this->initialized['sends'] = true;
        $this->sends = $sends;
        return $this;
    }
    /**
     * Change in send volume against the period immediately before this one, as a percentage. Null when the earlier period has nothing to compare against.
     * 
     *
     * @return float|null
     */
    public function getSendsChangePercent(): ?float
    {
        return $this->sendsChangePercent;
    }
    /**
     * Change in send volume against the period immediately before this one, as a percentage. Null when the earlier period has nothing to compare against.
     *
     * @param float|null $sendsChangePercent
     *
     * @return self
     */
    public function setSendsChangePercent(?float $sendsChangePercent): self
    {
        $this->initialized['sendsChangePercent'] = true;
        $this->sendsChangePercent = $sendsChangePercent;
        return $this;
    }
    /**
     * Average campaigns sent per week over the period.
     *
     * @return float|null
     */
    public function getCadencePerWeek(): ?float
    {
        return $this->cadencePerWeek;
    }
    /**
     * Average campaigns sent per week over the period.
     *
     * @param float|null $cadencePerWeek
     *
     * @return self
     */
    public function setCadencePerWeek(?float $cadencePerWeek): self
    {
        $this->initialized['cadencePerWeek'] = true;
        $this->cadencePerWeek = $cadencePerWeek;
        return $this;
    }
    /**
     * Share of the brand's observed mail that reached an inbox rather than a spam folder.
     * 
     *
     * @return float|null
     */
    public function getInboxPlacementRate(): ?float
    {
        return $this->inboxPlacementRate;
    }
    /**
     * Share of the brand's observed mail that reached an inbox rather than a spam folder.
     *
     * @param float|null $inboxPlacementRate
     *
     * @return self
     */
    public function setInboxPlacementRate(?float $inboxPlacementRate): self
    {
        $this->initialized['inboxPlacementRate'] = true;
        $this->inboxPlacementRate = $inboxPlacementRate;
        return $this;
    }
    /**
     * Share of delivered mail that was read.
     *
     * @return float|null
     */
    public function getReadRate(): ?float
    {
        return $this->readRate;
    }
    /**
     * Share of delivered mail that was read.
     *
     * @param float|null $readRate
     *
     * @return self
     */
    public function setReadRate(?float $readRate): self
    {
        $this->initialized['readRate'] = true;
        $this->readRate = $readRate;
        return $this;
    }
    /**
     * Share of your own audience the panel also sees receiving this brand's mail. Null on your own row, and null for a competitor the panel measured no overlap with, which is an answer rather than a gap.
     * 
     *
     * @return float|null
     */
    public function getAudienceOverlapRate(): ?float
    {
        return $this->audienceOverlapRate;
    }
    /**
     * Share of your own audience the panel also sees receiving this brand's mail. Null on your own row, and null for a competitor the panel measured no overlap with, which is an answer rather than a gap.
     *
     * @param float|null $audienceOverlapRate
     *
     * @return self
     */
    public function setAudienceOverlapRate(?float $audienceOverlapRate): self
    {
        $this->initialized['audienceOverlapRate'] = true;
        $this->audienceOverlapRate = $audienceOverlapRate;
        return $this;
    }
    /**
     * The most recent campaign observed in the period, or null when none was. Always null on your own row.
     * 
     *
     * @return EmailCompetitiveWatchlistRowLastCampaign|null
     */
    public function getLastCampaign(): ?EmailCompetitiveWatchlistRowLastCampaign
    {
        return $this->lastCampaign;
    }
    /**
     * The most recent campaign observed in the period, or null when none was. Always null on your own row.
     *
     * @param EmailCompetitiveWatchlistRowLastCampaign|null $lastCampaign
     *
     * @return self
     */
    public function setLastCampaign(?EmailCompetitiveWatchlistRowLastCampaign $lastCampaign): self
    {
        $this->initialized['lastCampaign'] = true;
        $this->lastCampaign = $lastCampaign;
        return $this;
    }
    /**
     * Where each figure on the row came from, so a comparison can be labelled
     * honestly. Every field on a competitor's row is a panel estimate. On your own
     * row the source varies by field: what is counted directly is reported as measured,
     * falls back to the panel for what is not, and reports `none` for a field this row
     * never carries at all.
     * 
     * Read rate is a panel estimate even on your own row. Comparing a measured rate
     * against a panel estimate of the same rate is not a like for like
     * comparison, because the two count an open differently, so both sides of the
     * comparison come from the panel.
     * 
     *
     * @return EmailCompetitiveWatchlistRowProvenance|null
     */
    public function getProvenance(): ?EmailCompetitiveWatchlistRowProvenance
    {
        return $this->provenance;
    }
    /**
    * Where each figure on the row came from, so a comparison can be labelled
    honestly. Every field on a competitor's row is a panel estimate. On your own
    row the source varies by field: what is counted directly is reported as measured,
    falls back to the panel for what is not, and reports `none` for a field this row
    never carries at all.
    
    Read rate is a panel estimate even on your own row. Comparing a measured rate
    against a panel estimate of the same rate is not a like for like
    comparison, because the two count an open differently, so both sides of the
    comparison come from the panel.
    
    *
    * @param EmailCompetitiveWatchlistRowProvenance|null $provenance
    *
    * @return self
    */
    public function setProvenance(?EmailCompetitiveWatchlistRowProvenance $provenance): self
    {
        $this->initialized['provenance'] = true;
        $this->provenance = $provenance;
        return $this;
    }
}
