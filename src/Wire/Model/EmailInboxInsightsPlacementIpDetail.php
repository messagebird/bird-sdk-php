<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacementIpDetail
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
     * The sending IP address.
     *
     * @var string|null
     */
    protected $ip;
    /**
     * Share of this IP's measured placements that landed in the inbox, as a percentage.
     *
     * @var float|null
     */
    protected $inboxRatePercent;
    /**
     * Raw measured placements behind a set of rates, before any weighting. A measured placement is one message whose mailbox destination the measurement observed.
     * 
     *
     * @var EmailInboxInsightsPlacementCounts|null
     */
    protected $rawCounts;
    /**
     * Share of this IP's measured mail that passed SPF, as a percentage.
     *
     * @var float|null
     */
    protected $spfPassRatePercent;
    /**
     * Share of this IP's measured mail that passed DKIM, as a percentage.
     *
     * @var float|null
     */
    protected $dkimPassRatePercent;
    /**
     * The sending IP address.
     *
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }
    /**
     * The sending IP address.
     *
     * @param string|null $ip
     *
     * @return self
     */
    public function setIp(?string $ip): self
    {
        $this->initialized['ip'] = true;
        $this->ip = $ip;
        return $this;
    }
    /**
     * Share of this IP's measured placements that landed in the inbox, as a percentage.
     *
     * @return float|null
     */
    public function getInboxRatePercent(): ?float
    {
        return $this->inboxRatePercent;
    }
    /**
     * Share of this IP's measured placements that landed in the inbox, as a percentage.
     *
     * @param float|null $inboxRatePercent
     *
     * @return self
     */
    public function setInboxRatePercent(?float $inboxRatePercent): self
    {
        $this->initialized['inboxRatePercent'] = true;
        $this->inboxRatePercent = $inboxRatePercent;
        return $this;
    }
    /**
     * Raw measured placements behind a set of rates, before any weighting. A measured placement is one message whose mailbox destination the measurement observed.
     * 
     *
     * @return EmailInboxInsightsPlacementCounts|null
     */
    public function getRawCounts(): ?EmailInboxInsightsPlacementCounts
    {
        return $this->rawCounts;
    }
    /**
     * Raw measured placements behind a set of rates, before any weighting. A measured placement is one message whose mailbox destination the measurement observed.
     *
     * @param EmailInboxInsightsPlacementCounts|null $rawCounts
     *
     * @return self
     */
    public function setRawCounts(?EmailInboxInsightsPlacementCounts $rawCounts): self
    {
        $this->initialized['rawCounts'] = true;
        $this->rawCounts = $rawCounts;
        return $this;
    }
    /**
     * Share of this IP's measured mail that passed SPF, as a percentage.
     *
     * @return float|null
     */
    public function getSpfPassRatePercent(): ?float
    {
        return $this->spfPassRatePercent;
    }
    /**
     * Share of this IP's measured mail that passed SPF, as a percentage.
     *
     * @param float|null $spfPassRatePercent
     *
     * @return self
     */
    public function setSpfPassRatePercent(?float $spfPassRatePercent): self
    {
        $this->initialized['spfPassRatePercent'] = true;
        $this->spfPassRatePercent = $spfPassRatePercent;
        return $this;
    }
    /**
     * Share of this IP's measured mail that passed DKIM, as a percentage.
     *
     * @return float|null
     */
    public function getDkimPassRatePercent(): ?float
    {
        return $this->dkimPassRatePercent;
    }
    /**
     * Share of this IP's measured mail that passed DKIM, as a percentage.
     *
     * @param float|null $dkimPassRatePercent
     *
     * @return self
     */
    public function setDkimPassRatePercent(?float $dkimPassRatePercent): self
    {
        $this->initialized['dkimPassRatePercent'] = true;
        $this->dkimPassRatePercent = $dkimPassRatePercent;
        return $this;
    }
}
