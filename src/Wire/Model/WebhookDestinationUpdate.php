<?php

namespace MessageBird\Wire\Model;

/**
 * Changes to how deliveries are built, shaped as at creation. Only a `connector` destination takes `connector`; on any other endpoint it returns a `422`. Omit to keep the destination.
 */
class WebhookDestinationUpdate
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
     * How deliveries to the webhook endpoint are built: `webhook` posts the signed event unchanged to the endpoint URL; `connector` builds the delivery using the configured connector action. An existing endpoint's type cannot change; a different value returns a `422`.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * @var WebhookDestinationUpdateConnector|null
     */
    protected $connector;
    /**
     * How deliveries to the webhook endpoint are built: `webhook` posts the signed event unchanged to the endpoint URL; `connector` builds the delivery using the configured connector action. An existing endpoint's type cannot change; a different value returns a `422`.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * How deliveries to the webhook endpoint are built: `webhook` posts the signed event unchanged to the endpoint URL; `connector` builds the delivery using the configured connector action. An existing endpoint's type cannot change; a different value returns a `422`.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * @return WebhookDestinationUpdateConnector|null
     */
    public function getConnector(): ?WebhookDestinationUpdateConnector
    {
        return $this->connector;
    }
    /**
     * @param WebhookDestinationUpdateConnector|WebhookConnectorSetupUpdate|array|null $connector
     *
     * @return self
     */
    public function setConnector($connector): self
    {
        $this->initialized['connector'] = true;
        $this->connector = \MessageBird\Core\ModelWrapper::normalize($connector, WebhookDestinationUpdateConnector::class);
        return $this;
    }
}
