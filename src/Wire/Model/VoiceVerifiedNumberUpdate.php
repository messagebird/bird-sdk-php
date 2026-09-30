<?php

namespace MessageBird\Wire\Model;

class VoiceVerifiedNumberUpdate
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
     * Your new label for this verified number. Send `null` to clear it and go back to identifying the verified number by its number alone. It is yours to choose and appears nowhere on a call, so renaming never affects what the person you are calling sees, and it leaves the number and its verification untouched.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Your new label for this verified number. Send `null` to clear it and go back to identifying the verified number by its number alone. It is yours to choose and appears nowhere on a call, so renaming never affects what the person you are calling sees, and it leaves the number and its verification untouched.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your new label for this verified number. Send `null` to clear it and go back to identifying the verified number by its number alone. It is yours to choose and appears nowhere on a call, so renaming never affects what the person you are calling sees, and it leaves the number and its verification untouched.
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
}
