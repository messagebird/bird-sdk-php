<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupNetworkInfo extends \ArrayObject
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
     * The carrier's name, absent when the carrier could not be identified.
     *
     * @var string|null
     */
    protected $carrierName;
    /**
     * The mobile country code, absent for a network that has none or could not be identified.
     *
     * @var string|null
     */
    protected $mcc;
    /**
     * The mobile network code, absent for a network that has none or could not be identified.
     *
     * @var string|null
     */
    protected $mnc;
    /**
     * The carrier's name, absent when the carrier could not be identified.
     *
     * @return string|null
     */
    public function getCarrierName(): ?string
    {
        return $this->carrierName;
    }
    /**
     * The carrier's name, absent when the carrier could not be identified.
     *
     * @param string|null $carrierName
     *
     * @return self
     */
    public function setCarrierName(?string $carrierName): self
    {
        $this->initialized['carrierName'] = true;
        $this->carrierName = $carrierName;
        return $this;
    }
    /**
     * The mobile country code, absent for a network that has none or could not be identified.
     *
     * @return string|null
     */
    public function getMcc(): ?string
    {
        return $this->mcc;
    }
    /**
     * The mobile country code, absent for a network that has none or could not be identified.
     *
     * @param string|null $mcc
     *
     * @return self
     */
    public function setMcc(?string $mcc): self
    {
        $this->initialized['mcc'] = true;
        $this->mcc = $mcc;
        return $this;
    }
    /**
     * The mobile network code, absent for a network that has none or could not be identified.
     *
     * @return string|null
     */
    public function getMnc(): ?string
    {
        return $this->mnc;
    }
    /**
     * The mobile network code, absent for a network that has none or could not be identified.
     *
     * @param string|null $mnc
     *
     * @return self
     */
    public function setMnc(?string $mnc): self
    {
        $this->initialized['mnc'] = true;
        $this->mnc = $mnc;
        return $this;
    }
}
