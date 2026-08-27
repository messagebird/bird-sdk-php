<?php

namespace MessageBird\Wire\Model;

class Preference extends \ArrayObject
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
    protected $channel;
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS and WhatsApp.
     *
     * @var string|null
     */
    protected $handle;
    /**
     * The sender the statement is limited to, or null when it covers the whole channel. On SMS this is the originator the person replied to; on WhatsApp it identifies the business account that messaged them. Email preferences are always channel-wide, so it is always null there.
     *
     * @var string|null
     */
    protected $senderScope;
    /**
     * The topic the statement is limited to, or null when it covers every topic. Part of the key that identifies a statement, alongside `sender_scope`.
     *
     * @var string|null
     */
    protected $topicId;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $coverage;
    /**
     * When the statement was made, as reported by whoever made it. This is what orders one key's statements: a write dated before this moment is refused rather than applied.
     *
     * @var \DateTime|null
     */
    protected $effectiveAt;
    /**
     * @var string|null
     */
    protected $origin;
    /**
     * Free-form note on where the statement came from, as supplied when it was recorded: a form name, an import batch, a campaign. Null when none was given.
     *
     * @var string|null
     */
    protected $source;
    /**
     * When the person consented, as evidenced by whoever asserted the grant. Null on statements that carry no consent evidence, including every opt-out.
     *
     * @var \DateTime|null
     */
    protected $consentedAt;
    /**
     * The contact whose handle matched when the statement was recorded. Null when no contact matched at that moment; it is not updated when contacts change later.
     *
     * @var string|null
     */
    protected $contactId;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
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
    public function getChannel(): ?string
    {
        return $this->channel;
    }
    /**
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS and WhatsApp.
     *
     * @return string|null
     */
    public function getHandle(): ?string
    {
        return $this->handle;
    }
    /**
     * Who the statement is about: an email address on the email channel, a phone number in E.164 format on SMS and WhatsApp.
     *
     * @param string|null $handle
     *
     * @return self
     */
    public function setHandle(?string $handle): self
    {
        $this->initialized['handle'] = true;
        $this->handle = $handle;
        return $this;
    }
    /**
     * The sender the statement is limited to, or null when it covers the whole channel. On SMS this is the originator the person replied to; on WhatsApp it identifies the business account that messaged them. Email preferences are always channel-wide, so it is always null there.
     *
     * @return string|null
     */
    public function getSenderScope(): ?string
    {
        return $this->senderScope;
    }
    /**
     * The sender the statement is limited to, or null when it covers the whole channel. On SMS this is the originator the person replied to; on WhatsApp it identifies the business account that messaged them. Email preferences are always channel-wide, so it is always null there.
     *
     * @param string|null $senderScope
     *
     * @return self
     */
    public function setSenderScope(?string $senderScope): self
    {
        $this->initialized['senderScope'] = true;
        $this->senderScope = $senderScope;
        return $this;
    }
    /**
     * The topic the statement is limited to, or null when it covers every topic. Part of the key that identifies a statement, alongside `sender_scope`.
     *
     * @return string|null
     */
    public function getTopicId(): ?string
    {
        return $this->topicId;
    }
    /**
     * The topic the statement is limited to, or null when it covers every topic. Part of the key that identifies a statement, alongside `sender_scope`.
     *
     * @param string|null $topicId
     *
     * @return self
     */
    public function setTopicId(?string $topicId): self
    {
        $this->initialized['topicId'] = true;
        $this->topicId = $topicId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCoverage(): ?string
    {
        return $this->coverage;
    }
    /**
     * @param string|null $coverage
     *
     * @return self
     */
    public function setCoverage(?string $coverage): self
    {
        $this->initialized['coverage'] = true;
        $this->coverage = $coverage;
        return $this;
    }
    /**
     * When the statement was made, as reported by whoever made it. This is what orders one key's statements: a write dated before this moment is refused rather than applied.
     *
     * @return \DateTime|null
     */
    public function getEffectiveAt(): ?\DateTime
    {
        return $this->effectiveAt;
    }
    /**
     * When the statement was made, as reported by whoever made it. This is what orders one key's statements: a write dated before this moment is refused rather than applied.
     *
     * @param \DateTime|null $effectiveAt
     *
     * @return self
     */
    public function setEffectiveAt(?\DateTime $effectiveAt): self
    {
        $this->initialized['effectiveAt'] = true;
        $this->effectiveAt = $effectiveAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * @param string|null $origin
     *
     * @return self
     */
    public function setOrigin(?string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
    /**
     * Free-form note on where the statement came from, as supplied when it was recorded: a form name, an import batch, a campaign. Null when none was given.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * Free-form note on where the statement came from, as supplied when it was recorded: a form name, an import batch, a campaign. Null when none was given.
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * When the person consented, as evidenced by whoever asserted the grant. Null on statements that carry no consent evidence, including every opt-out.
     *
     * @return \DateTime|null
     */
    public function getConsentedAt(): ?\DateTime
    {
        return $this->consentedAt;
    }
    /**
     * When the person consented, as evidenced by whoever asserted the grant. Null on statements that carry no consent evidence, including every opt-out.
     *
     * @param \DateTime|null $consentedAt
     *
     * @return self
     */
    public function setConsentedAt(?\DateTime $consentedAt): self
    {
        $this->initialized['consentedAt'] = true;
        $this->consentedAt = $consentedAt;
        return $this;
    }
    /**
     * The contact whose handle matched when the statement was recorded. Null when no contact matched at that moment; it is not updated when contacts change later.
     *
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }
    /**
     * The contact whose handle matched when the statement was recorded. Null when no contact matched at that moment; it is not updated when contacts change later.
     *
     * @param string|null $contactId
     *
     * @return self
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
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
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
