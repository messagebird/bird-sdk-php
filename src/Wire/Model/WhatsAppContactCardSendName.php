<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactCardSendName extends \ArrayObject
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
     * The whole name, as the card should render it.
     *
     * @var string|null
     */
    protected $formattedName;
    /**
     * @var string|null
     */
    protected $firstName;
    /**
     * @var string|null
     */
    protected $middleName;
    /**
     * @var string|null
     */
    protected $lastName;
    /**
     * @var string|null
     */
    protected $prefix;
    /**
     * @var string|null
     */
    protected $suffix;
    /**
     * The whole name, as the card should render it.
     *
     * @return string|null
     */
    public function getFormattedName(): ?string
    {
        return $this->formattedName;
    }
    /**
     * The whole name, as the card should render it.
     *
     * @param string|null $formattedName
     *
     * @return self
     */
    public function setFormattedName(?string $formattedName): self
    {
        $this->initialized['formattedName'] = true;
        $this->formattedName = $formattedName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    /**
     * @param string|null $firstName
     *
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }
    /**
     * @param string|null $middleName
     *
     * @return self
     */
    public function setMiddleName(?string $middleName): self
    {
        $this->initialized['middleName'] = true;
        $this->middleName = $middleName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    /**
     * @param string|null $lastName
     *
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }
    /**
     * @param string|null $prefix
     *
     * @return self
     */
    public function setPrefix(?string $prefix): self
    {
        $this->initialized['prefix'] = true;
        $this->prefix = $prefix;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }
    /**
     * @param string|null $suffix
     *
     * @return self
     */
    public function setSuffix(?string $suffix): self
    {
        $this->initialized['suffix'] = true;
        $this->suffix = $suffix;
        return $this;
    }
}
