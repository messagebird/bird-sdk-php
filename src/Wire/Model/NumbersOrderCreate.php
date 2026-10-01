<?php

namespace MessageBird\Wire\Model;

class NumbersOrderCreate
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
     * The number to acquire, in E.164 format, as returned by `GET /v1/numbers/available`.
     *
     * @var string|null
     */
    protected $number;
    /**
     * Your own reference to set on the number when this purchase completes. Leading and trailing whitespace is removed. A pending order keeps the reference until the number is allocated.
     *
     * @var string|null
     */
    protected $reference;
    /**
     * The number to acquire, in E.164 format, as returned by `GET /v1/numbers/available`.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * The number to acquire, in E.164 format, as returned by `GET /v1/numbers/available`.
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
     * Your own reference to set on the number when this purchase completes. Leading and trailing whitespace is removed. A pending order keeps the reference until the number is allocated.
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    /**
     * Your own reference to set on the number when this purchase completes. Leading and trailing whitespace is removed. A pending order keeps the reference until the number is allocated.
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->initialized['reference'] = true;
        $this->reference = $reference;
        return $this;
    }
}
