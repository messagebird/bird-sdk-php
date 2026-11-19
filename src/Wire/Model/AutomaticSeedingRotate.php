<?php

namespace MessageBird\Wire\Model;

/**
 * Rotate the trigger address once at the supplied settings revision. Settings must have been initialized by a successful settings update; rotation before setup returns 404. A stale revision returns 409 without rotating again.
 */
class AutomaticSeedingRotate
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
     * Revision from the latest settings read after initial setup. Revision zero from an unconfigured workspace cannot be used to rotate an address.
     *
     * @var int|null
     */
    protected $expectedRevision;
    /**
     * Revision from the latest settings read after initial setup. Revision zero from an unconfigured workspace cannot be used to rotate an address.
     *
     * @return int|null
     */
    public function getExpectedRevision(): ?int
    {
        return $this->expectedRevision;
    }
    /**
     * Revision from the latest settings read after initial setup. Revision zero from an unconfigured workspace cannot be used to rotate an address.
     *
     * @param int|null $expectedRevision
     *
     * @return self
     */
    public function setExpectedRevision(?int $expectedRevision): self
    {
        $this->initialized['expectedRevision'] = true;
        $this->expectedRevision = $expectedRevision;
        return $this;
    }
}
