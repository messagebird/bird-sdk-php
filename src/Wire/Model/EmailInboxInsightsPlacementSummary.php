<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacementSummary
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
     * Estimated share of measured placements that landed in the inbox, as a percentage.
     *
     * @var float|null
     */
    protected $inboxRatePercent;
    /**
     * Estimated share of measured placements that landed in spam, as a percentage.
     *
     * @var float|null
     */
    protected $spamRatePercent;
    /**
     * Estimated share of measured sends that arrived in neither folder, as a percentage.
     *
     * @var float|null
     */
    protected $missingRatePercent;
    /**
     * The measured placements the rates above were computed over, or null when the summary has none: a period with no measured mail reports null here rather than four zeros, because a zero count is a real measurement and would read as "we looked and found nothing" for a domain nothing looked at. Read `status` alongside it.
     * 
     *
     * @var EmailInboxInsightsPlacementSummaryRawCounts|null
     */
    protected $rawCounts;
    /**
     * Estimated share of inbox-placed mail that was read, as a percentage, measured by the panel's dwell time. This is not an open rate; the two count different things and are not interchangeable.
     * 
     *
     * @var float|null
     */
    protected $readRatePercent;
    /**
     * How the domain-wide rates moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence means no comparable prior data, never zero change.
     * 
     *
     * @var EmailInboxInsightsPlacementDeltaPts|null
     */
    protected $deltaPts;
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
     * Estimated share of measured placements that landed in the inbox, as a percentage.
     *
     * @return float|null
     */
    public function getInboxRatePercent(): ?float
    {
        return $this->inboxRatePercent;
    }
    /**
     * Estimated share of measured placements that landed in the inbox, as a percentage.
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
     * Estimated share of measured placements that landed in spam, as a percentage.
     *
     * @return float|null
     */
    public function getSpamRatePercent(): ?float
    {
        return $this->spamRatePercent;
    }
    /**
     * Estimated share of measured placements that landed in spam, as a percentage.
     *
     * @param float|null $spamRatePercent
     *
     * @return self
     */
    public function setSpamRatePercent(?float $spamRatePercent): self
    {
        $this->initialized['spamRatePercent'] = true;
        $this->spamRatePercent = $spamRatePercent;
        return $this;
    }
    /**
     * Estimated share of measured sends that arrived in neither folder, as a percentage.
     *
     * @return float|null
     */
    public function getMissingRatePercent(): ?float
    {
        return $this->missingRatePercent;
    }
    /**
     * Estimated share of measured sends that arrived in neither folder, as a percentage.
     *
     * @param float|null $missingRatePercent
     *
     * @return self
     */
    public function setMissingRatePercent(?float $missingRatePercent): self
    {
        $this->initialized['missingRatePercent'] = true;
        $this->missingRatePercent = $missingRatePercent;
        return $this;
    }
    /**
     * The measured placements the rates above were computed over, or null when the summary has none: a period with no measured mail reports null here rather than four zeros, because a zero count is a real measurement and would read as "we looked and found nothing" for a domain nothing looked at. Read `status` alongside it.
     * 
     *
     * @return EmailInboxInsightsPlacementSummaryRawCounts|null
     */
    public function getRawCounts(): ?EmailInboxInsightsPlacementSummaryRawCounts
    {
        return $this->rawCounts;
    }
    /**
     * The measured placements the rates above were computed over, or null when the summary has none: a period with no measured mail reports null here rather than four zeros, because a zero count is a real measurement and would read as "we looked and found nothing" for a domain nothing looked at. Read `status` alongside it.
     *
     * @param EmailInboxInsightsPlacementSummaryRawCounts|null $rawCounts
     *
     * @return self
     */
    public function setRawCounts(?EmailInboxInsightsPlacementSummaryRawCounts $rawCounts): self
    {
        $this->initialized['rawCounts'] = true;
        $this->rawCounts = $rawCounts;
        return $this;
    }
    /**
     * Estimated share of inbox-placed mail that was read, as a percentage, measured by the panel's dwell time. This is not an open rate; the two count different things and are not interchangeable.
     * 
     *
     * @return float|null
     */
    public function getReadRatePercent(): ?float
    {
        return $this->readRatePercent;
    }
    /**
     * Estimated share of inbox-placed mail that was read, as a percentage, measured by the panel's dwell time. This is not an open rate; the two count different things and are not interchangeable.
     *
     * @param float|null $readRatePercent
     *
     * @return self
     */
    public function setReadRatePercent(?float $readRatePercent): self
    {
        $this->initialized['readRatePercent'] = true;
        $this->readRatePercent = $readRatePercent;
        return $this;
    }
    /**
     * How the domain-wide rates moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence means no comparable prior data, never zero change.
     * 
     *
     * @return EmailInboxInsightsPlacementDeltaPts|null
     */
    public function getDeltaPts(): ?EmailInboxInsightsPlacementDeltaPts
    {
        return $this->deltaPts;
    }
    /**
     * How the domain-wide rates moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence means no comparable prior data, never zero change.
     *
     * @param EmailInboxInsightsPlacementDeltaPts|null $deltaPts
     *
     * @return self
     */
    public function setDeltaPts(?EmailInboxInsightsPlacementDeltaPts $deltaPts): self
    {
        $this->initialized['deltaPts'] = true;
        $this->deltaPts = $deltaPts;
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
}
