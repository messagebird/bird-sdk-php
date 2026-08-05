<?php

namespace MessageBird\Wire\Model;

class VerificationOptions
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
     * Passcode length for this verification. Omit to use the configured length.
     *
     * @var int|null
     */
    protected $codeLength;
    /**
     * Reorder or narrow the delivery channels for this request. List channel names in the order to try them; a channel you omit is not used for this request, and a channel not already enabled for the recipient is ignored. A list that leaves no usable channel fails the request with `422`. Omit the field to use the configured order.
     *
     * @var list<string>|null
     */
    protected $channels;
    /**
     * Passcode length for this verification. Omit to use the configured length.
     *
     * @return int|null
     */
    public function getCodeLength(): ?int
    {
        return $this->codeLength;
    }
    /**
     * Passcode length for this verification. Omit to use the configured length.
     *
     * @param int|null $codeLength
     *
     * @return self
     */
    public function setCodeLength(?int $codeLength): self
    {
        $this->initialized['codeLength'] = true;
        $this->codeLength = $codeLength;
        return $this;
    }
    /**
     * Reorder or narrow the delivery channels for this request. List channel names in the order to try them; a channel you omit is not used for this request, and a channel not already enabled for the recipient is ignored. A list that leaves no usable channel fails the request with `422`. Omit the field to use the configured order.
     *
     * @return list<string>|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }
    /**
     * Reorder or narrow the delivery channels for this request. List channel names in the order to try them; a channel you omit is not used for this request, and a channel not already enabled for the recipient is ignored. A list that leaves no usable channel fails the request with `422`. Omit the field to use the configured order.
     *
     * @param list<string>|null $channels
     *
     * @return self
     */
    public function setChannels(?array $channels): self
    {
        $this->initialized['channels'] = true;
        $this->channels = $channels;
        return $this;
    }
}
