<?php

namespace MessageBird\Wire\Model;

class EsimSummary
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
     * The assigned service user, or null when the eSIM has no person assignment.
     *
     * @var string|null
     */
    protected $subscriberId;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $mode;
    /**
     * ICCID of the eSIM profile, or null while none is allocated.
     *
     * @var string|null
     */
    protected $iccid;
    /**
     * Phone number attached to this eSIM, in E.164 format, as the supplier reports it. Null while none is on record.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Free-text label for your own reference.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * The assigned service user, or null when the eSIM has no person assignment.
     *
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }
    /**
     * The assigned service user, or null when the eSIM has no person assignment.
     *
     * @param string|null $subscriberId
     *
     * @return self
     */
    public function setSubscriberId(?string $subscriberId): self
    {
        $this->initialized['subscriberId'] = true;
        $this->subscriberId = $subscriberId;
        return $this;
    }
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
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }
    /**
     * @param string|null $mode
     *
     * @return self
     */
    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;
        return $this;
    }
    /**
     * ICCID of the eSIM profile, or null while none is allocated.
     *
     * @return string|null
     */
    public function getIccid(): ?string
    {
        return $this->iccid;
    }
    /**
     * ICCID of the eSIM profile, or null while none is allocated.
     *
     * @param string|null $iccid
     *
     * @return self
     */
    public function setIccid(?string $iccid): self
    {
        $this->initialized['iccid'] = true;
        $this->iccid = $iccid;
        return $this;
    }
    /**
     * Phone number attached to this eSIM, in E.164 format, as the supplier reports it. Null while none is on record.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number attached to this eSIM, in E.164 format, as the supplier reports it. Null while none is on record.
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
     * Free-text label for your own reference.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Free-text label for your own reference.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
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
}
