<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsBlocklists extends \ArrayObject
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
     * Number of successfully checked targets reported with an active listing. A target on three blocklists counts once. Null when the lookup service supplies no count; do not treat null as zero. Zero does not establish that the domain or its IPs were checked. Inspect `targets` and each target's `status` for lookup coverage, including partial failures.
     * 
     *
     * @var int|null
     */
    protected $activeCount;
    /**
     * Returned sending IP or domain lookup results, including failed lookups. An empty array does not establish that the domain or its IPs are clear.
     *
     * @var list<EmailInboxInsightsBlocklistTarget>|null
     */
    protected $targets;
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
     * Number of successfully checked targets reported with an active listing. A target on three blocklists counts once. Null when the lookup service supplies no count; do not treat null as zero. Zero does not establish that the domain or its IPs were checked. Inspect `targets` and each target's `status` for lookup coverage, including partial failures.
     * 
     *
     * @return int|null
     */
    public function getActiveCount(): ?int
    {
        return $this->activeCount;
    }
    /**
     * Number of successfully checked targets reported with an active listing. A target on three blocklists counts once. Null when the lookup service supplies no count; do not treat null as zero. Zero does not establish that the domain or its IPs were checked. Inspect `targets` and each target's `status` for lookup coverage, including partial failures.
     *
     * @param int|null $activeCount
     *
     * @return self
     */
    public function setActiveCount(?int $activeCount): self
    {
        $this->initialized['activeCount'] = true;
        $this->activeCount = $activeCount;
        return $this;
    }
    /**
     * Returned sending IP or domain lookup results, including failed lookups. An empty array does not establish that the domain or its IPs are clear.
     *
     * @return list<EmailInboxInsightsBlocklistTarget>|null
     */
    public function getTargets(): ?array
    {
        return $this->targets;
    }
    /**
     * Returned sending IP or domain lookup results, including failed lookups. An empty array does not establish that the domain or its IPs are clear.
     *
     * @param list<EmailInboxInsightsBlocklistTarget>|null $targets
     *
     * @return self
     */
    public function setTargets(?array $targets): self
    {
        $this->initialized['targets'] = true;
        $this->targets = $targets;
        return $this;
    }
}
