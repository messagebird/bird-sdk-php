<?php

namespace MessageBird\Wire\Model;

/**
 * A change to the trunk's caller switches, name, access control, and Digest
 * algorithm offer. Every field is optional. An omitted field is left unchanged. The
 * `ip_acls`, `allowed_api_key_ids`, and `digest_algorithms` fields each replace
 * their whole list when present. Send an empty array to clear one. This lets you
 * commit the trunk's entire access configuration in one update.
 * 
 * The access control and Digest settings need a switch that places calls, and
 * `media_bypass` needs `did_delivery_enabled`. One update can do both: turn the
 * switch on and send its configuration together.
 */
class VoiceTrunkUpdate
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
     * Whether your PBX may place calls through this trunk. Turning it off stops the allow lists admitting calls at the next call setup and leaves them stored, so turning it back on restores a working trunk. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $sipTrunkingEnabled;
    /**
     * Whether this trunk may receive calls. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Clear an attached emergency number in the dashboard before turning it off. The gateways remain configured. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $didDeliveryEnabled;
    /**
     * Whether people in this workspace may place calls through this trunk with a session credential, from the dashboard phone, the CLI or MCP. Turning it off stops those calls at the next call setup without re-issuing anything. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $workspaceUsersEnabled;
    /**
     * Deprecated: use `sip_trunking_enabled` and `workspace_users_enabled`. `true` turns on `sip_trunking_enabled`. `false` stops every caller placing calls through this trunk. A request that also turns one of those switches the other way is rejected.
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
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Turning it on takes effect at the next call setup and leaves calls already up untouched. It is an inbound setting, so the trunk must have `did_delivery_enabled` on; one update can do both. While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped, and your equipment must be reachable for audio from the public internet. Turning it off puts us back in the path at the next call setup. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $mediaBypass;
    /**
     * A change to how the trunk carries call audio.
     *
     * @var VoiceTrunkMediaUpdate|null
     */
    protected $media;
    /**
     * Replaces the trunk's entire IP allow list. When present, the allow list is set to exactly these CIDR blocks: ranges not listed are removed and new ones are added. Send an empty array to clear the list, turning IP filtering off. Omit the field to leave the allow list unchanged.
     * 
     *
     * @var list<VoiceTrunkIPACLCreate>|null
     */
    protected $ipAcls;
    /**
     * Replaces the trunk's entire set of allowed API keys. When present, exactly these keys may authenticate the trunk over SIP Digest. Each key you ADD must belong to this workspace and hold `voice` at write level; a key that does not is refused and the whole update is rolled back. A key already on the list that has since lost the permission or expired does not block the update, so you can keep editing the trunk while you put its permission back. A non-empty list turns API-key authentication on; send an empty array to turn it off. Omit the field to leave the allowed keys unchanged.
     * 
     *
     * @var list<string>|null
     */
    protected $allowedApiKeyIds;
    /**
     * Replaces the Digest hash algorithms this trunk offers, in the order they should be offered. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. Send an empty array to return to the default of `["SHA-256", "MD5"]`. The offer is never empty, because a trunk that offered nothing could not be authenticated at all. The list governs clients that authenticate with an API key, and narrowing it also narrows what the trunk accepts from them: an answer using an algorithm no longer offered is rejected. Session credentials, including the dashboard phone's, are always offered MD5 as well and accepted with MD5 or SHA-256. Takes effect on the next call setup; no credential is re-issued. Omit the field to leave the offer unchanged.
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
     * Whether your PBX may place calls through this trunk. Turning it off stops the allow lists admitting calls at the next call setup and leaves them stored, so turning it back on restores a working trunk. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getSipTrunkingEnabled(): ?bool
    {
        return $this->sipTrunkingEnabled;
    }
    /**
     * Whether your PBX may place calls through this trunk. Turning it off stops the allow lists admitting calls at the next call setup and leaves them stored, so turning it back on restores a working trunk. Omit the field to leave it unchanged.
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
     * Whether this trunk may receive calls. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Clear an attached emergency number in the dashboard before turning it off. The gateways remain configured. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getDidDeliveryEnabled(): ?bool
    {
        return $this->didDeliveryEnabled;
    }
    /**
     * Whether this trunk may receive calls. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Clear an attached emergency number in the dashboard before turning it off. The gateways remain configured. Omit the field to leave it unchanged.
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
     * Whether people in this workspace may place calls through this trunk with a session credential, from the dashboard phone, the CLI or MCP. Turning it off stops those calls at the next call setup without re-issuing anything. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getWorkspaceUsersEnabled(): ?bool
    {
        return $this->workspaceUsersEnabled;
    }
    /**
     * Whether people in this workspace may place calls through this trunk with a session credential, from the dashboard phone, the CLI or MCP. Turning it off stops those calls at the next call setup without re-issuing anything. Omit the field to leave it unchanged.
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
     * Deprecated: use `sip_trunking_enabled` and `workspace_users_enabled`. `true` turns on `sip_trunking_enabled`. `false` stops every caller placing calls through this trunk. A request that also turns one of those switches the other way is rejected.
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
     * Deprecated: use `sip_trunking_enabled` and `workspace_users_enabled`. `true` turns on `sip_trunking_enabled`. `false` stops every caller placing calls through this trunk. A request that also turns one of those switches the other way is rejected.
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
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Turning it on takes effect at the next call setup and leaves calls already up untouched. It is an inbound setting, so the trunk must have `did_delivery_enabled` on; one update can do both. While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped, and your equipment must be reachable for audio from the public internet. Turning it off puts us back in the path at the next call setup. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getMediaBypass(): ?bool
    {
        return $this->mediaBypass;
    }
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Turning it on takes effect at the next call setup and leaves calls already up untouched. It is an inbound setting, so the trunk must have `did_delivery_enabled` on; one update can do both. While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped, and your equipment must be reachable for audio from the public internet. Turning it off puts us back in the path at the next call setup. Omit the field to leave it unchanged.
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
     * A change to how the trunk carries call audio.
     *
     * @return VoiceTrunkMediaUpdate|null
     */
    public function getMedia(): ?VoiceTrunkMediaUpdate
    {
        return $this->media;
    }
    /**
     * A change to how the trunk carries call audio.
     *
     * @param VoiceTrunkMediaUpdate|null $media
     *
     * @return self
     */
    public function setMedia(?VoiceTrunkMediaUpdate $media): self
    {
        $this->initialized['media'] = true;
        $this->media = $media;
        return $this;
    }
    /**
     * Replaces the trunk's entire IP allow list. When present, the allow list is set to exactly these CIDR blocks: ranges not listed are removed and new ones are added. Send an empty array to clear the list, turning IP filtering off. Omit the field to leave the allow list unchanged.
     * 
     *
     * @return list<VoiceTrunkIPACLCreate>|null
     */
    public function getIpAcls(): ?array
    {
        return $this->ipAcls;
    }
    /**
     * Replaces the trunk's entire IP allow list. When present, the allow list is set to exactly these CIDR blocks: ranges not listed are removed and new ones are added. Send an empty array to clear the list, turning IP filtering off. Omit the field to leave the allow list unchanged.
     *
     * @param list<VoiceTrunkIPACLCreate>|null $ipAcls
     *
     * @return self
     */
    public function setIpAcls(?array $ipAcls): self
    {
        $this->initialized['ipAcls'] = true;
        $this->ipAcls = $ipAcls;
        return $this;
    }
    /**
     * Replaces the trunk's entire set of allowed API keys. When present, exactly these keys may authenticate the trunk over SIP Digest. Each key you ADD must belong to this workspace and hold `voice` at write level; a key that does not is refused and the whole update is rolled back. A key already on the list that has since lost the permission or expired does not block the update, so you can keep editing the trunk while you put its permission back. A non-empty list turns API-key authentication on; send an empty array to turn it off. Omit the field to leave the allowed keys unchanged.
     * 
     *
     * @return list<string>|null
     */
    public function getAllowedApiKeyIds(): ?array
    {
        return $this->allowedApiKeyIds;
    }
    /**
     * Replaces the trunk's entire set of allowed API keys. When present, exactly these keys may authenticate the trunk over SIP Digest. Each key you ADD must belong to this workspace and hold `voice` at write level; a key that does not is refused and the whole update is rolled back. A key already on the list that has since lost the permission or expired does not block the update, so you can keep editing the trunk while you put its permission back. A non-empty list turns API-key authentication on; send an empty array to turn it off. Omit the field to leave the allowed keys unchanged.
     *
     * @param list<string>|null $allowedApiKeyIds
     *
     * @return self
     */
    public function setAllowedApiKeyIds(?array $allowedApiKeyIds): self
    {
        $this->initialized['allowedApiKeyIds'] = true;
        $this->allowedApiKeyIds = $allowedApiKeyIds;
        return $this;
    }
    /**
     * Replaces the Digest hash algorithms this trunk offers, in the order they should be offered. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. Send an empty array to return to the default of `["SHA-256", "MD5"]`. The offer is never empty, because a trunk that offered nothing could not be authenticated at all. The list governs clients that authenticate with an API key, and narrowing it also narrows what the trunk accepts from them: an answer using an algorithm no longer offered is rejected. Session credentials, including the dashboard phone's, are always offered MD5 as well and accepted with MD5 or SHA-256. Takes effect on the next call setup; no credential is re-issued. Omit the field to leave the offer unchanged.
     * 
     *
     * @return list<string>|null
     */
    public function getDigestAlgorithms(): ?array
    {
        return $this->digestAlgorithms;
    }
    /**
     * Replaces the Digest hash algorithms this trunk offers, in the order they should be offered. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. Send an empty array to return to the default of `["SHA-256", "MD5"]`. The offer is never empty, because a trunk that offered nothing could not be authenticated at all. The list governs clients that authenticate with an API key, and narrowing it also narrows what the trunk accepts from them: an answer using an algorithm no longer offered is rejected. Session credentials, including the dashboard phone's, are always offered MD5 as well and accepted with MD5 or SHA-256. Takes effect on the next call setup; no credential is re-issued. Omit the field to leave the offer unchanged.
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
