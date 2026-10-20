<?php

namespace MessageBird\Wire\Model;

/**
 * A party you register on behalf of: your own business, or one of your clients. Reusing an identity across registrations is what stops you retyping the same business details for every country, and lets a fact reviewed once stand for the registrations that follow.
 */
class ComplianceIdentity
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
     * @var string|null
     */
    protected $id;
    /**
     * What you call this party. Yours to choose; it is never sent to a carrier.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The business details this party has supplied, keyed by requirement. Filled in for you: a single-value detail lands here the moment you file it on one of your registrations, so the next one prefills it rather than asking again. Only requirements a country marks as being about the party appear; anything about a specific sender is asked fresh each time.
     *
     * @var array<string, ComplianceIdentityAnswer>|null
     */
    protected $answers;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * What you call this party. Yours to choose; it is never sent to a carrier.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * What you call this party. Yours to choose; it is never sent to a carrier.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The business details this party has supplied, keyed by requirement. Filled in for you: a single-value detail lands here the moment you file it on one of your registrations, so the next one prefills it rather than asking again. Only requirements a country marks as being about the party appear; anything about a specific sender is asked fresh each time.
     *
     * @return array<string, ComplianceIdentityAnswer>|null
     */
    public function getAnswers(): ?iterable
    {
        return $this->answers;
    }
    /**
     * The business details this party has supplied, keyed by requirement. Filled in for you: a single-value detail lands here the moment you file it on one of your registrations, so the next one prefills it rather than asking again. Only requirements a country marks as being about the party appear; anything about a specific sender is asked fresh each time.
     *
     * @param array<string, ComplianceIdentityAnswer>|null $answers
     *
     * @return self
     */
    public function setAnswers(?iterable $answers): self
    {
        $this->initialized['answers'] = true;
        $this->answers = $answers;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
