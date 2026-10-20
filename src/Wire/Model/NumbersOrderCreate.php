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
     * Ownership paperwork for a number being ordered, where its country requires any. Optional always: the order completes and the number is yours either way, and supplying this only decides whether it can carry traffic sooner. Read `GET /v1/compliance/requirements` for the number to learn what is asked for, or file it after the order with `POST /v1/compliance/submissions`. Filing this cannot fail your order: if it is refused, the number is still yours and you can file again. The answers are a legal representation filed under the name of the business they describe. Sending this block uses the order's existing `numbers` scope at write level.
     * 
     *
     * @var NumbersOrderCompliance|null
     */
    protected $compliance;
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
    /**
     * Ownership paperwork for a number being ordered, where its country requires any. Optional always: the order completes and the number is yours either way, and supplying this only decides whether it can carry traffic sooner. Read `GET /v1/compliance/requirements` for the number to learn what is asked for, or file it after the order with `POST /v1/compliance/submissions`. Filing this cannot fail your order: if it is refused, the number is still yours and you can file again. The answers are a legal representation filed under the name of the business they describe. Sending this block uses the order's existing `numbers` scope at write level.
     * 
     *
     * @return NumbersOrderCompliance|null
     */
    public function getCompliance(): ?NumbersOrderCompliance
    {
        return $this->compliance;
    }
    /**
     * Ownership paperwork for a number being ordered, where its country requires any. Optional always: the order completes and the number is yours either way, and supplying this only decides whether it can carry traffic sooner. Read `GET /v1/compliance/requirements` for the number to learn what is asked for, or file it after the order with `POST /v1/compliance/submissions`. Filing this cannot fail your order: if it is refused, the number is still yours and you can file again. The answers are a legal representation filed under the name of the business they describe. Sending this block uses the order's existing `numbers` scope at write level.
     *
     * @param NumbersOrderCompliance|null $compliance
     *
     * @return self
     */
    public function setCompliance(?NumbersOrderCompliance $compliance): self
    {
        $this->initialized['compliance'] = true;
        $this->compliance = $compliance;
        return $this;
    }
}
