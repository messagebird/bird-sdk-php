<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestAuth
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
     * Share of the test's seed mail that passed SPF, as a percentage.
     *
     * @var float|null
     */
    protected $spfPassRatePercent;
    /**
     * Share of the test's seed mail that passed DKIM, as a percentage.
     *
     * @var float|null
     */
    protected $dkimPassRatePercent;
    /**
     * Share of the test's seed mail that passed DMARC alignment, as a percentage.
     *
     * @var float|null
     */
    protected $dmarcAlignedRatePercent;
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
     * Share of the test's seed mail that passed SPF, as a percentage.
     *
     * @return float|null
     */
    public function getSpfPassRatePercent(): ?float
    {
        return $this->spfPassRatePercent;
    }
    /**
     * Share of the test's seed mail that passed SPF, as a percentage.
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
     * Share of the test's seed mail that passed DKIM, as a percentage.
     *
     * @return float|null
     */
    public function getDkimPassRatePercent(): ?float
    {
        return $this->dkimPassRatePercent;
    }
    /**
     * Share of the test's seed mail that passed DKIM, as a percentage.
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
    /**
     * Share of the test's seed mail that passed DMARC alignment, as a percentage.
     *
     * @return float|null
     */
    public function getDmarcAlignedRatePercent(): ?float
    {
        return $this->dmarcAlignedRatePercent;
    }
    /**
     * Share of the test's seed mail that passed DMARC alignment, as a percentage.
     *
     * @param float|null $dmarcAlignedRatePercent
     *
     * @return self
     */
    public function setDmarcAlignedRatePercent(?float $dmarcAlignedRatePercent): self
    {
        $this->initialized['dmarcAlignedRatePercent'] = true;
        $this->dmarcAlignedRatePercent = $dmarcAlignedRatePercent;
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
