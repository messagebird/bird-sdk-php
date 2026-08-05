<?php

namespace MessageBird\Wire\Model;

class SMSCostBreakdown
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
     * Per-segment price as a decimal string.
     *
     * @var string|null
     */
    protected $perSegment;
    /**
     * Number of billable segments.
     *
     * @var int|null
     */
    protected $segments;
    /**
     * ISO 3166-1 alpha-2 destination country the price was resolved for.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Carrier surcharge component as a decimal string (for example US 10DLC fees). `0.0000` when none applies.
     *
     * @var string|null
     */
    protected $carrierSurcharge;
    /**
     * Per-segment price as a decimal string.
     *
     * @return string|null
     */
    public function getPerSegment(): ?string
    {
        return $this->perSegment;
    }
    /**
     * Per-segment price as a decimal string.
     *
     * @param string|null $perSegment
     *
     * @return self
     */
    public function setPerSegment(?string $perSegment): self
    {
        $this->initialized['perSegment'] = true;
        $this->perSegment = $perSegment;
        return $this;
    }
    /**
     * Number of billable segments.
     *
     * @return int|null
     */
    public function getSegments(): ?int
    {
        return $this->segments;
    }
    /**
     * Number of billable segments.
     *
     * @param int|null $segments
     *
     * @return self
     */
    public function setSegments(?int $segments): self
    {
        $this->initialized['segments'] = true;
        $this->segments = $segments;
        return $this;
    }
    /**
     * ISO 3166-1 alpha-2 destination country the price was resolved for.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * ISO 3166-1 alpha-2 destination country the price was resolved for.
     *
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
     * Carrier surcharge component as a decimal string (for example US 10DLC fees). `0.0000` when none applies.
     *
     * @return string|null
     */
    public function getCarrierSurcharge(): ?string
    {
        return $this->carrierSurcharge;
    }
    /**
     * Carrier surcharge component as a decimal string (for example US 10DLC fees). `0.0000` when none applies.
     *
     * @param string|null $carrierSurcharge
     *
     * @return self
     */
    public function setCarrierSurcharge(?string $carrierSurcharge): self
    {
        $this->initialized['carrierSurcharge'] = true;
        $this->carrierSurcharge = $carrierSurcharge;
        return $this;
    }
}
