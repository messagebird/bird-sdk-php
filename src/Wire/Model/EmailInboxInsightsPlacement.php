<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsPlacement extends \ArrayObject
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
     * The period every figure in the response covers: whole UTC calendar days,
     * inclusive on both ends. The same window convention the email statistics
     * endpoints use, so figures from the two sources describe the same days and
     * can be combined without adjustment.
     * 
     *
     * @var EmailInboxInsightsWindow|null
     */
    protected $window;
    /**
     * The prior equal-length period the delta figures compare against. Present only when the request asked for a comparison.
     * 
     *
     * @var EmailInboxInsightsComparedTo|null
     */
    protected $comparedTo;
    /**
     * The domain-wide placement figures for the period.
     * 
     * These rates are weighted against the audience mix in `measurement.weighting`,
     * so they can legitimately differ from any single provider row, which has no
     * mix to weight. Rates are percentages of measured placements, never of
     * delivered volume.
     * 
     *
     * @var EmailInboxInsightsPlacementSummary|null
     */
    protected $summary;
    /**
     * The per-provider placement table.
     *
     * @var EmailInboxInsightsPlacementProviders|null
     */
    protected $providers;
    /**
     * The placement time series, at the grain named in `window.group_by`.
     * 
     * The series is sparse: buckets with no measured placement are omitted rather
     * than returned as zeros, because an invented zero would be indistinguishable
     * from a measured one. Index by date, never by position.
     * 
     *
     * @var EmailInboxInsightsPlacementSeries|null
     */
    protected $series;
    /**
     * Where the domain's Gmail-placed mail landed across Gmail's tabs. The status is `not_applicable` when the domain had no Gmail placement in the period; hide the section rather than showing an empty split.
     * 
     *
     * @var EmailInboxInsightsGmailTabs|null
     */
    protected $gmailTabs;
    /**
     * Per-IP placement detail for the domain's sending infrastructure. Returned only when the request asked for IP detail.
     * 
     *
     * @var EmailInboxInsightsPlacementIpDetails|null
     */
    protected $ipDetails;
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
     * The period every figure in the response covers: whole UTC calendar days,
     * inclusive on both ends. The same window convention the email statistics
     * endpoints use, so figures from the two sources describe the same days and
     * can be combined without adjustment.
     * 
     *
     * @return EmailInboxInsightsWindow|null
     */
    public function getWindow(): ?EmailInboxInsightsWindow
    {
        return $this->window;
    }
    /**
    * The period every figure in the response covers: whole UTC calendar days,
    inclusive on both ends. The same window convention the email statistics
    endpoints use, so figures from the two sources describe the same days and
    can be combined without adjustment.
    
    *
    * @param EmailInboxInsightsWindow|null $window
    *
    * @return self
    */
    public function setWindow(?EmailInboxInsightsWindow $window): self
    {
        $this->initialized['window'] = true;
        $this->window = $window;
        return $this;
    }
    /**
     * The prior equal-length period the delta figures compare against. Present only when the request asked for a comparison.
     * 
     *
     * @return EmailInboxInsightsComparedTo|null
     */
    public function getComparedTo(): ?EmailInboxInsightsComparedTo
    {
        return $this->comparedTo;
    }
    /**
     * The prior equal-length period the delta figures compare against. Present only when the request asked for a comparison.
     *
     * @param EmailInboxInsightsComparedTo|null $comparedTo
     *
     * @return self
     */
    public function setComparedTo(?EmailInboxInsightsComparedTo $comparedTo): self
    {
        $this->initialized['comparedTo'] = true;
        $this->comparedTo = $comparedTo;
        return $this;
    }
    /**
     * The domain-wide placement figures for the period.
     * 
     * These rates are weighted against the audience mix in `measurement.weighting`,
     * so they can legitimately differ from any single provider row, which has no
     * mix to weight. Rates are percentages of measured placements, never of
     * delivered volume.
     * 
     *
     * @return EmailInboxInsightsPlacementSummary|null
     */
    public function getSummary(): ?EmailInboxInsightsPlacementSummary
    {
        return $this->summary;
    }
    /**
    * The domain-wide placement figures for the period.
    
    These rates are weighted against the audience mix in `measurement.weighting`,
    so they can legitimately differ from any single provider row, which has no
    mix to weight. Rates are percentages of measured placements, never of
    delivered volume.
    
    *
    * @param EmailInboxInsightsPlacementSummary|null $summary
    *
    * @return self
    */
    public function setSummary(?EmailInboxInsightsPlacementSummary $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * The per-provider placement table.
     *
     * @return EmailInboxInsightsPlacementProviders|null
     */
    public function getProviders(): ?EmailInboxInsightsPlacementProviders
    {
        return $this->providers;
    }
    /**
     * The per-provider placement table.
     *
     * @param EmailInboxInsightsPlacementProviders|null $providers
     *
     * @return self
     */
    public function setProviders(?EmailInboxInsightsPlacementProviders $providers): self
    {
        $this->initialized['providers'] = true;
        $this->providers = $providers;
        return $this;
    }
    /**
     * The placement time series, at the grain named in `window.group_by`.
     * 
     * The series is sparse: buckets with no measured placement are omitted rather
     * than returned as zeros, because an invented zero would be indistinguishable
     * from a measured one. Index by date, never by position.
     * 
     *
     * @return EmailInboxInsightsPlacementSeries|null
     */
    public function getSeries(): ?EmailInboxInsightsPlacementSeries
    {
        return $this->series;
    }
    /**
    * The placement time series, at the grain named in `window.group_by`.
    
    The series is sparse: buckets with no measured placement are omitted rather
    than returned as zeros, because an invented zero would be indistinguishable
    from a measured one. Index by date, never by position.
    
    *
    * @param EmailInboxInsightsPlacementSeries|null $series
    *
    * @return self
    */
    public function setSeries(?EmailInboxInsightsPlacementSeries $series): self
    {
        $this->initialized['series'] = true;
        $this->series = $series;
        return $this;
    }
    /**
     * Where the domain's Gmail-placed mail landed across Gmail's tabs. The status is `not_applicable` when the domain had no Gmail placement in the period; hide the section rather than showing an empty split.
     * 
     *
     * @return EmailInboxInsightsGmailTabs|null
     */
    public function getGmailTabs(): ?EmailInboxInsightsGmailTabs
    {
        return $this->gmailTabs;
    }
    /**
     * Where the domain's Gmail-placed mail landed across Gmail's tabs. The status is `not_applicable` when the domain had no Gmail placement in the period; hide the section rather than showing an empty split.
     *
     * @param EmailInboxInsightsGmailTabs|null $gmailTabs
     *
     * @return self
     */
    public function setGmailTabs(?EmailInboxInsightsGmailTabs $gmailTabs): self
    {
        $this->initialized['gmailTabs'] = true;
        $this->gmailTabs = $gmailTabs;
        return $this;
    }
    /**
     * Per-IP placement detail for the domain's sending infrastructure. Returned only when the request asked for IP detail.
     * 
     *
     * @return EmailInboxInsightsPlacementIpDetails|null
     */
    public function getIpDetails(): ?EmailInboxInsightsPlacementIpDetails
    {
        return $this->ipDetails;
    }
    /**
     * Per-IP placement detail for the domain's sending infrastructure. Returned only when the request asked for IP detail.
     *
     * @param EmailInboxInsightsPlacementIpDetails|null $ipDetails
     *
     * @return self
     */
    public function setIpDetails(?EmailInboxInsightsPlacementIpDetails $ipDetails): self
    {
        $this->initialized['ipDetails'] = true;
        $this->ipDetails = $ipDetails;
        return $this;
    }
}
