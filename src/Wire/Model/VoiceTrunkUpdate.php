<?php

namespace MessageBird\Wire\Model;

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
     * Whether this trunk may place calls. Turning it off stops the trunk admitting call attempts at the next call setup and leaves its connection and authentication settings stored, so turning it back on restores a working trunk. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $outboundEnabled;
    /**
     * Whether this trunk may receive calls. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. The gateways remain configured. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $inboundEnabled;
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Turning it on takes effect at the next call setup and leaves calls already up untouched. It is an inbound setting, so the trunk must have `inbound_enabled` on; one update can do both. While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped, and your equipment must be reachable for audio from the public internet. Turning it off puts us back in the path at the next call setup. Omit the field to leave it unchanged.
     * 
     *
     * @var bool|null
     */
    protected $mediaBypass;
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
     * Replaces the Digest hash algorithms this trunk offers, in the order they should be offered. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. Send an empty array to return to the default of `["SHA-256", "MD5"]`. The offer is never empty, because a trunk that offered nothing could not be authenticated at all. Narrowing the list also narrows what the trunk accepts: an answer using an algorithm no longer offered is rejected. Takes effect on the next call setup; no credential is re-issued. Omit the field to leave the offer unchanged.
     * 
     *
     * @var list<string>|null
     */
    protected $digestAlgorithms;
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP. Off by default; turning it on does not change what the allow lists admit, and turning it off stops those connections at the next call setup without re-issuing anything. Omit the field to leave it unchanged.
     * 
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
     * Whether this trunk may place calls. Turning it off stops the trunk admitting call attempts at the next call setup and leaves its connection and authentication settings stored, so turning it back on restores a working trunk. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getOutboundEnabled(): ?bool
    {
        return $this->outboundEnabled;
    }
    /**
     * Whether this trunk may place calls. Turning it off stops the trunk admitting call attempts at the next call setup and leaves its connection and authentication settings stored, so turning it back on restores a working trunk. Omit the field to leave it unchanged.
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
     * Whether this trunk may receive calls. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. The gateways remain configured. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getInboundEnabled(): ?bool
    {
        return $this->inboundEnabled;
    }
    /**
     * Whether this trunk may receive calls. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. The gateways remain configured. Omit the field to leave it unchanged.
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
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Turning it on takes effect at the next call setup and leaves calls already up untouched. It is an inbound setting, so the trunk must have `inbound_enabled` on; one update can do both. While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped, and your equipment must be reachable for audio from the public internet. Turning it off puts us back in the path at the next call setup. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getMediaBypass(): ?bool
    {
        return $this->mediaBypass;
    }
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk. Turning it on takes effect at the next call setup and leaves calls already up untouched. It is an inbound setting, so the trunk must have `inbound_enabled` on; one update can do both. While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped, and your equipment must be reachable for audio from the public internet. Turning it off puts us back in the path at the next call setup. Omit the field to leave it unchanged.
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
     * Replaces the Digest hash algorithms this trunk offers, in the order they should be offered. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. Send an empty array to return to the default of `["SHA-256", "MD5"]`. The offer is never empty, because a trunk that offered nothing could not be authenticated at all. Narrowing the list also narrows what the trunk accepts: an answer using an algorithm no longer offered is rejected. Takes effect on the next call setup; no credential is re-issued. Omit the field to leave the offer unchanged.
     * 
     *
     * @return list<string>|null
     */
    public function getDigestAlgorithms(): ?array
    {
        return $this->digestAlgorithms;
    }
    /**
     * Replaces the Digest hash algorithms this trunk offers, in the order they should be offered. Send `["MD5"]` for a PBX that only implements MD5 and rejects or ignores a challenge offering SHA-256 first. Send an empty array to return to the default of `["SHA-256", "MD5"]`. The offer is never empty, because a trunk that offered nothing could not be authenticated at all. Narrowing the list also narrows what the trunk accepts: an answer using an algorithm no longer offered is rejected. Takes effect on the next call setup; no credential is re-issued. Omit the field to leave the offer unchanged.
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
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP. Off by default; turning it on does not change what the allow lists admit, and turning it off stops those connections at the next call setup without re-issuing anything. Omit the field to leave it unchanged.
     * 
     *
     * @return bool|null
     */
    public function getSessionCredentialsEnabled(): ?bool
    {
        return $this->sessionCredentialsEnabled;
    }
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP. Off by default; turning it on does not change what the allow lists admit, and turning it off stops those connections at the next call setup without re-issuing anything. Omit the field to leave it unchanged.
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
