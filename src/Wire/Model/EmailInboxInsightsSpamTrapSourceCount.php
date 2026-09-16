<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSpamTrapSourceCount
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
     * The trap network that observed a hit. The set grows as coverage does, so treat the values as labels rather than a closed list.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * Hits this network observed over the period.
     *
     * @var int|null
     */
    protected $hits;
    /**
     * The trap network that observed a hit. The set grows as coverage does, so treat the values as labels rather than a closed list.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * The trap network that observed a hit. The set grows as coverage does, so treat the values as labels rather than a closed list.
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
     * Hits this network observed over the period.
     *
     * @return int|null
     */
    public function getHits(): ?int
    {
        return $this->hits;
    }
    /**
     * Hits this network observed over the period.
     *
     * @param int|null $hits
     *
     * @return self
     */
    public function setHits(?int $hits): self
    {
        $this->initialized['hits'] = true;
        $this->hits = $hits;
        return $this;
    }
}
