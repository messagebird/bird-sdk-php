<?php

namespace MessageBird\Wire\Model;

/**
 * Exact match on `mailbox_id`, for `email_mailbox.*` events only; the mailbox must belong to this workspace. Cannot be combined with Realtime app scope. Omit on create for all resources; on update omit to keep, send `null` to clear.
 */
class WebhookEndpointFilter extends \ArrayObject
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
