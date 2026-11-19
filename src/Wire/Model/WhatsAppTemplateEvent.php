<?php

namespace MessageBird\Wire\Model;

class WhatsAppTemplateEvent
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
     * Type of template event. `whatsapp_template.status_changed` records a status WhatsApp gave the language. `whatsapp_template.quality_updated` records a change in its quality rating. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @var string|null
     */
    protected $type;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * @var string|null
     */
    protected $versionId;
    /**
     * Human-readable summary of what changed.
     *
     * @var string|null
     */
    protected $summary;
    /**
     * Structured details for the event. `from` and `to` carry the values that changed: a language status for `whatsapp_template.status_changed`, or a quality score for `whatsapp_template.quality_updated`. `from` is the value Bird held before the change, and is absent when Bird held none. A change to `rejected` also carries the `rejection`, in the same shape as the language, when WhatsApp gave a reason. A new pause on a language that was already paused has the same `from` and `to`.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * When Bird recorded the event.
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
     * Type of template event. `whatsapp_template.status_changed` records a status WhatsApp gave the language. `whatsapp_template.quality_updated` records a change in its quality rating. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of template event. `whatsapp_template.status_changed` records a status WhatsApp gave the language. `whatsapp_template.quality_updated` records a change in its quality rating. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }
    /**
     * @param string|null $versionId
     *
     * @return self
     */
    public function setVersionId(?string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
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
     * Structured details for the event. `from` and `to` carry the values that changed: a language status for `whatsapp_template.status_changed`, or a quality score for `whatsapp_template.quality_updated`. `from` is the value Bird held before the change, and is absent when Bird held none. A change to `rejected` also carries the `rejection`, in the same shape as the language, when WhatsApp gave a reason. A new pause on a language that was already paused has the same `from` and `to`.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Structured details for the event. `from` and `to` carry the values that changed: a language status for `whatsapp_template.status_changed`, or a quality score for `whatsapp_template.quality_updated`. `from` is the value Bird held before the change, and is absent when Bird held none. A change to `rejected` also carries the `rejection`, in the same shape as the language, when WhatsApp gave a reason. A new pause on a language that was already paused has the same `from` and `to`.
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
     * When Bird recorded the event.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When Bird recorded the event.
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
