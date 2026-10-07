<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTests extends \ArrayObject
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
     * The domain's seed tests over the period, newest first, up to 100 of them. The list is capped rather than paged, so `truncated` says whether older tests in the period were left out.
     * 
     *
     * @var EmailInboxInsightsSeedTestList|null
     */
    protected $tests;
    /**
     * One seed test with its full results.
     *
     * @var EmailInboxInsightsSeedTestDetail|null
     */
    protected $latest;
    /**
     * The organization's seed-test allowance for the current billing period. Registering a test spends one of the allowance whether or not its send goes out, and a test that expires unused does not return it. Uncertain registrations can retain allowance.
     * 
     *
     * @var EmailInboxInsightsSeedTestQuota|null
     */
    protected $quota;
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
     * The domain's seed tests over the period, newest first, up to 100 of them. The list is capped rather than paged, so `truncated` says whether older tests in the period were left out.
     * 
     *
     * @return EmailInboxInsightsSeedTestList|null
     */
    public function getTests(): ?EmailInboxInsightsSeedTestList
    {
        return $this->tests;
    }
    /**
     * The domain's seed tests over the period, newest first, up to 100 of them. The list is capped rather than paged, so `truncated` says whether older tests in the period were left out.
     *
     * @param EmailInboxInsightsSeedTestList|null $tests
     *
     * @return self
     */
    public function setTests(?EmailInboxInsightsSeedTestList $tests): self
    {
        $this->initialized['tests'] = true;
        $this->tests = $tests;
        return $this;
    }
    /**
     * One seed test with its full results.
     *
     * @return EmailInboxInsightsSeedTestDetail|null
     */
    public function getLatest(): ?EmailInboxInsightsSeedTestDetail
    {
        return $this->latest;
    }
    /**
     * One seed test with its full results.
     *
     * @param EmailInboxInsightsSeedTestDetail|null $latest
     *
     * @return self
     */
    public function setLatest(?EmailInboxInsightsSeedTestDetail $latest): self
    {
        $this->initialized['latest'] = true;
        $this->latest = $latest;
        return $this;
    }
    /**
     * The organization's seed-test allowance for the current billing period. Registering a test spends one of the allowance whether or not its send goes out, and a test that expires unused does not return it. Uncertain registrations can retain allowance.
     * 
     *
     * @return EmailInboxInsightsSeedTestQuota|null
     */
    public function getQuota(): ?EmailInboxInsightsSeedTestQuota
    {
        return $this->quota;
    }
    /**
     * The organization's seed-test allowance for the current billing period. Registering a test spends one of the allowance whether or not its send goes out, and a test that expires unused does not return it. Uncertain registrations can retain allowance.
     *
     * @param EmailInboxInsightsSeedTestQuota|null $quota
     *
     * @return self
     */
    public function setQuota(?EmailInboxInsightsSeedTestQuota $quota): self
    {
        $this->initialized['quota'] = true;
        $this->quota = $quota;
        return $this;
    }
}
