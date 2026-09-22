<?php

namespace MessageBird\Wire\Model;

class WhatsAppMetaHealthEntity
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
    protected $entityType;
    /**
     * Meta's identifier for the node. Treat it as an opaque string.
     *
     * @var string|null
     */
    protected $metaId;
    /**
     * Whether this node lets messages through.
     *
     * @var string|null
     */
    protected $canSendMessage;
    /**
     * Whether this node can receive a WhatsApp call over SIP, which Meta reports on `phone_number` and `app` entities. Absent on an account read: Meta reports it only when a phone number or template is the node asked about.
     *
     * @var string|null
     */
    protected $canReceiveCallSip;
    /**
     * Meta's own notes on a `limited` verdict. Absent on an account read: Meta reports it only when a phone number or template is the node asked about.
     *
     * @var list<string>|null
     */
    protected $additionalInfo;
    /**
     * Why this node is not `available`. Absent when Meta gave no reason.
     *
     * @var list<WhatsAppMetaHealthError>|null
     */
    protected $errors;
    /**
     * @return string|null
     */
    public function getEntityType(): ?string
    {
        return $this->entityType;
    }
    /**
     * @param string|null $entityType
     *
     * @return self
     */
    public function setEntityType(?string $entityType): self
    {
        $this->initialized['entityType'] = true;
        $this->entityType = $entityType;
        return $this;
    }
    /**
     * Meta's identifier for the node. Treat it as an opaque string.
     *
     * @return string|null
     */
    public function getMetaId(): ?string
    {
        return $this->metaId;
    }
    /**
     * Meta's identifier for the node. Treat it as an opaque string.
     *
     * @param string|null $metaId
     *
     * @return self
     */
    public function setMetaId(?string $metaId): self
    {
        $this->initialized['metaId'] = true;
        $this->metaId = $metaId;
        return $this;
    }
    /**
     * Whether this node lets messages through.
     *
     * @return string|null
     */
    public function getCanSendMessage(): ?string
    {
        return $this->canSendMessage;
    }
    /**
     * Whether this node lets messages through.
     *
     * @param string|null $canSendMessage
     *
     * @return self
     */
    public function setCanSendMessage(?string $canSendMessage): self
    {
        $this->initialized['canSendMessage'] = true;
        $this->canSendMessage = $canSendMessage;
        return $this;
    }
    /**
     * Whether this node can receive a WhatsApp call over SIP, which Meta reports on `phone_number` and `app` entities. Absent on an account read: Meta reports it only when a phone number or template is the node asked about.
     *
     * @return string|null
     */
    public function getCanReceiveCallSip(): ?string
    {
        return $this->canReceiveCallSip;
    }
    /**
     * Whether this node can receive a WhatsApp call over SIP, which Meta reports on `phone_number` and `app` entities. Absent on an account read: Meta reports it only when a phone number or template is the node asked about.
     *
     * @param string|null $canReceiveCallSip
     *
     * @return self
     */
    public function setCanReceiveCallSip(?string $canReceiveCallSip): self
    {
        $this->initialized['canReceiveCallSip'] = true;
        $this->canReceiveCallSip = $canReceiveCallSip;
        return $this;
    }
    /**
     * Meta's own notes on a `limited` verdict. Absent on an account read: Meta reports it only when a phone number or template is the node asked about.
     *
     * @return list<string>|null
     */
    public function getAdditionalInfo(): ?array
    {
        return $this->additionalInfo;
    }
    /**
     * Meta's own notes on a `limited` verdict. Absent on an account read: Meta reports it only when a phone number or template is the node asked about.
     *
     * @param list<string>|null $additionalInfo
     *
     * @return self
     */
    public function setAdditionalInfo(?array $additionalInfo): self
    {
        $this->initialized['additionalInfo'] = true;
        $this->additionalInfo = $additionalInfo;
        return $this;
    }
    /**
     * Why this node is not `available`. Absent when Meta gave no reason.
     *
     * @return list<WhatsAppMetaHealthError>|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }
    /**
     * Why this node is not `available`. Absent when Meta gave no reason.
     *
     * @param list<WhatsAppMetaHealthError>|null $errors
     *
     * @return self
     */
    public function setErrors(?array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}
