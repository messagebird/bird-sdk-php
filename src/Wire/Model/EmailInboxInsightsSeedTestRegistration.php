<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestRegistration
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
     * Identifies this registration. It is not the identifier the seed-test list
     * reports for the resulting test.
     * 
     * It is here so a registration can be quoted in a support conversation, and
     * so a client can tell two registrations apart. To read the results, find
     * the test in the seed-test list for this domain.
     * 
     *
     * @var string|null
     */
    protected $registrationId;
    /**
     * Every address to include in the tested send. Copy them into the send's recipients; results are measured from mail these addresses receive.
     * 
     *
     * @var list<EmailInboxInsightsSeedAddress>|null
     */
    protected $seedAddresses;
    /**
     * How many seed addresses the test issued.
     *
     * @var int|null
     */
    protected $seedCount;
    /**
     * When the test expires if no seed mail has arrived. An expired test never produces results, and the allowance it spent is not returned, so send before this time.
     * 
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * Identifies this registration. It is not the identifier the seed-test list
     * reports for the resulting test.
     * 
     * It is here so a registration can be quoted in a support conversation, and
     * so a client can tell two registrations apart. To read the results, find
     * the test in the seed-test list for this domain.
     * 
     *
     * @return string|null
     */
    public function getRegistrationId(): ?string
    {
        return $this->registrationId;
    }
    /**
    * Identifies this registration. It is not the identifier the seed-test list
    reports for the resulting test.
    
    It is here so a registration can be quoted in a support conversation, and
    so a client can tell two registrations apart. To read the results, find
    the test in the seed-test list for this domain.
    
    *
    * @param string|null $registrationId
    *
    * @return self
    */
    public function setRegistrationId(?string $registrationId): self
    {
        $this->initialized['registrationId'] = true;
        $this->registrationId = $registrationId;
        return $this;
    }
    /**
     * Every address to include in the tested send. Copy them into the send's recipients; results are measured from mail these addresses receive.
     * 
     *
     * @return list<EmailInboxInsightsSeedAddress>|null
     */
    public function getSeedAddresses(): ?array
    {
        return $this->seedAddresses;
    }
    /**
     * Every address to include in the tested send. Copy them into the send's recipients; results are measured from mail these addresses receive.
     *
     * @param list<EmailInboxInsightsSeedAddress>|null $seedAddresses
     *
     * @return self
     */
    public function setSeedAddresses(?array $seedAddresses): self
    {
        $this->initialized['seedAddresses'] = true;
        $this->seedAddresses = $seedAddresses;
        return $this;
    }
    /**
     * How many seed addresses the test issued.
     *
     * @return int|null
     */
    public function getSeedCount(): ?int
    {
        return $this->seedCount;
    }
    /**
     * How many seed addresses the test issued.
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
     * When the test expires if no seed mail has arrived. An expired test never produces results, and the allowance it spent is not returned, so send before this time.
     * 
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When the test expires if no seed mail has arrived. An expired test never produces results, and the allowance it spent is not returned, so send before this time.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
}
