<?php

namespace MessageBird\Wire\Model;

class NumbersOrder
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
     * Identifier of this purchase order.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The number being acquired, in E.164 format.
     *
     * @var string|null
     */
    protected $number;
    /**
     * @var string|null
     */
    protected $countryCode;
    /**
     * Physical type of the number being acquired.
     *
     * @var string|null
     */
    protected $numberType;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Identifier of the number this order produced, set when `status` is `completed`. Pass it as `number_id` to `GET /v1/numbers/{number_id}` or `DELETE /v1/numbers/{number_id}`. `null` until the order completes.
     * 
     *
     * @var string|null
     */
    protected $numberId;
    /**
     * Human-readable reason the purchase failed. `null` unless status is failed. An order can fail some time after it was created, so `updated_at` tells you when the failure was recorded rather than when the order was placed.
     * 
     *
     * @var string|null
     */
    protected $failureReason;
    /**
     * When the purchase completed and the number became owned (status completed). `null` for orders still in progress or failed.
     * 
     *
     * @var \DateTime|null
     */
    protected $completedAt;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Identifier of this purchase order.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Identifier of this purchase order.
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
     * The number being acquired, in E.164 format.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * The number being acquired, in E.164 format.
     *
     * @param string|null $number
     *
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Physical type of the number being acquired.
     *
     * @return string|null
     */
    public function getNumberType(): ?string
    {
        return $this->numberType;
    }
    /**
     * Physical type of the number being acquired.
     *
     * @param string|null $numberType
     *
     * @return self
     */
    public function setNumberType(?string $numberType): self
    {
        $this->initialized['numberType'] = true;
        $this->numberType = $numberType;
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
     * Identifier of the number this order produced, set when `status` is `completed`. Pass it as `number_id` to `GET /v1/numbers/{number_id}` or `DELETE /v1/numbers/{number_id}`. `null` until the order completes.
     * 
     *
     * @return string|null
     */
    public function getNumberId(): ?string
    {
        return $this->numberId;
    }
    /**
     * Identifier of the number this order produced, set when `status` is `completed`. Pass it as `number_id` to `GET /v1/numbers/{number_id}` or `DELETE /v1/numbers/{number_id}`. `null` until the order completes.
     *
     * @param string|null $numberId
     *
     * @return self
     */
    public function setNumberId(?string $numberId): self
    {
        $this->initialized['numberId'] = true;
        $this->numberId = $numberId;
        return $this;
    }
    /**
     * Human-readable reason the purchase failed. `null` unless status is failed. An order can fail some time after it was created, so `updated_at` tells you when the failure was recorded rather than when the order was placed.
     * 
     *
     * @return string|null
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }
    /**
     * Human-readable reason the purchase failed. `null` unless status is failed. An order can fail some time after it was created, so `updated_at` tells you when the failure was recorded rather than when the order was placed.
     *
     * @param string|null $failureReason
     *
     * @return self
     */
    public function setFailureReason(?string $failureReason): self
    {
        $this->initialized['failureReason'] = true;
        $this->failureReason = $failureReason;
        return $this;
    }
    /**
     * When the purchase completed and the number became owned (status completed). `null` for orders still in progress or failed.
     * 
     *
     * @return \DateTime|null
     */
    public function getCompletedAt(): ?\DateTime
    {
        return $this->completedAt;
    }
    /**
     * When the purchase completed and the number became owned (status completed). `null` for orders still in progress or failed.
     *
     * @param \DateTime|null $completedAt
     *
     * @return self
     */
    public function setCompletedAt(?\DateTime $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;
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
