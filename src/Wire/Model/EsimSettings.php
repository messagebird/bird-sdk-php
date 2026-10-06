<?php

namespace MessageBird\Wire\Model;

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
     * Whether Bird sends eSIM install credentials to travelers for this workspace. When `false`, sending an eSIM's credentials by email or SMS is refused; reading them from the API still works, so you can deliver them yourself. This governs the install message only. Your workspace's other email and SMS sending is unaffected. Defaults to `true`.
     * 
     *
     * @var bool|null
     */
    protected $credentialDeliveryEnabled;
    /**
     * Whether Bird sends eSIM install credentials to travelers for this workspace. When `false`, sending an eSIM's credentials by email or SMS is refused; reading them from the API still works, so you can deliver them yourself. This governs the install message only. Your workspace's other email and SMS sending is unaffected. Defaults to `true`.
     * 
     *
     * @return bool|null
     */
    public function getCredentialDeliveryEnabled(): ?bool
    {
        return $this->credentialDeliveryEnabled;
    }
    /**
     * Whether Bird sends eSIM install credentials to travelers for this workspace. When `false`, sending an eSIM's credentials by email or SMS is refused; reading them from the API still works, so you can deliver them yourself. This governs the install message only. Your workspace's other email and SMS sending is unaffected. Defaults to `true`.
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
