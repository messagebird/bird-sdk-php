<?php

namespace MessageBird\Wire\Model;

class Tag
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
     * Tag name. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 32 characters.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Tag value. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 64 characters.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * Tag name. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 32 characters.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Tag name. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 32 characters.
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
     * Tag value. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 64 characters.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Tag value. ASCII letters, digits, underscore, and hyphen only. Case-sensitive. Maximum 64 characters.
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
