<?php

namespace MessageBird\Wire\Model;

/**
 * One business detail this party last submitted, and when it was filed.
 */
class ComplianceIdentityAnswer
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
     * The detail as last submitted. Every value travels as a string whatever the requirement's data type, so a number reads back as `"1500"`.
     *
     * @var string|null
     */
    protected $value;
    /**
     * When this party last filed the detail. Filing it is what records it here, so it is never a statement that a reviewer agreed with the value. Filing the same value again can carry a previous approval of it forward instead of putting it in front of a reviewer. `null` for a detail recorded before the container began tracking submissions.
     *
     * @var \DateTime|null
     */
    protected $submittedAt;
    /**
     * Where review has got to on this exact value. Absent when no registration has ruled on it, which covers a detail nobody has reached yet and one filed before the container recorded which submission it came from.
     * 
     * One value can be filed on several registrations and decided differently on each, and one verdict is reported for it. A live approval wins, because it is proof the value is acceptable. Failing that a refusal wins over a registration still waiting, since waiting is nobody having looked yet rather than evidence against a refusal. An approval past its validity period is neither: it reads as `expired` and ranks below a refusal, above anything still waiting. `not_applicable` is reported last, because it is a statement about a requirement rather than about the value.
     * 
     *
     * @var string|null
     */
    protected $state;
    /**
     * What has to change, when `state` is one a reviewer refused. `null` otherwise, and `null` on a refusal recorded without one.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * When the verdict in `state` was reached. `null` while nobody has decided, and on a state no reviewer set.
     *
     * @var \DateTime|null
     */
    protected $decidedAt;
    /**
     * The detail as last submitted. Every value travels as a string whatever the requirement's data type, so a number reads back as `"1500"`.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * The detail as last submitted. Every value travels as a string whatever the requirement's data type, so a number reads back as `"1500"`.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * When this party last filed the detail. Filing it is what records it here, so it is never a statement that a reviewer agreed with the value. Filing the same value again can carry a previous approval of it forward instead of putting it in front of a reviewer. `null` for a detail recorded before the container began tracking submissions.
     *
     * @return \DateTime|null
     */
    public function getSubmittedAt(): ?\DateTime
    {
        return $this->submittedAt;
    }
    /**
     * When this party last filed the detail. Filing it is what records it here, so it is never a statement that a reviewer agreed with the value. Filing the same value again can carry a previous approval of it forward instead of putting it in front of a reviewer. `null` for a detail recorded before the container began tracking submissions.
     *
     * @param \DateTime|null $submittedAt
     *
     * @return self
     */
    public function setSubmittedAt(?\DateTime $submittedAt): self
    {
        $this->initialized['submittedAt'] = true;
        $this->submittedAt = $submittedAt;
        return $this;
    }
    /**
     * Where review has got to on this exact value. Absent when no registration has ruled on it, which covers a detail nobody has reached yet and one filed before the container recorded which submission it came from.
     * 
     * One value can be filed on several registrations and decided differently on each, and one verdict is reported for it. A live approval wins, because it is proof the value is acceptable. Failing that a refusal wins over a registration still waiting, since waiting is nobody having looked yet rather than evidence against a refusal. An approval past its validity period is neither: it reads as `expired` and ranks below a refusal, above anything still waiting. `not_applicable` is reported last, because it is a statement about a requirement rather than about the value.
     * 
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
    * Where review has got to on this exact value. Absent when no registration has ruled on it, which covers a detail nobody has reached yet and one filed before the container recorded which submission it came from.
    
    One value can be filed on several registrations and decided differently on each, and one verdict is reported for it. A live approval wins, because it is proof the value is acceptable. Failing that a refusal wins over a registration still waiting, since waiting is nobody having looked yet rather than evidence against a refusal. An approval past its validity period is neither: it reads as `expired` and ranks below a refusal, above anything still waiting. `not_applicable` is reported last, because it is a statement about a requirement rather than about the value.
    
    *
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
     * What has to change, when `state` is one a reviewer refused. `null` otherwise, and `null` on a refusal recorded without one.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * What has to change, when `state` is one a reviewer refused. `null` otherwise, and `null` on a refusal recorded without one.
     *
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
     * When the verdict in `state` was reached. `null` while nobody has decided, and on a state no reviewer set.
     *
     * @return \DateTime|null
     */
    public function getDecidedAt(): ?\DateTime
    {
        return $this->decidedAt;
    }
    /**
     * When the verdict in `state` was reached. `null` while nobody has decided, and on a state no reviewer set.
     *
     * @param \DateTime|null $decidedAt
     *
     * @return self
     */
    public function setDecidedAt(?\DateTime $decidedAt): self
    {
        $this->initialized['decidedAt'] = true;
        $this->decidedAt = $decidedAt;
        return $this;
    }
}
