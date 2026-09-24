<?php

namespace MessageBird\Wire\Model;

class VoiceInboundConfiguration
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
     * Null when the stored route type is unsupported; inspect configuration_error before changing it.
     *
     * @var mixed|null
     */
    protected $route;
    /**
     * @var string|null
     */
    protected $configurationError;
    /**
     * Caller identities available when configuring a forward. Use these values to populate the choice in your editor. The current choices are `dialed_number` and `calling_number`.
     * 
     *
     * @var list<string>|null
     */
    protected $forwardAsOptions;
    /**
     * Null when the stored route type is unsupported; inspect configuration_error before changing it.
     *
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }
    /**
     * Null when the stored route type is unsupported; inspect configuration_error before changing it.
     *
     * @param mixed $route
     *
     * @return self
     */
    public function setRoute($route): self
    {
        $this->initialized['route'] = true;
        $this->route = $route;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getConfigurationError(): ?string
    {
        return $this->configurationError;
    }
    /**
     * @param string|null $configurationError
     *
     * @return self
     */
    public function setConfigurationError(?string $configurationError): self
    {
        $this->initialized['configurationError'] = true;
        $this->configurationError = $configurationError;
        return $this;
    }
    /**
     * Caller identities available when configuring a forward. Use these values to populate the choice in your editor. The current choices are `dialed_number` and `calling_number`.
     * 
     *
     * @return list<string>|null
     */
    public function getForwardAsOptions(): ?array
    {
        return $this->forwardAsOptions;
    }
    /**
     * Caller identities available when configuring a forward. Use these values to populate the choice in your editor. The current choices are `dialed_number` and `calling_number`.
     *
     * @param list<string>|null $forwardAsOptions
     *
     * @return self
     */
    public function setForwardAsOptions(?array $forwardAsOptions): self
    {
        $this->initialized['forwardAsOptions'] = true;
        $this->forwardAsOptions = $forwardAsOptions;
        return $this;
    }
}
