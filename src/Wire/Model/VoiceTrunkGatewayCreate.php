<?php

namespace MessageBird\Wire\Model;

class VoiceTrunkGatewayCreate
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
     * SIP URI an inbound call to this trunk should be forwarded to. Give the host only, with an optional port: which number is dialed there comes from `destination_format`, so a URI carrying a user part is rejected.
     * 
     *
     * @var string|null
     */
    protected $sipUri;
    /**
     * The order gateways are tried in, lowest first. Give two gateways the same priority to share calls between them evenly.
     * 
     *
     * @var int|null
     */
    protected $priority;
    /**
     * How this gateway wants the calling number spelled. Write a template whose
     * `{number}` stands for the number without its leading `+`; the result is
     * stated in the `P-Asserted-Identity` header of the delivered call.
     * 
     * Omit it for E.164, which is `+{number}`. The template may add digits,
     * letters and the characters `-_.!~*'()&=+$,;?/%#` around `{number}`, which
     * may appear at most once, and anything else in braces is rejected so a
     * misspelled placeholder cannot reach a call.
     * 
     * A format with no `{number}` at all states the same identity on every call,
     * which is what a peer that only accepts one authorized number wants. The
     * call then carries nothing about who really called.
     * 
     *
     * @var string|null
     */
    protected $originationFormat;
    /**
     * How this gateway formats the dialed number. In the template, `{number}`
     * represents the number without its leading `+`. The result is placed before
     * the `sip_uri` host. For example, `1234#{number}` formats `+31201234567` as
     * `sip:1234#31201234567@pbx.example.com:5060`.
     * 
     * Omit it for E.164, which is `+{number}`. A format with no `{number}` at all
     * sends every number this trunk answers to one fixed number, so
     * `777000447973` reaches `sip:777000447973@pbx.example.com:5060` whatever was
     * dialed. The same rules as `origination_format` apply to what the template
     * may contain.
     * 
     *
     * @var string|null
     */
    protected $destinationFormat;
    /**
     * SIP URI an inbound call to this trunk should be forwarded to. Give the host only, with an optional port: which number is dialed there comes from `destination_format`, so a URI carrying a user part is rejected.
     * 
     *
     * @return string|null
     */
    public function getSipUri(): ?string
    {
        return $this->sipUri;
    }
    /**
     * SIP URI an inbound call to this trunk should be forwarded to. Give the host only, with an optional port: which number is dialed there comes from `destination_format`, so a URI carrying a user part is rejected.
     *
     * @param string|null $sipUri
     *
     * @return self
     */
    public function setSipUri(?string $sipUri): self
    {
        $this->initialized['sipUri'] = true;
        $this->sipUri = $sipUri;
        return $this;
    }
    /**
     * The order gateways are tried in, lowest first. Give two gateways the same priority to share calls between them evenly.
     * 
     *
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }
    /**
     * The order gateways are tried in, lowest first. Give two gateways the same priority to share calls between them evenly.
     *
     * @param int|null $priority
     *
     * @return self
     */
    public function setPriority(?int $priority): self
    {
        $this->initialized['priority'] = true;
        $this->priority = $priority;
        return $this;
    }
    /**
     * How this gateway wants the calling number spelled. Write a template whose
     * `{number}` stands for the number without its leading `+`; the result is
     * stated in the `P-Asserted-Identity` header of the delivered call.
     * 
     * Omit it for E.164, which is `+{number}`. The template may add digits,
     * letters and the characters `-_.!~*'()&=+$,;?/%#` around `{number}`, which
     * may appear at most once, and anything else in braces is rejected so a
     * misspelled placeholder cannot reach a call.
     * 
     * A format with no `{number}` at all states the same identity on every call,
     * which is what a peer that only accepts one authorized number wants. The
     * call then carries nothing about who really called.
     * 
     *
     * @return string|null
     */
    public function getOriginationFormat(): ?string
    {
        return $this->originationFormat;
    }
    /**
    * How this gateway wants the calling number spelled. Write a template whose
    `{number}` stands for the number without its leading `+`; the result is
    stated in the `P-Asserted-Identity` header of the delivered call.
    
    Omit it for E.164, which is `+{number}`. The template may add digits,
    letters and the characters `-_.!~*'()&=+$,;?/%#` around `{number}`, which
    may appear at most once, and anything else in braces is rejected so a
    misspelled placeholder cannot reach a call.
    
    A format with no `{number}` at all states the same identity on every call,
    which is what a peer that only accepts one authorized number wants. The
    call then carries nothing about who really called.
    
    *
    * @param string|null $originationFormat
    *
    * @return self
    */
    public function setOriginationFormat(?string $originationFormat): self
    {
        $this->initialized['originationFormat'] = true;
        $this->originationFormat = $originationFormat;
        return $this;
    }
    /**
     * How this gateway formats the dialed number. In the template, `{number}`
     * represents the number without its leading `+`. The result is placed before
     * the `sip_uri` host. For example, `1234#{number}` formats `+31201234567` as
     * `sip:1234#31201234567@pbx.example.com:5060`.
     * 
     * Omit it for E.164, which is `+{number}`. A format with no `{number}` at all
     * sends every number this trunk answers to one fixed number, so
     * `777000447973` reaches `sip:777000447973@pbx.example.com:5060` whatever was
     * dialed. The same rules as `origination_format` apply to what the template
     * may contain.
     * 
     *
     * @return string|null
     */
    public function getDestinationFormat(): ?string
    {
        return $this->destinationFormat;
    }
    /**
    * How this gateway formats the dialed number. In the template, `{number}`
    represents the number without its leading `+`. The result is placed before
    the `sip_uri` host. For example, `1234#{number}` formats `+31201234567` as
    `sip:1234#31201234567@pbx.example.com:5060`.
    
    Omit it for E.164, which is `+{number}`. A format with no `{number}` at all
    sends every number this trunk answers to one fixed number, so
    `777000447973` reaches `sip:777000447973@pbx.example.com:5060` whatever was
    dialed. The same rules as `origination_format` apply to what the template
    may contain.
    
    *
    * @param string|null $destinationFormat
    *
    * @return self
    */
    public function setDestinationFormat(?string $destinationFormat): self
    {
        $this->initialized['destinationFormat'] = true;
        $this->destinationFormat = $destinationFormat;
        return $this;
    }
}
