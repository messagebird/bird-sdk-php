<?php

namespace MessageBird\Wire\Model;

class MailboxUpdate
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
     * Display name used as the sender name on mail from this mailbox. Null clears it.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Default Reply-To address stamped on mail sent from this mailbox. Null clears it.
     *
     * @var string|null
     */
    protected $defaultReplyTo;
    /**
     * Which inbound mail the mailbox accepts.
     *
     * @var string|null
     */
    protected $receivePolicy;
    /**
     * How long the mailbox remembers message metadata and extracted text. Lowering the tier deletes remembered messages older than the new horizon, and requires `confirm=true` when that would happen.
     *
     * @var string|null
     */
    protected $retentionTier;
    /**
     * Replaces the mailbox's key/value data. Up to 2 KB. Keys starting with `__bird` are reserved.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Display name used as the sender name on mail from this mailbox. Null clears it.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Display name used as the sender name on mail from this mailbox. Null clears it.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Default Reply-To address stamped on mail sent from this mailbox. Null clears it.
     *
     * @return string|null
     */
    public function getDefaultReplyTo(): ?string
    {
        return $this->defaultReplyTo;
    }
    /**
     * Default Reply-To address stamped on mail sent from this mailbox. Null clears it.
     *
     * @param string|null $defaultReplyTo
     *
     * @return self
     */
    public function setDefaultReplyTo(?string $defaultReplyTo): self
    {
        $this->initialized['defaultReplyTo'] = true;
        $this->defaultReplyTo = $defaultReplyTo;
        return $this;
    }
    /**
     * Which inbound mail the mailbox accepts.
     *
     * @return string|null
     */
    public function getReceivePolicy(): ?string
    {
        return $this->receivePolicy;
    }
    /**
     * Which inbound mail the mailbox accepts.
     *
     * @param string|null $receivePolicy
     *
     * @return self
     */
    public function setReceivePolicy(?string $receivePolicy): self
    {
        $this->initialized['receivePolicy'] = true;
        $this->receivePolicy = $receivePolicy;
        return $this;
    }
    /**
     * How long the mailbox remembers message metadata and extracted text. Lowering the tier deletes remembered messages older than the new horizon, and requires `confirm=true` when that would happen.
     *
     * @return string|null
     */
    public function getRetentionTier(): ?string
    {
        return $this->retentionTier;
    }
    /**
     * How long the mailbox remembers message metadata and extracted text. Lowering the tier deletes remembered messages older than the new horizon, and requires `confirm=true` when that would happen.
     *
     * @param string|null $retentionTier
     *
     * @return self
     */
    public function setRetentionTier(?string $retentionTier): self
    {
        $this->initialized['retentionTier'] = true;
        $this->retentionTier = $retentionTier;
        return $this;
    }
    /**
     * Replaces the mailbox's key/value data. Up to 2 KB. Keys starting with `__bird` are reserved.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Replaces the mailbox's key/value data. Up to 2 KB. Keys starting with `__bird` are reserved.
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
}
