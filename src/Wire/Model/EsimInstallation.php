<?php

namespace MessageBird\Wire\Model;

class EsimInstallation
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
     * pending: not yet downloaded by a device; downloaded: downloaded but not installed; installed: installed on the device; removed: deleted from the device; whether the profile can be installed again depends on the carrier profile, so treat removal as final; error: download or installation failed, see error_reason. Open enum: installation state is reported by the device, so additional states may be added over time. Treat an unrecognized value as a future state, not an error.
     * 
     *
     * @var string|null
     */
    protected $state;
    /**
     * When the installation state last changed. Null before the first device interaction.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Human-readable reason installation failed, for example an ineligible device or an exhausted download limit. Null unless state is error.
     * 
     *
     * @var string|null
     */
    protected $errorReason;
    /**
     * pending: not yet downloaded by a device; downloaded: downloaded but not installed; installed: installed on the device; removed: deleted from the device; whether the profile can be installed again depends on the carrier profile, so treat removal as final; error: download or installation failed, see error_reason. Open enum: installation state is reported by the device, so additional states may be added over time. Treat an unrecognized value as a future state, not an error.
     * 
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * pending: not yet downloaded by a device; downloaded: downloaded but not installed; installed: installed on the device; removed: deleted from the device; whether the profile can be installed again depends on the carrier profile, so treat removal as final; error: download or installation failed, see error_reason. Open enum: installation state is reported by the device, so additional states may be added over time. Treat an unrecognized value as a future state, not an error.
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * When the installation state last changed. Null before the first device interaction.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the installation state last changed. Null before the first device interaction.
     *
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
    /**
     * Human-readable reason installation failed, for example an ineligible device or an exhausted download limit. Null unless state is error.
     * 
     *
     * @return string|null
     */
    public function getErrorReason(): ?string
    {
        return $this->errorReason;
    }
    /**
     * Human-readable reason installation failed, for example an ineligible device or an exhausted download limit. Null unless state is error.
     *
     * @param string|null $errorReason
     *
     * @return self
     */
    public function setErrorReason(?string $errorReason): self
    {
        $this->initialized['errorReason'] = true;
        $this->errorReason = $errorReason;
        return $this;
    }
}
