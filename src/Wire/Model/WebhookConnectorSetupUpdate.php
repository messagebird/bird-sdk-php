<?php

namespace MessageBird\Wire\Model;

/**
 * Changes to the endpoint's connector, nested as on creation. A field the endpoint's URL is built from moves the URL with it. New deliveries are prepared with the current config. Queued deliveries keep their prepared body, but every send attempt, including retries, uses the current destination URL and credentials.
 */
class WebhookConnectorSetupUpdate
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
     * The endpoint's connector. It cannot change, so a different value returns a `422`.
     *
     * @var string|null
     */
    protected $connectorId;
    /**
     * The endpoint's action. It cannot change, so a different value returns a `422`.
     *
     * @var string|null
     */
    protected $action;
    /**
     * New values for the connector's secret fields, merged over the stored ones: a key given replaces that field and an omitted key keeps its value. The next delivery, retries included, uses them.
     * 
     *
     * @var WebhookConnectorSetupUpdateCredentials|null
     */
    protected $credentials;
    /**
     * Changes to the connector's nonsecret fields, keyed by field `name`. A key given replaces that field, `null` clears an optional one, and a key left out keeps its stored value. A required field cannot be cleared, and the result is checked as at creation.
     * 
     *
     * @var array<string, string>|null
     */
    protected $config;
    /**
     * The endpoint's connector. It cannot change, so a different value returns a `422`.
     *
     * @return string|null
     */
    public function getConnectorId(): ?string
    {
        return $this->connectorId;
    }
    /**
     * The endpoint's connector. It cannot change, so a different value returns a `422`.
     *
     * @param string|null $connectorId
     *
     * @return self
     */
    public function setConnectorId(?string $connectorId): self
    {
        $this->initialized['connectorId'] = true;
        $this->connectorId = $connectorId;
        return $this;
    }
    /**
     * The endpoint's action. It cannot change, so a different value returns a `422`.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * The endpoint's action. It cannot change, so a different value returns a `422`.
     *
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
    /**
     * New values for the connector's secret fields, merged over the stored ones: a key given replaces that field and an omitted key keeps its value. The next delivery, retries included, uses them.
     * 
     *
     * @return WebhookConnectorSetupUpdateCredentials|null
     */
    public function getCredentials(): ?WebhookConnectorSetupUpdateCredentials
    {
        return $this->credentials;
    }
    /**
     * New values for the connector's secret fields, merged over the stored ones: a key given replaces that field and an omitted key keeps its value. The next delivery, retries included, uses them.
     *
     * @param WebhookConnectorSetupUpdateCredentials|null $credentials
     *
     * @return self
     */
    public function setCredentials(?WebhookConnectorSetupUpdateCredentials $credentials): self
    {
        $this->initialized['credentials'] = true;
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Changes to the connector's nonsecret fields, keyed by field `name`. A key given replaces that field, `null` clears an optional one, and a key left out keeps its stored value. A required field cannot be cleared, and the result is checked as at creation.
     * 
     *
     * @return array<string, string>|null
     */
    public function getConfig(): ?iterable
    {
        return $this->config;
    }
    /**
     * Changes to the connector's nonsecret fields, keyed by field `name`. A key given replaces that field, `null` clears an optional one, and a key left out keeps its stored value. A required field cannot be cleared, and the result is checked as at creation.
     *
     * @param array<string, string>|null $config
     *
     * @return self
     */
    public function setConfig(?iterable $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;
        return $this;
    }
}
