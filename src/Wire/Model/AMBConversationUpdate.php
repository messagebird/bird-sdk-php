<?php

namespace MessageBird\Wire\Model;

class AMBConversationUpdate extends \ArrayObject
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
     * User to assign this conversation to. Pass a workspace member's user ID, `me` for the signed-in user, or null to unassign it. An API key cannot use `me` and receives a `422` response.
     *
     * @var string|null
     */
    protected $assignedTo;
    /**
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @var string|null
     */
    protected $inboxStatus;
    /**
     * Labels chosen by your workspace. On update, this replaces the full set; pass an empty array to clear every label. Labels do not change read state or inbox status.
     * 
     * Each label must contain 1 to 64 characters, with no commas, control characters, or leading or trailing whitespace. Duplicate labels are rejected. The names `all`, `archived`, `assigned`, `closed`, `deleted`, `draft`, `drafts`, `flagged`, `important`, `inbox`, `junk`, `muted`, `none`, `open`, `pinned`, `read`, `snoozed`, `spam`, `starred`, `trash`, and `unread` are reserved in every casing.
     * 
     *
     * @var list<string>|null
     */
    protected $labels;
    /**
     * Mark received inbound messages with created_at at or before this timestamp as read in the shared workspace inbox. Messages sharing the timestamp are included together. Later arrivals remain unread until another read update. This does not send a read receipt to the customer or change inbox status. Omit to leave read state unchanged.
     *
     * @var \DateTime|null
     */
    protected $read;
    /**
     * Queue to move the conversation to, or null to leave it unrouted. Routing rules do not run, and the conversation keeps its group and intent. Moving the queue clears any pending `routing_change`, and cannot be combined with an `apply` decision.
     *
     * @var string|null
     */
    protected $queue;
    /**
     * Settles the conversation's pending `routing_change`. `message_id` names the change you reviewed: the request fails with `409` when the pending change has a different message ID, because a newer customer message replaced it or a teammate already settled it. Either action clears `routing_change`.
     *
     * @var AMBConversationRoutingChangeDecision|null
     */
    protected $routingChange;
    /**
     * User to assign this conversation to. Pass a workspace member's user ID, `me` for the signed-in user, or null to unassign it. An API key cannot use `me` and receives a `422` response.
     *
     * @return string|null
     */
    public function getAssignedTo(): ?string
    {
        return $this->assignedTo;
    }
    /**
     * User to assign this conversation to. Pass a workspace member's user ID, `me` for the signed-in user, or null to unassign it. An API key cannot use `me` and receives a `422` response.
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
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @return string|null
     */
    public function getInboxStatus(): ?string
    {
        return $this->inboxStatus;
    }
    /**
     * Whether the conversation needs attention in the workspace inbox. Set it to `resolved` when the work is finished. A new inbound message reopens the same conversation. Changing inbox status preserves message history and does not change the channel's permission to send messages or mark messages read.
     *
     * @param string|null $inboxStatus
     *
     * @return self
     */
    public function setInboxStatus(?string $inboxStatus): self
    {
        $this->initialized['inboxStatus'] = true;
        $this->inboxStatus = $inboxStatus;
        return $this;
    }
    /**
     * Labels chosen by your workspace. On update, this replaces the full set; pass an empty array to clear every label. Labels do not change read state or inbox status.
     * 
     * Each label must contain 1 to 64 characters, with no commas, control characters, or leading or trailing whitespace. Duplicate labels are rejected. The names `all`, `archived`, `assigned`, `closed`, `deleted`, `draft`, `drafts`, `flagged`, `important`, `inbox`, `junk`, `muted`, `none`, `open`, `pinned`, `read`, `snoozed`, `spam`, `starred`, `trash`, and `unread` are reserved in every casing.
     * 
     *
     * @return list<string>|null
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }
    /**
    * Labels chosen by your workspace. On update, this replaces the full set; pass an empty array to clear every label. Labels do not change read state or inbox status.
    
    Each label must contain 1 to 64 characters, with no commas, control characters, or leading or trailing whitespace. Duplicate labels are rejected. The names `all`, `archived`, `assigned`, `closed`, `deleted`, `draft`, `drafts`, `flagged`, `important`, `inbox`, `junk`, `muted`, `none`, `open`, `pinned`, `read`, `snoozed`, `spam`, `starred`, `trash`, and `unread` are reserved in every casing.
    
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
     * Mark received inbound messages with created_at at or before this timestamp as read in the shared workspace inbox. Messages sharing the timestamp are included together. Later arrivals remain unread until another read update. This does not send a read receipt to the customer or change inbox status. Omit to leave read state unchanged.
     *
     * @return \DateTime|null
     */
    public function getRead(): ?\DateTime
    {
        return $this->read;
    }
    /**
     * Mark received inbound messages with created_at at or before this timestamp as read in the shared workspace inbox. Messages sharing the timestamp are included together. Later arrivals remain unread until another read update. This does not send a read receipt to the customer or change inbox status. Omit to leave read state unchanged.
     *
     * @param \DateTime|null $read
     *
     * @return self
     */
    public function setRead(?\DateTime $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;
        return $this;
    }
    /**
     * Queue to move the conversation to, or null to leave it unrouted. Routing rules do not run, and the conversation keeps its group and intent. Moving the queue clears any pending `routing_change`, and cannot be combined with an `apply` decision.
     *
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }
    /**
     * Queue to move the conversation to, or null to leave it unrouted. Routing rules do not run, and the conversation keeps its group and intent. Moving the queue clears any pending `routing_change`, and cannot be combined with an `apply` decision.
     *
     * @param string|null $queue
     *
     * @return self
     */
    public function setQueue(?string $queue): self
    {
        $this->initialized['queue'] = true;
        $this->queue = $queue;
        return $this;
    }
    /**
     * Settles the conversation's pending `routing_change`. `message_id` names the change you reviewed: the request fails with `409` when the pending change has a different message ID, because a newer customer message replaced it or a teammate already settled it. Either action clears `routing_change`.
     *
     * @return AMBConversationRoutingChangeDecision|null
     */
    public function getRoutingChange(): ?AMBConversationRoutingChangeDecision
    {
        return $this->routingChange;
    }
    /**
     * Settles the conversation's pending `routing_change`. `message_id` names the change you reviewed: the request fails with `409` when the pending change has a different message ID, because a newer customer message replaced it or a teammate already settled it. Either action clears `routing_change`.
     *
     * @param AMBConversationRoutingChangeDecision|null $routingChange
     *
     * @return self
     */
    public function setRoutingChange(?AMBConversationRoutingChangeDecision $routingChange): self
    {
        $this->initialized['routingChange'] = true;
        $this->routingChange = $routingChange;
        return $this;
    }
}
