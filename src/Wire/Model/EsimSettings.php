<?php

namespace MessageBird\Wire\Model;

/**
 * The eSIM settings your workspace controls. Every field carries its effective value, whether or not the workspace has ever changed it.
 */
class EsimSettings
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
     * Whether Bird automatically sends an install link after a new eSIM purchase with a linked contact. Uses the contact's email address, or SMS when only a phone number is available. Defaults to `false`. Manual install-link sends remain available regardless of this setting.
     * 
     *
     * @var bool|null
     */
    protected $credentialDeliveryEnabled;
    /**
     * Whether Bird automatically sends an install link after a new eSIM purchase with a linked contact. Uses the contact's email address, or SMS when only a phone number is available. Defaults to `false`. Manual install-link sends remain available regardless of this setting.
     * 
     *
     * @return bool|null
     */
    public function getCredentialDeliveryEnabled(): ?bool
    {
        return $this->credentialDeliveryEnabled;
    }
    /**
     * Whether Bird automatically sends an install link after a new eSIM purchase with a linked contact. Uses the contact's email address, or SMS when only a phone number is available. Defaults to `false`. Manual install-link sends remain available regardless of this setting.
     *
     * @param bool|null $credentialDeliveryEnabled
     *
     * @return self
     */
    public function setCredentialDeliveryEnabled(?bool $credentialDeliveryEnabled): self
    {
        $this->initialized['credentialDeliveryEnabled'] = true;
        $this->credentialDeliveryEnabled = $credentialDeliveryEnabled;
        return $this;
    }
}
