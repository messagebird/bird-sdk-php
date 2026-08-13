<?php

namespace MessageBird\Wire\Model;

class MailboxCreate
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
     * The local part of the mailbox address (the part before `@`). Letters, digits, dots, underscores, and hyphens. Stored lowercase. On the shared `inbox.ai` domain, separators must sit between letters or digits (no leading, trailing, or repeated separators), reserved names such as `postmaster` or `abuse` are unavailable, and choosing your own local part uses one of your plan's custom-handle allowance slots (generated addresses are always available). Omit it and we generate a random local part.
     *
     * @var string|null
     */
    protected $localPart;
    /**
     * The domain the address lives under. Defaults to `inbox.ai`, our shared mailbox domain, where creating the mailbox claims the address for your organization: first come, first served, and permanently reserved to your organization even after the mailbox is deleted. May instead name one of your own domains that is enabled for receiving email.
     *
     * @var string|null
     */
    protected $domain = 'inbox.ai';
    /**
     * Display name used as the sender name on mail from this mailbox.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Default Reply-To address stamped on mail sent from this mailbox.
     *
     * @var string|null
     */
    protected $defaultReplyTo;
    /**
     * Which inbound mail the mailbox accepts:
     * 
     * - `open`: Accepts everything not blocked by a rule.
     * - `replies_only`: Accepts only replies to messages this mailbox has
     *   sent. A reply must match a message the mailbox sent. Landing in an
     *   existing thread by itself does not count.
     * - `allowlist`: Accepts only senders matching an allow rule.
     * - `drop`: Stores nothing.
     * 
     *
     * @var string|null
     */
    protected $receivePolicy = 'open';
    /**
     * How long the mailbox remembers message metadata and extracted text. Original rendered source is always available for 30 days regardless of tier.
     *
     * @var string|null
     */
    protected $retentionTier = '30d';
    /**
     * Your own key/value data to attach to the mailbox. Up to 2 KB. Keys starting with `__bird` are reserved.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * The local part of the mailbox address (the part before `@`). Letters, digits, dots, underscores, and hyphens. Stored lowercase. On the shared `inbox.ai` domain, separators must sit between letters or digits (no leading, trailing, or repeated separators), reserved names such as `postmaster` or `abuse` are unavailable, and choosing your own local part uses one of your plan's custom-handle allowance slots (generated addresses are always available). Omit it and we generate a random local part.
     *
     * @return string|null
     */
    public function getLocalPart(): ?string
    {
        return $this->localPart;
    }
    /**
     * The local part of the mailbox address (the part before `@`). Letters, digits, dots, underscores, and hyphens. Stored lowercase. On the shared `inbox.ai` domain, separators must sit between letters or digits (no leading, trailing, or repeated separators), reserved names such as `postmaster` or `abuse` are unavailable, and choosing your own local part uses one of your plan's custom-handle allowance slots (generated addresses are always available). Omit it and we generate a random local part.
     *
     * @param string|null $localPart
     *
     * @return self
     */
    public function setLocalPart(?string $localPart): self
    {
        $this->initialized['localPart'] = true;
        $this->localPart = $localPart;
        return $this;
    }
    /**
     * The domain the address lives under. Defaults to `inbox.ai`, our shared mailbox domain, where creating the mailbox claims the address for your organization: first come, first served, and permanently reserved to your organization even after the mailbox is deleted. May instead name one of your own domains that is enabled for receiving email.
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * The domain the address lives under. Defaults to `inbox.ai`, our shared mailbox domain, where creating the mailbox claims the address for your organization: first come, first served, and permanently reserved to your organization even after the mailbox is deleted. May instead name one of your own domains that is enabled for receiving email.
     *
     * @param string|null $domain
     *
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->initialized['domain'] = true;
        $this->domain = $domain;
        return $this;
    }
    /**
     * Display name used as the sender name on mail from this mailbox.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Display name used as the sender name on mail from this mailbox.
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
     * Default Reply-To address stamped on mail sent from this mailbox.
     *
     * @return string|null
     */
    public function getDefaultReplyTo(): ?string
    {
        return $this->defaultReplyTo;
    }
    /**
     * Default Reply-To address stamped on mail sent from this mailbox.
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
     * Which inbound mail the mailbox accepts:
     * 
     * - `open`: Accepts everything not blocked by a rule.
     * - `replies_only`: Accepts only replies to messages this mailbox has
     *   sent. A reply must match a message the mailbox sent. Landing in an
     *   existing thread by itself does not count.
     * - `allowlist`: Accepts only senders matching an allow rule.
     * - `drop`: Stores nothing.
     * 
     *
     * @return string|null
     */
    public function getReceivePolicy(): ?string
    {
        return $this->receivePolicy;
    }
    /**
    * Which inbound mail the mailbox accepts:
    
    - `open`: Accepts everything not blocked by a rule.
    - `replies_only`: Accepts only replies to messages this mailbox has
     sent. A reply must match a message the mailbox sent. Landing in an
     existing thread by itself does not count.
    - `allowlist`: Accepts only senders matching an allow rule.
    - `drop`: Stores nothing.
    
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
     * How long the mailbox remembers message metadata and extracted text. Original rendered source is always available for 30 days regardless of tier.
     *
     * @return string|null
     */
    public function getRetentionTier(): ?string
    {
        return $this->retentionTier;
    }
    /**
     * How long the mailbox remembers message metadata and extracted text. Original rendered source is always available for 30 days regardless of tier.
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
     * Your own key/value data to attach to the mailbox. Up to 2 KB. Keys starting with `__bird` are reserved.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Your own key/value data to attach to the mailbox. Up to 2 KB. Keys starting with `__bird` are reserved.
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
