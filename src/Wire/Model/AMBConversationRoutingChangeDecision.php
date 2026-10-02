<?php

namespace MessageBird\Wire\Model;

class AMBConversationRoutingChangeDecision
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
     * `apply` adopts the pending change's group, intent, entry point and queue. `dismiss` discards it and leaves group, intent and entry point unchanged.
     *
     * @var string|null
     */
    protected $action;
    /**
     * @var string|null
     */
    protected $messageId;
    /**
     * `apply` adopts the pending change's group, intent, entry point and queue. `dismiss` discards it and leaves group, intent and entry point unchanged.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * `apply` adopts the pending change's group, intent, entry point and queue. `dismiss` discards it and leaves group, intent and entry point unchanged.
     *
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }
    /**
     * @param string|null $messageId
     *
     * @return self
     */
    public function setMessageId(?string $messageId): self
    {
        $this->initialized['messageId'] = true;
        $this->messageId = $messageId;
        return $this;
    }
}
