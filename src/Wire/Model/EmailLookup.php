<?php

namespace MessageBird\Wire\Model;

class EmailLookup
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
     * The address that was looked up, exactly as you sent it.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Whether the address is well-formed and its domain is set up to receive mail at all. It says nothing about the mailbox itself, so a `valid` domain with no such mailbox is `true` here and `undeliverable` in `result`.
     *
     * @var bool|null
     */
    protected $valid;
    /**
     * @var string|null
     */
    protected $result;
    /**
     * How likely mail to this address is to be delivered, from 0 (certain not to be) to 100 (certain to be). Read it alongside `result` rather than instead of it, because the same score can sit under `neutral` or `risky` for different reasons.
     *
     * @var int|null
     */
    protected $deliveryConfidence;
    /**
     * Notable characteristics of the address. Empty when none apply.
     *
     * @var list<string>|null
     */
    protected $flags;
    /**
     * Why the address cannot receive mail. Absent unless `result` is `undeliverable`.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * The address this one looks like a misspelling of. Absent unless a correction was found, which in practice means `result` is `typo`. Offer it to whoever typed the original rather than sending to it unasked, because it is a guess and the address they meant may be neither one.
     *
     * @var string|null
     */
    protected $didYouMean;
    /**
     * The address that was looked up, exactly as you sent it.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The address that was looked up, exactly as you sent it.
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * Whether the address is well-formed and its domain is set up to receive mail at all. It says nothing about the mailbox itself, so a `valid` domain with no such mailbox is `true` here and `undeliverable` in `result`.
     *
     * @return bool|null
     */
    public function getValid(): ?bool
    {
        return $this->valid;
    }
    /**
     * Whether the address is well-formed and its domain is set up to receive mail at all. It says nothing about the mailbox itself, so a `valid` domain with no such mailbox is `true` here and `undeliverable` in `result`.
     *
     * @param bool|null $valid
     *
     * @return self
     */
    public function setValid(?bool $valid): self
    {
        $this->initialized['valid'] = true;
        $this->valid = $valid;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }
    /**
     * @param string|null $result
     *
     * @return self
     */
    public function setResult(?string $result): self
    {
        $this->initialized['result'] = true;
        $this->result = $result;
        return $this;
    }
    /**
     * How likely mail to this address is to be delivered, from 0 (certain not to be) to 100 (certain to be). Read it alongside `result` rather than instead of it, because the same score can sit under `neutral` or `risky` for different reasons.
     *
     * @return int|null
     */
    public function getDeliveryConfidence(): ?int
    {
        return $this->deliveryConfidence;
    }
    /**
     * How likely mail to this address is to be delivered, from 0 (certain not to be) to 100 (certain to be). Read it alongside `result` rather than instead of it, because the same score can sit under `neutral` or `risky` for different reasons.
     *
     * @param int|null $deliveryConfidence
     *
     * @return self
     */
    public function setDeliveryConfidence(?int $deliveryConfidence): self
    {
        $this->initialized['deliveryConfidence'] = true;
        $this->deliveryConfidence = $deliveryConfidence;
        return $this;
    }
    /**
     * Notable characteristics of the address. Empty when none apply.
     *
     * @return list<string>|null
     */
    public function getFlags(): ?array
    {
        return $this->flags;
    }
    /**
     * Notable characteristics of the address. Empty when none apply.
     *
     * @param list<string>|null $flags
     *
     * @return self
     */
    public function setFlags(?array $flags): self
    {
        $this->initialized['flags'] = true;
        $this->flags = $flags;
        return $this;
    }
    /**
     * Why the address cannot receive mail. Absent unless `result` is `undeliverable`.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why the address cannot receive mail. Absent unless `result` is `undeliverable`.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * The address this one looks like a misspelling of. Absent unless a correction was found, which in practice means `result` is `typo`. Offer it to whoever typed the original rather than sending to it unasked, because it is a guess and the address they meant may be neither one.
     *
     * @return string|null
     */
    public function getDidYouMean(): ?string
    {
        return $this->didYouMean;
    }
    /**
     * The address this one looks like a misspelling of. Absent unless a correction was found, which in practice means `result` is `typo`. Offer it to whoever typed the original rather than sending to it unasked, because it is a guess and the address they meant may be neither one.
     *
     * @param string|null $didYouMean
     *
     * @return self
     */
    public function setDidYouMean(?string $didYouMean): self
    {
        $this->initialized['didYouMean'] = true;
        $this->didYouMean = $didYouMean;
        return $this;
    }
}
