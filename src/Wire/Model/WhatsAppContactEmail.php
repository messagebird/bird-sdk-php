<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactEmail
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
     * @var string|null
     */
    protected $email;
    /**
     * The label the contact's device attached, for example `Personal` or `Work`. Free text passed through verbatim.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
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
    /**
     * The label the contact's device attached, for example `Personal` or `Work`. Free text passed through verbatim.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The label the contact's device attached, for example `Personal` or `Work`. Free text passed through verbatim.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
