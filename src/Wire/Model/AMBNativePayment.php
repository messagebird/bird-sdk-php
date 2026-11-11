<?php

namespace MessageBird\Wire\Model;

/**
 * An Apple Pay request. Read-only. It appears on existing messages, and sends and templates do not accept it. Apple Pay requests are in preview. Contains no payment token or provider credentials.
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
