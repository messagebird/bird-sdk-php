<?php

namespace MessageBird\Wire\Model;

class SMSInboundCountryStatsPoint
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
     * The country of the Bird number the messages arrived on, as an ISO 3166-1 alpha-2 code. This identifies where the message was received. It does not identify the sender's country.
     *
     * @var string|null
     */
    protected $country;
    /**
     * Distinct messages received on numbers in this country during the period.
     *
     * @var int|null
     */
    protected $received;
    /**
     * The country of the Bird number the messages arrived on, as an ISO 3166-1 alpha-2 code. This identifies where the message was received. It does not identify the sender's country.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * The country of the Bird number the messages arrived on, as an ISO 3166-1 alpha-2 code. This identifies where the message was received. It does not identify the sender's country.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * Distinct messages received on numbers in this country during the period.
     *
     * @return int|null
     */
    public function getReceived(): ?int
    {
        return $this->received;
    }
    /**
     * Distinct messages received on numbers in this country during the period.
     *
     * @param int|null $received
     *
     * @return self
     */
    public function setReceived(?int $received): self
    {
        $this->initialized['received'] = true;
        $this->received = $received;
        return $this;
    }
}
