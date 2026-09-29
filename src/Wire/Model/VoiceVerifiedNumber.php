<?php

namespace MessageBird\Wire\Model;

class VoiceVerifiedNumber extends \ArrayObject
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
     * @var string|null
     */
    protected $workspaceId;
    /**
     * The phone number in E.164 format registered as an outbound caller ID.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Your label for this verified number, to tell several registered numbers apart. `null` when the verified number has no label. It is yours to choose and appears nowhere on a call, so changing it never affects what the person you are calling sees. Set it with the verified number update operation.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Verification state of the verified number.
     * 
     * - `pending`: the number is registered but ownership has not yet been proven.
     * - `verified`: the workspace proved ownership of the number. Check the
     *   resource's activation or direction fields for outbound availability.
     * - `failed`: terminal because the verification challenge expired or the attempt limit was exhausted.
     *   Remove and register the verified number again in the dashboard to retry.
     * 
     * Open enum: additional states may be added over time, so treat an unrecognized
     * value as a future state rather than an error.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Whether outbound caller ID activation has completed. A verified number can remain inactive until activation requirements are met. Outbound calls remain subject to routing and number ownership requirements.
     *
     * @var bool|null
     */
    protected $outboundEnabled;
    /**
     * When the verified number was verified. `null` when its status is `pending` or `failed`.
     *
     * @var \DateTime|null
     */
    protected $verifiedAt;
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
     * @return string|null
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }
    /**
     * @param string|null $workspaceId
     *
     * @return self
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;
        return $this;
    }
    /**
     * The phone number in E.164 format registered as an outbound caller ID.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The phone number in E.164 format registered as an outbound caller ID.
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
     * Your label for this verified number, to tell several registered numbers apart. `null` when the verified number has no label. It is yours to choose and appears nowhere on a call, so changing it never affects what the person you are calling sees. Set it with the verified number update operation.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your label for this verified number, to tell several registered numbers apart. `null` when the verified number has no label. It is yours to choose and appears nowhere on a call, so changing it never affects what the person you are calling sees. Set it with the verified number update operation.
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
     * Verification state of the verified number.
     * 
     * - `pending`: the number is registered but ownership has not yet been proven.
     * - `verified`: the workspace proved ownership of the number. Check the
     *   resource's activation or direction fields for outbound availability.
     * - `failed`: terminal because the verification challenge expired or the attempt limit was exhausted.
     *   Remove and register the verified number again in the dashboard to retry.
     * 
     * Open enum: additional states may be added over time, so treat an unrecognized
     * value as a future state rather than an error.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Verification state of the verified number.
    
    - `pending`: the number is registered but ownership has not yet been proven.
    - `verified`: the workspace proved ownership of the number. Check the
     resource's activation or direction fields for outbound availability.
    - `failed`: terminal because the verification challenge expired or the attempt limit was exhausted.
     Remove and register the verified number again in the dashboard to retry.
    
    Open enum: additional states may be added over time, so treat an unrecognized
    value as a future state rather than an error.
    
    *
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
     * Whether outbound caller ID activation has completed. A verified number can remain inactive until activation requirements are met. Outbound calls remain subject to routing and number ownership requirements.
     *
     * @return bool|null
     */
    public function getOutboundEnabled(): ?bool
    {
        return $this->outboundEnabled;
    }
    /**
     * Whether outbound caller ID activation has completed. A verified number can remain inactive until activation requirements are met. Outbound calls remain subject to routing and number ownership requirements.
     *
     * @param bool|null $outboundEnabled
     *
     * @return self
     */
    public function setOutboundEnabled(?bool $outboundEnabled): self
    {
        $this->initialized['outboundEnabled'] = true;
        $this->outboundEnabled = $outboundEnabled;
        return $this;
    }
    /**
     * When the verified number was verified. `null` when its status is `pending` or `failed`.
     *
     * @return \DateTime|null
     */
    public function getVerifiedAt(): ?\DateTime
    {
        return $this->verifiedAt;
    }
    /**
     * When the verified number was verified. `null` when its status is `pending` or `failed`.
     *
     * @param \DateTime|null $verifiedAt
     *
     * @return self
     */
    public function setVerifiedAt(?\DateTime $verifiedAt): self
    {
        $this->initialized['verifiedAt'] = true;
        $this->verifiedAt = $verifiedAt;
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
