<?php

namespace MessageBird\Wire\Model;

class UnmetGate
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
     * Stable identifier for the verification requirement.
     *
     * @var string|null
     */
    protected $slug;
    /**
     * Human-readable name of the verification requirement.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The requirement's current state — for example, not yet started, in review, or previously revoked.
     *
     * @var string|null
     */
    protected $status;
    /**
     * How to resolve this requirement.
     *
     * @var string|null
     */
    protected $remediationKind;
    /**
     * Stable identifier for the verification requirement.
     *
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    /**
     * Stable identifier for the verification requirement.
     *
     * @param string|null $slug
     *
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->initialized['slug'] = true;
        $this->slug = $slug;
        return $this;
    }
    /**
     * Human-readable name of the verification requirement.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Human-readable name of the verification requirement.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The requirement's current state — for example, not yet started, in review, or previously revoked.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The requirement's current state — for example, not yet started, in review, or previously revoked.
     *
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
     * How to resolve this requirement.
     *
     * @return string|null
     */
    public function getRemediationKind(): ?string
    {
        return $this->remediationKind;
    }
    /**
     * How to resolve this requirement.
     *
     * @param string|null $remediationKind
     *
     * @return self
     */
    public function setRemediationKind(?string $remediationKind): self
    {
        $this->initialized['remediationKind'] = true;
        $this->remediationKind = $remediationKind;
        return $this;
    }
}
