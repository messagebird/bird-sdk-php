<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupJoinRequest
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
     * Unique identifier for the join request. Pass it to the batch-approve and batch-reject operations.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Business-scoped user ID, Meta's identifier for this person against your business. The one identifier every request has, and the one that carries over to `participants` if you approve it.
     * 
     *
     * @var string|null
     */
    protected $bsuid;
    /**
     * Phone number in E.164 format. Absent when WhatsApp withholds it, which it does for anyone who has not shared their number with your business.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The WhatsApp username this person chose. Absent when they have none, and theirs to change, so it names them in a list rather than keying anything.
     * 
     *
     * @var string|null
     */
    protected $username;
    /**
     * When the request was made.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Unique identifier for the join request. Pass it to the batch-approve and batch-reject operations.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier for the join request. Pass it to the batch-approve and batch-reject operations.
     *
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
     * Business-scoped user ID, Meta's identifier for this person against your business. The one identifier every request has, and the one that carries over to `participants` if you approve it.
     * 
     *
     * @return string|null
     */
    public function getBsuid(): ?string
    {
        return $this->bsuid;
    }
    /**
     * Business-scoped user ID, Meta's identifier for this person against your business. The one identifier every request has, and the one that carries over to `participants` if you approve it.
     *
     * @param string|null $bsuid
     *
     * @return self
     */
    public function setBsuid(?string $bsuid): self
    {
        $this->initialized['bsuid'] = true;
        $this->bsuid = $bsuid;
        return $this;
    }
    /**
     * Phone number in E.164 format. Absent when WhatsApp withholds it, which it does for anyone who has not shared their number with your business.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number in E.164 format. Absent when WhatsApp withholds it, which it does for anyone who has not shared their number with your business.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * The WhatsApp username this person chose. Absent when they have none, and theirs to change, so it names them in a list rather than keying anything.
     * 
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * The WhatsApp username this person chose. Absent when they have none, and theirs to change, so it names them in a list rather than keying anything.
     *
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
        return $this;
    }
    /**
     * When the request was made.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the request was made.
     *
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
}
