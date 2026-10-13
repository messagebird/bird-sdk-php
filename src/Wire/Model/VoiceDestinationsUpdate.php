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
     * The destination countries to change. Only the countries listed here change, and only the fields you send; anything else keeps its current setting. A country listed more than once takes its last `enabled`, but may set or remove `daily_spend_limit` only once. A limit can be set only on a country the Voice service supports; removing one accepts any country code. Otherwise the request is rejected and nothing changes.
     * 
     *
     * @var list<DestinationSetting>|null
     */
    protected $destinations;
    /**
     * The destination countries to change. Only the countries listed here change, and only the fields you send; anything else keeps its current setting. A country listed more than once takes its last `enabled`, but may set or remove `daily_spend_limit` only once. A limit can be set only on a country the Voice service supports; removing one accepts any country code. Otherwise the request is rejected and nothing changes.
     * 
     *
     * @return list<DestinationSetting>|null
     */
    public function getDestinations(): ?array
    {
        return $this->destinations;
    }
    /**
     * The destination countries to change. Only the countries listed here change, and only the fields you send; anything else keeps its current setting. A country listed more than once takes its last `enabled`, but may set or remove `daily_spend_limit` only once. A limit can be set only on a country the Voice service supports; removing one accepts any country code. Otherwise the request is rejected and nothing changes.
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
