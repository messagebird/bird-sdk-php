<?php

namespace MessageBird\Wire\Model;

class EmailMessageBatchRequest
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
     * Email message send requests, up to 100. All items are validated before any are queued. Attachments are allowed on individual messages. Each message must stay within the 20 MB estimated generated message-size cap. The serialized JSON request body for the batch has a hard 20 MB cap.
     * 
     *
     * @var list<EmailMessageSendRequest>|null
     */
    protected $messages;
    /**
     * Email message send requests, up to 100. All items are validated before any are queued. Attachments are allowed on individual messages. Each message must stay within the 20 MB estimated generated message-size cap. The serialized JSON request body for the batch has a hard 20 MB cap.
     * 
     *
     * @return list<EmailMessageSendRequest>|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }
    /**
     * Email message send requests, up to 100. All items are validated before any are queued. Attachments are allowed on individual messages. Each message must stay within the 20 MB estimated generated message-size cap. The serialized JSON request body for the batch has a hard 20 MB cap.
     *
     * @param list<EmailMessageSendRequest>|null $messages
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
