<?php

namespace MessageBird\Wire\Model;

class VoicePartyBridgePSTNEndpoint
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
     * The number the platform placed the leg onward to, in E.164. The party's own `address` is the number that was dialled, so the two together are one hop of the call.
     *
     * @var string|null
     */
    protected $forwardTo;
    /**
     * Which of a forwarded call's two numbers it shows as the caller.
     * 
     * `dialed_number` presents the Bird number the caller dialed. Whoever answers
     * sees which of your numbers was called. Older configurations without a stored
     * choice use this value. Carrier screening can still affect delivery.
     * 
     * `calling_number` presents the caller's own number, so the phone rings as though
     * they had dialed it directly and the call can be returned from the call log. Because
     * the number is not one you own, some carriers (most often in the US and parts of
     * Europe) mark such calls as unverified, replace the number, or screen them.
     * 
     *
     * @var string|null
     */
    protected $forwardAs;
    /**
     * The number the platform placed the leg onward to, in E.164. The party's own `address` is the number that was dialled, so the two together are one hop of the call.
     *
     * @return string|null
     */
    public function getForwardTo(): ?string
    {
        return $this->forwardTo;
    }
    /**
     * The number the platform placed the leg onward to, in E.164. The party's own `address` is the number that was dialled, so the two together are one hop of the call.
     *
     * @param string|null $forwardTo
     *
     * @return self
     */
    public function setForwardTo(?string $forwardTo): self
    {
        $this->initialized['forwardTo'] = true;
        $this->forwardTo = $forwardTo;
        return $this;
    }
    /**
     * Which of a forwarded call's two numbers it shows as the caller.
     * 
     * `dialed_number` presents the Bird number the caller dialed. Whoever answers
     * sees which of your numbers was called. Older configurations without a stored
     * choice use this value. Carrier screening can still affect delivery.
     * 
     * `calling_number` presents the caller's own number, so the phone rings as though
     * they had dialed it directly and the call can be returned from the call log. Because
     * the number is not one you own, some carriers (most often in the US and parts of
     * Europe) mark such calls as unverified, replace the number, or screen them.
     * 
     *
     * @return string|null
     */
    public function getForwardAs(): ?string
    {
        return $this->forwardAs;
    }
    /**
    * Which of a forwarded call's two numbers it shows as the caller.
    
    `dialed_number` presents the Bird number the caller dialed. Whoever answers
    sees which of your numbers was called. Older configurations without a stored
    choice use this value. Carrier screening can still affect delivery.
    
    `calling_number` presents the caller's own number, so the phone rings as though
    they had dialed it directly and the call can be returned from the call log. Because
    the number is not one you own, some carriers (most often in the US and parts of
    Europe) mark such calls as unverified, replace the number, or screen them.
    
    *
    * @param string|null $forwardAs
    *
    * @return self
    */
    public function setForwardAs(?string $forwardAs): self
    {
        $this->initialized['forwardAs'] = true;
        $this->forwardAs = $forwardAs;
        return $this;
    }
}
