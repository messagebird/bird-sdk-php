<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageTemplateComponentParameterLocation extends \ArrayObject
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
     * Latitude in decimal degrees.
     *
     * @var float|null
     */
    protected $latitude;
    /**
     * Longitude in decimal degrees.
     *
     * @var float|null
     */
    protected $longitude;
    /**
     * Name of the place, shown above the address.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Street address of the place. Shown only when `name` is also set.
     *
     * @var string|null
     */
    protected $address;
    /**
     * Latitude in decimal degrees.
     *
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }
    /**
     * Latitude in decimal degrees.
     *
     * @param float|null $latitude
     *
     * @return self
     */
    public function setLatitude(?float $latitude): self
    {
        $this->initialized['latitude'] = true;
        $this->latitude = $latitude;
        return $this;
    }
    /**
     * Longitude in decimal degrees.
     *
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }
    /**
     * Longitude in decimal degrees.
     *
     * @param float|null $longitude
     *
     * @return self
     */
    public function setLongitude(?float $longitude): self
    {
        $this->initialized['longitude'] = true;
        $this->longitude = $longitude;
        return $this;
    }
    /**
     * Name of the place, shown above the address.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the place, shown above the address.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Street address of the place. Shown only when `name` is also set.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * Street address of the place. Shown only when `name` is also set.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
}
