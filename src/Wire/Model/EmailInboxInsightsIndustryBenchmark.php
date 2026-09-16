<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsIndustryBenchmark extends \ArrayObject
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
     * Which resource this response is, echoed for self-description.
     *
     * @var string|null
     */
    protected $resource;
    /**
     * The sending domain the figures describe.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * How the figures in this response were measured, so a number is self-describing in a screenshot or a bug report.
     * 
     *
     * @var EmailInboxInsightsMeasurement|null
     */
    protected $measurement;
    /**
     * When the measurement service computed these figures.
     *
     * @var \DateTime|null
     */
    protected $generatedAt;
    /**
     * How current the figures are. Freshness differs per resource (authentication data can lag a day or more while blocklist lookups are near real time), so any "as of" label binds from this field, never from a fixed string.
     * 
     *
     * @var EmailInboxInsightsFreshness|null
     */
    protected $freshness;
    /**
     * Present when the response was served from a short-lived copy rather than fetched for this request: when that copy was fetched.
     * 
     *
     * @var \DateTime|null
     */
    protected $cachedAt;
    /**
     * The cohort the median describes, or null when the domain is not classified into an industry. This description already names that as a `no_data` cause and a normal state for a young cohort, so it needs a representation: without one the only way to report an unclassified domain is a cohort with a blank name.
     * 
     *
     * @var EmailInboxInsightsIndustryBenchmarkIndustry|null
     */
    protected $industry;
    /**
     * The industry's median inbox rate, as a percentage.
     *
     * @var float|null
     */
    protected $medianInboxRatePercent;
    /**
     * How many days the cohort figure covers. Reported rather than assumed because the period is the one the nightly computation produced, not one the caller chose, so a label built from a requested window would be wrong. Absent when the computation does not report it, in which case a label must not name a period at all.
     * 
     *
     * @var int|null
     */
    protected $windowDays;
    /**
     * How many measured senders the median was computed across.
     *
     * @var int|null
     */
    protected $cohortSize;
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
     * Which resource this response is, echoed for self-description.
     *
     * @return string|null
     */
    public function getResource(): ?string
    {
        return $this->resource;
    }
    /**
     * Which resource this response is, echoed for self-description.
     *
     * @param string|null $resource
     *
     * @return self
     */
    public function setResource(?string $resource): self
    {
        $this->initialized['resource'] = true;
        $this->resource = $resource;
        return $this;
    }
    /**
     * The sending domain the figures describe.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The sending domain the figures describe.
     *
     * @param string|null $domain
     *
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->initialized['domain'] = true;
        $this->domain = $domain;
        return $this;
    }
    /**
     * How the figures in this response were measured, so a number is self-describing in a screenshot or a bug report.
     * 
     *
     * @return EmailInboxInsightsMeasurement|null
     */
    public function getMeasurement(): ?EmailInboxInsightsMeasurement
    {
        return $this->measurement;
    }
    /**
     * How the figures in this response were measured, so a number is self-describing in a screenshot or a bug report.
     *
     * @param EmailInboxInsightsMeasurement|null $measurement
     *
     * @return self
     */
    public function setMeasurement(?EmailInboxInsightsMeasurement $measurement): self
    {
        $this->initialized['measurement'] = true;
        $this->measurement = $measurement;
        return $this;
    }
    /**
     * When the measurement service computed these figures.
     *
     * @return \DateTime|null
     */
    public function getGeneratedAt(): ?\DateTime
    {
        return $this->generatedAt;
    }
    /**
     * When the measurement service computed these figures.
     *
     * @param \DateTime|null $generatedAt
     *
     * @return self
     */
    public function setGeneratedAt(?\DateTime $generatedAt): self
    {
        $this->initialized['generatedAt'] = true;
        $this->generatedAt = $generatedAt;
        return $this;
    }
    /**
     * How current the figures are. Freshness differs per resource (authentication data can lag a day or more while blocklist lookups are near real time), so any "as of" label binds from this field, never from a fixed string.
     * 
     *
     * @return EmailInboxInsightsFreshness|null
     */
    public function getFreshness(): ?EmailInboxInsightsFreshness
    {
        return $this->freshness;
    }
    /**
     * How current the figures are. Freshness differs per resource (authentication data can lag a day or more while blocklist lookups are near real time), so any "as of" label binds from this field, never from a fixed string.
     *
     * @param EmailInboxInsightsFreshness|null $freshness
     *
     * @return self
     */
    public function setFreshness(?EmailInboxInsightsFreshness $freshness): self
    {
        $this->initialized['freshness'] = true;
        $this->freshness = $freshness;
        return $this;
    }
    /**
     * Present when the response was served from a short-lived copy rather than fetched for this request: when that copy was fetched.
     * 
     *
     * @return \DateTime|null
     */
    public function getCachedAt(): ?\DateTime
    {
        return $this->cachedAt;
    }
    /**
     * Present when the response was served from a short-lived copy rather than fetched for this request: when that copy was fetched.
     *
     * @param \DateTime|null $cachedAt
     *
     * @return self
     */
    public function setCachedAt(?\DateTime $cachedAt): self
    {
        $this->initialized['cachedAt'] = true;
        $this->cachedAt = $cachedAt;
        return $this;
    }
    /**
     * The cohort the median describes, or null when the domain is not classified into an industry. This description already names that as a `no_data` cause and a normal state for a young cohort, so it needs a representation: without one the only way to report an unclassified domain is a cohort with a blank name.
     * 
     *
     * @return EmailInboxInsightsIndustryBenchmarkIndustry|null
     */
    public function getIndustry(): ?EmailInboxInsightsIndustryBenchmarkIndustry
    {
        return $this->industry;
    }
    /**
     * The cohort the median describes, or null when the domain is not classified into an industry. This description already names that as a `no_data` cause and a normal state for a young cohort, so it needs a representation: without one the only way to report an unclassified domain is a cohort with a blank name.
     *
     * @param EmailInboxInsightsIndustryBenchmarkIndustry|null $industry
     *
     * @return self
     */
    public function setIndustry(?EmailInboxInsightsIndustryBenchmarkIndustry $industry): self
    {
        $this->initialized['industry'] = true;
        $this->industry = $industry;
        return $this;
    }
    /**
     * The industry's median inbox rate, as a percentage.
     *
     * @return float|null
     */
    public function getMedianInboxRatePercent(): ?float
    {
        return $this->medianInboxRatePercent;
    }
    /**
     * The industry's median inbox rate, as a percentage.
     *
     * @param float|null $medianInboxRatePercent
     *
     * @return self
     */
    public function setMedianInboxRatePercent(?float $medianInboxRatePercent): self
    {
        $this->initialized['medianInboxRatePercent'] = true;
        $this->medianInboxRatePercent = $medianInboxRatePercent;
        return $this;
    }
    /**
     * How many days the cohort figure covers. Reported rather than assumed because the period is the one the nightly computation produced, not one the caller chose, so a label built from a requested window would be wrong. Absent when the computation does not report it, in which case a label must not name a period at all.
     * 
     *
     * @return int|null
     */
    public function getWindowDays(): ?int
    {
        return $this->windowDays;
    }
    /**
     * How many days the cohort figure covers. Reported rather than assumed because the period is the one the nightly computation produced, not one the caller chose, so a label built from a requested window would be wrong. Absent when the computation does not report it, in which case a label must not name a period at all.
     *
     * @param int|null $windowDays
     *
     * @return self
     */
    public function setWindowDays(?int $windowDays): self
    {
        $this->initialized['windowDays'] = true;
        $this->windowDays = $windowDays;
        return $this;
    }
    /**
     * How many measured senders the median was computed across.
     *
     * @return int|null
     */
    public function getCohortSize(): ?int
    {
        return $this->cohortSize;
    }
    /**
     * How many measured senders the median was computed across.
     *
     * @param int|null $cohortSize
     *
     * @return self
     */
    public function setCohortSize(?int $cohortSize): self
    {
        $this->initialized['cohortSize'] = true;
        $this->cohortSize = $cohortSize;
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
