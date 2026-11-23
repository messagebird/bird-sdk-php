<?php

namespace MessageBird\Wire\Model;

/**
 * Reusable block links in one template language, keyed by occurrence UUID. Each key matches one HTML comment marker `bird:shared-block:UUID` in the language's HTML. The template language selects the block language, and a link follows the block's latest publication in that language.
 */
class EmailTemplateSharedBlocks
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
     * Format of these shared section references.
     *
     * @var int|null
     */
    protected $version;
    /**
     * Block references keyed by occurrence UUID, with up to 100 occurrences per language.
     *
     * @var array<string, EmailTemplateSharedBlockBinding>|null
     */
    protected $bindings;
    /**
     * Format of these shared section references.
     *
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }
    /**
     * Format of these shared section references.
     *
     * @param int|null $version
     *
     * @return self
     */
    public function setVersion(?int $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;
        return $this;
    }
    /**
     * Block references keyed by occurrence UUID, with up to 100 occurrences per language.
     *
     * @return array<string, EmailTemplateSharedBlockBinding>|null
     */
    public function getBindings(): ?iterable
    {
        return $this->bindings;
    }
    /**
     * Block references keyed by occurrence UUID, with up to 100 occurrences per language.
     *
     * @param array<string, EmailTemplateSharedBlockBinding>|null $bindings
     *
     * @return self
     */
    public function setBindings(?iterable $bindings): self
    {
        $this->initialized['bindings'] = true;
        $this->bindings = $bindings;
        return $this;
    }
}
