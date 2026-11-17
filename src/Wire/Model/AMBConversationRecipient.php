<?php

namespace MessageBird\Wire\Model;

/**
 * The customer on the other side of this Apple Messages for Business conversation.
 */
class AMBConversationRecipient
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
     * Apple's opaque identifier for this customer with this business. Null when no identifier is recorded.
     *
     * @var string|null
     */
    protected $opaqueUserId;
    /**
     * Customer phone number, or null when unknown. An invitation's destination remains on the invitation's `to` field.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Name from the last successful identity verification, or null when none was collected. It can refer to a previous verification and does not establish a current login session.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Apple's opaque identifier for this customer with this business. Null when no identifier is recorded.
     *
     * @return string|null
     */
    public function getOpaqueUserId(): ?string
    {
        return $this->opaqueUserId;
    }
    /**
     * Apple's opaque identifier for this customer with this business. Null when no identifier is recorded.
     *
     * @param string|null $opaqueUserId
     *
     * @return self
     */
    public function setOpaqueUserId(?string $opaqueUserId): self
    {
        $this->initialized['opaqueUserId'] = true;
        $this->opaqueUserId = $opaqueUserId;
        return $this;
    }
    /**
     * Customer phone number, or null when unknown. An invitation's destination remains on the invitation's `to` field.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Customer phone number, or null when unknown. An invitation's destination remains on the invitation's `to` field.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * Name from the last successful identity verification, or null when none was collected. It can refer to a previous verification and does not establish a current login session.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Name from the last successful identity verification, or null when none was collected. It can refer to a previous verification and does not establish a current login session.
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
}
