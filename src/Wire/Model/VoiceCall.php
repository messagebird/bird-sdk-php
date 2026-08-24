<?php

namespace MessageBird\Wire\Model;

class VoiceCall
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
     * Session identifier shared across all legs of a multi-party or transferred call. Use this to correlate related call records. `null` when session correlation is not available for the call.
     *
     * @var string|null
     */
    protected $sessionId;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * @var string|null
     */
    protected $direction;
    /**
     * Calling party number in E.164 format.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Called party number in E.164 format.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Who placed the call: the API key whose credentials it used, the integration acting for the workspace, or the user who placed it from a browser or the CLI. Absent when the call was admitted only by its source IP address, or when no actor was recorded.
     *
     * @var VoiceCallActor|null
     */
    protected $actor;
    /**
     * Identifier of the SIP trunk that originated this call. `null` when no trunk is associated.
     *
     * @var string|null
     */
    protected $sipTrunkId;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Final SIP response code received from the carrier. `null` when no SIP response was received, for example on timeout or DNS failure.
     *
     * @var int|null
     */
    protected $sipResponseCode;
    /**
     * Why we refused the call before dialing a carrier. Absent when the call connected or failed at the carrier; see `sip_response_code` for the carrier response.
     *
     * @var string|null
     */
    protected $rejectionReason;
    /**
     * When the call was initiated.
     *
     * @var \DateTime|null
     */
    protected $startedAt;
    /**
     * When the call was answered (`200` OK received). `null` for unanswered calls.
     *
     * @var \DateTime|null
     */
    protected $answeredAt;
    /**
     * When the call ended (BYE or final non-2xx response). `null` for calls that ended abnormally without a recorded end event.
     *
     * @var \DateTime|null
     */
    protected $endedAt;
    /**
     * Total call duration in milliseconds, measured from the first INVITE to the BYE or final response. `null` while the call is still in progress and has no final duration yet.
     *
     * @var int|null
     */
    protected $durationMs;
    /**
     * Post-dial delay in milliseconds: how long the caller heard nothing between dialing and the phone starting to ring at the other end. High values are what callers experience as the call `not going through`. Absent when the call never rang, either because it failed first or because the carrier answered it immediately.
     * 
     *
     * @var int|null
     */
    protected $pddMs;
    /**
     * Billable duration in milliseconds, measured from answer to call end. Zero for unanswered calls, and `null` while the call is still in progress.
     *
     * @var int|null
     */
    protected $billableMs;
    /**
     * @var VoiceMediaQuality|null
     */
    protected $mediaQuality;
    /**
     * What was charged for a call, split into the components that make it up.
     * 
     *
     * @var VoiceCallCost|null
     */
    protected $cost;
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
     * Session identifier shared across all legs of a multi-party or transferred call. Use this to correlate related call records. `null` when session correlation is not available for the call.
     *
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }
    /**
     * Session identifier shared across all legs of a multi-party or transferred call. Use this to correlate related call records. `null` when session correlation is not available for the call.
     *
     * @param string|null $sessionId
     *
     * @return self
     */
    public function setSessionId(?string $sessionId): self
    {
        $this->initialized['sessionId'] = true;
        $this->sessionId = $sessionId;
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
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * @param string|null $direction
     *
     * @return self
     */
    public function setDirection(?string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
    /**
     * Calling party number in E.164 format.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Calling party number in E.164 format.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Called party number in E.164 format.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Called party number in E.164 format.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * Who placed the call: the API key whose credentials it used, the integration acting for the workspace, or the user who placed it from a browser or the CLI. Absent when the call was admitted only by its source IP address, or when no actor was recorded.
     *
     * @return VoiceCallActor|null
     */
    public function getActor(): ?VoiceCallActor
    {
        return $this->actor;
    }
    /**
     * Who placed the call: the API key whose credentials it used, the integration acting for the workspace, or the user who placed it from a browser or the CLI. Absent when the call was admitted only by its source IP address, or when no actor was recorded.
     *
     * @param VoiceCallActor|null $actor
     *
     * @return self
     */
    public function setActor(?VoiceCallActor $actor): self
    {
        $this->initialized['actor'] = true;
        $this->actor = $actor;
        return $this;
    }
    /**
     * Identifier of the SIP trunk that originated this call. `null` when no trunk is associated.
     *
     * @return string|null
     */
    public function getSipTrunkId(): ?string
    {
        return $this->sipTrunkId;
    }
    /**
     * Identifier of the SIP trunk that originated this call. `null` when no trunk is associated.
     *
     * @param string|null $sipTrunkId
     *
     * @return self
     */
    public function setSipTrunkId(?string $sipTrunkId): self
    {
        $this->initialized['sipTrunkId'] = true;
        $this->sipTrunkId = $sipTrunkId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Final SIP response code received from the carrier. `null` when no SIP response was received, for example on timeout or DNS failure.
     *
     * @return int|null
     */
    public function getSipResponseCode(): ?int
    {
        return $this->sipResponseCode;
    }
    /**
     * Final SIP response code received from the carrier. `null` when no SIP response was received, for example on timeout or DNS failure.
     *
     * @param int|null $sipResponseCode
     *
     * @return self
     */
    public function setSipResponseCode(?int $sipResponseCode): self
    {
        $this->initialized['sipResponseCode'] = true;
        $this->sipResponseCode = $sipResponseCode;
        return $this;
    }
    /**
     * Why we refused the call before dialing a carrier. Absent when the call connected or failed at the carrier; see `sip_response_code` for the carrier response.
     *
     * @return string|null
     */
    public function getRejectionReason(): ?string
    {
        return $this->rejectionReason;
    }
    /**
     * Why we refused the call before dialing a carrier. Absent when the call connected or failed at the carrier; see `sip_response_code` for the carrier response.
     *
     * @param string|null $rejectionReason
     *
     * @return self
     */
    public function setRejectionReason(?string $rejectionReason): self
    {
        $this->initialized['rejectionReason'] = true;
        $this->rejectionReason = $rejectionReason;
        return $this;
    }
    /**
     * When the call was initiated.
     *
     * @return \DateTime|null
     */
    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }
    /**
     * When the call was initiated.
     *
     * @param \DateTime|null $startedAt
     *
     * @return self
     */
    public function setStartedAt(?\DateTime $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;
        return $this;
    }
    /**
     * When the call was answered (`200` OK received). `null` for unanswered calls.
     *
     * @return \DateTime|null
     */
    public function getAnsweredAt(): ?\DateTime
    {
        return $this->answeredAt;
    }
    /**
     * When the call was answered (`200` OK received). `null` for unanswered calls.
     *
     * @param \DateTime|null $answeredAt
     *
     * @return self
     */
    public function setAnsweredAt(?\DateTime $answeredAt): self
    {
        $this->initialized['answeredAt'] = true;
        $this->answeredAt = $answeredAt;
        return $this;
    }
    /**
     * When the call ended (BYE or final non-2xx response). `null` for calls that ended abnormally without a recorded end event.
     *
     * @return \DateTime|null
     */
    public function getEndedAt(): ?\DateTime
    {
        return $this->endedAt;
    }
    /**
     * When the call ended (BYE or final non-2xx response). `null` for calls that ended abnormally without a recorded end event.
     *
     * @param \DateTime|null $endedAt
     *
     * @return self
     */
    public function setEndedAt(?\DateTime $endedAt): self
    {
        $this->initialized['endedAt'] = true;
        $this->endedAt = $endedAt;
        return $this;
    }
    /**
     * Total call duration in milliseconds, measured from the first INVITE to the BYE or final response. `null` while the call is still in progress and has no final duration yet.
     *
     * @return int|null
     */
    public function getDurationMs(): ?int
    {
        return $this->durationMs;
    }
    /**
     * Total call duration in milliseconds, measured from the first INVITE to the BYE or final response. `null` while the call is still in progress and has no final duration yet.
     *
     * @param int|null $durationMs
     *
     * @return self
     */
    public function setDurationMs(?int $durationMs): self
    {
        $this->initialized['durationMs'] = true;
        $this->durationMs = $durationMs;
        return $this;
    }
    /**
     * Post-dial delay in milliseconds: how long the caller heard nothing between dialing and the phone starting to ring at the other end. High values are what callers experience as the call `not going through`. Absent when the call never rang, either because it failed first or because the carrier answered it immediately.
     * 
     *
     * @return int|null
     */
    public function getPddMs(): ?int
    {
        return $this->pddMs;
    }
    /**
     * Post-dial delay in milliseconds: how long the caller heard nothing between dialing and the phone starting to ring at the other end. High values are what callers experience as the call `not going through`. Absent when the call never rang, either because it failed first or because the carrier answered it immediately.
     *
     * @param int|null $pddMs
     *
     * @return self
     */
    public function setPddMs(?int $pddMs): self
    {
        $this->initialized['pddMs'] = true;
        $this->pddMs = $pddMs;
        return $this;
    }
    /**
     * Billable duration in milliseconds, measured from answer to call end. Zero for unanswered calls, and `null` while the call is still in progress.
     *
     * @return int|null
     */
    public function getBillableMs(): ?int
    {
        return $this->billableMs;
    }
    /**
     * Billable duration in milliseconds, measured from answer to call end. Zero for unanswered calls, and `null` while the call is still in progress.
     *
     * @param int|null $billableMs
     *
     * @return self
     */
    public function setBillableMs(?int $billableMs): self
    {
        $this->initialized['billableMs'] = true;
        $this->billableMs = $billableMs;
        return $this;
    }
    /**
     * @return VoiceMediaQuality|null
     */
    public function getMediaQuality(): ?VoiceMediaQuality
    {
        return $this->mediaQuality;
    }
    /**
     * @param VoiceMediaQuality|null $mediaQuality
     *
     * @return self
     */
    public function setMediaQuality(?VoiceMediaQuality $mediaQuality): self
    {
        $this->initialized['mediaQuality'] = true;
        $this->mediaQuality = $mediaQuality;
        return $this;
    }
    /**
     * What was charged for a call, split into the components that make it up.
     * 
     *
     * @return VoiceCallCost|null
     */
    public function getCost(): ?VoiceCallCost
    {
        return $this->cost;
    }
    /**
     * What was charged for a call, split into the components that make it up.
     *
     * @param VoiceCallCost|null $cost
     *
     * @return self
     */
    public function setCost(?VoiceCallCost $cost): self
    {
        $this->initialized['cost'] = true;
        $this->cost = $cost;
        return $this;
    }
}
