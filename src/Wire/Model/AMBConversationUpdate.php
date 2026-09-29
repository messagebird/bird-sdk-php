<?php

namespace MessageBird\Wire\Model;

class AMBConversationUpdate
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
     * User to assign this conversation to. Pass null to unassign it.
     *
     * @var string|null
     */
    protected $assignedTo;
    /**
     * Replaces the full set of labels on this conversation. Pass an empty array to clear every label.
     * 
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * Set to true to mark this conversation read, resetting `unread_count` to zero. There is no way to mark a conversation unread through this field; false has no effect.
     * 
     *
     * @var bool|null
     */
    protected $read;
    /**
     * User to assign this conversation to. Pass null to unassign it.
     *
     * @return string|null
     */
    public function getAssignedTo(): ?string
    {
        return $this->assignedTo;
    }
    /**
     * User to assign this conversation to. Pass null to unassign it.
     *
     * @param string|null $assignedTo
     *
     * @return self
     */
    public function setAssignedTo(?string $assignedTo): self
    {
        $this->initialized['assignedTo'] = true;
        $this->assignedTo = $assignedTo;
        return $this;
    }
    /**
     * Replaces the full set of labels on this conversation. Pass an empty array to clear every label.
     * 
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }
    /**
     * Replaces the full set of labels on this conversation. Pass an empty array to clear every label.
     *
     * @param list<string>|null $labels
     *
     * @return self
     */
    public function setLabels(?array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     * Set to true to mark this conversation read, resetting `unread_count` to zero. There is no way to mark a conversation unread through this field; false has no effect.
     * 
     *
     * @return bool|null
     */
    public function getRead(): ?bool
    {
        return $this->read;
    }
    /**
     * Set to true to mark this conversation read, resetting `unread_count` to zero. There is no way to mark a conversation unread through this field; false has no effect.
     *
     * @param bool|null $read
     *
     * @return self
     */
    public function setRead(?bool $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;
        return $this;
    }
}
