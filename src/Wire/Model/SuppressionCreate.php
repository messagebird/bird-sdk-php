<?php

namespace MessageBird\Wire\Model;

class SuppressionCreate
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
     * The address to stop sending to. Normalized before storage and matching: lowercased and trimmed of surrounding whitespace.
     * 
     *
     * @var string|null
     */
    protected $email;
    /**
     * The address to stop sending to. Normalized before storage and matching: lowercased and trimmed of surrounding whitespace.
     * 
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The address to stop sending to. Normalized before storage and matching: lowercased and trimmed of surrounding whitespace.
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
}
