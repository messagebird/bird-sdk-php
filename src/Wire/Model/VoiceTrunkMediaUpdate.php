<?php

namespace MessageBird\Wire\Model;

/**
 * A change to how the trunk carries call audio. An omitted member is left unchanged.
 */
class VoiceTrunkMediaUpdate
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
     * Controls SRTP encryption between your equipment and Bird. SRTP keys use SDES
     * (`a=crypto`) over TLS signalling. Audio between Bird and the carrier uses
     * plain RTP.
     * 
     * With `preferred`, a call you place is encrypted when your equipment offers
     * `RTP/SAVP` or `RTP/SAVPF` with an `AES_CM_128_HMAC_SHA1_80` or `_32` key over
     * TLS. A plain RTP offer stays plain. Calls delivered to a TLS gateway (`sips:`
     * or `;transport=tls`) use encryption when available. Calls delivered through a
     * gateway without TLS or with `media_bypass` use plain audio.
     * 
     * With `required`, a plain call is refused with `488 Not Acceptable Here`.
     * Delivered calls require encrypted media, so your gateways must use TLS.
     * You cannot combine `required` with `media_bypass` because bypassed audio
     * does not pass through the relay that encrypts it.
     * 
     * With `preferred` or `required`, an SDES offer over plain SIP (UDP or TCP), an
     * offer without a usable key, and DTLS-SRTP are refused with `488` and a
     * `Warning` header naming the reason.
     * 
     * With `off`, Bird does not encrypt audio and relays an SRTP offer unchanged.
     * Browser calls use DTLS-SRTP regardless of this setting.
     * 
     *
     * @var string|null
     */
    protected $encryption;
    /**
     * Controls SRTP encryption between your equipment and Bird. SRTP keys use SDES
     * (`a=crypto`) over TLS signalling. Audio between Bird and the carrier uses
     * plain RTP.
     * 
     * With `preferred`, a call you place is encrypted when your equipment offers
     * `RTP/SAVP` or `RTP/SAVPF` with an `AES_CM_128_HMAC_SHA1_80` or `_32` key over
     * TLS. A plain RTP offer stays plain. Calls delivered to a TLS gateway (`sips:`
     * or `;transport=tls`) use encryption when available. Calls delivered through a
     * gateway without TLS or with `media_bypass` use plain audio.
     * 
     * With `required`, a plain call is refused with `488 Not Acceptable Here`.
     * Delivered calls require encrypted media, so your gateways must use TLS.
     * You cannot combine `required` with `media_bypass` because bypassed audio
     * does not pass through the relay that encrypts it.
     * 
     * With `preferred` or `required`, an SDES offer over plain SIP (UDP or TCP), an
     * offer without a usable key, and DTLS-SRTP are refused with `488` and a
     * `Warning` header naming the reason.
     * 
     * With `off`, Bird does not encrypt audio and relays an SRTP offer unchanged.
     * Browser calls use DTLS-SRTP regardless of this setting.
     * 
     *
     * @return string|null
     */
    public function getEncryption(): ?string
    {
        return $this->encryption;
    }
    /**
    * Controls SRTP encryption between your equipment and Bird. SRTP keys use SDES
    (`a=crypto`) over TLS signalling. Audio between Bird and the carrier uses
    plain RTP.
    
    With `preferred`, a call you place is encrypted when your equipment offers
    `RTP/SAVP` or `RTP/SAVPF` with an `AES_CM_128_HMAC_SHA1_80` or `_32` key over
    TLS. A plain RTP offer stays plain. Calls delivered to a TLS gateway (`sips:`
    or `;transport=tls`) use encryption when available. Calls delivered through a
    gateway without TLS or with `media_bypass` use plain audio.
    
    With `required`, a plain call is refused with `488 Not Acceptable Here`.
    Delivered calls require encrypted media, so your gateways must use TLS.
    You cannot combine `required` with `media_bypass` because bypassed audio
    does not pass through the relay that encrypts it.
    
    With `preferred` or `required`, an SDES offer over plain SIP (UDP or TCP), an
    offer without a usable key, and DTLS-SRTP are refused with `488` and a
    `Warning` header naming the reason.
    
    With `off`, Bird does not encrypt audio and relays an SRTP offer unchanged.
    Browser calls use DTLS-SRTP regardless of this setting.
    
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
