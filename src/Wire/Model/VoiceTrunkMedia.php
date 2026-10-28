<?php

namespace MessageBird\Wire\Model;

/**
 * How the trunk carries call audio. Set it through the trunk update operation.
 */
class VoiceTrunkMedia
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
     * Whether audio between your equipment and Bird is encrypted with SRTP, keyed with SDES (`a=crypto`) over TLS signalling. Audio between Bird and the carrier network stays plain RTP.
     * 
     * `preferred` encrypts when it can. A call your equipment places is encrypted when it offers `RTP/SAVP` or `RTP/SAVPF` with an `AES_CM_128_HMAC_SHA1_80` or `_32` key over TLS, and carried plain when it offers plain RTP. A call Bird delivers is encrypted to a gateway reached over TLS (`sips:` or `;transport=tls`) and plain to the rest. Deliveries through a gateway `exit_region`, and on a trunk with `media_bypass`, stay plain.
     * 
     * `required` refuses a plain call with `488 Not Acceptable Here` and delivers encrypted to every gateway, so every gateway must use TLS.
     * 
     * With `preferred` or `required`, an SDES offer over plain SIP (UDP or TCP), an offer without a usable key, and DTLS-SRTP are refused with `488` and a `Warning` header naming why. `required` cannot be set alongside `media_bypass` or a gateway `exit_region`, since their audio does not pass through the relay that encrypts it. `off` encrypts nothing and relays an SRTP offer as it is. Calls from a web browser are always encrypted with DTLS-SRTP, whatever this says.
     * 
     *
     * @var string|null
     */
    protected $encryption;
    /**
     * Whether audio between your equipment and Bird is encrypted with SRTP, keyed with SDES (`a=crypto`) over TLS signalling. Audio between Bird and the carrier network stays plain RTP.
     * 
     * `preferred` encrypts when it can. A call your equipment places is encrypted when it offers `RTP/SAVP` or `RTP/SAVPF` with an `AES_CM_128_HMAC_SHA1_80` or `_32` key over TLS, and carried plain when it offers plain RTP. A call Bird delivers is encrypted to a gateway reached over TLS (`sips:` or `;transport=tls`) and plain to the rest. Deliveries through a gateway `exit_region`, and on a trunk with `media_bypass`, stay plain.
     * 
     * `required` refuses a plain call with `488 Not Acceptable Here` and delivers encrypted to every gateway, so every gateway must use TLS.
     * 
     * With `preferred` or `required`, an SDES offer over plain SIP (UDP or TCP), an offer without a usable key, and DTLS-SRTP are refused with `488` and a `Warning` header naming why. `required` cannot be set alongside `media_bypass` or a gateway `exit_region`, since their audio does not pass through the relay that encrypts it. `off` encrypts nothing and relays an SRTP offer as it is. Calls from a web browser are always encrypted with DTLS-SRTP, whatever this says.
     * 
     *
     * @return string|null
     */
    public function getEncryption(): ?string
    {
        return $this->encryption;
    }
    /**
    * Whether audio between your equipment and Bird is encrypted with SRTP, keyed with SDES (`a=crypto`) over TLS signalling. Audio between Bird and the carrier network stays plain RTP.
    
    `preferred` encrypts when it can. A call your equipment places is encrypted when it offers `RTP/SAVP` or `RTP/SAVPF` with an `AES_CM_128_HMAC_SHA1_80` or `_32` key over TLS, and carried plain when it offers plain RTP. A call Bird delivers is encrypted to a gateway reached over TLS (`sips:` or `;transport=tls`) and plain to the rest. Deliveries through a gateway `exit_region`, and on a trunk with `media_bypass`, stay plain.
    
    `required` refuses a plain call with `488 Not Acceptable Here` and delivers encrypted to every gateway, so every gateway must use TLS.
    
    With `preferred` or `required`, an SDES offer over plain SIP (UDP or TCP), an offer without a usable key, and DTLS-SRTP are refused with `488` and a `Warning` header naming why. `required` cannot be set alongside `media_bypass` or a gateway `exit_region`, since their audio does not pass through the relay that encrypts it. `off` encrypts nothing and relays an SRTP offer as it is. Calls from a web browser are always encrypted with DTLS-SRTP, whatever this says.
    
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
