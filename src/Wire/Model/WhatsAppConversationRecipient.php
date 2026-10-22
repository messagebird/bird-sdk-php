<?php

namespace MessageBird\Wire\Model;

/**
 * The contact or group on the other side of this conversation. Profile fields are null when unknown and on group conversations.
 */
class WhatsAppConversationRecipient
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
     * Meta's business-scoped user ID for the contact, or null when unknown.
     *
     * @var string|null
     */
    protected $bsuid;
    /**
     * Contact phone number in E.164 format, or null when unknown.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Display name from the contact's WhatsApp profile, or null when none has been recorded.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Contact's WhatsApp username without a leading `@`, or null when none has been recorded. Messages cannot be addressed by username.
     *
     * @var string|null
     */
    protected $username;
    /**
     * @var string|null
     */
    protected $groupId;
    /**
     * Meta's business-scoped user ID for the contact, or null when unknown.
     *
     * @return string|null
     */
    public function getBsuid(): ?string
    {
        return $this->bsuid;
    }
    /**
     * Meta's business-scoped user ID for the contact, or null when unknown.
     *
     * @param string|null $bsuid
     *
     * @return self
     */
    public function setBsuid(?string $bsuid): self
    {
        $this->initialized['bsuid'] = true;
        $this->bsuid = $bsuid;
        return $this;
    }
    /**
     * Contact phone number in E.164 format, or null when unknown.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Contact phone number in E.164 format, or null when unknown.
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
     * Display name from the contact's WhatsApp profile, or null when none has been recorded.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Display name from the contact's WhatsApp profile, or null when none has been recorded.
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
     * Contact's WhatsApp username without a leading `@`, or null when none has been recorded. Messages cannot be addressed by username.
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * Contact's WhatsApp username without a leading `@`, or null when none has been recorded. Messages cannot be addressed by username.
     *
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * @param string|null $groupId
     *
     * @return self
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
}
