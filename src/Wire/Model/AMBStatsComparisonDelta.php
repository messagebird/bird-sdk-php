<?php

namespace MessageBird\Wire\Model;

class AMBStatsComparisonDelta
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
     * Relative change in accepted messages (`counts.accepted`) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @var float|null
     */
    protected $acceptedPctChange;
    /**
     * Relative change in sent messages (`counts.sent`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $sentPctChange;
    /**
     * Relative change in send failures (`counts.send_failed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $sendFailedPctChange;
    /**
     * Relative change in rejected messages (`counts.rejected`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @var float|null
     */
    protected $rejectedPctChange;
    /**
     * Relative change in accepted messages (`counts.accepted`) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @return float|null
     */
    public function getAcceptedPctChange(): ?float
    {
        return $this->acceptedPctChange;
    }
    /**
     * Relative change in accepted messages (`counts.accepted`) versus the previous period, as a signed fraction. Null when the previous period accepted none.
     *
     * @param float|null $acceptedPctChange
     *
     * @return self
     */
    public function setAcceptedPctChange(?float $acceptedPctChange): self
    {
        $this->initialized['acceptedPctChange'] = true;
        $this->acceptedPctChange = $acceptedPctChange;
        return $this;
    }
    /**
     * Relative change in sent messages (`counts.sent`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getSentPctChange(): ?float
    {
        return $this->sentPctChange;
    }
    /**
     * Relative change in sent messages (`counts.sent`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $sentPctChange
     *
     * @return self
     */
    public function setSentPctChange(?float $sentPctChange): self
    {
        $this->initialized['sentPctChange'] = true;
        $this->sentPctChange = $sentPctChange;
        return $this;
    }
    /**
     * Relative change in send failures (`counts.send_failed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getSendFailedPctChange(): ?float
    {
        return $this->sendFailedPctChange;
    }
    /**
     * Relative change in send failures (`counts.send_failed`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $sendFailedPctChange
     *
     * @return self
     */
    public function setSendFailedPctChange(?float $sendFailedPctChange): self
    {
        $this->initialized['sendFailedPctChange'] = true;
        $this->sendFailedPctChange = $sendFailedPctChange;
        return $this;
    }
    /**
     * Relative change in rejected messages (`counts.rejected`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @return float|null
     */
    public function getRejectedPctChange(): ?float
    {
        return $this->rejectedPctChange;
    }
    /**
     * Relative change in rejected messages (`counts.rejected`) versus the previous period, as a signed fraction. Null when the previous period had none.
     *
     * @param float|null $rejectedPctChange
     *
     * @return self
     */
    public function setRejectedPctChange(?float $rejectedPctChange): self
    {
        $this->initialized['rejectedPctChange'] = true;
        $this->rejectedPctChange = $rejectedPctChange;
        return $this;
    }
}
