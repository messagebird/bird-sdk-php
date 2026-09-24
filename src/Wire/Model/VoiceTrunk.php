<?php

namespace MessageBird\Wire\Model;

class VoiceTrunk extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * A human-readable label for this SIP trunk. Mutable, and distinct from the generated wire domain.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Full SIP address for this trunk, generated as `{trunk-id}.trunk.{region}.sip.bird.com`. This is the trunk's identity, so configure your PBX or SIP client to send calls to this address. It is derived from the trunk id and cannot be chosen or changed.
     * 
     *
     * @var string|null
     */
    protected $domain;
    /**
     * Whether this trunk may place calls: your PBX connects to us to dial out. Off on a new trunk. While it is off the trunk refuses every call attempt no matter what its allow lists say, and the connection and authentication settings below have no effect. Set `outbound_enabled` through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $outboundEnabled;
    /**
     * Whether this trunk may receive calls: we dial the addresses you declared, for the numbers this trunk answers. Off on a new trunk. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Set `inbound_enabled` through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $inboundEnabled;
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk: your equipment and the originating carrier exchange audio directly, and only the call signalling passes through us. Off by default. It applies to inbound calls alone (calls this trunk places are always carried through us, whatever this says). While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped. Your equipment must be reachable for audio from the public internet. Set `media_bypass` through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $mediaBypass;
    /**
     * The trunk's IP allow list. IP filtering is active whenever this has at least one entry: calls admitted through the allow lists must come from those CIDR ranges. This restriction does not apply to session credentials when `session_credentials_enabled` is true. An empty list means no IP restriction. Replace the whole `ip_acls` list through the trunk update operation.
     * 
     *
     * @var list<VoiceTrunkIPACL>|null
     */
    protected $ipAcls;
    /**
     * The API keys allowed to authenticate this trunk over SIP Digest. A key must hold `voice` at write level and be neither revoked nor expired to authenticate. `ineligible_api_key_ids` names the entries that currently cannot. A nonempty list enables API-key authentication, limited to its eligible keys. An empty list means no API-key authentication. A trunk with empty `ip_acls` and `allowed_api_key_ids` lists accepts nothing when `session_credentials_enabled` is false. Replace the whole `allowed_api_key_ids` list through the trunk update operation.
     * 
     *
     * @var list<string>|null
     */
    protected $allowedApiKeyIds;
    /**
     * The entries in `allowed_api_key_ids` that cannot authenticate this trunk right now because the key lacks `voice` at write level, has expired, or was revoked. The bindings remain until you remove them from the trunk. Restoring `voice` at write level makes a key eligible again if it is still unexpired and unrevoked, without changing its secret or trunk binding. Empty when every allowed key can authenticate.
     * 
     *
     * @var list<string>|null
     */
    protected $ineligibleApiKeyIds;
    /**
     * The Digest hash algorithms this trunk offers, in the order they are offered. We send one challenge line per algorithm and your PBX answers with the first it supports, so the order decides what most equipment picks. Always populated: a trunk with no explicit setting reports the default, `["SHA-256", "MD5"]`. A trunk answering with an algorithm that is not on this list is rejected, so narrowing the list also narrows what the trunk accepts. Replace `digest_algorithms` through the trunk update operation.
     * 
     *
     * @var list<string>|null
     */
    protected $digestAlgorithms;
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP, alongside whatever the allow lists admit. Off by default. It grants nothing on its own: a call still has to present a credential issued to this workspace, and each one expires within minutes. Set `session_credentials_enabled` through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $sessionCredentialsEnabled;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }
    /**
     * @param string|null $workspaceId
     *
     * @return self
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;
        return $this;
    }
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
     * Full SIP address for this trunk, generated as `{trunk-id}.trunk.{region}.sip.bird.com`. This is the trunk's identity, so configure your PBX or SIP client to send calls to this address. It is derived from the trunk id and cannot be chosen or changed.
     * 
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }
    /**
     * Full SIP address for this trunk, generated as `{trunk-id}.trunk.{region}.sip.bird.com`. This is the trunk's identity, so configure your PBX or SIP client to send calls to this address. It is derived from the trunk id and cannot be chosen or changed.
     *
     * @param string|null $domain
     *
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->initialized['domain'] = true;
        $this->domain = $domain;
        return $this;
    }
    /**
     * Whether this trunk may place calls: your PBX connects to us to dial out. Off on a new trunk. While it is off the trunk refuses every call attempt no matter what its allow lists say, and the connection and authentication settings below have no effect. Set `outbound_enabled` through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getOutboundEnabled(): ?bool
    {
        return $this->outboundEnabled;
    }
    /**
     * Whether this trunk may place calls: your PBX connects to us to dial out. Off on a new trunk. While it is off the trunk refuses every call attempt no matter what its allow lists say, and the connection and authentication settings below have no effect. Set `outbound_enabled` through the trunk update operation.
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
     * Whether this trunk may receive calls: we dial the addresses you declared, for the numbers this trunk answers. Off on a new trunk. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Set `inbound_enabled` through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getInboundEnabled(): ?bool
    {
        return $this->inboundEnabled;
    }
    /**
     * Whether this trunk may receive calls: we dial the addresses you declared, for the numbers this trunk answers. Off on a new trunk. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Set `inbound_enabled` through the trunk update operation.
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
     * Whether we take ourselves out of the audio path for calls we forward to this trunk: your equipment and the originating carrier exchange audio directly, and only the call signalling passes through us. Off by default. It applies to inbound calls alone (calls this trunk places are always carried through us, whatever this says). While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped. Your equipment must be reachable for audio from the public internet. Set `media_bypass` through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getMediaBypass(): ?bool
    {
        return $this->mediaBypass;
    }
    /**
     * Whether we take ourselves out of the audio path for calls we forward to this trunk: your equipment and the originating carrier exchange audio directly, and only the call signalling passes through us. Off by default. It applies to inbound calls alone (calls this trunk places are always carried through us, whatever this says). While it is on we cannot record those calls, report their audio quality, or end one because its audio stopped. Your equipment must be reachable for audio from the public internet. Set `media_bypass` through the trunk update operation.
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
     * The trunk's IP allow list. IP filtering is active whenever this has at least one entry: calls admitted through the allow lists must come from those CIDR ranges. This restriction does not apply to session credentials when `session_credentials_enabled` is true. An empty list means no IP restriction. Replace the whole `ip_acls` list through the trunk update operation.
     * 
     *
     * @return list<VoiceTrunkIPACL>|null
     */
    public function getIpAcls(): ?array
    {
        return $this->ipAcls;
    }
    /**
     * The trunk's IP allow list. IP filtering is active whenever this has at least one entry: calls admitted through the allow lists must come from those CIDR ranges. This restriction does not apply to session credentials when `session_credentials_enabled` is true. An empty list means no IP restriction. Replace the whole `ip_acls` list through the trunk update operation.
     *
     * @param list<VoiceTrunkIPACL>|null $ipAcls
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
     * The API keys allowed to authenticate this trunk over SIP Digest. A key must hold `voice` at write level and be neither revoked nor expired to authenticate. `ineligible_api_key_ids` names the entries that currently cannot. A nonempty list enables API-key authentication, limited to its eligible keys. An empty list means no API-key authentication. A trunk with empty `ip_acls` and `allowed_api_key_ids` lists accepts nothing when `session_credentials_enabled` is false. Replace the whole `allowed_api_key_ids` list through the trunk update operation.
     * 
     *
     * @return list<string>|null
     */
    public function getAllowedApiKeyIds(): ?array
    {
        return $this->allowedApiKeyIds;
    }
    /**
     * The API keys allowed to authenticate this trunk over SIP Digest. A key must hold `voice` at write level and be neither revoked nor expired to authenticate. `ineligible_api_key_ids` names the entries that currently cannot. A nonempty list enables API-key authentication, limited to its eligible keys. An empty list means no API-key authentication. A trunk with empty `ip_acls` and `allowed_api_key_ids` lists accepts nothing when `session_credentials_enabled` is false. Replace the whole `allowed_api_key_ids` list through the trunk update operation.
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
     * The entries in `allowed_api_key_ids` that cannot authenticate this trunk right now because the key lacks `voice` at write level, has expired, or was revoked. The bindings remain until you remove them from the trunk. Restoring `voice` at write level makes a key eligible again if it is still unexpired and unrevoked, without changing its secret or trunk binding. Empty when every allowed key can authenticate.
     * 
     *
     * @return list<string>|null
     */
    public function getIneligibleApiKeyIds(): ?array
    {
        return $this->ineligibleApiKeyIds;
    }
    /**
     * The entries in `allowed_api_key_ids` that cannot authenticate this trunk right now because the key lacks `voice` at write level, has expired, or was revoked. The bindings remain until you remove them from the trunk. Restoring `voice` at write level makes a key eligible again if it is still unexpired and unrevoked, without changing its secret or trunk binding. Empty when every allowed key can authenticate.
     *
     * @param list<string>|null $ineligibleApiKeyIds
     *
     * @return self
     */
    public function setIneligibleApiKeyIds(?array $ineligibleApiKeyIds): self
    {
        $this->initialized['ineligibleApiKeyIds'] = true;
        $this->ineligibleApiKeyIds = $ineligibleApiKeyIds;
        return $this;
    }
    /**
     * The Digest hash algorithms this trunk offers, in the order they are offered. We send one challenge line per algorithm and your PBX answers with the first it supports, so the order decides what most equipment picks. Always populated: a trunk with no explicit setting reports the default, `["SHA-256", "MD5"]`. A trunk answering with an algorithm that is not on this list is rejected, so narrowing the list also narrows what the trunk accepts. Replace `digest_algorithms` through the trunk update operation.
     * 
     *
     * @return list<string>|null
     */
    public function getDigestAlgorithms(): ?array
    {
        return $this->digestAlgorithms;
    }
    /**
     * The Digest hash algorithms this trunk offers, in the order they are offered. We send one challenge line per algorithm and your PBX answers with the first it supports, so the order decides what most equipment picks. Always populated: a trunk with no explicit setting reports the default, `["SHA-256", "MD5"]`. A trunk answering with an algorithm that is not on this list is rejected, so narrowing the list also narrows what the trunk accepts. Replace `digest_algorithms` through the trunk update operation.
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
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP, alongside whatever the allow lists admit. Off by default. It grants nothing on its own: a call still has to present a credential issued to this workspace, and each one expires within minutes. Set `session_credentials_enabled` through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getSessionCredentialsEnabled(): ?bool
    {
        return $this->sessionCredentialsEnabled;
    }
    /**
     * Whether a session credential may be used to connect to this trunk from a web browser, the CLI or MCP, alongside whatever the allow lists admit. Off by default. It grants nothing on its own: a call still has to present a credential issued to this workspace, and each one expires within minutes. Set `session_credentials_enabled` through the trunk update operation.
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
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
