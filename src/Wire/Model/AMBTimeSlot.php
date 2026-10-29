<?php

namespace MessageBird\Wire\Model;

class AMBTimeSlot
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
     * Opaque slot identifier. Apple may instead return only a localized label in interactive_data.reply_message.title.
     *
     * @var string|null
     */
    protected $identifier;
    /**
     * When this slot begins, as an ISO 8601 date-time with a UTC offset. Seconds and fractional seconds must be zero, for example `2026-09-02T14:30:00Z`; any other value returns `422` with error code `E01001`. The timestamp is converted to UTC for Apple while preserving the instant. In Apple Messages template content it may instead be exactly one placeholder, such as `{{ slot_1 }}`, filled with a `timestamp` variable when the template is sent. A slot after the first whose variable is used nowhere else is optional: a send that omits that variable drops the slot.
     *
     * @var string|null
     */
    protected $startAt;
    /**
     * Duration in seconds. Zero indicates no duration.
     *
     * @var int|null
     */
    protected $durationSeconds;
    /**
     * Opaque slot identifier. Apple may instead return only a localized label in interactive_data.reply_message.title.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    /**
     * Opaque slot identifier. Apple may instead return only a localized label in interactive_data.reply_message.title.
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
     * When this slot begins, as an ISO 8601 date-time with a UTC offset. Seconds and fractional seconds must be zero, for example `2026-09-02T14:30:00Z`; any other value returns `422` with error code `E01001`. The timestamp is converted to UTC for Apple while preserving the instant. In Apple Messages template content it may instead be exactly one placeholder, such as `{{ slot_1 }}`, filled with a `timestamp` variable when the template is sent. A slot after the first whose variable is used nowhere else is optional: a send that omits that variable drops the slot.
     *
     * @return string|null
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }
    /**
     * When this slot begins, as an ISO 8601 date-time with a UTC offset. Seconds and fractional seconds must be zero, for example `2026-09-02T14:30:00Z`; any other value returns `422` with error code `E01001`. The timestamp is converted to UTC for Apple while preserving the instant. In Apple Messages template content it may instead be exactly one placeholder, such as `{{ slot_1 }}`, filled with a `timestamp` variable when the template is sent. A slot after the first whose variable is used nowhere else is optional: a send that omits that variable drops the slot.
     *
     * @param string|null $startAt
     *
     * @return self
     */
    public function setStartAt(?string $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;
        return $this;
    }
    /**
     * Duration in seconds. Zero indicates no duration.
     *
     * @return int|null
     */
    public function getDurationSeconds(): ?int
    {
        return $this->durationSeconds;
    }
    /**
     * Duration in seconds. Zero indicates no duration.
     *
     * @param int|null $durationSeconds
     *
     * @return self
     */
    public function setDurationSeconds(?int $durationSeconds): self
    {
        $this->initialized['durationSeconds'] = true;
        $this->durationSeconds = $durationSeconds;
        return $this;
    }
}
