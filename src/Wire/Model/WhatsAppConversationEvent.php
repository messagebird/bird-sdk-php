<?php

namespace MessageBird\Wire\Model;

class WhatsAppConversationEvent
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
     * Type of conversation event. `whatsapp_conversation.control_changed` records the conversation moving between the Meta Business Agent and your application, `whatsapp_conversation.assigned` records it being assigned, reassigned or unassigned, and `whatsapp_conversation.agent_notified` records a notification sent to the agent about this contact. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Human-readable summary of what happened.
     *
     * @var string|null
     */
    protected $summary;
    /**
     * Structured details for the event. `from` and `to` carry the values that changed: the holder (`meta_business_agent` or `bird`) for a control change, the assigned user ID for an assignment, null for no assignee. A control change also carries the `initiator` and, when one was left, the `reason`. An assignment carries `assigned_by`, the actor who made it. An agent notification carries the `agent_notification_id` and its `name`.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * When the event happened.
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
     * Type of conversation event. `whatsapp_conversation.control_changed` records the conversation moving between the Meta Business Agent and your application, `whatsapp_conversation.assigned` records it being assigned, reassigned or unassigned, and `whatsapp_conversation.agent_notified` records a notification sent to the agent about this contact. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of conversation event. `whatsapp_conversation.control_changed` records the conversation moving between the Meta Business Agent and your application, `whatsapp_conversation.assigned` records it being assigned, reassigned or unassigned, and `whatsapp_conversation.agent_notified` records a notification sent to the agent about this contact. Open enum: new event types may be added over time, so treat any unrecognized value as a future event rather than an error. The values below are the types known at this version.
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
     * Human-readable summary of what happened.
     *
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    /**
     * Human-readable summary of what happened.
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
     * Structured details for the event. `from` and `to` carry the values that changed: the holder (`meta_business_agent` or `bird`) for a control change, the assigned user ID for an assignment, null for no assignee. A control change also carries the `initiator` and, when one was left, the `reason`. An assignment carries `assigned_by`, the actor who made it. An agent notification carries the `agent_notification_id` and its `name`.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Structured details for the event. `from` and `to` carry the values that changed: the holder (`meta_business_agent` or `bird`) for a control change, the assigned user ID for an assignment, null for no assignee. A control change also carries the `initiator` and, when one was left, the `reason`. An assignment carries `assigned_by`, the actor who made it. An agent notification carries the `agent_notification_id` and its `name`.
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
     * When the event happened.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the event happened.
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
