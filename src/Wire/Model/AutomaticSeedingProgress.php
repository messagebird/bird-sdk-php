<?php

namespace MessageBird\Wire\Model;

/**
 * Delivered, failed, not_sent, unknown and pending partition planned copies. Admitted and provider_accepted overlap those buckets and must not be added to them. Late outcomes can move a copy between buckets.
 */
class AutomaticSeedingProgress
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
     * Number of retained planned copies.
     *
     * @var int|null
     */
    protected $planned;
    /**
     * Copies admitted to Bird email processing. Independent milestone; not provider acceptance.
     *
     * @var int|null
     */
    protected $admitted;
    /**
     * Copies explicitly accepted by the sending provider. Independent milestone; not delivery or placement.
     *
     * @var int|null
     */
    protected $providerAccepted;
    /**
     * Copies with receiving-server delivery or complaint evidence. Does not establish inbox placement.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Copies with terminal bounce, rejection or block evidence.
     *
     * @var int|null
     */
    protected $failed;
    /**
     * Copies refused or canceled before sending, including ungranted copies after a run fence.
     *
     * @var int|null
     */
    protected $notSent;
    /**
     * Copies with unresolved admission or provider outcome uncertainty.
     *
     * @var int|null
     */
    protected $unknown;
    /**
     * Remaining copies awaiting admission or a delivery outcome.
     *
     * @var int|null
     */
    protected $pending;
    /**
     * Number of retained planned copies.
     *
     * @return int|null
     */
    public function getPlanned(): ?int
    {
        return $this->planned;
    }
    /**
     * Number of retained planned copies.
     *
     * @param int|null $planned
     *
     * @return self
     */
    public function setPlanned(?int $planned): self
    {
        $this->initialized['planned'] = true;
        $this->planned = $planned;
        return $this;
    }
    /**
     * Copies admitted to Bird email processing. Independent milestone; not provider acceptance.
     *
     * @return int|null
     */
    public function getAdmitted(): ?int
    {
        return $this->admitted;
    }
    /**
     * Copies admitted to Bird email processing. Independent milestone; not provider acceptance.
     *
     * @param int|null $admitted
     *
     * @return self
     */
    public function setAdmitted(?int $admitted): self
    {
        $this->initialized['admitted'] = true;
        $this->admitted = $admitted;
        return $this;
    }
    /**
     * Copies explicitly accepted by the sending provider. Independent milestone; not delivery or placement.
     *
     * @return int|null
     */
    public function getProviderAccepted(): ?int
    {
        return $this->providerAccepted;
    }
    /**
     * Copies explicitly accepted by the sending provider. Independent milestone; not delivery or placement.
     *
     * @param int|null $providerAccepted
     *
     * @return self
     */
    public function setProviderAccepted(?int $providerAccepted): self
    {
        $this->initialized['providerAccepted'] = true;
        $this->providerAccepted = $providerAccepted;
        return $this;
    }
    /**
     * Copies with receiving-server delivery or complaint evidence. Does not establish inbox placement.
     *
     * @return int|null
     */
    public function getDelivered(): ?int
    {
        return $this->delivered;
    }
    /**
     * Copies with receiving-server delivery or complaint evidence. Does not establish inbox placement.
     *
     * @param int|null $delivered
     *
     * @return self
     */
    public function setDelivered(?int $delivered): self
    {
        $this->initialized['delivered'] = true;
        $this->delivered = $delivered;
        return $this;
    }
    /**
     * Copies with terminal bounce, rejection or block evidence.
     *
     * @return int|null
     */
    public function getFailed(): ?int
    {
        return $this->failed;
    }
    /**
     * Copies with terminal bounce, rejection or block evidence.
     *
     * @param int|null $failed
     *
     * @return self
     */
    public function setFailed(?int $failed): self
    {
        $this->initialized['failed'] = true;
        $this->failed = $failed;
        return $this;
    }
    /**
     * Copies refused or canceled before sending, including ungranted copies after a run fence.
     *
     * @return int|null
     */
    public function getNotSent(): ?int
    {
        return $this->notSent;
    }
    /**
     * Copies refused or canceled before sending, including ungranted copies after a run fence.
     *
     * @param int|null $notSent
     *
     * @return self
     */
    public function setNotSent(?int $notSent): self
    {
        $this->initialized['notSent'] = true;
        $this->notSent = $notSent;
        return $this;
    }
    /**
     * Copies with unresolved admission or provider outcome uncertainty.
     *
     * @return int|null
     */
    public function getUnknown(): ?int
    {
        return $this->unknown;
    }
    /**
     * Copies with unresolved admission or provider outcome uncertainty.
     *
     * @param int|null $unknown
     *
     * @return self
     */
    public function setUnknown(?int $unknown): self
    {
        $this->initialized['unknown'] = true;
        $this->unknown = $unknown;
        return $this;
    }
    /**
     * Remaining copies awaiting admission or a delivery outcome.
     *
     * @return int|null
     */
    public function getPending(): ?int
    {
        return $this->pending;
    }
    /**
     * Remaining copies awaiting admission or a delivery outcome.
     *
     * @param int|null $pending
     *
     * @return self
     */
    public function setPending(?int $pending): self
    {
        $this->initialized['pending'] = true;
        $this->pending = $pending;
        return $this;
    }
}
