<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsMeasurement
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
     * Identifiers of the measurement systems that contributed to these figures. The set grows as measurement coverage does, so treat the values as labels rather than a closed list.
     * 
     *
     * @var list<string>|null
     */
    protected $sources;
    /**
     * How the placement figures in this response were weighted, so a number is
     * self-describing wherever it is quoted or screenshotted.
     * 
     * Placement rates are a weighted average of per-provider rates against an
     * audience mix (the share of recipients expected at each mailbox provider)
     * rather than a share of delivered volume.
     * 
     *
     * @var EmailInboxInsightsWeighting|null
     */
    protected $weighting;
    /**
     * Identifiers of the measurement systems that contributed to these figures. The set grows as measurement coverage does, so treat the values as labels rather than a closed list.
     * 
     *
     * @return list<string>|null
     */
    public function getSources(): ?array
    {
        return $this->sources;
    }
    /**
     * Identifiers of the measurement systems that contributed to these figures. The set grows as measurement coverage does, so treat the values as labels rather than a closed list.
     *
     * @param list<string>|null $sources
     *
     * @return self
     */
    public function setSources(?array $sources): self
    {
        $this->initialized['sources'] = true;
        $this->sources = $sources;
        return $this;
    }
    /**
     * How the placement figures in this response were weighted, so a number is
     * self-describing wherever it is quoted or screenshotted.
     * 
     * Placement rates are a weighted average of per-provider rates against an
     * audience mix (the share of recipients expected at each mailbox provider)
     * rather than a share of delivered volume.
     * 
     *
     * @return EmailInboxInsightsWeighting|null
     */
    public function getWeighting(): ?EmailInboxInsightsWeighting
    {
        return $this->weighting;
    }
    /**
    * How the placement figures in this response were weighted, so a number is
    self-describing wherever it is quoted or screenshotted.
    
    Placement rates are a weighted average of per-provider rates against an
    audience mix (the share of recipients expected at each mailbox provider)
    rather than a share of delivered volume.
    
    *
    * @param EmailInboxInsightsWeighting|null $weighting
    *
    * @return self
    */
    public function setWeighting(?EmailInboxInsightsWeighting $weighting): self
    {
        $this->initialized['weighting'] = true;
        $this->weighting = $weighting;
        return $this;
    }
}
