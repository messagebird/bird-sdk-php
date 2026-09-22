<?php

namespace MessageBird\Wire\Model;

class WhatsAppSuppressionCreate
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
     * WhatsApp address to suppress. For a phone number, supply canonical E.164 with a leading plus sign, such as `+5511977670804`. A value that is not a valid phone number returns a `422`.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * Limit the suppression to messages sent from this WhatsApp Business Account, identified by its WhatsApp-issued account ID. Omit it to block the address for the whole workspace, whichever account sends.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * WhatsApp address to suppress. For a phone number, supply canonical E.164 with a leading plus sign, such as `+5511977670804`. A value that is not a valid phone number returns a `422`.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * WhatsApp address to suppress. For a phone number, supply canonical E.164 with a leading plus sign, such as `+5511977670804`. A value that is not a valid phone number returns a `422`.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * Limit the suppression to messages sent from this WhatsApp Business Account, identified by its WhatsApp-issued account ID. Omit it to block the address for the whole workspace, whichever account sends.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * Limit the suppression to messages sent from this WhatsApp Business Account, identified by its WhatsApp-issued account ID. Omit it to block the address for the whole workspace, whichever account sends.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
}
