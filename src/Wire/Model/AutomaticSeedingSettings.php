<?php

namespace MessageBird\Wire\Model;

/**
 * Workspace automatic seeding settings. Before setup, revision is zero and the trigger address is absent. Unset list type, engagement profile and regions are omitted. Saved preferences are not checked against available seed-test options.
 */
class AutomaticSeedingSettings
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
     * Current settings revision. Supply it when updating settings. Initialize settings before rotating the trigger address.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Workspace trigger address for seeding examples. Absent before the first settings update. Using it requires authenticated sending access to this workspace; the address itself grants no access.
     *
     * @var string|null
     */
    protected $triggerAddress;
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
     * Saved regions to place seeds in, as `regions[].value` names from `GET /v1/email/inbox-insights/seed-tests/configuration`. They are not checked against that list when saved.
     *
     * @var list<string>|null
     */
    protected $regions;
    /**
     * Current settings revision. Supply it when updating settings. Initialize settings before rotating the trigger address.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Current settings revision. Supply it when updating settings. Initialize settings before rotating the trigger address.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
    /**
     * Workspace trigger address for seeding examples. Absent before the first settings update. Using it requires authenticated sending access to this workspace; the address itself grants no access.
     *
     * @return string|null
     */
    public function getTriggerAddress(): ?string
    {
        return $this->triggerAddress;
    }
    /**
     * Workspace trigger address for seeding examples. Absent before the first settings update. Using it requires authenticated sending access to this workspace; the address itself grants no access.
     *
     * @param string|null $triggerAddress
     *
     * @return self
     */
    public function setTriggerAddress(?string $triggerAddress): self
    {
        $this->initialized['triggerAddress'] = true;
        $this->triggerAddress = $triggerAddress;
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
     * Saved regions to place seeds in, as `regions[].value` names from `GET /v1/email/inbox-insights/seed-tests/configuration`. They are not checked against that list when saved.
     *
     * @return list<string>|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }
    /**
     * Saved regions to place seeds in, as `regions[].value` names from `GET /v1/email/inbox-insights/seed-tests/configuration`. They are not checked against that list when saved.
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
