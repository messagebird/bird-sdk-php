<?php

namespace MessageBird\Wire\Model;

/**
 * Stops messages to one WhatsApp address, for one business account or for every account in the workspace.
 */
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
     * The WhatsApp address to stop messaging. For a phone number, supply canonical E.164 with a leading plus sign, such as `+5511977670804`. A value that is not a valid phone number or business-scoped user ID returns `422`.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * The WhatsApp Business Account to stop, identified by its WhatsApp-issued account ID or by the `waa_` ID Bird gives it. Either form resolves to the same account, and the suppression stores and returns the WhatsApp-issued one. Omit it to stop the address for the whole workspace, whichever account sends. An account that is not one of yours returns `404` on a single create, and its row reports `error` in a bulk create.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The WhatsApp address to stop messaging. For a phone number, supply canonical E.164 with a leading plus sign, such as `+5511977670804`. A value that is not a valid phone number or business-scoped user ID returns `422`.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The WhatsApp address to stop messaging. For a phone number, supply canonical E.164 with a leading plus sign, such as `+5511977670804`. A value that is not a valid phone number or business-scoped user ID returns `422`.
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
     * The WhatsApp Business Account to stop, identified by its WhatsApp-issued account ID or by the `waa_` ID Bird gives it. Either form resolves to the same account, and the suppression stores and returns the WhatsApp-issued one. Omit it to stop the address for the whole workspace, whichever account sends. An account that is not one of yours returns `404` on a single create, and its row reports `error` in a bulk create.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * The WhatsApp Business Account to stop, identified by its WhatsApp-issued account ID or by the `waa_` ID Bird gives it. Either form resolves to the same account, and the suppression stores and returns the WhatsApp-issued one. Omit it to stop the address for the whole workspace, whichever account sends. An account that is not one of yours returns `404` on a single create, and its row reports `error` in a bulk create.
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
