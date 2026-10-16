<?php

namespace MessageBird\Wire\Model;

/**
 * Values for the connector's secret fields, keyed by field `name`. Every required secret field must be present, after merging with the stored values on an update, and a key the connector does not declare as secret returns a `422`. No response includes these values.
 */
class WebhookConnectorSetupUpdateCredentials extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
}
