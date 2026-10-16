<?php

namespace MessageBird\Wire\Model;

/**
 * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
 */
class EmailStatsQueryIPPoolFilter
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
     * @var list<string>|null
     */
    protected $include;
    /**
     * @var list<string>|null
     */
    protected $exclude;
    /**
     * @return list<string>|null
     */
    public function getInclude(): ?array
    {
        return $this->include;
    }
    /**
     * @param list<string>|null $include
     *
     * @return self
     */
    public function setInclude(?array $include): self
    {
        $this->initialized['include'] = true;
        $this->include = $include;
        return $this;
    }
    /**
     * @return list<string>|null
     */
    public function getExclude(): ?array
    {
        return $this->exclude;
    }
    /**
     * @param list<string>|null $exclude
     *
     * @return self
     */
    public function setExclude(?array $exclude): self
    {
        $this->initialized['exclude'] = true;
        $this->exclude = $exclude;
        return $this;
    }
}
