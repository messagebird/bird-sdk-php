<?php

namespace MessageBird\Wire\Model;

class WhatsAppErrorCodeStatsPoint
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
     * The normalized failure reason this row aggregates, matching the `last_error.code` reported on an individual failed message.
     *
     * @var string|null
     */
    protected $errorCode;
    /**
     * Distinct messages that failed with this reason in scope.
     *
     * @var int|null
     */
    protected $count;
    /**
     * The normalized failure reason this row aggregates, matching the `last_error.code` reported on an individual failed message.
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }
    /**
     * The normalized failure reason this row aggregates, matching the `last_error.code` reported on an individual failed message.
     *
     * @param string|null $errorCode
     *
     * @return self
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->initialized['errorCode'] = true;
        $this->errorCode = $errorCode;
        return $this;
    }
    /**
     * Distinct messages that failed with this reason in scope.
     *
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
    /**
     * Distinct messages that failed with this reason in scope.
     *
     * @param int|null $count
     *
     * @return self
     */
    public function setCount(?int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
}
