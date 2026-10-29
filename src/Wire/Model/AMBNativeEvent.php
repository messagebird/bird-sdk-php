<?php

namespace MessageBird\Wire\Model;

class AMBNativeEvent
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
     * Your identifier for the event. Defaults to the message identifier.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * @var AMBLocation|null
     */
    protected $location;
    /**
     * Minutes from GMT at the event location. Omit it and `timezone` to use the customer's time zone.
     *
     * @var int|null
     */
    protected $timezoneOffset;
    /**
     * IANA time zone of the event location. Apple receives the zone's offset at the time slots, so a template keeps the right offset across a daylight-saving change. Every slot must have the same offset in the zone: slots on both sides of a clock change return `422`. Set it instead of `timezone_offset`. An unknown zone returns `422`. In Apple Messages template content it may instead be exactly one placeholder, such as `{{ timezone }}`, filled with a `timezone` variable when the template is sent. A direct send with a placeholder returns `422`.
     *
     * @var string|null
     */
    protected $timezone;
    /**
     * Appointment times with RFC 3339 timestamps and duration in seconds.
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
     * Event title. Also supplies the title of each omitted received or reply bubble, where the 512-character bubble text limit applies. Supply both bubbles explicitly to use a longer event title.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Your identifier for the event. Defaults to the message identifier.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Your identifier for the event. Defaults to the message identifier.
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
     * Minutes from GMT at the event location. Omit it and `timezone` to use the customer's time zone.
     *
     * @return int|null
     */
    public function getTimezoneOffset(): ?int
    {
        return $this->timezoneOffset;
    }
    /**
     * Minutes from GMT at the event location. Omit it and `timezone` to use the customer's time zone.
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
     * IANA time zone of the event location. Apple receives the zone's offset at the time slots, so a template keeps the right offset across a daylight-saving change. Every slot must have the same offset in the zone: slots on both sides of a clock change return `422`. Set it instead of `timezone_offset`. An unknown zone returns `422`. In Apple Messages template content it may instead be exactly one placeholder, such as `{{ timezone }}`, filled with a `timezone` variable when the template is sent. A direct send with a placeholder returns `422`.
     *
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }
    /**
     * IANA time zone of the event location. Apple receives the zone's offset at the time slots, so a template keeps the right offset across a daylight-saving change. Every slot must have the same offset in the zone: slots on both sides of a clock change return `422`. Set it instead of `timezone_offset`. An unknown zone returns `422`. In Apple Messages template content it may instead be exactly one placeholder, such as `{{ timezone }}`, filled with a `timezone` variable when the template is sent. A direct send with a placeholder returns `422`.
     *
     * @param string|null $timezone
     *
     * @return self
     */
    public function setTimezone(?string $timezone): self
    {
        $this->initialized['timezone'] = true;
        $this->timezone = $timezone;
        return $this;
    }
    /**
     * Appointment times with RFC 3339 timestamps and duration in seconds.
     *
     * @return list<AMBTimeSlot>|null
     */
    public function getTimeslots(): ?array
    {
        return $this->timeslots;
    }
    /**
     * Appointment times with RFC 3339 timestamps and duration in seconds.
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
     * Event title. Also supplies the title of each omitted received or reply bubble, where the 512-character bubble text limit applies. Supply both bubbles explicitly to use a longer event title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Event title. Also supplies the title of each omitted received or reply bubble, where the 512-character bubble text limit applies. Supply both bubbles explicitly to use a longer event title.
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
