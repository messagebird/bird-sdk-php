<?php

namespace MessageBird\Wire\Model;

class WhatsAppNumberEvent
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
     * @var string|null
     */
    protected $id;
    /**
     * Type of number event. `whatsapp_number.messaging_limit_updated` and `whatsapp_number.profile_name_update` are reported by WhatsApp as they happen; `whatsapp_number.quality_rating_updated` is observed when Bird next reads the number, so it can lag the change by up to an hour. `whatsapp_number.status_changed` records every move of the `status` field on the number itself, whichever side caused it. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Human-readable summary of what changed.
     *
     * @var string|null
     */
    protected $summary;
    /**
     * Structured details for the event. `from` and `to` carry the values that changed, and `from` is absent when the number had no prior value to report. A status change into `failed` also carries the `reason`; a display-name decision carries `new_display_name`, `decision`, and, when WhatsApp named one for a rejection, `rejection_reason`. A messaging-limit change also carries the `trigger` WhatsApp named for it, such as `onboarding` or `throughput_upgrade`, when it named one. A `whatsapp_number.created` event carries the `source` the number came from, and its `phone_number` once one is known.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * When the event was recorded.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Type of number event. `whatsapp_number.messaging_limit_updated` and `whatsapp_number.profile_name_update` are reported by WhatsApp as they happen; `whatsapp_number.quality_rating_updated` is observed when Bird next reads the number, so it can lag the change by up to an hour. `whatsapp_number.status_changed` records every move of the `status` field on the number itself, whichever side caused it. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of number event. `whatsapp_number.messaging_limit_updated` and `whatsapp_number.profile_name_update` are reported by WhatsApp as they happen; `whatsapp_number.quality_rating_updated` is observed when Bird next reads the number, so it can lag the change by up to an hour. `whatsapp_number.status_changed` records every move of the `status` field on the number itself, whichever side caused it. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Human-readable summary of what changed.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    /**
     * Human-readable summary of what changed.
     *
     * @param string|null $summary
     *
     * @return self
     */
    public function setSummary(?string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * Structured details for the event. `from` and `to` carry the values that changed, and `from` is absent when the number had no prior value to report. A status change into `failed` also carries the `reason`; a display-name decision carries `new_display_name`, `decision`, and, when WhatsApp named one for a rejection, `rejection_reason`. A messaging-limit change also carries the `trigger` WhatsApp named for it, such as `onboarding` or `throughput_upgrade`, when it named one. A `whatsapp_number.created` event carries the `source` the number came from, and its `phone_number` once one is known.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Structured details for the event. `from` and `to` carry the values that changed, and `from` is absent when the number had no prior value to report. A status change into `failed` also carries the `reason`; a display-name decision carries `new_display_name`, `decision`, and, when WhatsApp named one for a rejection, `rejection_reason`. A messaging-limit change also carries the `trigger` WhatsApp named for it, such as `onboarding` or `throughput_upgrade`, when it named one. A `whatsapp_number.created` event carries the `source` the number came from, and its `phone_number` once one is known.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
    /**
     * When the event was recorded.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the event was recorded.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
}
