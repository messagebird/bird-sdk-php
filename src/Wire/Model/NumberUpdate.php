<?php

namespace MessageBird\Wire\Model;

class NumberUpdate
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
     * A name for this number in your workspace, such as Support line. Send null to clear it, or omit it to keep the current name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Your own reference for this number, such as an identifier from your records. References need not be unique. Send null to clear it, or omit it to keep the current reference.
     *
     * @var string|null
     */
    protected $reference;
    /**
     * A name for this number in your workspace, such as Support line. Send null to clear it, or omit it to keep the current name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * A name for this number in your workspace, such as Support line. Send null to clear it, or omit it to keep the current name.
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
     * Your own reference for this number, such as an identifier from your records. References need not be unique. Send null to clear it, or omit it to keep the current reference.
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    /**
     * Your own reference for this number, such as an identifier from your records. References need not be unique. Send null to clear it, or omit it to keep the current reference.
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->initialized['reference'] = true;
        $this->reference = $reference;
        return $this;
    }
}
