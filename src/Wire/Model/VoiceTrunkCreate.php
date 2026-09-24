<?php

namespace MessageBird\Wire\Model;

class VoiceTrunkCreate
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
     * A human-readable label for this SIP trunk. Mutable, and distinct from the generated wire domain.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Whether the new trunk may place calls. Omit it to create a trunk that does neither direction yet, and enable the ones you want once you know what the trunk is for. The settings below configure outbound, so send this as `true` alongside them.
     * 
     *
     * @var bool|null
     */
    protected $outboundEnabled = false;
    /**
     * Whether the new trunk may receive calls. Omit it to create a trunk that does neither direction yet. A trunk receives no calls until it also has at least one gateway and at least one number, both added after create.
     * 
     *
     * @var bool|null
     */
    protected $inboundEnabled = false;
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Omit it to create the trunk with this off, which is what suits equipment behind NAT and any account that wants call recording. It is an inbound setting, so `true` is accepted only alongside `inbound_enabled: true`; `false` is always accepted. It can be changed later.
     * 
     *
     * @var bool|null
     */
    protected $mediaBypass = false;
    /**
     * The Digest hash algorithms to offer, in the order they should be offered. Omit this to use the default of `["SHA-256", "MD5"]`, which suits most equipment. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. This can be changed later without re-issuing credentials.
     * 
     *
     * @var list<string>|null
     */
    protected $digestAlgorithms;
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP. Omit it to create the trunk with this off, which is what a trunk reached only by a PBX wants. It can be changed later.
     * 
     *
     * @var bool|null
     */
    protected $sessionCredentialsEnabled = false;
    /**
     * A human-readable label for this SIP trunk. Mutable, and distinct from the generated wire domain.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * A human-readable label for this SIP trunk. Mutable, and distinct from the generated wire domain.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Whether the new trunk may place calls. Omit it to create a trunk that does neither direction yet, and enable the ones you want once you know what the trunk is for. The settings below configure outbound, so send this as `true` alongside them.
     * 
     *
     * @return bool|null
     */
    public function getOutboundEnabled(): ?bool
    {
        return $this->outboundEnabled;
    }
    /**
     * Whether the new trunk may place calls. Omit it to create a trunk that does neither direction yet, and enable the ones you want once you know what the trunk is for. The settings below configure outbound, so send this as `true` alongside them.
     *
     * @param bool|null $outboundEnabled
     *
     * @return self
     */
    public function setOutboundEnabled(?bool $outboundEnabled): self
    {
        $this->initialized['outboundEnabled'] = true;
        $this->outboundEnabled = $outboundEnabled;
        return $this;
    }
    /**
     * Whether the new trunk may receive calls. Omit it to create a trunk that does neither direction yet. A trunk receives no calls until it also has at least one gateway and at least one number, both added after create.
     * 
     *
     * @return bool|null
     */
    public function getInboundEnabled(): ?bool
    {
        return $this->inboundEnabled;
    }
    /**
     * Whether the new trunk may receive calls. Omit it to create a trunk that does neither direction yet. A trunk receives no calls until it also has at least one gateway and at least one number, both added after create.
     *
     * @param bool|null $inboundEnabled
     *
     * @return self
     */
    public function setInboundEnabled(?bool $inboundEnabled): self
    {
        $this->initialized['inboundEnabled'] = true;
        $this->inboundEnabled = $inboundEnabled;
        return $this;
    }
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Omit it to create the trunk with this off, which is what suits equipment behind NAT and any account that wants call recording. It is an inbound setting, so `true` is accepted only alongside `inbound_enabled: true`; `false` is always accepted. It can be changed later.
     * 
     *
     * @return bool|null
     */
    public function getMediaBypass(): ?bool
    {
        return $this->mediaBypass;
    }
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Omit it to create the trunk with this off, which is what suits equipment behind NAT and any account that wants call recording. It is an inbound setting, so `true` is accepted only alongside `inbound_enabled: true`; `false` is always accepted. It can be changed later.
     *
     * @param bool|null $mediaBypass
     *
     * @return self
     */
    public function setMediaBypass(?bool $mediaBypass): self
    {
        $this->initialized['mediaBypass'] = true;
        $this->mediaBypass = $mediaBypass;
        return $this;
    }
    /**
     * The Digest hash algorithms to offer, in the order they should be offered. Omit this to use the default of `["SHA-256", "MD5"]`, which suits most equipment. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. This can be changed later without re-issuing credentials.
     * 
     *
     * @return list<string>|null
     */
    public function getDigestAlgorithms(): ?array
    {
        return $this->digestAlgorithms;
    }
    /**
     * The Digest hash algorithms to offer, in the order they should be offered. Omit this to use the default of `["SHA-256", "MD5"]`, which suits most equipment. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. This can be changed later without re-issuing credentials.
     *
     * @param list<string>|null $digestAlgorithms
     *
     * @return self
     */
    public function setDigestAlgorithms(?array $digestAlgorithms): self
    {
        $this->initialized['digestAlgorithms'] = true;
        $this->digestAlgorithms = $digestAlgorithms;
        return $this;
    }
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP. Omit it to create the trunk with this off, which is what a trunk reached only by a PBX wants. It can be changed later.
     * 
     *
     * @return bool|null
     */
    public function getSessionCredentialsEnabled(): ?bool
    {
        return $this->sessionCredentialsEnabled;
    }
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP. Omit it to create the trunk with this off, which is what a trunk reached only by a PBX wants. It can be changed later.
     *
     * @param bool|null $sessionCredentialsEnabled
     *
     * @return self
     */
    public function setSessionCredentialsEnabled(?bool $sessionCredentialsEnabled): self
    {
        $this->initialized['sessionCredentialsEnabled'] = true;
        $this->sessionCredentialsEnabled = $sessionCredentialsEnabled;
        return $this;
    }
}
