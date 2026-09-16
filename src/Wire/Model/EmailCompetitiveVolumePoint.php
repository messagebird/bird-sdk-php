<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveVolumePoint
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
     * The UTC day this point covers.
     *
     * @var \DateTime|null
     */
    protected $date;
    /**
     * Volume for the day. An estimate for a competitor and an exact count for your own line; `source` on the series records which. A day nothing was observed is `0` rather than a missing point, so every line shares one axis.
     * 
     *
     * @var int|null
     */
    protected $sends;
    /**
     * The UTC day this point covers.
     *
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }
    /**
     * The UTC day this point covers.
     *
     * @param \DateTime|null $date
     *
     * @return self
     */
    public function setDate(?\DateTime $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;
        return $this;
    }
    /**
     * Volume for the day. An estimate for a competitor and an exact count for your own line; `source` on the series records which. A day nothing was observed is `0` rather than a missing point, so every line shares one axis.
     * 
     *
     * @return int|null
     */
    public function getSends(): ?int
    {
        return $this->sends;
    }
    /**
     * Volume for the day. An estimate for a competitor and an exact count for your own line; `source` on the series records which. A day nothing was observed is `0` rather than a missing point, so every line shares one axis.
     *
     * @param int|null $sends
     *
     * @return self
     */
    public function setSends(?int $sends): self
    {
        $this->initialized['sends'] = true;
        $this->sends = $sends;
        return $this;
    }
}
