<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestDetail extends \ArrayObject
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
     * The test's identifier. It is a string and needs to stay one: the values are long enough that any language storing every number as a floating point value will round them, and a rounded identifier matches no test.
     * 
     *
     * @var string|null
     */
    protected $testId;
    /**
     * Subject line of the tested send, or null before the send goes out. With `tested_at`, this is what distinguishes a test that has run from one still waiting for its send.
     * 
     *
     * @var string|null
     */
    protected $subject;
    /**
     * When the tested send went out, or null while the test is still awaiting it.
     *
     * @var \DateTime|null
     */
    protected $testedAt;
    /**
     * The seed pool the test used, or null on a test that predates the recording of it.
     * 
     *
     * @var string|null
     */
    protected $listType;
    /**
     * The engagement behaviour the seeds simulated, or null on a test that predates the recording of it.
     * 
     *
     * @var string|null
     */
    protected $engagementProfile;
    /**
     * How many seed addresses the test used.
     *
     * @var int|null
     */
    protected $seedCount;
    /**
     * Share of the test's seed addresses that received the message in the inbox, as a percentage. Null until results arrive.
     * 
     *
     * @var float|null
     */
    protected $inboxRatePercent;
    /**
     * The per-provider grid for one seed test.
     *
     * @var EmailInboxInsightsSeedTestProviders|null
     */
    protected $providers;
    /**
     * How the tested send authenticated, measured on the seed mail itself rather than on reporting from receivers.
     * 
     *
     * @var EmailInboxInsightsSeedTestAuth|null
     */
    protected $auth;
    /**
     * Engaged against dormant placement, per provider. The status is `not_applicable` for a test run with a single-cohort engagement profile, where there is no second group to compare: hide the comparison rather than showing a zero gap.
     * 
     *
     * @var EmailInboxInsightsSeedEngagementSplit|null
     */
    protected $engagementSplit;
    /**
     * The test's identifier. It is a string and needs to stay one: the values are long enough that any language storing every number as a floating point value will round them, and a rounded identifier matches no test.
     * 
     *
     * @return string|null
     */
    public function getTestId(): ?string
    {
        return $this->testId;
    }
    /**
     * The test's identifier. It is a string and needs to stay one: the values are long enough that any language storing every number as a floating point value will round them, and a rounded identifier matches no test.
     *
     * @param string|null $testId
     *
     * @return self
     */
    public function setTestId(?string $testId): self
    {
        $this->initialized['testId'] = true;
        $this->testId = $testId;
        return $this;
    }
    /**
     * Subject line of the tested send, or null before the send goes out. With `tested_at`, this is what distinguishes a test that has run from one still waiting for its send.
     * 
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * Subject line of the tested send, or null before the send goes out. With `tested_at`, this is what distinguishes a test that has run from one still waiting for its send.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * When the tested send went out, or null while the test is still awaiting it.
     *
     * @return \DateTime|null
     */
    public function getTestedAt(): ?\DateTime
    {
        return $this->testedAt;
    }
    /**
     * When the tested send went out, or null while the test is still awaiting it.
     *
     * @param \DateTime|null $testedAt
     *
     * @return self
     */
    public function setTestedAt(?\DateTime $testedAt): self
    {
        $this->initialized['testedAt'] = true;
        $this->testedAt = $testedAt;
        return $this;
    }
    /**
     * The seed pool the test used, or null on a test that predates the recording of it.
     * 
     *
     * @return string|null
     */
    public function getListType(): ?string
    {
        return $this->listType;
    }
    /**
     * The seed pool the test used, or null on a test that predates the recording of it.
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
     * The engagement behaviour the seeds simulated, or null on a test that predates the recording of it.
     * 
     *
     * @return string|null
     */
    public function getEngagementProfile(): ?string
    {
        return $this->engagementProfile;
    }
    /**
     * The engagement behaviour the seeds simulated, or null on a test that predates the recording of it.
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
     * How many seed addresses the test used.
     *
     * @return int|null
     */
    public function getSeedCount(): ?int
    {
        return $this->seedCount;
    }
    /**
     * How many seed addresses the test used.
     *
     * @param int|null $seedCount
     *
     * @return self
     */
    public function setSeedCount(?int $seedCount): self
    {
        $this->initialized['seedCount'] = true;
        $this->seedCount = $seedCount;
        return $this;
    }
    /**
     * Share of the test's seed addresses that received the message in the inbox, as a percentage. Null until results arrive.
     * 
     *
     * @return float|null
     */
    public function getInboxRatePercent(): ?float
    {
        return $this->inboxRatePercent;
    }
    /**
     * Share of the test's seed addresses that received the message in the inbox, as a percentage. Null until results arrive.
     *
     * @param float|null $inboxRatePercent
     *
     * @return self
     */
    public function setInboxRatePercent(?float $inboxRatePercent): self
    {
        $this->initialized['inboxRatePercent'] = true;
        $this->inboxRatePercent = $inboxRatePercent;
        return $this;
    }
    /**
     * The per-provider grid for one seed test.
     *
     * @return EmailInboxInsightsSeedTestProviders|null
     */
    public function getProviders(): ?EmailInboxInsightsSeedTestProviders
    {
        return $this->providers;
    }
    /**
     * The per-provider grid for one seed test.
     *
     * @param EmailInboxInsightsSeedTestProviders|null $providers
     *
     * @return self
     */
    public function setProviders(?EmailInboxInsightsSeedTestProviders $providers): self
    {
        $this->initialized['providers'] = true;
        $this->providers = $providers;
        return $this;
    }
    /**
     * How the tested send authenticated, measured on the seed mail itself rather than on reporting from receivers.
     * 
     *
     * @return EmailInboxInsightsSeedTestAuth|null
     */
    public function getAuth(): ?EmailInboxInsightsSeedTestAuth
    {
        return $this->auth;
    }
    /**
     * How the tested send authenticated, measured on the seed mail itself rather than on reporting from receivers.
     *
     * @param EmailInboxInsightsSeedTestAuth|null $auth
     *
     * @return self
     */
    public function setAuth(?EmailInboxInsightsSeedTestAuth $auth): self
    {
        $this->initialized['auth'] = true;
        $this->auth = $auth;
        return $this;
    }
    /**
     * Engaged against dormant placement, per provider. The status is `not_applicable` for a test run with a single-cohort engagement profile, where there is no second group to compare: hide the comparison rather than showing a zero gap.
     * 
     *
     * @return EmailInboxInsightsSeedEngagementSplit|null
     */
    public function getEngagementSplit(): ?EmailInboxInsightsSeedEngagementSplit
    {
        return $this->engagementSplit;
    }
    /**
     * Engaged against dormant placement, per provider. The status is `not_applicable` for a test run with a single-cohort engagement profile, where there is no second group to compare: hide the comparison rather than showing a zero gap.
     *
     * @param EmailInboxInsightsSeedEngagementSplit|null $engagementSplit
     *
     * @return self
     */
    public function setEngagementSplit(?EmailInboxInsightsSeedEngagementSplit $engagementSplit): self
    {
        $this->initialized['engagementSplit'] = true;
        $this->engagementSplit = $engagementSplit;
        return $this;
    }
}
