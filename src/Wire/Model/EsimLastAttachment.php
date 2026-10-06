<?php

namespace MessageBird\Wire\Model;

class EsimLastAttachment extends \ArrayObject
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
     * Country of the network.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * English name of the country, or null when not known.
     *
     * @var string|null
     */
    protected $countryName;
    /**
     * Name of the mobile network, or null when not known.
     *
     * @var string|null
     */
    protected $networkName;
    /**
     * When the device attached.
     *
     * @var \DateTime|null
     */
    protected $attachedAt;
    /**
     * Country of the network.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * Country of the network.
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
     * English name of the country, or null when not known.
     *
     * @return string|null
     */
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }
    /**
     * English name of the country, or null when not known.
     *
     * @param string|null $countryName
     *
     * @return self
     */
    public function setCountryName(?string $countryName): self
    {
        $this->initialized['countryName'] = true;
        $this->countryName = $countryName;
        return $this;
    }
    /**
     * Name of the mobile network, or null when not known.
     *
     * @return string|null
     */
    public function getNetworkName(): ?string
    {
        return $this->networkName;
    }
    /**
     * Name of the mobile network, or null when not known.
     *
     * @param string|null $networkName
     *
     * @return self
     */
    public function setNetworkName(?string $networkName): self
    {
        $this->initialized['networkName'] = true;
        $this->networkName = $networkName;
        return $this;
    }
    /**
     * When the device attached.
     *
     * @return \DateTime|null
     */
    public function getAttachedAt(): ?\DateTime
    {
        return $this->attachedAt;
    }
    /**
     * When the device attached.
     *
     * @param \DateTime|null $attachedAt
     *
     * @return self
     */
    public function setAttachedAt(?\DateTime $attachedAt): self
    {
        $this->initialized['attachedAt'] = true;
        $this->attachedAt = $attachedAt;
        return $this;
    }
}
