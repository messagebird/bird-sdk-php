<?php

namespace MessageBird\Wire\Model;

class EsimCheckoutRecurrence
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
     * Whether automatic renewal is currently available for a new eSIM.
     *
     * @var bool|null
     */
    protected $available;
    /**
     * @var EsimCheckoutRecurrenceQuote|null
     */
    protected $quote;
    /**
     * @var string|null
     */
    protected $unavailableReason;
    /**
     * Whether automatic renewal is currently available for a new eSIM.
     *
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }
    /**
     * Whether automatic renewal is currently available for a new eSIM.
     *
     * @param bool|null $available
     *
     * @return self
     */
    public function setAvailable(?bool $available): self
    {
        $this->initialized['available'] = true;
        $this->available = $available;
        return $this;
    }
    /**
     * @return EsimCheckoutRecurrenceQuote|null
     */
    public function getQuote(): ?EsimCheckoutRecurrenceQuote
    {
        return $this->quote;
    }
    /**
     * @param EsimCheckoutRecurrenceQuote|null $quote
     *
     * @return self
     */
    public function setQuote(?EsimCheckoutRecurrenceQuote $quote): self
    {
        $this->initialized['quote'] = true;
        $this->quote = $quote;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getUnavailableReason(): ?string
    {
        return $this->unavailableReason;
    }
    /**
     * @param string|null $unavailableReason
     *
     * @return self
     */
    public function setUnavailableReason(?string $unavailableReason): self
    {
        $this->initialized['unavailableReason'] = true;
        $this->unavailableReason = $unavailableReason;
        return $this;
    }
}
