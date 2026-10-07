<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedAddress
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
     * The address to add to the send's recipients. Include it exactly as given; an altered address is not a seed and will not be measured.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * A mailbox provider, as the measurement identifies it. A lowercase identifier rather than
     * a display name, so pick your own label for it, and treat the set as open: this is a long
     * tail rather than a handful of household names, and some entries are domains
     * (`fastmail.com`, `seznam.cz`) rather than brands.
     * 
     * The measurement places mail into its own seed lists, so its buckets are not the ones the
     * [mailbox-provider stats breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider)
     * reports: Microsoft's properties appear here as `hotmail` rather than `microsoft`, and
     * `apple` appears here where the Competitive Insights panel has no measurement for it at
     * all. None of the three is a joinable dimension against the others.
     * 
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * The region this address sits in, as the seed-test choices name it.
     *
     * @var string|null
     */
    protected $region;
    /**
     * Whether this address simulates a recipient who engages with mail. There are two behaviours rather than a scale, so a test either mixes both or uses one of them.
     * 
     *
     * @var bool|null
     */
    protected $engaging;
    /**
     * The address to add to the send's recipients. Include it exactly as given; an altered address is not a seed and will not be measured.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The address to add to the send's recipients. Include it exactly as given; an altered address is not a seed and will not be measured.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * A mailbox provider, as the measurement identifies it. A lowercase identifier rather than
     * a display name, so pick your own label for it, and treat the set as open: this is a long
     * tail rather than a handful of household names, and some entries are domains
     * (`fastmail.com`, `seznam.cz`) rather than brands.
     * 
     * The measurement places mail into its own seed lists, so its buckets are not the ones the
     * [mailbox-provider stats breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider)
     * reports: Microsoft's properties appear here as `hotmail` rather than `microsoft`, and
     * `apple` appears here where the Competitive Insights panel has no measurement for it at
     * all. None of the three is a joinable dimension against the others.
     * 
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
    * A mailbox provider, as the measurement identifies it. A lowercase identifier rather than
    a display name, so pick your own label for it, and treat the set as open: this is a long
    tail rather than a handful of household names, and some entries are domains
    (`fastmail.com`, `seznam.cz`) rather than brands.
    
    The measurement places mail into its own seed lists, so its buckets are not the ones the
    [mailbox-provider stats breakdown](/docs/api/reference/get-email-stats-by-mailbox-provider)
    reports: Microsoft's properties appear here as `hotmail` rather than `microsoft`, and
    `apple` appears here where the Competitive Insights panel has no measurement for it at
    all. None of the three is a joinable dimension against the others.
    
    *
    * @param string|null $mailboxProvider
    *
    * @return self
    */
    public function setMailboxProvider(?string $mailboxProvider): self
    {
        $this->initialized['mailboxProvider'] = true;
        $this->mailboxProvider = $mailboxProvider;
        return $this;
    }
    /**
     * The region this address sits in, as the seed-test choices name it.
     *
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }
    /**
     * The region this address sits in, as the seed-test choices name it.
     *
     * @param string|null $region
     *
     * @return self
     */
    public function setRegion(?string $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;
        return $this;
    }
    /**
     * Whether this address simulates a recipient who engages with mail. There are two behaviours rather than a scale, so a test either mixes both or uses one of them.
     * 
     *
     * @return bool|null
     */
    public function getEngaging(): ?bool
    {
        return $this->engaging;
    }
    /**
     * Whether this address simulates a recipient who engages with mail. There are two behaviours rather than a scale, so a test either mixes both or uses one of them.
     *
     * @param bool|null $engaging
     *
     * @return self
     */
    public function setEngaging(?bool $engaging): self
    {
        $this->initialized['engaging'] = true;
        $this->engaging = $engaging;
        return $this;
    }
}
