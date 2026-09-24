<?php

namespace MessageBird\Wire\Model;

class VoiceDestinationList
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
     * The Voice destination countries, each annotated with your workspace's enabled setting.
     *
     * @var list<VoiceDestination>|null
     */
    protected $data;
    /**
     * Total number of destination countries.
     *
     * @var int|null
     */
    protected $total;
    /**
     * The Voice destination countries, each annotated with your workspace's enabled setting.
     *
     * @return list<VoiceDestination>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The Voice destination countries, each annotated with your workspace's enabled setting.
     *
     * @param list<VoiceDestination>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Total number of destination countries.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Total number of destination countries.
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
