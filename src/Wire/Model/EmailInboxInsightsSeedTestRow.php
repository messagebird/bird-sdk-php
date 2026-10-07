<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestRow extends \ArrayObject
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
     * The sending domain the test was run for.
     *
     * @var string|null
     */
    protected $domain;
    /**
     * The regions the test placed seeds in, as the seed-test options name them. Null on a test that predates registration, whose regions were never recorded (the same unknown `list_type` and `engagement_profile` carry), and not an empty list, which would claim a test placed seeds in no region at all.
     * 
     *
     * @var list<string>|null
     */
    protected $regions;
    /**
     * How this test's inbox rate compares with the previous test for the same domain, in percentage points. Null when there is no earlier test to compare against.
     * 
     *
     * @var float|null
     */
    protected $deltaPtsVsPrior;
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
     * The sending domain the test was run for.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The sending domain the test was run for.
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
     * The regions the test placed seeds in, as the seed-test options name them. Null on a test that predates registration, whose regions were never recorded (the same unknown `list_type` and `engagement_profile` carry), and not an empty list, which would claim a test placed seeds in no region at all.
     * 
     *
     * @return list<string>|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }
    /**
     * The regions the test placed seeds in, as the seed-test options name them. Null on a test that predates registration, whose regions were never recorded (the same unknown `list_type` and `engagement_profile` carry), and not an empty list, which would claim a test placed seeds in no region at all.
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
     * How this test's inbox rate compares with the previous test for the same domain, in percentage points. Null when there is no earlier test to compare against.
     * 
     *
     * @return float|null
     */
    public function getDeltaPtsVsPrior(): ?float
    {
        return $this->deltaPtsVsPrior;
    }
    /**
     * How this test's inbox rate compares with the previous test for the same domain, in percentage points. Null when there is no earlier test to compare against.
     *
     * @param float|null $deltaPtsVsPrior
     *
     * @return self
     */
    public function setDeltaPtsVsPrior(?float $deltaPtsVsPrior): self
    {
        $this->initialized['deltaPtsVsPrior'] = true;
        $this->deltaPtsVsPrior = $deltaPtsVsPrior;
        return $this;
    }
}
