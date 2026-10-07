<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsSeedRegionOption
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
     * The value to send when registering a test against this region. Free text rather than an enumeration: the set belongs to the measurement and is wider than the continents it looks like, so send one of these back verbatim rather than composing your own.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * The value to send when registering a test against this region. Free text rather than an enumeration: the set belongs to the measurement and is wider than the continents it looks like, so send one of these back verbatim rather than composing your own.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * The value to send when registering a test against this region. Free text rather than an enumeration: the set belongs to the measurement and is wider than the continents it looks like, so send one of these back verbatim rather than composing your own.
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
}
