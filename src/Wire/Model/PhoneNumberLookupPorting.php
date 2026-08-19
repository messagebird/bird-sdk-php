<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupPorting extends \ArrayObject
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
     * @var string|null
     */
    protected $status;
    /**
     * Whether the number has ever moved network. `false` is a positive finding rather than a lack of one: the registry was consulted and holds no move for this number. Present only when `status` is `ok`.
     * 
     *
     * @var bool|null
     */
    protected $ported;
    /**
     * When the number last moved network. Absent when it has never ported or when no date is on record.
     *
     * @var \DateTime|null
     */
    protected $lastPortedAt;
    /**
     * Whether `last_ported_at` is an approximation. Some registries record the period of a move without its exact day.
     *
     * @var bool|null
     */
    protected $lastPortedAtIsApproximate;
    /**
     * Every move on record, oldest first. Absent when the number has never ported or when its registry publishes no history.
     *
     * @var list<LookupPortingEvent>|null
     */
    protected $history;
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Whether the number has ever moved network. `false` is a positive finding rather than a lack of one: the registry was consulted and holds no move for this number. Present only when `status` is `ok`.
     * 
     *
     * @return bool|null
     */
    public function getPorted(): ?bool
    {
        return $this->ported;
    }
    /**
     * Whether the number has ever moved network. `false` is a positive finding rather than a lack of one: the registry was consulted and holds no move for this number. Present only when `status` is `ok`.
     *
     * @param bool|null $ported
     *
     * @return self
     */
    public function setPorted(?bool $ported): self
    {
        $this->initialized['ported'] = true;
        $this->ported = $ported;
        return $this;
    }
    /**
     * When the number last moved network. Absent when it has never ported or when no date is on record.
     *
     * @return \DateTime|null
     */
    public function getLastPortedAt(): ?\DateTime
    {
        return $this->lastPortedAt;
    }
    /**
     * When the number last moved network. Absent when it has never ported or when no date is on record.
     *
     * @param \DateTime|null $lastPortedAt
     *
     * @return self
     */
    public function setLastPortedAt(?\DateTime $lastPortedAt): self
    {
        $this->initialized['lastPortedAt'] = true;
        $this->lastPortedAt = $lastPortedAt;
        return $this;
    }
    /**
     * Whether `last_ported_at` is an approximation. Some registries record the period of a move without its exact day.
     *
     * @return bool|null
     */
    public function getLastPortedAtIsApproximate(): ?bool
    {
        return $this->lastPortedAtIsApproximate;
    }
    /**
     * Whether `last_ported_at` is an approximation. Some registries record the period of a move without its exact day.
     *
     * @param bool|null $lastPortedAtIsApproximate
     *
     * @return self
     */
    public function setLastPortedAtIsApproximate(?bool $lastPortedAtIsApproximate): self
    {
        $this->initialized['lastPortedAtIsApproximate'] = true;
        $this->lastPortedAtIsApproximate = $lastPortedAtIsApproximate;
        return $this;
    }
    /**
     * Every move on record, oldest first. Absent when the number has never ported or when its registry publishes no history.
     *
     * @return list<LookupPortingEvent>|null
     */
    public function getHistory(): ?array
    {
        return $this->history;
    }
    /**
     * Every move on record, oldest first. Absent when the number has never ported or when its registry publishes no history.
     *
     * @param list<LookupPortingEvent>|null $history
     *
     * @return self
     */
    public function setHistory(?array $history): self
    {
        $this->initialized['history'] = true;
        $this->history = $history;
        return $this;
    }
}
