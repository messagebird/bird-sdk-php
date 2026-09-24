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
     * What happens to a call arriving for this number. Its `type` selects the shape, and each answer carries its own fields; the variants below are the full set you can set. An unconfigured number uses "reject".
     * 
     *
     * @var mixed|null
     */
    protected $route;
    /**
     * What happens to a call arriving for this number. Its `type` selects the shape, and each answer carries its own fields; the variants below are the full set you can set. An unconfigured number uses "reject".
     * 
     *
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }
    /**
     * What happens to a call arriving for this number. Its `type` selects the shape, and each answer carries its own fields; the variants below are the full set you can set. An unconfigured number uses "reject".
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
