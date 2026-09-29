<?php

namespace MessageBird\Wire\Model;

class VoiceCallerIDVerifyRequest
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
     * The 6-digit verification code read out by the verification call. Required until ownership is verified. Omit it when retrying activation of an already verified number.
     *
     * @var string|null
     */
    protected $code;
    /**
     * The 6-digit verification code read out by the verification call. Required until ownership is verified. Omit it when retrying activation of an already verified number.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * The 6-digit verification code read out by the verification call. Required until ownership is verified. Omit it when retrying activation of an already verified number.
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
