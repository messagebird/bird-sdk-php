<?php

namespace MessageBird\Wire\Model;

class VoiceSettingsInboundConfiguration
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
     * What happens to a call arriving for this number, as it is configured now. Its `type` selects the shape, and each answer carries its own fields. Setting a route is a separate shape, and it does not offer every variant reported here.
     * 
     *
     * @var mixed|null
     */
    protected $route;
    /**
     * What happens to a call arriving for this number, as it is configured now. Its `type` selects the shape, and each answer carries its own fields. Setting a route is a separate shape, and it does not offer every variant reported here.
     * 
     *
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }
    /**
     * What happens to a call arriving for this number, as it is configured now. Its `type` selects the shape, and each answer carries its own fields. Setting a route is a separate shape, and it does not offer every variant reported here.
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
