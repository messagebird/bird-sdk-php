<?php

namespace MessageBird\Wire\Model;

/**
 * Latest attempt and last successful verification. A new pending attempt does not erase an earlier success.
 */
class AMBConversationAuthentication
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
     * A single attempt to verify the identity associated with an Apple Messages for Business conversation.
     *
     * @var AMBAuthentication|null
     */
    protected $latestAttempt;
    /**
     * Most recent successful identity verification for this conversation.
     *
     * @var AMBConversationVerifiedIdentity|null
     */
    protected $lastVerified;
    /**
     * A single attempt to verify the identity associated with an Apple Messages for Business conversation.
     *
     * @return AMBAuthentication|null
     */
    public function getLatestAttempt(): ?AMBAuthentication
    {
        return $this->latestAttempt;
    }
    /**
     * A single attempt to verify the identity associated with an Apple Messages for Business conversation.
     *
     * @param AMBAuthentication|null $latestAttempt
     *
     * @return self
     */
    public function setLatestAttempt(?AMBAuthentication $latestAttempt): self
    {
        $this->initialized['latestAttempt'] = true;
        $this->latestAttempt = $latestAttempt;
        return $this;
    }
    /**
     * Most recent successful identity verification for this conversation.
     *
     * @return AMBConversationVerifiedIdentity|null
     */
    public function getLastVerified(): ?AMBConversationVerifiedIdentity
    {
        return $this->lastVerified;
    }
    /**
     * Most recent successful identity verification for this conversation.
     *
     * @param AMBConversationVerifiedIdentity|null $lastVerified
     *
     * @return self
     */
    public function setLastVerified(?AMBConversationVerifiedIdentity $lastVerified): self
    {
        $this->initialized['lastVerified'] = true;
        $this->lastVerified = $lastVerified;
        return $this;
    }
}
