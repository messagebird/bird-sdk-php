<?php

namespace MessageBird\Wire\Model;

class AMBLocation
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
     * Name shown for the appointment location.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Latitude in degrees. Set together with `longitude`.
     *
     * @var float|null
     */
    protected $latitude;
    /**
     * Longitude in degrees. Set together with `latitude`.
     *
     * @var float|null
     */
    protected $longitude;
    /**
     * Apple Messages template content only: exactly one placeholder, such as `{{ store }}`, set instead of `latitude` and `longitude`. When the template is sent, a `location` variable fills it with its `latitude` and `longitude`, and its `name`, when it has one, replaces `title`. A direct send that includes it returns `422`. Never present on an inbound event.
     *
     * @var string|null
     */
    protected $coordinates;
    /**
     * Location radius in meters. Apple ignores it without coordinates.
     *
     * @var float|null
     */
    protected $radius;
    /**
     * Name shown for the appointment location.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Name shown for the appointment location.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * Latitude in degrees. Set together with `longitude`.
     *
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }
    /**
     * Latitude in degrees. Set together with `longitude`.
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
     * Longitude in degrees. Set together with `latitude`.
     *
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }
    /**
     * Longitude in degrees. Set together with `latitude`.
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
     * Apple Messages template content only: exactly one placeholder, such as `{{ store }}`, set instead of `latitude` and `longitude`. When the template is sent, a `location` variable fills it with its `latitude` and `longitude`, and its `name`, when it has one, replaces `title`. A direct send that includes it returns `422`. Never present on an inbound event.
     *
     * @return string|null
     */
    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }
    /**
     * Apple Messages template content only: exactly one placeholder, such as `{{ store }}`, set instead of `latitude` and `longitude`. When the template is sent, a `location` variable fills it with its `latitude` and `longitude`, and its `name`, when it has one, replaces `title`. A direct send that includes it returns `422`. Never present on an inbound event.
     *
     * @param string|null $coordinates
     *
     * @return self
     */
    public function setCoordinates(?string $coordinates): self
    {
        $this->initialized['coordinates'] = true;
        $this->coordinates = $coordinates;
        return $this;
    }
    /**
     * Location radius in meters. Apple ignores it without coordinates.
     *
     * @return float|null
     */
    public function getRadius(): ?float
    {
        return $this->radius;
    }
    /**
     * Location radius in meters. Apple ignores it without coordinates.
     *
     * @param float|null $radius
     *
     * @return self
     */
    public function setRadius(?float $radius): self
    {
        $this->initialized['radius'] = true;
        $this->radius = $radius;
        return $this;
    }
}
