<?php

namespace MessageBird\Wire\Model;

class ComplianceSubmissionItem
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
     * `true` when this answer was accepted without a fresh review, because the same answer to the same requirement had already been approved for this party in this country. It carries the original verdict, including when that verdict expires.
     * 
     *
     * @var bool|null
     */
    protected $inherited;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * The requirement this answers.
     *
     * @var string|null
     */
    protected $key;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * Your answer, for a requirement answered inline. Every answer travels as a string whatever its data type, so a number reads back as `"1500"` and a yes-or-no as `"true"`. Use the data type to parse it. `null` for a requirement that takes a document.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * The document you supplied, for a requirement that takes one. `null` otherwise.
     *
     * @var string|null
     */
    protected $attachmentId;
    /**
     * Your answers, for a requirement that takes several and is answered inline. `null` for one answered once. Order is as you sent it.
     * 
     *
     * @var list<string>|null
     */
    protected $values;
    /**
     * The documents you supplied, for a requirement that takes several. `null` otherwise.
     * 
     *
     * @var list<string>|null
     */
    protected $attachmentIds;
    /**
     * Why this was rejected, when it was. `null` otherwise.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * When this was decided. `null` while no decision has been made.
     *
     * @var \DateTime|null
     */
    protected $decidedAt;
    /**
     * When this answer goes stale and must be supplied again. `null` when it does not expire.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * `true` when this answer was accepted without a fresh review, because the same answer to the same requirement had already been approved for this party in this country. It carries the original verdict, including when that verdict expires.
     * 
     *
     * @return bool|null
     */
    public function getInherited(): ?bool
    {
        return $this->inherited;
    }
    /**
     * `true` when this answer was accepted without a fresh review, because the same answer to the same requirement had already been approved for this party in this country. It carries the original verdict, including when that verdict expires.
     *
     * @param bool|null $inherited
     *
     * @return self
     */
    public function setInherited(?bool $inherited): self
    {
        $this->initialized['inherited'] = true;
        $this->inherited = $inherited;
        return $this;
    }
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
     * The requirement this answers.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * The requirement this answers.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * Your answer, for a requirement answered inline. Every answer travels as a string whatever its data type, so a number reads back as `"1500"` and a yes-or-no as `"true"`. Use the data type to parse it. `null` for a requirement that takes a document.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Your answer, for a requirement answered inline. Every answer travels as a string whatever its data type, so a number reads back as `"1500"` and a yes-or-no as `"true"`. Use the data type to parse it. `null` for a requirement that takes a document.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * The document you supplied, for a requirement that takes one. `null` otherwise.
     *
     * @return string|null
     */
    public function getAttachmentId(): ?string
    {
        return $this->attachmentId;
    }
    /**
     * The document you supplied, for a requirement that takes one. `null` otherwise.
     *
     * @param string|null $attachmentId
     *
     * @return self
     */
    public function setAttachmentId(?string $attachmentId): self
    {
        $this->initialized['attachmentId'] = true;
        $this->attachmentId = $attachmentId;
        return $this;
    }
    /**
     * Your answers, for a requirement that takes several and is answered inline. `null` for one answered once. Order is as you sent it.
     * 
     *
     * @return list<string>|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
    /**
     * Your answers, for a requirement that takes several and is answered inline. `null` for one answered once. Order is as you sent it.
     *
     * @param list<string>|null $values
     *
     * @return self
     */
    public function setValues(?array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
    /**
     * The documents you supplied, for a requirement that takes several. `null` otherwise.
     * 
     *
     * @return list<string>|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachmentIds;
    }
    /**
     * The documents you supplied, for a requirement that takes several. `null` otherwise.
     *
     * @param list<string>|null $attachmentIds
     *
     * @return self
     */
    public function setAttachmentIds(?array $attachmentIds): self
    {
        $this->initialized['attachmentIds'] = true;
        $this->attachmentIds = $attachmentIds;
        return $this;
    }
    /**
     * Why this was rejected, when it was. `null` otherwise.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * Why this was rejected, when it was. `null` otherwise.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * When this was decided. `null` while no decision has been made.
     *
     * @return \DateTime|null
     */
    public function getDecidedAt(): ?\DateTime
    {
        return $this->decidedAt;
    }
    /**
     * When this was decided. `null` while no decision has been made.
     *
     * @param \DateTime|null $decidedAt
     *
     * @return self
     */
    public function setDecidedAt(?\DateTime $decidedAt): self
    {
        $this->initialized['decidedAt'] = true;
        $this->decidedAt = $decidedAt;
        return $this;
    }
    /**
     * When this answer goes stale and must be supplied again. `null` when it does not expire.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When this answer goes stale and must be supplied again. `null` when it does not expire.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
}
