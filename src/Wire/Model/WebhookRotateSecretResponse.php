<?php

namespace MessageBird\Wire\Model;

class WebhookRotateSecretResponse
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
     * The new signing secret (`whsec_` prefix). Shown only in this response: store it immediately, it cannot be retrieved again. Deliveries are signed with both this and the previous secret for 24 hours after rotation, then the previous secret stops signing.
     * 
     *
     * @var string|null
     */
    protected $secret;
    /**
     * The new signing secret (`whsec_` prefix). Shown only in this response: store it immediately, it cannot be retrieved again. Deliveries are signed with both this and the previous secret for 24 hours after rotation, then the previous secret stops signing.
     * 
     *
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }
    /**
     * The new signing secret (`whsec_` prefix). Shown only in this response: store it immediately, it cannot be retrieved again. Deliveries are signed with both this and the previous secret for 24 hours after rotation, then the previous secret stops signing.
     *
     * @param string|null $secret
     *
     * @return self
     */
    public function setSecret(?string $secret): self
    {
        $this->initialized['secret'] = true;
        $this->secret = $secret;
        return $this;
    }
}
