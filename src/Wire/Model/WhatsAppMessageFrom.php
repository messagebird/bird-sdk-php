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
}
