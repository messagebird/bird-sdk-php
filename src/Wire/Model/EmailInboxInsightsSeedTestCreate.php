<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestCreate
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
     * The sending domain the test measures: one of the workspace's verified sending domains, exactly as it appears there.
     * 
     *
     * @var string|null
     */
    protected $sendingDomain;
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     * 
     *
     * @var string|null
     */
    protected $listType;
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     * 
     *
     * @var string|null
     */
    protected $engagementProfile;
    /**
     * The regions to place seeds in, as the seed-test configuration names them.
     *
     * @var list<string>|null
     */
    protected $regions;
    /**
     * A name attached to this registration. It is not returned in seed-test history.
     *
     * @var string|null
     */
    protected $label;
    /**
     * The sending domain the test measures: one of the workspace's verified sending domains, exactly as it appears there.
     * 
     *
     * @return string|null
     */
    public function getSendingDomain(): ?string
    {
        return $this->sendingDomain;
    }
    /**
     * The sending domain the test measures: one of the workspace's verified sending domains, exactly as it appears there.
     *
     * @param string|null $sendingDomain
     *
     * @return self
     */
    public function setSendingDomain(?string $sendingDomain): self
    {
        $this->initialized['sendingDomain'] = true;
        $this->sendingDomain = $sendingDomain;
        return $this;
    }
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     * 
     *
     * @return string|null
     */
    public function getListType(): ?string
    {
        return $this->listType;
    }
    /**
     * Which pool of seed addresses a test uses. Which pools an account can use depends on what has been provisioned for it, so read the usable set from the seed-test options rather than assuming these are the only values.
     *
     * @param string|null $listType
     *
     * @return self
     */
    public function setListType(?string $listType): self
    {
        $this->initialized['listType'] = true;
        $this->listType = $listType;
        return $this;
    }
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     * 
     *
     * @return string|null
     */
    public function getEngagementProfile(): ?string
    {
        return $this->engagementProfile;
    }
    /**
     * Which engagement behaviour the seed addresses simulate. `all` mixes engaged and dormant seeds, which is what makes an engagement split measurable; single-cohort profiles exist too, and the usable set comes from the seed-test options rather than from this list.
     *
     * @param string|null $engagementProfile
     *
     * @return self
     */
    public function setEngagementProfile(?string $engagementProfile): self
    {
        $this->initialized['engagementProfile'] = true;
        $this->engagementProfile = $engagementProfile;
        return $this;
    }
    /**
     * The regions to place seeds in, as the seed-test configuration names them.
     *
     * @return list<string>|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }
    /**
     * The regions to place seeds in, as the seed-test configuration names them.
     *
     * @param list<string>|null $regions
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
     * A name attached to this registration. It is not returned in seed-test history.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * A name attached to this registration. It is not returned in seed-test history.
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
}
