<?php

namespace MessageBird\Wire\Model;

class SMSMessageBatchRequest
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
     * SMS message send requests, up to 100. Each is an independent send; all are validated before any is queued.
     *
     * @var list<SMSMessageSendRequest>|null
     */
    protected $messages;
    /**
     * SMS message send requests, up to 100. Each is an independent send; all are validated before any is queued.
     *
     * @return list<SMSMessageSendRequest>|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }
    /**
     * SMS message send requests, up to 100. Each is an independent send; all are validated before any is queued.
     *
     * @param list<SMSMessageSendRequest>|null $messages
     *
     * @return self
     */
    public function setMessages(?array $messages): self
    {
        $this->initialized['messages'] = true;
        $this->messages = $messages;
        return $this;
    }
}
