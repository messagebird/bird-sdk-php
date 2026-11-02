<?php

namespace MessageBird\Wire\Model;

class VoiceLegMediaPath
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
     * How the audio between Bird and your SIP trunk equipment or browser was encrypted. For a leg without either, such as an incoming call answered by a Sequence, this describes the carrier's side. Use this field to check whether a call on a trunk with `preferred` media encryption was encrypted. Audio can be plain when the gateway does not use TLS or when encryption is unavailable through an exit.
     * 
     * - `none`: plain RTP.
     * - `sdes`: SRTP with keys exchanged in the SDP over TLS signalling (SDES, RFC 4568). The audio between us and the carrier stays plain RTP.
     * - `dtls`: DTLS-SRTP, used for calls placed from a browser.
     * 
     * Absent when we did not record it: on a leg whose audio bypassed us, on an encrypted offer to a SIP trunk whose media encryption is `off`, on a leg placed without an SDP offer in its INVITE, on an incoming leg that was not answered, and on legs recorded before this field existed.
     * 
     *
     * @var string|null
     */
    protected $encryption;
    /**
     * How the audio between Bird and your SIP trunk equipment or browser was encrypted. For a leg without either, such as an incoming call answered by a Sequence, this describes the carrier's side. Use this field to check whether a call on a trunk with `preferred` media encryption was encrypted. Audio can be plain when the gateway does not use TLS or when encryption is unavailable through an exit.
     * 
     * - `none`: plain RTP.
     * - `sdes`: SRTP with keys exchanged in the SDP over TLS signalling (SDES, RFC 4568). The audio between us and the carrier stays plain RTP.
     * - `dtls`: DTLS-SRTP, used for calls placed from a browser.
     * 
     * Absent when we did not record it: on a leg whose audio bypassed us, on an encrypted offer to a SIP trunk whose media encryption is `off`, on a leg placed without an SDP offer in its INVITE, on an incoming leg that was not answered, and on legs recorded before this field existed.
     * 
     *
     * @return string|null
     */
    public function getEncryption(): ?string
    {
        return $this->encryption;
    }
    /**
    * How the audio between Bird and your SIP trunk equipment or browser was encrypted. For a leg without either, such as an incoming call answered by a Sequence, this describes the carrier's side. Use this field to check whether a call on a trunk with `preferred` media encryption was encrypted. Audio can be plain when the gateway does not use TLS or when encryption is unavailable through an exit.
    
    - `none`: plain RTP.
    - `sdes`: SRTP with keys exchanged in the SDP over TLS signalling (SDES, RFC 4568). The audio between us and the carrier stays plain RTP.
    - `dtls`: DTLS-SRTP, used for calls placed from a browser.
    
    Absent when we did not record it: on a leg whose audio bypassed us, on an encrypted offer to a SIP trunk whose media encryption is `off`, on a leg placed without an SDP offer in its INVITE, on an incoming leg that was not answered, and on legs recorded before this field existed.
    
    *
    * @param string|null $encryption
    *
    * @return self
    */
    public function setEncryption(?string $encryption): self
    {
        $this->initialized['encryption'] = true;
        $this->encryption = $encryption;
        return $this;
    }
}
