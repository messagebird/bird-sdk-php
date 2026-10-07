<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestConfiguration
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
     * The sending domain these choices apply to.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * The seed pools, each flagged with whether the account can use it.
     *
     * @var list<EmailInboxInsightsSeedListTypeOption>|null
     */
    protected $listTypes;
    /**
     * The regions seeds can be placed in. Objects rather than bare strings, to match the two lists beside it: the measurement reports no availability for a region today, and an object can carry one later without a second array.
     * 
     *
     * @var list<EmailInboxInsightsSeedRegionOption>|null
     */
    protected $regions;
    /**
     * The engagement behaviours the seeds can simulate, each flagged with whether the account can use it.
     * 
     *
     * @var list<EmailInboxInsightsSeedEngagementProfileOption>|null
     */
    protected $engagementProfiles;
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
     * The sending domain these choices apply to.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The sending domain these choices apply to.
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
     * The seed pools, each flagged with whether the account can use it.
     *
     * @return list<EmailInboxInsightsSeedListTypeOption>|null
     */
    public function getListTypes(): ?array
    {
        return $this->listTypes;
    }
    /**
     * The seed pools, each flagged with whether the account can use it.
     *
     * @param list<EmailInboxInsightsSeedListTypeOption>|null $listTypes
     *
     * @return self
     */
    public function setListTypes(?array $listTypes): self
    {
        $this->initialized['listTypes'] = true;
        $this->listTypes = $listTypes;
        return $this;
    }
    /**
     * The regions seeds can be placed in. Objects rather than bare strings, to match the two lists beside it: the measurement reports no availability for a region today, and an object can carry one later without a second array.
     * 
     *
     * @return list<EmailInboxInsightsSeedRegionOption>|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }
    /**
     * The regions seeds can be placed in. Objects rather than bare strings, to match the two lists beside it: the measurement reports no availability for a region today, and an object can carry one later without a second array.
     *
     * @param list<EmailInboxInsightsSeedRegionOption>|null $regions
     *
     * @return self
     */
    public function setRegions(?array $regions): self
    {
        $this->initialized['regions'] = true;
        $this->regions = $regions;
        return $this;
    }
    /**
     * The engagement behaviours the seeds can simulate, each flagged with whether the account can use it.
     * 
     *
     * @return list<EmailInboxInsightsSeedEngagementProfileOption>|null
     */
    public function getEngagementProfiles(): ?array
    {
        return $this->engagementProfiles;
    }
    /**
     * The engagement behaviours the seeds can simulate, each flagged with whether the account can use it.
     *
     * @param list<EmailInboxInsightsSeedEngagementProfileOption>|null $engagementProfiles
     *
     * @return self
     */
    public function setEngagementProfiles(?array $engagementProfiles): self
    {
        $this->initialized['engagementProfiles'] = true;
        $this->engagementProfiles = $engagementProfiles;
        return $this;
    }
}
