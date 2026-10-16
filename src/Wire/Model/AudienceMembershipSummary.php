<?php

namespace MessageBird\Wire\Model;

/**
 * Exact count of all audience members at the source evaluation instant, including contacts without email and unsubscribed contacts.
 */
class AudienceMembershipSummary
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
     * Number of members at evaluation time.
     *
     * @var int|null
     */
    protected $total;
    /**
     * Source evaluation instant for the live count. Membership changes committed after the read began appear in a later response.
     *
     * @var \DateTime|null
     */
    protected $dataAsOf;
    /**
     * Number of members at evaluation time.
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
    /**
     * Number of members at evaluation time.
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
    /**
     * Source evaluation instant for the live count. Membership changes committed after the read began appear in a later response.
     *
     * @return \DateTime|null
     */
    public function getDataAsOf(): ?\DateTime
    {
        return $this->dataAsOf;
    }
    /**
     * Source evaluation instant for the live count. Membership changes committed after the read began appear in a later response.
     *
     * @param \DateTime|null $dataAsOf
     *
     * @return self
     */
    public function setDataAsOf(?\DateTime $dataAsOf): self
    {
        $this->initialized['dataAsOf'] = true;
        $this->dataAsOf = $dataAsOf;
        return $this;
    }
}
