<?php

namespace MessageBird\Wire\Model;

/**
 * The route for calls arriving on any of your Bird numbers that has no inbound route of its own; verified caller IDs receive no calls. It takes effect on the next call to each of those numbers. Numbers with their own route keep it.
 */
class VoiceSettingsInboundConfigurationPut
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
     * What happens to a call arriving for this number. Its `type` selects the shape, and each answer carries its own fields; the variants below are the full set you can set.
     * 
     *
     * @var mixed|null
     */
    protected $route;
    /**
     * What happens to a call arriving for this number. Its `type` selects the shape, and each answer carries its own fields; the variants below are the full set you can set.
     * 
     *
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }
    /**
     * What happens to a call arriving for this number. Its `type` selects the shape, and each answer carries its own fields; the variants below are the full set you can set.
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
