<?php

namespace MessageBird\Wire\Model;

class VerificationTo
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
     * The recipient's email address. Case does not matter; the address is lowercased before use.
     *
     * @var string|null
     */
    protected $email;
    /**
     * The recipient's phone number in E.164 format, with the leading `+` and country code (for example `+15551234567`). A number in any other format is rejected as an invalid recipient (`422`).
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The recipient's email address. Case does not matter; the address is lowercased before use.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The recipient's email address. Case does not matter; the address is lowercased before use.
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
    /**
     * The recipient's phone number in E.164 format, with the leading `+` and country code (for example `+15551234567`). A number in any other format is rejected as an invalid recipient (`422`).
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The recipient's phone number in E.164 format, with the leading `+` and country code (for example `+15551234567`). A number in any other format is rejected as an invalid recipient (`422`).
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
}
