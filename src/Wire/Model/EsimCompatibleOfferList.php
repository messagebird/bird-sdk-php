<?php

namespace MessageBird\Wire\Model;

class EsimCompatibleOfferList
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
     * Orderable top-up offers for this eSIM.
     *
     * @var list<EsimOfferSummary>|null
     */
    protected $data;
    /**
     * When this answer was computed.
     *
     * @var \DateTime|null
     */
    protected $asOf;
    /**
     * Orderable top-up offers for this eSIM.
     *
     * @return list<EsimOfferSummary>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Orderable top-up offers for this eSIM.
     *
     * @param list<EsimOfferSummary>|null $data
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
     * When this answer was computed.
     *
     * @return \DateTime|null
     */
    public function getAsOf(): ?\DateTime
    {
        return $this->asOf;
    }
    /**
     * When this answer was computed.
     *
     * @param \DateTime|null $asOf
     *
     * @return self
     */
    public function setAsOf(?\DateTime $asOf): self
    {
        $this->initialized['asOf'] = true;
        $this->asOf = $asOf;
        return $this;
    }
}
