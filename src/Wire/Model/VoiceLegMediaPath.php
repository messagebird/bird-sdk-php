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
     * How the audio between us and your side of the leg was encrypted: your SIP trunk's equipment, or the browser that placed the call. On a leg with neither, such as an incoming call a Sequence answered, it describes the carrier's side. Use it to confirm that a call on a trunk with `preferred` media encryption was actually encrypted: such a trunk delivers plain audio to a gateway not reached over TLS or behind an `exit_region`.
     * 
     * - `none`: plain RTP.
     * - `sdes`: SRTP with keys exchanged in the SDP over TLS signalling (SDES, RFC 4568). The audio between us and the carrier stays plain RTP.
     * - `dtls`: DTLS-SRTP, which every call placed from a browser uses.
     * 
     * Absent when we did not record it: on a leg whose audio bypassed us, on an encrypted offer to a SIP trunk whose media encryption is `off`, on a leg placed without an SDP offer in its INVITE, on an incoming leg that was not answered, and on legs recorded before this field existed.
     * 
     *
     * @var string|null
     */
    protected $encryption;
    /**
     * How the audio between us and your side of the leg was encrypted: your SIP trunk's equipment, or the browser that placed the call. On a leg with neither, such as an incoming call a Sequence answered, it describes the carrier's side. Use it to confirm that a call on a trunk with `preferred` media encryption was actually encrypted: such a trunk delivers plain audio to a gateway not reached over TLS or behind an `exit_region`.
     * 
     * - `none`: plain RTP.
     * - `sdes`: SRTP with keys exchanged in the SDP over TLS signalling (SDES, RFC 4568). The audio between us and the carrier stays plain RTP.
     * - `dtls`: DTLS-SRTP, which every call placed from a browser uses.
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
    * How the audio between us and your side of the leg was encrypted: your SIP trunk's equipment, or the browser that placed the call. On a leg with neither, such as an incoming call a Sequence answered, it describes the carrier's side. Use it to confirm that a call on a trunk with `preferred` media encryption was actually encrypted: such a trunk delivers plain audio to a gateway not reached over TLS or behind an `exit_region`.
    
    - `none`: plain RTP.
    - `sdes`: SRTP with keys exchanged in the SDP over TLS signalling (SDES, RFC 4568). The audio between us and the carrier stays plain RTP.
    - `dtls`: DTLS-SRTP, which every call placed from a browser uses.
    
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
