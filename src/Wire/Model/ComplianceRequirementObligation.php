<?php

namespace MessageBird\Wire\Model;

/**
 * What this registration has to do to keep sending, and by when. Null when nothing is outstanding. An obligation does not stop you sending: the registration stays authorised until the date passes, and supplying what is asked for before then closes it with no interruption.
 */
class ComplianceRequirementObligation extends \ArrayObject
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
    protected $reason;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * The date to supply this by. Where more time has been given, this is the later date rather than the one first asked for.
     * 
     *
     * @var \DateTime|null
     */
    protected $dueAt;
    /**
     * The version of the country's form your answers have to reach. For an expiry it is the version you already answered, filled in again.
     * 
     *
     * @var int|null
     */
    protected $targetVersion;
    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * The date to supply this by. Where more time has been given, this is the later date rather than the one first asked for.
     * 
     *
     * @return \DateTime|null
     */
    public function getDueAt(): ?\DateTime
    {
        return $this->dueAt;
    }
    /**
     * The date to supply this by. Where more time has been given, this is the later date rather than the one first asked for.
     *
     * @param \DateTime|null $dueAt
     *
     * @return self
     */
    public function setDueAt(?\DateTime $dueAt): self
    {
        $this->initialized['dueAt'] = true;
        $this->dueAt = $dueAt;
        return $this;
    }
    /**
     * The version of the country's form your answers have to reach. For an expiry it is the version you already answered, filled in again.
     * 
     *
     * @return int|null
     */
    public function getTargetVersion(): ?int
    {
        return $this->targetVersion;
    }
    /**
     * The version of the country's form your answers have to reach. For an expiry it is the version you already answered, filled in again.
     *
     * @param int|null $targetVersion
     *
     * @return self
     */
    public function setTargetVersion(?int $targetVersion): self
    {
        $this->initialized['targetVersion'] = true;
        $this->targetVersion = $targetVersion;
        return $this;
    }
}
