<?php

namespace MessageBird\Wire\Model;

class EmailLookupRequest
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
     * The email address to look up. Send it exactly as you hold it. The part before the `@` is case-sensitive, so the API does not lowercase it. A display-name form such as `Aisha <aisha@example.com>` is rejected rather than unwrapped.
     * 
     *
     * @var string|null
     */
    protected $email;
    /**
     * The email address to look up. Send it exactly as you hold it. The part before the `@` is case-sensitive, so the API does not lowercase it. A display-name form such as `Aisha <aisha@example.com>` is rejected rather than unwrapped.
     * 
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address to look up. Send it exactly as you hold it. The part before the `@` is case-sensitive, so the API does not lowercase it. A display-name form such as `Aisha <aisha@example.com>` is rejected rather than unwrapped.
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
