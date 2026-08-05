<?php

namespace MessageBird\Wire\Model;

class VerificationCheckRequest
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
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @var VerificationTo|null
     */
    protected $to;
    /**
     * The passcode the recipient received. Passcodes are numeric; submit the digits exactly as delivered. An incorrect value is a normal `200` outcome with `success: false`, not an error.
     *
     * @var string|null
     */
    protected $code;
    /**
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     * 
     *
     * @return VerificationTo|null
     */
    public function getTo(): ?VerificationTo
    {
        return $this->to;
    }
    /**
     * The recipient to verify. Provide an `email_address`, a `phone_number`, or both; at least one is required. The addresses also identify the verification: a check must supply exactly the set used on the create call, so a verification created with both addresses is not found by either one alone.
     *
     * @param VerificationTo|null $to
     *
     * @return self
     */
    public function setTo(?VerificationTo $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * The passcode the recipient received. Passcodes are numeric; submit the digits exactly as delivered. An incorrect value is a normal `200` outcome with `success: false`, not an error.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * The passcode the recipient received. Passcodes are numeric; submit the digits exactly as delivered. An incorrect value is a normal `200` outcome with `success: false`, not an error.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
}
