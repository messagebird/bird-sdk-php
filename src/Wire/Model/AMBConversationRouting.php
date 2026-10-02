<?php

namespace MessageBird\Wire\Model;

class AMBConversationRouting
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
     * The business's routing group carried by Apple from the entry point. This identifies a routing destination within the business. Null when the message that set the current routing carried no group.
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * Intent carried by Apple from the entry point, used with `group_id` to route the conversation. Null when the message that set the current routing carried none.
     *
     * @var string|null
     */
    protected $intentId;
    /**
     * Configured entry point matching the current group and intent. Null when none matched.
     *
     * @var string|null
     */
    protected $entryPoint;
    /**
     * Workspace queue selected by routing or set by a teammate. Null when the conversation is unrouted.
     *
     * @var string|null
     */
    protected $queue;
    /**
     * The business's routing group carried by Apple from the entry point. This identifies a routing destination within the business. Null when the message that set the current routing carried no group.
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * The business's routing group carried by Apple from the entry point. This identifies a routing destination within the business. Null when the message that set the current routing carried no group.
     *
     * @param string|null $groupId
     *
     * @return self
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
    /**
     * Intent carried by Apple from the entry point, used with `group_id` to route the conversation. Null when the message that set the current routing carried none.
     *
     * @return string|null
     */
    public function getIntentId(): ?string
    {
        return $this->intentId;
    }
    /**
     * Intent carried by Apple from the entry point, used with `group_id` to route the conversation. Null when the message that set the current routing carried none.
     *
     * @param string|null $intentId
     *
     * @return self
     */
    public function setIntentId(?string $intentId): self
    {
        $this->initialized['intentId'] = true;
        $this->intentId = $intentId;
        return $this;
    }
    /**
     * Configured entry point matching the current group and intent. Null when none matched.
     *
     * @return string|null
     */
    public function getEntryPoint(): ?string
    {
        return $this->entryPoint;
    }
    /**
     * Configured entry point matching the current group and intent. Null when none matched.
     *
     * @param string|null $entryPoint
     *
     * @return self
     */
    public function setEntryPoint(?string $entryPoint): self
    {
        $this->initialized['entryPoint'] = true;
        $this->entryPoint = $entryPoint;
        return $this;
    }
    /**
     * Workspace queue selected by routing or set by a teammate. Null when the conversation is unrouted.
     *
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }
    /**
     * Workspace queue selected by routing or set by a teammate. Null when the conversation is unrouted.
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
}
