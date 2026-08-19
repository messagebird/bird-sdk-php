<?php

namespace MessageBird\Wire\Model;

class ReceiveRule
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
     * @var string|null
     */
    protected $mailboxId;
    /**
     * What the rule does when it matches. Block rules always win: over allow rules and over the reply admission on allowlist mailboxes.
     *
     * @var string|null
     */
    protected $action;
    /**
     * The sender address or domain the rule matches. Domains also match their subdomains.
     *
     * @var string|null
     */
    protected $entry;
    /**
     * Whether the entry is a full address or a domain.
     *
     * @var string|null
     */
    protected $entryType;
    /**
     * Your own note about why the rule exists. `null` when unset.
     *
     * @var string|null
     */
    protected $note;
    /**
     * When the rule was created.
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
     * @return string|null
     */
    public function getMailboxId(): ?string
    {
        return $this->mailboxId;
    }
    /**
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
    /**
     * What the rule does when it matches. Block rules always win: over allow rules and over the reply admission on allowlist mailboxes.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * What the rule does when it matches. Block rules always win: over allow rules and over the reply admission on allowlist mailboxes.
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
     * The sender address or domain the rule matches. Domains also match their subdomains.
     *
     * @return string|null
     */
    public function getEntry(): ?string
    {
        return $this->entry;
    }
    /**
     * The sender address or domain the rule matches. Domains also match their subdomains.
     *
     * @param string|null $entry
     *
     * @return self
     */
    public function setEntry(?string $entry): self
    {
        $this->initialized['entry'] = true;
        $this->entry = $entry;
        return $this;
    }
    /**
     * Whether the entry is a full address or a domain.
     *
     * @return string|null
     */
    public function getEntryType(): ?string
    {
        return $this->entryType;
    }
    /**
     * Whether the entry is a full address or a domain.
     *
     * @param string|null $entryType
     *
     * @return self
     */
    public function setEntryType(?string $entryType): self
    {
        $this->initialized['entryType'] = true;
        $this->entryType = $entryType;
        return $this;
    }
    /**
     * Your own note about why the rule exists. `null` when unset.
     *
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }
    /**
     * Your own note about why the rule exists. `null` when unset.
     *
     * @param string|null $note
     *
     * @return self
     */
    public function setNote(?string $note): self
    {
        $this->initialized['note'] = true;
        $this->note = $note;
        return $this;
    }
    /**
     * When the rule was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the rule was created.
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
