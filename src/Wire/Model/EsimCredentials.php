<?php

namespace MessageBird\Wire\Model;

class EsimCredentials
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
    protected $esimId;
    /**
     * One-tap install link for iOS 17.4 and later, derived from the activation code. Null when a valid link cannot be derived for this eSIM.
     *
     * @var string|null
     */
    protected $iosInstallUrl;
    /**
     * Android installation link. Currently unavailable; returns null. Use the returned Android instructions for manual setup.
     *
     * @var string|null
     */
    protected $androidInstallUrl;
    /**
     * Hosted QR image URL. Currently unavailable; returns null. Use the activation code in your own installation flow or provide a hosted installation page.
     *
     * @var string|null
     */
    protected $qrCodeUrl;
    /**
     * Raw activation string for manual entry in device settings.
     *
     * @var string|null
     */
    protected $activationCode;
    /**
     * SM-DP+ server address, for building a custom install flow.
     *
     * @var string|null
     */
    protected $smdpAddress;
    /**
     * Matching ID component of the activation code, for building a custom install flow.
     *
     * @var string|null
     */
    protected $matchingId;
    /**
     * Confirmation code requested during installation, when available. Null means the requirement is unknown; it does not confirm that a code is unnecessary.
     *
     * @var string|null
     */
    protected $confirmationCode;
    /**
     * Access point name for mobile data, when available. Null means no APN information is available; it does not confirm automatic configuration.
     *
     * @var string|null
     */
    protected $apn;
    /**
     * Whether data roaming must be enabled. Null means the requirement is unknown. When true, `instructions` includes a step to enable roaming.
     *
     * @var bool|null
     */
    protected $dataRoamingRequired;
    /**
     * Step-by-step install instructions, covering whichever of the fields in this response carry a value, in the closest language available for the Accept-Language request header. Its `language` field names the one served.
     * 
     *
     * @var EsimCredentialsInstructions|null
     */
    protected $instructions;
    /**
     * @return string|null
     */
    public function getEsimId(): ?string
    {
        return $this->esimId;
    }
    /**
     * @param string|null $esimId
     *
     * @return self
     */
    public function setEsimId(?string $esimId): self
    {
        $this->initialized['esimId'] = true;
        $this->esimId = $esimId;
        return $this;
    }
    /**
     * One-tap install link for iOS 17.4 and later, derived from the activation code. Null when a valid link cannot be derived for this eSIM.
     *
     * @return string|null
     */
    public function getIosInstallUrl(): ?string
    {
        return $this->iosInstallUrl;
    }
    /**
     * One-tap install link for iOS 17.4 and later, derived from the activation code. Null when a valid link cannot be derived for this eSIM.
     *
     * @param string|null $iosInstallUrl
     *
     * @return self
     */
    public function setIosInstallUrl(?string $iosInstallUrl): self
    {
        $this->initialized['iosInstallUrl'] = true;
        $this->iosInstallUrl = $iosInstallUrl;
        return $this;
    }
    /**
     * Android installation link. Currently unavailable; returns null. Use the returned Android instructions for manual setup.
     *
     * @return string|null
     */
    public function getAndroidInstallUrl(): ?string
    {
        return $this->androidInstallUrl;
    }
    /**
     * Android installation link. Currently unavailable; returns null. Use the returned Android instructions for manual setup.
     *
     * @param string|null $androidInstallUrl
     *
     * @return self
     */
    public function setAndroidInstallUrl(?string $androidInstallUrl): self
    {
        $this->initialized['androidInstallUrl'] = true;
        $this->androidInstallUrl = $androidInstallUrl;
        return $this;
    }
    /**
     * Hosted QR image URL. Currently unavailable; returns null. Use the activation code in your own installation flow or provide a hosted installation page.
     *
     * @return string|null
     */
    public function getQrCodeUrl(): ?string
    {
        return $this->qrCodeUrl;
    }
    /**
     * Hosted QR image URL. Currently unavailable; returns null. Use the activation code in your own installation flow or provide a hosted installation page.
     *
     * @param string|null $qrCodeUrl
     *
     * @return self
     */
    public function setQrCodeUrl(?string $qrCodeUrl): self
    {
        $this->initialized['qrCodeUrl'] = true;
        $this->qrCodeUrl = $qrCodeUrl;
        return $this;
    }
    /**
     * Raw activation string for manual entry in device settings.
     *
     * @return string|null
     */
    public function getActivationCode(): ?string
    {
        return $this->activationCode;
    }
    /**
     * Raw activation string for manual entry in device settings.
     *
     * @param string|null $activationCode
     *
     * @return self
     */
    public function setActivationCode(?string $activationCode): self
    {
        $this->initialized['activationCode'] = true;
        $this->activationCode = $activationCode;
        return $this;
    }
    /**
     * SM-DP+ server address, for building a custom install flow.
     *
     * @return string|null
     */
    public function getSmdpAddress(): ?string
    {
        return $this->smdpAddress;
    }
    /**
     * SM-DP+ server address, for building a custom install flow.
     *
     * @param string|null $smdpAddress
     *
     * @return self
     */
    public function setSmdpAddress(?string $smdpAddress): self
    {
        $this->initialized['smdpAddress'] = true;
        $this->smdpAddress = $smdpAddress;
        return $this;
    }
    /**
     * Matching ID component of the activation code, for building a custom install flow.
     *
     * @return string|null
     */
    public function getMatchingId(): ?string
    {
        return $this->matchingId;
    }
    /**
     * Matching ID component of the activation code, for building a custom install flow.
     *
     * @param string|null $matchingId
     *
     * @return self
     */
    public function setMatchingId(?string $matchingId): self
    {
        $this->initialized['matchingId'] = true;
        $this->matchingId = $matchingId;
        return $this;
    }
    /**
     * Confirmation code requested during installation, when available. Null means the requirement is unknown; it does not confirm that a code is unnecessary.
     *
     * @return string|null
     */
    public function getConfirmationCode(): ?string
    {
        return $this->confirmationCode;
    }
    /**
     * Confirmation code requested during installation, when available. Null means the requirement is unknown; it does not confirm that a code is unnecessary.
     *
     * @param string|null $confirmationCode
     *
     * @return self
     */
    public function setConfirmationCode(?string $confirmationCode): self
    {
        $this->initialized['confirmationCode'] = true;
        $this->confirmationCode = $confirmationCode;
        return $this;
    }
    /**
     * Access point name for mobile data, when available. Null means no APN information is available; it does not confirm automatic configuration.
     *
     * @return string|null
     */
    public function getApn(): ?string
    {
        return $this->apn;
    }
    /**
     * Access point name for mobile data, when available. Null means no APN information is available; it does not confirm automatic configuration.
     *
     * @param string|null $apn
     *
     * @return self
     */
    public function setApn(?string $apn): self
    {
        $this->initialized['apn'] = true;
        $this->apn = $apn;
        return $this;
    }
    /**
     * Whether data roaming must be enabled. Null means the requirement is unknown. When true, `instructions` includes a step to enable roaming.
     *
     * @return bool|null
     */
    public function getDataRoamingRequired(): ?bool
    {
        return $this->dataRoamingRequired;
    }
    /**
     * Whether data roaming must be enabled. Null means the requirement is unknown. When true, `instructions` includes a step to enable roaming.
     *
     * @param bool|null $dataRoamingRequired
     *
     * @return self
     */
    public function setDataRoamingRequired(?bool $dataRoamingRequired): self
    {
        $this->initialized['dataRoamingRequired'] = true;
        $this->dataRoamingRequired = $dataRoamingRequired;
        return $this;
    }
    /**
     * Step-by-step install instructions, covering whichever of the fields in this response carry a value, in the closest language available for the Accept-Language request header. Its `language` field names the one served.
     * 
     *
     * @return EsimCredentialsInstructions|null
     */
    public function getInstructions(): ?EsimCredentialsInstructions
    {
        return $this->instructions;
    }
    /**
     * Step-by-step install instructions, covering whichever of the fields in this response carry a value, in the closest language available for the Accept-Language request header. Its `language` field names the one served.
     *
     * @param EsimCredentialsInstructions|EsimInstallationInstructions|array|null $instructions
     *
     * @return self
     */
    public function setInstructions($instructions): self
    {
        $this->initialized['instructions'] = true;
        $this->instructions = \MessageBird\Core\ModelWrapper::normalize($instructions, EsimCredentialsInstructions::class);
        return $this;
    }
}
