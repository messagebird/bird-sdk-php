<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsBlocklistTarget
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
     * The sending IP or domain selected for lookup.
     *
     * @var string|null
     */
    protected $target;
    /**
     * Whether this target is an IP address or a hostname. Null when the measurement did not report a kind for it, which is possible on a target whose check did not complete.
     * 
     *
     * @var string|null
     */
    protected $targetType;
    /**
     * Whether the target is on at least one blocklist right now. Meaningful only when `status` is `ok`: on any other status this target was not checked, so the value carries no finding either way.
     * 
     *
     * @var bool|null
     */
    protected $isListed;
    /**
     * Whether a section of the response carries figures, and when it does not, why.
     * 
     * `ok` means the section is populated. `no_data` means the measurement ran and
     * observed nothing to report for this domain in the period. `not_configured`
     * means the section needs a setup step that has not been completed yet, such as
     * connecting Google Postmaster Tools; treat it as an invitation to finish
     * setup rather than a fault. `unavailable` means the figures could not be retrieved this time and
     * the same request may well succeed on a retry; the rest of the response is
     * unaffected. `not_applicable` means the section is meaningless for this domain
     * in this period, so there is nothing to show or fix.
     * 
     * A successful response never implies every section is populated; read each
     * section's status rather than assuming figures are present.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When this target was looked up, or null when it was not. Per target rather than per response, because each is a separate live lookup.
     * 
     *
     * @var \DateTime|null
     */
    protected $checkedAt;
    /**
     * Listings seen against this target, including ones that have since cleared, so a recent history is visible even when nothing is active. Read each listing's `is_active` rather than assuming every entry is current.
     * 
     *
     * @var list<EmailInboxInsightsBlocklistListing>|null
     */
    protected $listings;
    /**
     * The sending IP or domain selected for lookup.
     *
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }
    /**
     * The sending IP or domain selected for lookup.
     *
     * @param string|null $target
     *
     * @return self
     */
    public function setTarget(?string $target): self
    {
        $this->initialized['target'] = true;
        $this->target = $target;
        return $this;
    }
    /**
     * Whether this target is an IP address or a hostname. Null when the measurement did not report a kind for it, which is possible on a target whose check did not complete.
     * 
     *
     * @return string|null
     */
    public function getTargetType(): ?string
    {
        return $this->targetType;
    }
    /**
     * Whether this target is an IP address or a hostname. Null when the measurement did not report a kind for it, which is possible on a target whose check did not complete.
     *
     * @param string|null $targetType
     *
     * @return self
     */
    public function setTargetType(?string $targetType): self
    {
        $this->initialized['targetType'] = true;
        $this->targetType = $targetType;
        return $this;
    }
    /**
     * Whether the target is on at least one blocklist right now. Meaningful only when `status` is `ok`: on any other status this target was not checked, so the value carries no finding either way.
     * 
     *
     * @return bool|null
     */
    public function getIsListed(): ?bool
    {
        return $this->isListed;
    }
    /**
     * Whether the target is on at least one blocklist right now. Meaningful only when `status` is `ok`: on any other status this target was not checked, so the value carries no finding either way.
     *
     * @param bool|null $isListed
     *
     * @return self
     */
    public function setIsListed(?bool $isListed): self
    {
        $this->initialized['isListed'] = true;
        $this->isListed = $isListed;
        return $this;
    }
    /**
     * Whether a section of the response carries figures, and when it does not, why.
     * 
     * `ok` means the section is populated. `no_data` means the measurement ran and
     * observed nothing to report for this domain in the period. `not_configured`
     * means the section needs a setup step that has not been completed yet, such as
     * connecting Google Postmaster Tools; treat it as an invitation to finish
     * setup rather than a fault. `unavailable` means the figures could not be retrieved this time and
     * the same request may well succeed on a retry; the rest of the response is
     * unaffected. `not_applicable` means the section is meaningless for this domain
     * in this period, so there is nothing to show or fix.
     * 
     * A successful response never implies every section is populated; read each
     * section's status rather than assuming figures are present.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether a section of the response carries figures, and when it does not, why.
    
    `ok` means the section is populated. `no_data` means the measurement ran and
    observed nothing to report for this domain in the period. `not_configured`
    means the section needs a setup step that has not been completed yet, such as
    connecting Google Postmaster Tools; treat it as an invitation to finish
    setup rather than a fault. `unavailable` means the figures could not be retrieved this time and
    the same request may well succeed on a retry; the rest of the response is
    unaffected. `not_applicable` means the section is meaningless for this domain
    in this period, so there is nothing to show or fix.
    
    A successful response never implies every section is populated; read each
    section's status rather than assuming figures are present.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When this target was looked up, or null when it was not. Per target rather than per response, because each is a separate live lookup.
     * 
     *
     * @return \DateTime|null
     */
    public function getCheckedAt(): ?\DateTime
    {
        return $this->checkedAt;
    }
    /**
     * When this target was looked up, or null when it was not. Per target rather than per response, because each is a separate live lookup.
     *
     * @param \DateTime|null $checkedAt
     *
     * @return self
     */
    public function setCheckedAt(?\DateTime $checkedAt): self
    {
        $this->initialized['checkedAt'] = true;
        $this->checkedAt = $checkedAt;
        return $this;
    }
    /**
     * Listings seen against this target, including ones that have since cleared, so a recent history is visible even when nothing is active. Read each listing's `is_active` rather than assuming every entry is current.
     * 
     *
     * @return list<EmailInboxInsightsBlocklistListing>|null
     */
    public function getListings(): ?array
    {
        return $this->listings;
    }
    /**
     * Listings seen against this target, including ones that have since cleared, so a recent history is visible even when nothing is active. Read each listing's `is_active` rather than assuming every entry is current.
     *
     * @param list<EmailInboxInsightsBlocklistListing>|null $listings
     *
     * @return self
     */
    public function setListings(?array $listings): self
    {
        $this->initialized['listings'] = true;
        $this->listings = $listings;
        return $this;
    }
}
