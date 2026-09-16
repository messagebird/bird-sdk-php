<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSpamTraps extends \ArrayObject
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
     * Trap hits observed over the period, across every trap network. The authoritative count: `hit_rows` holds a sample of the rows behind it.
     * 
     *
     * @var int|null
     */
    protected $total;
    /**
     * How the hit count moved against the prior period, as a change in the number of hits rather than in percentage points. Negative is an improvement. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @var int|null
     */
    protected $delta;
    /**
     * Hits split by kind, one entry per kind the trap network reported. Read counts from here rather than assuming a fixed set of kinds: the set can grow, and an entry that is absent was not reported rather than being a measured zero. These sum to `total`.
     * 
     *
     * @var list<EmailInboxInsightsSpamTrapTypeCount>|null
     */
    protected $byType;
    /**
     * Hits split by the trap network that observed them.
     *
     * @var list<EmailInboxInsightsSpamTrapSourceCount>|null
     */
    protected $bySource;
    /**
     * The individual trap hits behind the totals. A sample rather than a guaranteed complete list, and its rows do not count hits: one row is one trap address, carrying a `hit_count` for how many times that address was reached. Neither the number of rows nor the sum of `hit_count` reconstructs `total`, because that field is absent wherever the trap network does not break the figure out. Read `truncated_types` for what the measurement capped rather than inferring completeness by comparing counts.
     * 
     *
     * @var EmailInboxInsightsSpamTrapHits|null
     */
    protected $hitRows;
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
     * Trap hits observed over the period, across every trap network. The authoritative count: `hit_rows` holds a sample of the rows behind it.
     * 
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Trap hits observed over the period, across every trap network. The authoritative count: `hit_rows` holds a sample of the rows behind it.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
    /**
     * How the hit count moved against the prior period, as a change in the number of hits rather than in percentage points. Negative is an improvement. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     * 
     *
     * @return int|null
     */
    public function getDelta(): ?int
    {
        return $this->delta;
    }
    /**
     * How the hit count moved against the prior period, as a change in the number of hits rather than in percentage points. Negative is an improvement. Present only when the request asked for a comparison and the prior period had data; absence is not zero change.
     *
     * @param int|null $delta
     *
     * @return self
     */
    public function setDelta(?int $delta): self
    {
        $this->initialized['delta'] = true;
        $this->delta = $delta;
        return $this;
    }
    /**
     * Hits split by kind, one entry per kind the trap network reported. Read counts from here rather than assuming a fixed set of kinds: the set can grow, and an entry that is absent was not reported rather than being a measured zero. These sum to `total`.
     * 
     *
     * @return list<EmailInboxInsightsSpamTrapTypeCount>|null
     */
    public function getByType(): ?array
    {
        return $this->byType;
    }
    /**
     * Hits split by kind, one entry per kind the trap network reported. Read counts from here rather than assuming a fixed set of kinds: the set can grow, and an entry that is absent was not reported rather than being a measured zero. These sum to `total`.
     *
     * @param list<EmailInboxInsightsSpamTrapTypeCount>|null $byType
     *
     * @return self
     */
    public function setByType(?array $byType): self
    {
        $this->initialized['byType'] = true;
        $this->byType = $byType;
        return $this;
    }
    /**
     * Hits split by the trap network that observed them.
     *
     * @return list<EmailInboxInsightsSpamTrapSourceCount>|null
     */
    public function getBySource(): ?array
    {
        return $this->bySource;
    }
    /**
     * Hits split by the trap network that observed them.
     *
     * @param list<EmailInboxInsightsSpamTrapSourceCount>|null $bySource
     *
     * @return self
     */
    public function setBySource(?array $bySource): self
    {
        $this->initialized['bySource'] = true;
        $this->bySource = $bySource;
        return $this;
    }
    /**
     * The individual trap hits behind the totals. A sample rather than a guaranteed complete list, and its rows do not count hits: one row is one trap address, carrying a `hit_count` for how many times that address was reached. Neither the number of rows nor the sum of `hit_count` reconstructs `total`, because that field is absent wherever the trap network does not break the figure out. Read `truncated_types` for what the measurement capped rather than inferring completeness by comparing counts.
     * 
     *
     * @return EmailInboxInsightsSpamTrapHits|null
     */
    public function getHitRows(): ?EmailInboxInsightsSpamTrapHits
    {
        return $this->hitRows;
    }
    /**
     * The individual trap hits behind the totals. A sample rather than a guaranteed complete list, and its rows do not count hits: one row is one trap address, carrying a `hit_count` for how many times that address was reached. Neither the number of rows nor the sum of `hit_count` reconstructs `total`, because that field is absent wherever the trap network does not break the figure out. Read `truncated_types` for what the measurement capped rather than inferring completeness by comparing counts.
     *
     * @param EmailInboxInsightsSpamTrapHits|null $hitRows
     *
     * @return self
     */
    public function setHitRows(?EmailInboxInsightsSpamTrapHits $hitRows): self
    {
        $this->initialized['hitRows'] = true;
        $this->hitRows = $hitRows;
        return $this;
    }
}
