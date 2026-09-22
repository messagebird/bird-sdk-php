<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupJoinRequestDecisionResult
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
     * The join requests WhatsApp accepted the decision for. A person approved here can enter the group; a person rejected here sees the join button again.
     *
     * @var list<string>|null
     */
    protected $decided;
    /**
     * The join requests WhatsApp refused, each with its reason. Empty when the whole batch was applied.
     *
     * @var list<WhatsAppGroupJoinRequestFailure>|null
     */
    protected $failed;
    /**
     * The join requests WhatsApp accepted the decision for. A person approved here can enter the group; a person rejected here sees the join button again.
     *
     * @return list<string>|null
     */
    public function getDecided(): ?array
    {
        return $this->decided;
    }
    /**
     * The join requests WhatsApp accepted the decision for. A person approved here can enter the group; a person rejected here sees the join button again.
     *
     * @param list<string>|null $decided
     *
     * @return self
     */
    public function setDecided(?array $decided): self
    {
        $this->initialized['decided'] = true;
        $this->decided = $decided;
        return $this;
    }
    /**
     * The join requests WhatsApp refused, each with its reason. Empty when the whole batch was applied.
     *
     * @return list<WhatsAppGroupJoinRequestFailure>|null
     */
    public function getFailed(): ?array
    {
        return $this->failed;
    }
    /**
     * The join requests WhatsApp refused, each with its reason. Empty when the whole batch was applied.
     *
     * @param list<WhatsAppGroupJoinRequestFailure>|null $failed
     *
     * @return self
     */
    public function setFailed(?array $failed): self
    {
        $this->initialized['failed'] = true;
        $this->failed = $failed;
        return $this;
    }
}
