<?php

namespace MessageBird\Wire\Model;

class EsimSettingsUpdate
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
     * Send `false` to stop Bird sending eSIM install credentials to travelers for this workspace, or `true` to allow it again. Credentials stay readable from the API either way.
     * 
     *
     * @var bool|null
     */
    protected $credentialDeliveryEnabled;
    /**
     * Send `false` to stop Bird sending eSIM install credentials to travelers for this workspace, or `true` to allow it again. Credentials stay readable from the API either way.
     * 
     *
     * @return bool|null
     */
    public function getCredentialDeliveryEnabled(): ?bool
    {
        return $this->credentialDeliveryEnabled;
    }
    /**
     * Send `false` to stop Bird sending eSIM install credentials to travelers for this workspace, or `true` to allow it again. Credentials stay readable from the API either way.
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
