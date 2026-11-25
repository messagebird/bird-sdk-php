<?php

namespace MessageBird\Wire\Model;

/**
 * A SIP trunk's identity and access-control settings.
 */
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
     * Whether your PBX may place calls through this trunk, admitted by `ip_acls` or `allowed_api_key_ids`. Off on a new trunk. While it is off, the allow lists admit no call. Set `sip_trunking_enabled` when you create the trunk or through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $sipTrunkingEnabled;
    /**
     * Whether this trunk may receive calls: we dial the addresses you declared, for the numbers this trunk answers. Off on a new trunk. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Set `did_delivery_enabled` when you create the trunk or through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $didDeliveryEnabled;
    /**
     * Whether people in this workspace may place calls through this trunk with a session credential, from the dashboard phone, the CLI or MCP. Off on a new trunk. It grants nothing on its own: a call still has to present a credential issued to this workspace, and each one expires within minutes. Set `workspace_users_enabled` when you create the trunk or through the trunk update operation.
     * 
     *
     * @var bool|null
     */
    protected $workspaceUsersEnabled;
    /**
     * Deprecated: read `sip_trunking_enabled` and `workspace_users_enabled` instead. `true` while any caller may place calls through this trunk.
     * 
     *
     * @deprecated
     *
     * @var bool|null
     */
    protected $outboundEnabled;
    /**
     * Deprecated: read `did_delivery_enabled`, which has the same value.
     *
     * @deprecated
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
     * The trunk's IP allow list. IP filtering is active whenever this has at least one entry: calls admitted through the allow lists must come from those CIDR ranges. This restriction does not apply to session credentials when `workspace_users_enabled` is true. An empty list means no IP restriction. Replace the whole `ip_acls` list through the trunk update operation.
     * 
     *
     * @var list<VoiceTrunkIPACL>|null
     */
    protected $ipAcls;
    /**
     * The API keys allowed to authenticate this trunk over SIP Digest. A key must hold `voice` at write level and be neither revoked nor expired to authenticate. `ineligible_api_key_ids` names the entries that currently cannot. A nonempty list enables API-key authentication, limited to its eligible keys. An empty list means no API-key authentication. A trunk with empty `ip_acls` and `allowed_api_key_ids` lists accepts no call from your PBX. Replace the whole `allowed_api_key_ids` list through the trunk update operation.
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
     * The Digest hash algorithms this trunk offers, in the order they are offered. We send one challenge line per algorithm and your PBX answers with the first it supports, so the order decides what most equipment picks. Always populated: a trunk with no explicit setting reports the default, `["SHA-256", "MD5"]`. The list governs clients that authenticate with an API key: their answer with an algorithm that is not on it is rejected, so narrowing the list also narrows what the trunk accepts from them. Session credentials, which the dashboard phone uses and `POST /v1/voice/session-credentials` creates, are the exception: with `workspace_users_enabled`, the challenge always ends with an MD5 line, after the list in its own order, and a valid session credential is accepted with MD5 or SHA-256. An API-key answer with that extra MD5 is still rejected. Replace `digest_algorithms` through the trunk update operation.
     * 
     *
     * @var list<string>|null
     */
    protected $digestAlgorithms;
    /**
     * Deprecated: read `workspace_users_enabled`, which has the same value.
     *
     * @deprecated
     *
     * @var bool|null
     */
    protected $sessionCredentialsEnabled;
    /**
     * How the trunk carries call audio. Set it through the trunk update operation.
     *
     * @var VoiceTrunkMedia|null
     */
    protected $media;
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
     * Whether your PBX may place calls through this trunk, admitted by `ip_acls` or `allowed_api_key_ids`. Off on a new trunk. While it is off, the allow lists admit no call. Set `sip_trunking_enabled` when you create the trunk or through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getSipTrunkingEnabled(): ?bool
    {
        return $this->sipTrunkingEnabled;
    }
    /**
     * Whether your PBX may place calls through this trunk, admitted by `ip_acls` or `allowed_api_key_ids`. Off on a new trunk. While it is off, the allow lists admit no call. Set `sip_trunking_enabled` when you create the trunk or through the trunk update operation.
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
     * Whether this trunk may receive calls: we dial the addresses you declared, for the numbers this trunk answers. Off on a new trunk. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Set `did_delivery_enabled` when you create the trunk or through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getDidDeliveryEnabled(): ?bool
    {
        return $this->didDeliveryEnabled;
    }
    /**
     * Whether this trunk may receive calls: we dial the addresses you declared, for the numbers this trunk answers. Off on a new trunk. Turning it off resets number routes that use this trunk to reject incoming calls. Turning it back on does not restore those routes. Set `did_delivery_enabled` when you create the trunk or through the trunk update operation.
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
     * Whether people in this workspace may place calls through this trunk with a session credential, from the dashboard phone, the CLI or MCP. Off on a new trunk. It grants nothing on its own: a call still has to present a credential issued to this workspace, and each one expires within minutes. Set `workspace_users_enabled` when you create the trunk or through the trunk update operation.
     * 
     *
     * @return bool|null
     */
    public function getWorkspaceUsersEnabled(): ?bool
    {
        return $this->workspaceUsersEnabled;
    }
    /**
     * Whether people in this workspace may place calls through this trunk with a session credential, from the dashboard phone, the CLI or MCP. Off on a new trunk. It grants nothing on its own: a call still has to present a credential issued to this workspace, and each one expires within minutes. Set `workspace_users_enabled` when you create the trunk or through the trunk update operation.
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
     * Deprecated: read `sip_trunking_enabled` and `workspace_users_enabled` instead. `true` while any caller may place calls through this trunk.
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
     * Deprecated: read `sip_trunking_enabled` and `workspace_users_enabled` instead. `true` while any caller may place calls through this trunk.
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
     * Deprecated: read `did_delivery_enabled`, which has the same value.
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
     * Deprecated: read `did_delivery_enabled`, which has the same value.
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
     * The trunk's IP allow list. IP filtering is active whenever this has at least one entry: calls admitted through the allow lists must come from those CIDR ranges. This restriction does not apply to session credentials when `workspace_users_enabled` is true. An empty list means no IP restriction. Replace the whole `ip_acls` list through the trunk update operation.
     * 
     *
     * @return list<VoiceTrunkIPACL>|null
     */
    public function getIpAcls(): ?array
    {
        return $this->ipAcls;
    }
    /**
     * The trunk's IP allow list. IP filtering is active whenever this has at least one entry: calls admitted through the allow lists must come from those CIDR ranges. This restriction does not apply to session credentials when `workspace_users_enabled` is true. An empty list means no IP restriction. Replace the whole `ip_acls` list through the trunk update operation.
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
     * The API keys allowed to authenticate this trunk over SIP Digest. A key must hold `voice` at write level and be neither revoked nor expired to authenticate. `ineligible_api_key_ids` names the entries that currently cannot. A nonempty list enables API-key authentication, limited to its eligible keys. An empty list means no API-key authentication. A trunk with empty `ip_acls` and `allowed_api_key_ids` lists accepts no call from your PBX. Replace the whole `allowed_api_key_ids` list through the trunk update operation.
     * 
     *
     * @return list<string>|null
     */
    public function getAllowedApiKeyIds(): ?array
    {
        return $this->allowedApiKeyIds;
    }
    /**
     * The API keys allowed to authenticate this trunk over SIP Digest. A key must hold `voice` at write level and be neither revoked nor expired to authenticate. `ineligible_api_key_ids` names the entries that currently cannot. A nonempty list enables API-key authentication, limited to its eligible keys. An empty list means no API-key authentication. A trunk with empty `ip_acls` and `allowed_api_key_ids` lists accepts no call from your PBX. Replace the whole `allowed_api_key_ids` list through the trunk update operation.
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
     * The Digest hash algorithms this trunk offers, in the order they are offered. We send one challenge line per algorithm and your PBX answers with the first it supports, so the order decides what most equipment picks. Always populated: a trunk with no explicit setting reports the default, `["SHA-256", "MD5"]`. The list governs clients that authenticate with an API key: their answer with an algorithm that is not on it is rejected, so narrowing the list also narrows what the trunk accepts from them. Session credentials, which the dashboard phone uses and `POST /v1/voice/session-credentials` creates, are the exception: with `workspace_users_enabled`, the challenge always ends with an MD5 line, after the list in its own order, and a valid session credential is accepted with MD5 or SHA-256. An API-key answer with that extra MD5 is still rejected. Replace `digest_algorithms` through the trunk update operation.
     * 
     *
     * @return list<string>|null
     */
    public function getDigestAlgorithms(): ?array
    {
        return $this->digestAlgorithms;
    }
    /**
     * The Digest hash algorithms this trunk offers, in the order they are offered. We send one challenge line per algorithm and your PBX answers with the first it supports, so the order decides what most equipment picks. Always populated: a trunk with no explicit setting reports the default, `["SHA-256", "MD5"]`. The list governs clients that authenticate with an API key: their answer with an algorithm that is not on it is rejected, so narrowing the list also narrows what the trunk accepts from them. Session credentials, which the dashboard phone uses and `POST /v1/voice/session-credentials` creates, are the exception: with `workspace_users_enabled`, the challenge always ends with an MD5 line, after the list in its own order, and a valid session credential is accepted with MD5 or SHA-256. An API-key answer with that extra MD5 is still rejected. Replace `digest_algorithms` through the trunk update operation.
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
     * Deprecated: read `workspace_users_enabled`, which has the same value.
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
     * Deprecated: read `workspace_users_enabled`, which has the same value.
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
    /**
     * How the trunk carries call audio. Set it through the trunk update operation.
     *
     * @return VoiceTrunkMedia|null
     */
    public function getMedia(): ?VoiceTrunkMedia
    {
        return $this->media;
    }
    /**
     * How the trunk carries call audio. Set it through the trunk update operation.
     *
     * @param VoiceTrunkMedia|null $media
     *
     * @return self
     */
    public function setMedia(?VoiceTrunkMedia $media): self
    {
        $this->initialized['media'] = true;
        $this->media = $media;
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
