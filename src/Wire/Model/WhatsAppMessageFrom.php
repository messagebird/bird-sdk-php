<?php

namespace MessageBird\Wire\Model;

class WhatsAppMessageFrom extends \ArrayObject
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
     * Phone number in E.164 format, when known.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Business-scoped user ID, Meta's identifier for the WhatsApp user. Present only on the WhatsApp-user side of the message.
     * 
     *
     * @var string|null
     */
    protected $bsuid;
    /**
     * Present only on a message received from a WhatsApp user, on `from`; never on an outbound send's `to`, where the profile is not known. Absent when the contact has not adopted one, and on a message received before this workspace started recording them. Same form as a number's own username (`WhatsAppNumberProfile.username`), without a leading `@`; a message cannot be addressed by it.
     * 
     *
     * @var string|null
     */
    protected $username;
    /**
     * Present only on a message received from a WhatsApp user, on `from`; never on an outbound send's `to`, where the profile is not known. Absent when the message carries no profile, and on a message received before this workspace started recording them.
     * 
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Phone number in E.164 format, when known.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number in E.164 format, when known.
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
     * Business-scoped user ID, Meta's identifier for the WhatsApp user. Present only on the WhatsApp-user side of the message.
     * 
     *
     * @return string|null
     */
    public function getBsuid(): ?string
    {
        return $this->bsuid;
    }
    /**
     * Business-scoped user ID, Meta's identifier for the WhatsApp user. Present only on the WhatsApp-user side of the message.
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
     * Present only on a message received from a WhatsApp user, on `from`; never on an outbound send's `to`, where the profile is not known. Absent when the contact has not adopted one, and on a message received before this workspace started recording them. Same form as a number's own username (`WhatsAppNumberProfile.username`), without a leading `@`; a message cannot be addressed by it.
     * 
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * Present only on a message received from a WhatsApp user, on `from`; never on an outbound send's `to`, where the profile is not known. Absent when the contact has not adopted one, and on a message received before this workspace started recording them. Same form as a number's own username (`WhatsAppNumberProfile.username`), without a leading `@`; a message cannot be addressed by it.
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
     * Present only on a message received from a WhatsApp user, on `from`; never on an outbound send's `to`, where the profile is not known. Absent when the message carries no profile, and on a message received before this workspace started recording them.
     * 
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Present only on a message received from a WhatsApp user, on `from`; never on an outbound send's `to`, where the profile is not known. Absent when the message carries no profile, and on a message received before this workspace started recording them.
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
