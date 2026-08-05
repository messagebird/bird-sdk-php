<?php

namespace MessageBird\Wire\Model;

class DomainEvent
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
     * Type of domain event. `domain.status_changed` tracks ownership verification (the domain-level `status`); `domain.sending_status_changed` tracks readiness to send (`capabilities.sending`); the remaining `*_status_changed` types each track one DNS record's verification. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
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
     * Structured details for the event. Status-change events carry `from` and `to`; record-level changes also carry `domain`, the affected hostname.
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
     * Type of domain event. `domain.status_changed` tracks ownership verification (the domain-level `status`); `domain.sending_status_changed` tracks readiness to send (`capabilities.sending`); the remaining `*_status_changed` types each track one DNS record's verification. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of domain event. `domain.status_changed` tracks ownership verification (the domain-level `status`); `domain.sending_status_changed` tracks readiness to send (`capabilities.sending`); the remaining `*_status_changed` types each track one DNS record's verification. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
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
     * Structured details for the event. Status-change events carry `from` and `to`; record-level changes also carry `domain`, the affected hostname.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Structured details for the event. Status-change events carry `from` and `to`; record-level changes also carry `domain`, the affected hostname.
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
