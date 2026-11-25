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
     * Whether your PBX may place calls through the new trunk. Omit it to create a trunk that carries no calls yet, and turn on what you need once you know what the trunk is for.
     * 
     *
     * @var bool|null
     */
    protected $sipTrunkingEnabled = false;
    /**
     * Whether the new trunk may receive calls. A trunk receives no calls until it also has at least one gateway and at least one number, both added after create.
     * 
     *
     * @var bool|null
     */
    protected $didDeliveryEnabled = false;
    /**
     * Whether people in this workspace may place calls through the new trunk with a session credential, from the dashboard phone, the CLI or MCP. Omit it for a trunk reached only by a PBX.
     * 
     *
     * @var bool|null
     */
    protected $workspaceUsersEnabled = false;
    /**
     * Deprecated: use `sip_trunking_enabled`. `true` turns on `sip_trunking_enabled`; a request that also sends `sip_trunking_enabled: false` is rejected.
     * 
     *
     * @deprecated
     *
     * @var bool|null
     */
    protected $outboundEnabled;
    /**
     * Deprecated: use `did_delivery_enabled`. A request that sends both with different values is rejected.
     * 
     *
     * @deprecated
     *
     * @var bool|null
     */
    protected $inboundEnabled;
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Omit it to create the trunk with this off, which is what suits equipment behind NAT and any account that wants call recording. It is an inbound setting, so `true` is accepted only alongside `did_delivery_enabled: true`; `false` is always accepted. It can be changed later.
     * 
     *
     * @var bool|null
     */
    protected $mediaBypass = false;
    /**
     * How the new trunk carries call audio. An omitted member takes its default.
     *
     * @var VoiceTrunkMediaCreate|null
     */
    protected $media;
    /**
     * The Digest hash algorithms to offer, in the order they should be offered. Omit this to use the default of `["SHA-256", "MD5"]`, which suits most equipment. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. This governs clients that authenticate with an API key. Session credentials, including the dashboard phone's, are always offered MD5 as well and accepted with MD5 or SHA-256. It applies to calls the trunk places, so send it alongside `sip_trunking_enabled` or `workspace_users_enabled` set to `true`. This can be changed later without re-issuing credentials.
     * 
     *
     * @var list<string>|null
     */
    protected $digestAlgorithms;
    /**
     * Deprecated: use `workspace_users_enabled`. A request that sends both with different values is rejected.
     * 
     *
     * @deprecated
     *
     * @var bool|null
     */
    protected $sessionCredentialsEnabled;
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
     * Whether your PBX may place calls through the new trunk. Omit it to create a trunk that carries no calls yet, and turn on what you need once you know what the trunk is for.
     * 
     *
     * @return bool|null
     */
    public function getSipTrunkingEnabled(): ?bool
    {
        return $this->sipTrunkingEnabled;
    }
    /**
     * Whether your PBX may place calls through the new trunk. Omit it to create a trunk that carries no calls yet, and turn on what you need once you know what the trunk is for.
     *
     * @param bool|null $sipTrunkingEnabled
     *
     * @return self
     */
    public function setSipTrunkingEnabled(?bool $sipTrunkingEnabled): self
    {
        $this->initialized['sipTrunkingEnabled'] = true;
        $this->sipTrunkingEnabled = $sipTrunkingEnabled;
        return $this;
    }
    /**
     * Whether the new trunk may receive calls. A trunk receives no calls until it also has at least one gateway and at least one number, both added after create.
     * 
     *
     * @return bool|null
     */
    public function getDidDeliveryEnabled(): ?bool
    {
        return $this->didDeliveryEnabled;
    }
    /**
     * Whether the new trunk may receive calls. A trunk receives no calls until it also has at least one gateway and at least one number, both added after create.
     *
     * @param bool|null $didDeliveryEnabled
     *
     * @return self
     */
    public function setDidDeliveryEnabled(?bool $didDeliveryEnabled): self
    {
        $this->initialized['didDeliveryEnabled'] = true;
        $this->didDeliveryEnabled = $didDeliveryEnabled;
        return $this;
    }
    /**
     * Whether people in this workspace may place calls through the new trunk with a session credential, from the dashboard phone, the CLI or MCP. Omit it for a trunk reached only by a PBX.
     * 
     *
     * @return bool|null
     */
    public function getWorkspaceUsersEnabled(): ?bool
    {
        return $this->workspaceUsersEnabled;
    }
    /**
     * Whether people in this workspace may place calls through the new trunk with a session credential, from the dashboard phone, the CLI or MCP. Omit it for a trunk reached only by a PBX.
     *
     * @param bool|null $workspaceUsersEnabled
     *
     * @return self
     */
    public function setWorkspaceUsersEnabled(?bool $workspaceUsersEnabled): self
    {
        $this->initialized['workspaceUsersEnabled'] = true;
        $this->workspaceUsersEnabled = $workspaceUsersEnabled;
        return $this;
    }
    /**
     * Deprecated: use `sip_trunking_enabled`. `true` turns on `sip_trunking_enabled`; a request that also sends `sip_trunking_enabled: false` is rejected.
     * 
     *
     * @deprecated
     *
     * @return bool|null
     */
    public function getOutboundEnabled(): ?bool
    {
        return $this->outboundEnabled;
    }
    /**
     * Deprecated: use `sip_trunking_enabled`. `true` turns on `sip_trunking_enabled`; a request that also sends `sip_trunking_enabled: false` is rejected.
     *
     * @param bool|null $outboundEnabled
     *
     * @deprecated
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
     * Deprecated: use `did_delivery_enabled`. A request that sends both with different values is rejected.
     * 
     *
     * @deprecated
     *
     * @return bool|null
     */
    public function getInboundEnabled(): ?bool
    {
        return $this->inboundEnabled;
    }
    /**
     * Deprecated: use `did_delivery_enabled`. A request that sends both with different values is rejected.
     *
     * @param bool|null $inboundEnabled
     *
     * @deprecated
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
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Omit it to create the trunk with this off, which is what suits equipment behind NAT and any account that wants call recording. It is an inbound setting, so `true` is accepted only alongside `did_delivery_enabled: true`; `false` is always accepted. It can be changed later.
     * 
     *
     * @return bool|null
     */
    public function getMediaBypass(): ?bool
    {
        return $this->mediaBypass;
    }
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Omit it to create the trunk with this off, which is what suits equipment behind NAT and any account that wants call recording. It is an inbound setting, so `true` is accepted only alongside `did_delivery_enabled: true`; `false` is always accepted. It can be changed later.
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
     * How the new trunk carries call audio. An omitted member takes its default.
     *
     * @return VoiceTrunkMediaCreate|null
     */
    public function getMedia(): ?VoiceTrunkMediaCreate
    {
        return $this->media;
    }
    /**
     * How the new trunk carries call audio. An omitted member takes its default.
     *
     * @param VoiceTrunkMediaCreate|null $media
     *
     * @return self
     */
    public function setMedia(?VoiceTrunkMediaCreate $media): self
    {
        $this->initialized['media'] = true;
        $this->media = $media;
        return $this;
    }
    /**
     * The Digest hash algorithms to offer, in the order they should be offered. Omit this to use the default of `["SHA-256", "MD5"]`, which suits most equipment. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. This governs clients that authenticate with an API key. Session credentials, including the dashboard phone's, are always offered MD5 as well and accepted with MD5 or SHA-256. It applies to calls the trunk places, so send it alongside `sip_trunking_enabled` or `workspace_users_enabled` set to `true`. This can be changed later without re-issuing credentials.
     * 
     *
     * @return list<string>|null
     */
    public function getDigestAlgorithms(): ?array
    {
        return $this->digestAlgorithms;
    }
    /**
     * The Digest hash algorithms to offer, in the order they should be offered. Omit this to use the default of `["SHA-256", "MD5"]`, which suits most equipment. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. This governs clients that authenticate with an API key. Session credentials, including the dashboard phone's, are always offered MD5 as well and accepted with MD5 or SHA-256. It applies to calls the trunk places, so send it alongside `sip_trunking_enabled` or `workspace_users_enabled` set to `true`. This can be changed later without re-issuing credentials.
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
     * Deprecated: use `workspace_users_enabled`. A request that sends both with different values is rejected.
     * 
     *
     * @deprecated
     *
     * @return bool|null
     */
    public function getSessionCredentialsEnabled(): ?bool
    {
        return $this->sessionCredentialsEnabled;
    }
    /**
     * Deprecated: use `workspace_users_enabled`. A request that sends both with different values is rejected.
     *
     * @param bool|null $sessionCredentialsEnabled
     *
     * @deprecated
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
