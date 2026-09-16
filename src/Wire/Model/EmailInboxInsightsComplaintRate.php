<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsComplaintRate
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
     * Share of the domain's Gmail-received mail that recipients reported as spam, as a percentage, from Google Postmaster.
     * 
     *
     * @var float|null
     */
    protected $gmailPostmasterSpamRatePercent;
    /**
     * How the rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @var float|null
     */
    protected $deltaPts;
    /**
     * The worst day for complaints in the period.
     *
     * @var EmailInboxInsightsComplaintPeak|null
     */
    protected $peak;
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
     * Share of the domain's Gmail-received mail that recipients reported as spam, as a percentage, from Google Postmaster.
     * 
     *
     * @return float|null
     */
    public function getGmailPostmasterSpamRatePercent(): ?float
    {
        return $this->gmailPostmasterSpamRatePercent;
    }
    /**
     * Share of the domain's Gmail-received mail that recipients reported as spam, as a percentage, from Google Postmaster.
     *
     * @param float|null $gmailPostmasterSpamRatePercent
     *
     * @return self
     */
    public function setGmailPostmasterSpamRatePercent(?float $gmailPostmasterSpamRatePercent): self
    {
        $this->initialized['gmailPostmasterSpamRatePercent'] = true;
        $this->gmailPostmasterSpamRatePercent = $gmailPostmasterSpamRatePercent;
        return $this;
    }
    /**
     * How the rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @return float|null
     */
    public function getDeltaPts(): ?float
    {
        return $this->deltaPts;
    }
    /**
     * How the rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     *
     * @param float|null $deltaPts
     *
     * @return self
     */
    public function setDeltaPts(?float $deltaPts): self
    {
        $this->initialized['deltaPts'] = true;
        $this->deltaPts = $deltaPts;
        return $this;
    }
    /**
     * The worst day for complaints in the period.
     *
     * @return EmailInboxInsightsComplaintPeak|null
     */
    public function getPeak(): ?EmailInboxInsightsComplaintPeak
    {
        return $this->peak;
    }
    /**
     * The worst day for complaints in the period.
     *
     * @param EmailInboxInsightsComplaintPeak|null $peak
     *
     * @return self
     */
    public function setPeak(?EmailInboxInsightsComplaintPeak $peak): self
    {
        $this->initialized['peak'] = true;
        $this->peak = $peak;
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
