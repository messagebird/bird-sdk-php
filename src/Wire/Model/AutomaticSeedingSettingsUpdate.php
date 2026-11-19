<?php

namespace MessageBird\Wire\Model;

/**
 * Replace automatic seeding settings. Omitted selections clear the saved values. Enabling requires a list type, engagement profile and at least one region. Preferences are not checked against available seed-test options. A stale revision returns a conflict without changing settings.
 */
class AutomaticSeedingSettingsUpdate
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
     * Revision from the latest settings read, or zero for initial setup.
     *
     * @var int|null
     */
    protected $expectedRevision;
    /**
     * Saved automatic-seeding preference.
     *
     * @var bool|null
     */
    protected $enabled;
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
     * Regions to place seeds in. Use `regions[].value` exactly as returned by `GET /v1/email/inbox-insights/seed-tests/configuration` for the sending domain your examples come from. Whitespace-only names are rejected, but names are not checked against that list when saved; a name it does not offer makes a later run end with `selection_unavailable`.
     *
     * @var list<string>|null
     */
    protected $regions;
    /**
     * Revision from the latest settings read, or zero for initial setup.
     *
     * @return int|null
     */
    public function getExpectedRevision(): ?int
    {
        return $this->expectedRevision;
    }
    /**
     * Revision from the latest settings read, or zero for initial setup.
     *
     * @param int|null $expectedRevision
     *
     * @return self
     */
    public function setExpectedRevision(?int $expectedRevision): self
    {
        $this->initialized['expectedRevision'] = true;
        $this->expectedRevision = $expectedRevision;
        return $this;
    }
    /**
     * Saved automatic-seeding preference.
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Saved automatic-seeding preference.
     *
     * @param bool|null $enabled
     *
     * @return self
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
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
     * Regions to place seeds in. Use `regions[].value` exactly as returned by `GET /v1/email/inbox-insights/seed-tests/configuration` for the sending domain your examples come from. Whitespace-only names are rejected, but names are not checked against that list when saved; a name it does not offer makes a later run end with `selection_unavailable`.
     *
     * @return list<string>|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }
    /**
     * Regions to place seeds in. Use `regions[].value` exactly as returned by `GET /v1/email/inbox-insights/seed-tests/configuration` for the sending domain your examples come from. Whitespace-only names are rejected, but names are not checked against that list when saved; a name it does not offer makes a later run end with `selection_unavailable`.
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
}
