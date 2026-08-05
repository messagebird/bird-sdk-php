<?php

namespace MessageBird\Wire\Model;

class AudienceMember
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
     * @var Contact|null
     */
    protected $contact;
    /**
     * When this contact joined the audience. Members are listed in join order, most recent first.
     *
     * @var \DateTime|null
     */
    protected $joinedAt;
    /**
     * The audiences this contact belongs to, including the one being listed, most-recently-joined first.
     *
     * @var list<AudienceRef>|null
     */
    protected $audiences;
    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }
    /**
     * @param Contact|null $contact
     *
     * @return self
     */
    public function setContact(?Contact $contact): self
    {
        $this->initialized['contact'] = true;
        $this->contact = $contact;
        return $this;
    }
    /**
     * When this contact joined the audience. Members are listed in join order, most recent first.
     *
     * @return \DateTime|null
     */
    public function getJoinedAt(): ?\DateTime
    {
        return $this->joinedAt;
    }
    /**
     * When this contact joined the audience. Members are listed in join order, most recent first.
     *
     * @param \DateTime|null $joinedAt
     *
     * @return self
     */
    public function setJoinedAt(?\DateTime $joinedAt): self
    {
        $this->initialized['joinedAt'] = true;
        $this->joinedAt = $joinedAt;
        return $this;
    }
    /**
     * The audiences this contact belongs to, including the one being listed, most-recently-joined first.
     *
     * @return list<AudienceRef>|null
     */
    public function getAudiences(): ?array
    {
        return $this->audiences;
    }
    /**
     * The audiences this contact belongs to, including the one being listed, most-recently-joined first.
     *
     * @param list<AudienceRef>|null $audiences
     *
     * @return self
     */
    public function setAudiences(?array $audiences): self
    {
        $this->initialized['audiences'] = true;
        $this->audiences = $audiences;
        return $this;
    }
}
