<?php

namespace MessageBird\Wire\Model;

class VoiceInboundConfigurationPut
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
     * The number's own route, or null to have it follow your workspace's default inbound route from the voice settings.
     * 
     *
     * @var mixed|null
     */
    protected $route;
    /**
     * The number's own route, or null to have it follow your workspace's default inbound route from the voice settings.
     * 
     *
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }
    /**
     * The number's own route, or null to have it follow your workspace's default inbound route from the voice settings.
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
}
