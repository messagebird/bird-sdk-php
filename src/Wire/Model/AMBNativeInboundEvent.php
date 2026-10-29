<?php

namespace MessageBird\Wire\Model;

class AMBNativeInboundEvent
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
     * Event identifier returned by Apple, when provided.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * @var AMBLocation|null
     */
    protected $location;
    /**
     * Minutes from GMT at the event location. Omit to use the customer's time zone.
     *
     * @var int|null
     */
    protected $timezoneOffset;
    /**
     * Time slots returned by Apple. May be empty when the device supplies only a selected label.
     *
     * @var list<AMBTimeSlot>|null
     */
    protected $timeslots;
    /**
     * Identifier of the event image in interactive_data.data.images.
     *
     * @var string|null
     */
    protected $imageIdentifier;
    /**
     * Event title.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Event identifier returned by Apple, when provided.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Event identifier returned by Apple, when provided.
     *
     * @param string|null $identifier
     *
     * @return self
     */
    public function setIdentifier(?string $identifier): self
    {
        $this->initialized['identifier'] = true;
        $this->identifier = $identifier;
        return $this;
    }
    /**
     * @return AMBLocation|null
     */
    public function getLocation(): ?AMBLocation
    {
        return $this->location;
    }
    /**
     * @param AMBLocation|null $location
     *
     * @return self
     */
    public function setLocation(?AMBLocation $location): self
    {
        $this->initialized['location'] = true;
        $this->location = $location;
        return $this;
    }
    /**
     * Minutes from GMT at the event location. Omit to use the customer's time zone.
     *
     * @return int|null
     */
    public function getTimezoneOffset(): ?int
    {
        return $this->timezoneOffset;
    }
    /**
     * Minutes from GMT at the event location. Omit to use the customer's time zone.
     *
     * @param int|null $timezoneOffset
     *
     * @return self
     */
    public function setTimezoneOffset(?int $timezoneOffset): self
    {
        $this->initialized['timezoneOffset'] = true;
        $this->timezoneOffset = $timezoneOffset;
        return $this;
    }
    /**
     * Time slots returned by Apple. May be empty when the device supplies only a selected label.
     *
     * @return list<AMBTimeSlot>|null
     */
    public function getTimeslots(): ?array
    {
        return $this->timeslots;
    }
    /**
     * Time slots returned by Apple. May be empty when the device supplies only a selected label.
     *
     * @param list<AMBTimeSlot>|null $timeslots
     *
     * @return self
     */
    public function setTimeslots(?array $timeslots): self
    {
        $this->initialized['timeslots'] = true;
        $this->timeslots = $timeslots;
        return $this;
    }
    /**
     * Identifier of the event image in interactive_data.data.images.
     *
     * @return string|null
     */
    public function getImageIdentifier(): ?string
    {
        return $this->imageIdentifier;
    }
    /**
     * Identifier of the event image in interactive_data.data.images.
     *
     * @param string|null $imageIdentifier
     *
     * @return self
     */
    public function setImageIdentifier(?string $imageIdentifier): self
    {
        $this->initialized['imageIdentifier'] = true;
        $this->imageIdentifier = $imageIdentifier;
        return $this;
    }
    /**
     * Event title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Event title.
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
}
