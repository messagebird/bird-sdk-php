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
     * "dialed_number" is the number the caller dialled, which is one of yours.
     * Carriers treat it as fully yours, so it is the least likely to be altered or
     * screened. Whoever answers sees which of your numbers was called, not who called
     * it. It needs your workspace approved to place calls from numbers you bought from
     * us; where it is not, this value is refused and the call shows the calling
     * number.
     * 
     * "calling_number" is the caller's own number, so the phone rings as though they
     * had dialled it directly and the call can be returned from the call log. Because
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
     * "dialed_number" is the number the caller dialled, which is one of yours.
     * Carriers treat it as fully yours, so it is the least likely to be altered or
     * screened. Whoever answers sees which of your numbers was called, not who called
     * it. It needs your workspace approved to place calls from numbers you bought from
     * us; where it is not, this value is refused and the call shows the calling
     * number.
     * 
     * "calling_number" is the caller's own number, so the phone rings as though they
     * had dialled it directly and the call can be returned from the call log. Because
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
    
    "dialed_number" is the number the caller dialled, which is one of yours.
    Carriers treat it as fully yours, so it is the least likely to be altered or
    screened. Whoever answers sees which of your numbers was called, not who called
    it. It needs your workspace approved to place calls from numbers you bought from
    us; where it is not, this value is refused and the call shows the calling
    number.
    
    "calling_number" is the caller's own number, so the phone rings as though they
    had dialled it directly and the call can be returned from the call log. Because
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
