<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsFreshness
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
     * The most recent UTC day the figures include, or null for a live lookup that has no measurement window.
     * 
     *
     * @var \DateTime|null
     */
    protected $asOf;
    /**
     * How far behind real time this resource usually runs. A lowercase
     * identifier rather than a display label, so pick your own wording for it,
     * and treat the set as open: the measurement names a hint per resource and
     * can add one without notice.
     * 
     * Null when the measurement reports no hint, which several resources do:
     * show the figures without an age rather than inventing one.
     * 
     *
     * @var string|null
     */
    protected $lagHint;
    /**
     * The most recent UTC day the figures include, or null for a live lookup that has no measurement window.
     * 
     *
     * @return \DateTime|null
     */
    public function getAsOf(): ?\DateTime
    {
        return $this->asOf;
    }
    /**
     * The most recent UTC day the figures include, or null for a live lookup that has no measurement window.
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
    /**
     * How far behind real time this resource usually runs. A lowercase
     * identifier rather than a display label, so pick your own wording for it,
     * and treat the set as open: the measurement names a hint per resource and
     * can add one without notice.
     * 
     * Null when the measurement reports no hint, which several resources do:
     * show the figures without an age rather than inventing one.
     * 
     *
     * @return string|null
     */
    public function getLagHint(): ?string
    {
        return $this->lagHint;
    }
    /**
    * How far behind real time this resource usually runs. A lowercase
    identifier rather than a display label, so pick your own wording for it,
    and treat the set as open: the measurement names a hint per resource and
    can add one without notice.
    
    Null when the measurement reports no hint, which several resources do:
    show the figures without an age rather than inventing one.
    
    *
    * @param string|null $lagHint
    *
    * @return self
    */
    public function setLagHint(?string $lagHint): self
    {
        $this->initialized['lagHint'] = true;
        $this->lagHint = $lagHint;
        return $this;
    }
}
