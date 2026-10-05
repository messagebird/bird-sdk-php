<?php

namespace MessageBird\Wire\Model;

class WebhookEndpointUpdateFilter extends \ArrayObject
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
     * Mailbox to receive events for. Must belong to this workspace; a mailbox outside it returns `422`.
     * 
     *
     * @var string|null
     */
    protected $mailboxId;
    /**
     * Mailbox to receive events for. Must belong to this workspace; a mailbox outside it returns `422`.
     * 
     *
     * @return string|null
     */
    public function getMailboxId(): ?string
    {
        return $this->mailboxId;
    }
    /**
     * Mailbox to receive events for. Must belong to this workspace; a mailbox outside it returns `422`.
     *
     * @param string|null $mailboxId
     *
     * @return self
     */
    public function setMailboxId(?string $mailboxId): self
    {
        $this->initialized['mailboxId'] = true;
        $this->mailboxId = $mailboxId;
        return $this;
    }
}
