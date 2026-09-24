<?php

namespace MessageBird\Wire\Model;

class VoiceDestinationsUpdate
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
     * The destination countries to enable or disable. Only the countries listed here change; any country you do not list keeps its current setting.
     * 
     *
     * @var list<DestinationSetting>|null
     */
    protected $destinations;
    /**
     * The destination countries to enable or disable. Only the countries listed here change; any country you do not list keeps its current setting.
     * 
     *
     * @return list<DestinationSetting>|null
     */
    public function getDestinations(): ?array
    {
        return $this->destinations;
    }
    /**
     * The destination countries to enable or disable. Only the countries listed here change; any country you do not list keeps its current setting.
     *
     * @param list<DestinationSetting>|null $destinations
     *
     * @return self
     */
    public function setDestinations(?array $destinations): self
    {
        $this->initialized['destinations'] = true;
        $this->destinations = $destinations;
        return $this;
    }
}
