<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupJoinRequestFailure
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
     * The join request that was not decided.
     *
     * @var string|null
     */
    protected $joinRequestId;
    /**
     * Why WhatsApp refused. The common one is a person who has not accepted WhatsApp's current terms, which no retry fixes.
     * 
     *
     * @var WhatsAppGroupJoinRequestFailureError|null
     */
    protected $error;
    /**
     * The join request that was not decided.
     *
     * @return string|null
     */
    public function getJoinRequestId(): ?string
    {
        return $this->joinRequestId;
    }
    /**
     * The join request that was not decided.
     *
     * @param string|null $joinRequestId
     *
     * @return self
     */
    public function setJoinRequestId(?string $joinRequestId): self
    {
        $this->initialized['joinRequestId'] = true;
        $this->joinRequestId = $joinRequestId;
        return $this;
    }
    /**
     * Why WhatsApp refused. The common one is a person who has not accepted WhatsApp's current terms, which no retry fixes.
     * 
     *
     * @return WhatsAppGroupJoinRequestFailureError|null
     */
    public function getError(): ?WhatsAppGroupJoinRequestFailureError
    {
        return $this->error;
    }
    /**
     * Why WhatsApp refused. The common one is a person who has not accepted WhatsApp's current terms, which no retry fixes.
     *
     * @param WhatsAppGroupJoinRequestFailureError|null $error
     *
     * @return self
     */
    public function setError(?WhatsAppGroupJoinRequestFailureError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
