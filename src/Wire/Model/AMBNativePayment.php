<?php

namespace MessageBird\Wire\Model;

/**
 * Apple Pay request created through the conversation payment endpoint. Contains no payment token or provider credentials.
 */
class AMBNativePayment
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
    protected $paymentId;
    /**
     * @return string|null
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }
    /**
     * @param string|null $paymentId
     *
     * @return self
     */
    public function setPaymentId(?string $paymentId): self
    {
        $this->initialized['paymentId'] = true;
        $this->paymentId = $paymentId;
        return $this;
    }
}
