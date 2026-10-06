<?php

namespace MessageBird\Wire\Model;

class EsimCredentialsDelivery
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
    protected $channel;
    /**
     * Recipient address the message goes to.
     *
     * @var string|null
     */
    protected $to;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Why the delivery failed. Null unless status is failed. Open enum: treat unrecognized values as future failure kinds.
     *
     * @var string|null
     */
    protected $failureCode;
    /**
     * When the delivery was accepted.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the outcome became known. Null while pending.
     *
     * @var \DateTime|null
     */
    protected $settledAt;
    /**
     * Link metadata for explicit revocation. Null for deliveries created before hosted links were enabled.
     *
     * @var EsimCredentialsDeliveryInstallLink|null
     */
    protected $installLink;
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
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * Recipient address the message goes to.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Recipient address the message goes to.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
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
     * Why the delivery failed. Null unless status is failed. Open enum: treat unrecognized values as future failure kinds.
     *
     * @return string|null
     */
    public function getFailureCode(): ?string
    {
        return $this->failureCode;
    }
    /**
     * Why the delivery failed. Null unless status is failed. Open enum: treat unrecognized values as future failure kinds.
     *
     * @param string|null $failureCode
     *
     * @return self
     */
    public function setFailureCode(?string $failureCode): self
    {
        $this->initialized['failureCode'] = true;
        $this->failureCode = $failureCode;
        return $this;
    }
    /**
     * When the delivery was accepted.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the delivery was accepted.
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
    /**
     * When the outcome became known. Null while pending.
     *
     * @return \DateTime|null
     */
    public function getSettledAt(): ?\DateTime
    {
        return $this->settledAt;
    }
    /**
     * When the outcome became known. Null while pending.
     *
     * @param \DateTime|null $settledAt
     *
     * @return self
     */
    public function setSettledAt(?\DateTime $settledAt): self
    {
        $this->initialized['settledAt'] = true;
        $this->settledAt = $settledAt;
        return $this;
    }
    /**
     * Link metadata for explicit revocation. Null for deliveries created before hosted links were enabled.
     *
     * @return EsimCredentialsDeliveryInstallLink|null
     */
    public function getInstallLink(): ?EsimCredentialsDeliveryInstallLink
    {
        return $this->installLink;
    }
    /**
     * Link metadata for explicit revocation. Null for deliveries created before hosted links were enabled.
     *
     * @param EsimCredentialsDeliveryInstallLink|null $installLink
     *
     * @return self
     */
    public function setInstallLink(?EsimCredentialsDeliveryInstallLink $installLink): self
    {
        $this->initialized['installLink'] = true;
        $this->installLink = $installLink;
        return $this;
    }
}
