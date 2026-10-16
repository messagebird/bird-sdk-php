<?php

namespace MessageBird\Wire\Model;

/**
 * The trunk's gateways. Not paginated: a trunk holds a small, hand-managed set of dial targets, and the order across the whole set is what decides hunt order, so a partial page would misrepresent it.
 */
class VoiceTrunkGatewayList
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
     * The trunk's gateways, in priority order.
     *
     * @var list<VoiceTrunkGateway>|null
     */
    protected $data;
    /**
     * The trunk's gateways, in priority order.
     *
     * @return list<VoiceTrunkGateway>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The trunk's gateways, in priority order.
     *
     * @param list<VoiceTrunkGateway>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
