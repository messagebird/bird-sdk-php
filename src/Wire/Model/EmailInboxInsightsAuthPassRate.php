<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsAuthPassRate
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
     * Share of the domain's measured mail that passed this check, as a percentage.
     *
     * @var float|null
     */
    protected $passRatePercent;
    /**
     * How the pass rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @var float|null
     */
    protected $deltaPts;
    /**
     * Where this figure comes from. `dmarc_rua` is authoritative aggregate
     * reporting and covers every sender of the domain, forwarders included;
     * `google_postmaster` is a fallback covering only mail Google received. It
     * can differ from the source of the DMARC figures, so surface it per check
     * rather than once per response.
     * 
     * Null on a check that reports no figure at all, which is what a
     * `not_configured` status means: there is no measurement, so there is no
     * source to name.
     * 
     *
     * @var string|null
     */
    protected $source;
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
     * Share of the domain's measured mail that passed this check, as a percentage.
     *
     * @return float|null
     */
    public function getPassRatePercent(): ?float
    {
        return $this->passRatePercent;
    }
    /**
     * Share of the domain's measured mail that passed this check, as a percentage.
     *
     * @param float|null $passRatePercent
     *
     * @return self
     */
    public function setPassRatePercent(?float $passRatePercent): self
    {
        $this->initialized['passRatePercent'] = true;
        $this->passRatePercent = $passRatePercent;
        return $this;
    }
    /**
     * How the pass rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @return float|null
     */
    public function getDeltaPts(): ?float
    {
        return $this->deltaPts;
    }
    /**
     * How the pass rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
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
     * Where this figure comes from. `dmarc_rua` is authoritative aggregate
     * reporting and covers every sender of the domain, forwarders included;
     * `google_postmaster` is a fallback covering only mail Google received. It
     * can differ from the source of the DMARC figures, so surface it per check
     * rather than once per response.
     * 
     * Null on a check that reports no figure at all, which is what a
     * `not_configured` status means: there is no measurement, so there is no
     * source to name.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
    * Where this figure comes from. `dmarc_rua` is authoritative aggregate
    reporting and covers every sender of the domain, forwarders included;
    `google_postmaster` is a fallback covering only mail Google received. It
    can differ from the source of the DMARC figures, so surface it per check
    rather than once per response.
    
    Null on a check that reports no figure at all, which is what a
    `not_configured` status means: there is no measurement, so there is no
    source to name.
    
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
