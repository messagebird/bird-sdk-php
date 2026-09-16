<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsDmarc
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
     * Share of the domain's measured mail that passed DMARC alignment, as a percentage.
     *
     * @var float|null
     */
    protected $alignedRatePercent;
    /**
     * The policy published in the domain's DNS record, or null when the domain publishes no DMARC record at all. Null is not `none`: `none` is a policy, asking receivers to take no action while the domain monitors its reporting, and a domain that has one is already set up. A null asks for a record to be published, which is a different first step.
     * 
     *
     * @var string|null
     */
    protected $policy;
    /**
     * Whether the domain's authentication is consistent enough to move the policy to `reject` without losing legitimate mail. Deliberately conservative: false whenever the data is insufficient to be sure. Null when the measurement reached no verdict, which is what a `status` other than `ok` means here: false would read as a considered "not yet" rather than as no assessment having been made.
     * 
     *
     * @var bool|null
     */
    protected $readyForReject;
    /**
     * Why `ready_for_reject` is false, so the answer is actionable rather than a bare refusal. Empty when nothing is holding the domain back, and null when readiness was not assessed, which pairs with `ready_for_reject`: an empty list alongside a null verdict would say the opposite of what was measured. Render these rather than a plain "not ready": the fix differs per reason, and a domain held back only by stale reporting needs no configuration change at all.
     * 
     *
     * @var list<string>|null
     */
    protected $readinessReasons;
    /**
     * How the aligned rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @var float|null
     */
    protected $deltaPts;
    /**
     * Where the DMARC figures come from. `dmarc_rua` is authoritative
     * aggregate reporting and covers every sender of the domain, forwarders
     * included; `google_postmaster` is a fallback covering only mail Google
     * received. The two are not equivalent, so surface which one is shown.
     * 
     * Null when the section reports no figures, which is what a
     * `not_configured` status means for a domain with no aggregate reporting
     * and no Postmaster connection.
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
     * Share of the domain's measured mail that passed DMARC alignment, as a percentage.
     *
     * @return float|null
     */
    public function getAlignedRatePercent(): ?float
    {
        return $this->alignedRatePercent;
    }
    /**
     * Share of the domain's measured mail that passed DMARC alignment, as a percentage.
     *
     * @param float|null $alignedRatePercent
     *
     * @return self
     */
    public function setAlignedRatePercent(?float $alignedRatePercent): self
    {
        $this->initialized['alignedRatePercent'] = true;
        $this->alignedRatePercent = $alignedRatePercent;
        return $this;
    }
    /**
     * The policy published in the domain's DNS record, or null when the domain publishes no DMARC record at all. Null is not `none`: `none` is a policy, asking receivers to take no action while the domain monitors its reporting, and a domain that has one is already set up. A null asks for a record to be published, which is a different first step.
     * 
     *
     * @return string|null
     */
    public function getPolicy(): ?string
    {
        return $this->policy;
    }
    /**
     * The policy published in the domain's DNS record, or null when the domain publishes no DMARC record at all. Null is not `none`: `none` is a policy, asking receivers to take no action while the domain monitors its reporting, and a domain that has one is already set up. A null asks for a record to be published, which is a different first step.
     *
     * @param string|null $policy
     *
     * @return self
     */
    public function setPolicy(?string $policy): self
    {
        $this->initialized['policy'] = true;
        $this->policy = $policy;
        return $this;
    }
    /**
     * Whether the domain's authentication is consistent enough to move the policy to `reject` without losing legitimate mail. Deliberately conservative: false whenever the data is insufficient to be sure. Null when the measurement reached no verdict, which is what a `status` other than `ok` means here: false would read as a considered "not yet" rather than as no assessment having been made.
     * 
     *
     * @return bool|null
     */
    public function getReadyForReject(): ?bool
    {
        return $this->readyForReject;
    }
    /**
     * Whether the domain's authentication is consistent enough to move the policy to `reject` without losing legitimate mail. Deliberately conservative: false whenever the data is insufficient to be sure. Null when the measurement reached no verdict, which is what a `status` other than `ok` means here: false would read as a considered "not yet" rather than as no assessment having been made.
     *
     * @param bool|null $readyForReject
     *
     * @return self
     */
    public function setReadyForReject(?bool $readyForReject): self
    {
        $this->initialized['readyForReject'] = true;
        $this->readyForReject = $readyForReject;
        return $this;
    }
    /**
     * Why `ready_for_reject` is false, so the answer is actionable rather than a bare refusal. Empty when nothing is holding the domain back, and null when readiness was not assessed, which pairs with `ready_for_reject`: an empty list alongside a null verdict would say the opposite of what was measured. Render these rather than a plain "not ready": the fix differs per reason, and a domain held back only by stale reporting needs no configuration change at all.
     * 
     *
     * @return list<string>|null
     */
    public function getReadinessReasons(): ?array
    {
        return $this->readinessReasons;
    }
    /**
     * Why `ready_for_reject` is false, so the answer is actionable rather than a bare refusal. Empty when nothing is holding the domain back, and null when readiness was not assessed, which pairs with `ready_for_reject`: an empty list alongside a null verdict would say the opposite of what was measured. Render these rather than a plain "not ready": the fix differs per reason, and a domain held back only by stale reporting needs no configuration change at all.
     *
     * @param list<string>|null $readinessReasons
     *
     * @return self
     */
    public function setReadinessReasons(?array $readinessReasons): self
    {
        $this->initialized['readinessReasons'] = true;
        $this->readinessReasons = $readinessReasons;
        return $this;
    }
    /**
     * How the aligned rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @return float|null
     */
    public function getDeltaPts(): ?float
    {
        return $this->deltaPts;
    }
    /**
     * How the aligned rate moved against the prior period, in percentage points. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
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
     * Where the DMARC figures come from. `dmarc_rua` is authoritative
     * aggregate reporting and covers every sender of the domain, forwarders
     * included; `google_postmaster` is a fallback covering only mail Google
     * received. The two are not equivalent, so surface which one is shown.
     * 
     * Null when the section reports no figures, which is what a
     * `not_configured` status means for a domain with no aggregate reporting
     * and no Postmaster connection.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
    * Where the DMARC figures come from. `dmarc_rua` is authoritative
    aggregate reporting and covers every sender of the domain, forwarders
    included; `google_postmaster` is a fallback covering only mail Google
    received. The two are not equivalent, so surface which one is shown.
    
    Null when the section reports no figures, which is what a
    `not_configured` status means for a domain with no aggregate reporting
    and no Postmaster connection.
    
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
