<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsAuthentication extends \ArrayObject
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
     * When these figures were computed. The measurement service's own stamp where it publishes one; on the resources Bird derives from daily rates it has none to publish, and this is when Bird computed them.
     * 
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
     * One authentication check's pass rate over the period.
     *
     * @var EmailInboxInsightsAuthPassRate|null
     */
    protected $spf;
    /**
     * One authentication check's pass rate over the period.
     *
     * @var EmailInboxInsightsAuthPassRate|null
     */
    protected $dkim;
    /**
     * The domain's DMARC standing over the period.
     *
     * @var EmailInboxInsightsDmarc|null
     */
    protected $dmarc;
    /**
     * Every system observed sending as this domain, with how each authenticates. This is the table that shows who else sends under the domain's name.
     * 
     *
     * @var EmailInboxInsightsAuthSources|null
     */
    protected $sources;
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
     * When these figures were computed. The measurement service's own stamp where it publishes one; on the resources Bird derives from daily rates it has none to publish, and this is when Bird computed them.
     * 
     *
     * @return \DateTime|null
     */
    public function getGeneratedAt(): ?\DateTime
    {
        return $this->generatedAt;
    }
    /**
     * When these figures were computed. The measurement service's own stamp where it publishes one; on the resources Bird derives from daily rates it has none to publish, and this is when Bird computed them.
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
     * One authentication check's pass rate over the period.
     *
     * @return EmailInboxInsightsAuthPassRate|null
     */
    public function getSpf(): ?EmailInboxInsightsAuthPassRate
    {
        return $this->spf;
    }
    /**
     * One authentication check's pass rate over the period.
     *
     * @param EmailInboxInsightsAuthPassRate|null $spf
     *
     * @return self
     */
    public function setSpf(?EmailInboxInsightsAuthPassRate $spf): self
    {
        $this->initialized['spf'] = true;
        $this->spf = $spf;
        return $this;
    }
    /**
     * One authentication check's pass rate over the period.
     *
     * @return EmailInboxInsightsAuthPassRate|null
     */
    public function getDkim(): ?EmailInboxInsightsAuthPassRate
    {
        return $this->dkim;
    }
    /**
     * One authentication check's pass rate over the period.
     *
     * @param EmailInboxInsightsAuthPassRate|null $dkim
     *
     * @return self
     */
    public function setDkim(?EmailInboxInsightsAuthPassRate $dkim): self
    {
        $this->initialized['dkim'] = true;
        $this->dkim = $dkim;
        return $this;
    }
    /**
     * The domain's DMARC standing over the period.
     *
     * @return EmailInboxInsightsDmarc|null
     */
    public function getDmarc(): ?EmailInboxInsightsDmarc
    {
        return $this->dmarc;
    }
    /**
     * The domain's DMARC standing over the period.
     *
     * @param EmailInboxInsightsDmarc|null $dmarc
     *
     * @return self
     */
    public function setDmarc(?EmailInboxInsightsDmarc $dmarc): self
    {
        $this->initialized['dmarc'] = true;
        $this->dmarc = $dmarc;
        return $this;
    }
    /**
     * Every system observed sending as this domain, with how each authenticates. This is the table that shows who else sends under the domain's name.
     * 
     *
     * @return EmailInboxInsightsAuthSources|null
     */
    public function getSources(): ?EmailInboxInsightsAuthSources
    {
        return $this->sources;
    }
    /**
     * Every system observed sending as this domain, with how each authenticates. This is the table that shows who else sends under the domain's name.
     *
     * @param EmailInboxInsightsAuthSources|null $sources
     *
     * @return self
     */
    public function setSources(?EmailInboxInsightsAuthSources $sources): self
    {
        $this->initialized['sources'] = true;
        $this->sources = $sources;
        return $this;
    }
}
