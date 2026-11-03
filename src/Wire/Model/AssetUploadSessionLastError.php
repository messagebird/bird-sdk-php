<?php

namespace MessageBird\Wire\Model;

/**
 * Stable error code from the most recent failed completion attempt. The operation's error response carries its message and recovery steps.
 */
class AssetUploadSessionLastError extends \ArrayObject
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
     * Bird error code for the failed attempt.
     *
     * @var string|null
     */
    protected $code;
    /**
     * Bird error code for the failed attempt.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Bird error code for the failed attempt.
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
