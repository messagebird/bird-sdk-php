<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedTestQuota
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
     * Allowance used in the current billing period, including retained uncertain registrations. When `limit` is null, usage is not tracked and this field is zero.
     * 
     *
     * @var int|null
     */
    protected $used;
    /**
     * Seed tests included in the billing period, or null when no cap applies to this organization.
     * 
     *
     * @var int|null
     */
    protected $limit;
    /**
     * When the billing-period allowance next resets.
     *
     * @var \DateTime|null
     */
    protected $resetsAt;
    /**
     * Allowance used in the current billing period, including retained uncertain registrations. When `limit` is null, usage is not tracked and this field is zero.
     * 
     *
     * @return int|null
     */
    public function getUsed(): ?int
    {
        return $this->used;
    }
    /**
     * Allowance used in the current billing period, including retained uncertain registrations. When `limit` is null, usage is not tracked and this field is zero.
     *
     * @param int|null $used
     *
     * @return self
     */
    public function setUsed(?int $used): self
    {
        $this->initialized['used'] = true;
        $this->used = $used;
        return $this;
    }
    /**
     * Seed tests included in the billing period, or null when no cap applies to this organization.
     * 
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * Seed tests included in the billing period, or null when no cap applies to this organization.
     *
     * @param int|null $limit
     *
     * @return self
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * When the billing-period allowance next resets.
     *
     * @return \DateTime|null
     */
    public function getResetsAt(): ?\DateTime
    {
        return $this->resetsAt;
    }
    /**
     * When the billing-period allowance next resets.
     *
     * @param \DateTime|null $resetsAt
     *
     * @return self
     */
    public function setResetsAt(?\DateTime $resetsAt): self
    {
        $this->initialized['resetsAt'] = true;
        $this->resetsAt = $resetsAt;
        return $this;
    }
}
