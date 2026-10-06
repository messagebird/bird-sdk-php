<?php

namespace MessageBird\Wire\Model;

class Esim extends \ArrayObject
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
     * The assigned service user, or null when the eSIM has no person assignment.
     *
     * @var string|null
     */
    protected $subscriberId;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $mode;
    /**
     * ICCID of the eSIM profile. Null while no profile is allocated yet, for example when provisioning failed before allocation.
     *
     * @var string|null
     */
    protected $iccid;
    /**
     * Phone number attached to this eSIM, in E.164 format, as the supplier reports it. Null while none is on record: a data-only plan comes with no number, and a plan that includes one reports it after provisioning.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * @var EsimCapabilities|null
     */
    protected $capabilities;
    /**
     * The order that created this eSIM.
     *
     * @var string|null
     */
    protected $orderId;
    /**
     * Free-text label for your own reference, for example a traveler or order reference.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * @var EsimInstallationWrapper|null
     */
    protected $installation;
    /**
     * Current data packages, one per purchase.
     *
     * @var list<EsimPackage>|null
     */
    protected $packages;
    /**
     * Remaining data per coverage zone, combined across the zone's packages. Derived; the packages are the source of truth.
     *
     * @var list<EsimZoneBalance>|null
     */
    protected $zoneBalances;
    /**
     * Actions currently available to you on this eSIM, with reasons for unavailable actions. Returned by the individual eSIM read. Use this to display controls and explain restrictions. Each action rechecks permissions and state when submitted, so availability is not a guarantee of success.
     *
     * @var list<EsimAvailableAction>|null
     */
    protected $availableActions;
    /**
     * Maximum number of concurrent data packages this eSIM can hold, counted across all zones; several packages may share one zone. Enforced when packages are added.
     * 
     *
     * @var int|null
     */
    protected $packageLimit;
    /**
     * Whether daily usage history is supported for this eSIM. The daily usage endpoint is currently unavailable; read package balances for reported consumption.
     *
     * @var bool|null
     */
    protected $usageAvailable;
    /**
     * Whether ongoing package consumption reporting is available. Separate from daily usage history. Null package consumption values mean no measurement is available.
     *
     * @var string|null
     */
    protected $balanceReporting;
    /**
     * Activate (first network use) before this moment or the eSIM expires. Null once activated.
     *
     * @var \DateTime|null
     */
    protected $readyUntil;
    /**
     * When the eSIM first used a mobile network. Null until then.
     *
     * @var \DateTime|null
     */
    protected $activatedAt;
    /**
     * When the eSIM's service period ends. The period starts at activation and data packages cannot outlive it. Null until activated.
     * 
     *
     * @var \DateTime|null
     */
    protected $activeUntil;
    /**
     * Most recent network attachment, or null before first attach.
     *
     * @var EsimLastAttachment|null
     */
    protected $lastAttachment;
    /**
     * Tags for routing, filtering, and stats grouping, echoed on webhook events for the eSIM.
     *
     * @var list<Tag>|null
     */
    protected $tags;
    /**
     * Your own key-value data, echoed on webhook events for the eSIM. Maximum 2 KB serialized.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * The assigned service user, or null when the eSIM has no person assignment.
     *
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }
    /**
     * The assigned service user, or null when the eSIM has no person assignment.
     *
     * @param string|null $subscriberId
     *
     * @return self
     */
    public function setSubscriberId(?string $subscriberId): self
    {
        $this->initialized['subscriberId'] = true;
        $this->subscriberId = $subscriberId;
        return $this;
    }
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
     * @return string|null
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }
    /**
     * @param string|null $mode
     *
     * @return self
     */
    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;
        return $this;
    }
    /**
     * ICCID of the eSIM profile. Null while no profile is allocated yet, for example when provisioning failed before allocation.
     *
     * @return string|null
     */
    public function getIccid(): ?string
    {
        return $this->iccid;
    }
    /**
     * ICCID of the eSIM profile. Null while no profile is allocated yet, for example when provisioning failed before allocation.
     *
     * @param string|null $iccid
     *
     * @return self
     */
    public function setIccid(?string $iccid): self
    {
        $this->initialized['iccid'] = true;
        $this->iccid = $iccid;
        return $this;
    }
    /**
     * Phone number attached to this eSIM, in E.164 format, as the supplier reports it. Null while none is on record: a data-only plan comes with no number, and a plan that includes one reports it after provisioning.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number attached to this eSIM, in E.164 format, as the supplier reports it. Null while none is on record: a data-only plan comes with no number, and a plan that includes one reports it after provisioning.
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
    /**
     * @return EsimCapabilities|null
     */
    public function getCapabilities(): ?EsimCapabilities
    {
        return $this->capabilities;
    }
    /**
     * @param EsimCapabilities|EsimServiceCapabilities|array|null $capabilities
     *
     * @return self
     */
    public function setCapabilities($capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = \MessageBird\Core\ModelWrapper::normalize($capabilities, EsimCapabilities::class);
        return $this;
    }
    /**
     * The order that created this eSIM.
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }
    /**
     * The order that created this eSIM.
     *
     * @param string|null $orderId
     *
     * @return self
     */
    public function setOrderId(?string $orderId): self
    {
        $this->initialized['orderId'] = true;
        $this->orderId = $orderId;
        return $this;
    }
    /**
     * Free-text label for your own reference, for example a traveler or order reference.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * Free-text label for your own reference, for example a traveler or order reference.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * @return EsimInstallationWrapper|null
     */
    public function getInstallation(): ?EsimInstallationWrapper
    {
        return $this->installation;
    }
    /**
     * @param EsimInstallationWrapper|EsimInstallation|array|null $installation
     *
     * @return self
     */
    public function setInstallation($installation): self
    {
        $this->initialized['installation'] = true;
        $this->installation = \MessageBird\Core\ModelWrapper::normalize($installation, EsimInstallationWrapper::class);
        return $this;
    }
    /**
     * Current data packages, one per purchase.
     *
     * @return list<EsimPackage>|null
     */
    public function getPackages(): ?array
    {
        return $this->packages;
    }
    /**
     * Current data packages, one per purchase.
     *
     * @param list<EsimPackage>|null $packages
     *
     * @return self
     */
    public function setPackages(?array $packages): self
    {
        $this->initialized['packages'] = true;
        $this->packages = $packages;
        return $this;
    }
    /**
     * Remaining data per coverage zone, combined across the zone's packages. Derived; the packages are the source of truth.
     *
     * @return list<EsimZoneBalance>|null
     */
    public function getZoneBalances(): ?array
    {
        return $this->zoneBalances;
    }
    /**
     * Remaining data per coverage zone, combined across the zone's packages. Derived; the packages are the source of truth.
     *
     * @param list<EsimZoneBalance>|null $zoneBalances
     *
     * @return self
     */
    public function setZoneBalances(?array $zoneBalances): self
    {
        $this->initialized['zoneBalances'] = true;
        $this->zoneBalances = $zoneBalances;
        return $this;
    }
    /**
     * Actions currently available to you on this eSIM, with reasons for unavailable actions. Returned by the individual eSIM read. Use this to display controls and explain restrictions. Each action rechecks permissions and state when submitted, so availability is not a guarantee of success.
     *
     * @return list<EsimAvailableAction>|null
     */
    public function getAvailableActions(): ?array
    {
        return $this->availableActions;
    }
    /**
     * Actions currently available to you on this eSIM, with reasons for unavailable actions. Returned by the individual eSIM read. Use this to display controls and explain restrictions. Each action rechecks permissions and state when submitted, so availability is not a guarantee of success.
     *
     * @param list<EsimAvailableAction>|null $availableActions
     *
     * @return self
     */
    public function setAvailableActions(?array $availableActions): self
    {
        $this->initialized['availableActions'] = true;
        $this->availableActions = $availableActions;
        return $this;
    }
    /**
     * Maximum number of concurrent data packages this eSIM can hold, counted across all zones; several packages may share one zone. Enforced when packages are added.
     * 
     *
     * @return int|null
     */
    public function getPackageLimit(): ?int
    {
        return $this->packageLimit;
    }
    /**
     * Maximum number of concurrent data packages this eSIM can hold, counted across all zones; several packages may share one zone. Enforced when packages are added.
     *
     * @param int|null $packageLimit
     *
     * @return self
     */
    public function setPackageLimit(?int $packageLimit): self
    {
        $this->initialized['packageLimit'] = true;
        $this->packageLimit = $packageLimit;
        return $this;
    }
    /**
     * Whether daily usage history is supported for this eSIM. The daily usage endpoint is currently unavailable; read package balances for reported consumption.
     *
     * @return bool|null
     */
    public function getUsageAvailable(): ?bool
    {
        return $this->usageAvailable;
    }
    /**
     * Whether daily usage history is supported for this eSIM. The daily usage endpoint is currently unavailable; read package balances for reported consumption.
     *
     * @param bool|null $usageAvailable
     *
     * @return self
     */
    public function setUsageAvailable(?bool $usageAvailable): self
    {
        $this->initialized['usageAvailable'] = true;
        $this->usageAvailable = $usageAvailable;
        return $this;
    }
    /**
     * Whether ongoing package consumption reporting is available. Separate from daily usage history. Null package consumption values mean no measurement is available.
     *
     * @return string|null
     */
    public function getBalanceReporting(): ?string
    {
        return $this->balanceReporting;
    }
    /**
     * Whether ongoing package consumption reporting is available. Separate from daily usage history. Null package consumption values mean no measurement is available.
     *
     * @param string|null $balanceReporting
     *
     * @return self
     */
    public function setBalanceReporting(?string $balanceReporting): self
    {
        $this->initialized['balanceReporting'] = true;
        $this->balanceReporting = $balanceReporting;
        return $this;
    }
    /**
     * Activate (first network use) before this moment or the eSIM expires. Null once activated.
     *
     * @return \DateTime|null
     */
    public function getReadyUntil(): ?\DateTime
    {
        return $this->readyUntil;
    }
    /**
     * Activate (first network use) before this moment or the eSIM expires. Null once activated.
     *
     * @param \DateTime|null $readyUntil
     *
     * @return self
     */
    public function setReadyUntil(?\DateTime $readyUntil): self
    {
        $this->initialized['readyUntil'] = true;
        $this->readyUntil = $readyUntil;
        return $this;
    }
    /**
     * When the eSIM first used a mobile network. Null until then.
     *
     * @return \DateTime|null
     */
    public function getActivatedAt(): ?\DateTime
    {
        return $this->activatedAt;
    }
    /**
     * When the eSIM first used a mobile network. Null until then.
     *
     * @param \DateTime|null $activatedAt
     *
     * @return self
     */
    public function setActivatedAt(?\DateTime $activatedAt): self
    {
        $this->initialized['activatedAt'] = true;
        $this->activatedAt = $activatedAt;
        return $this;
    }
    /**
     * When the eSIM's service period ends. The period starts at activation and data packages cannot outlive it. Null until activated.
     * 
     *
     * @return \DateTime|null
     */
    public function getActiveUntil(): ?\DateTime
    {
        return $this->activeUntil;
    }
    /**
     * When the eSIM's service period ends. The period starts at activation and data packages cannot outlive it. Null until activated.
     *
     * @param \DateTime|null $activeUntil
     *
     * @return self
     */
    public function setActiveUntil(?\DateTime $activeUntil): self
    {
        $this->initialized['activeUntil'] = true;
        $this->activeUntil = $activeUntil;
        return $this;
    }
    /**
     * Most recent network attachment, or null before first attach.
     *
     * @return EsimLastAttachment|null
     */
    public function getLastAttachment(): ?EsimLastAttachment
    {
        return $this->lastAttachment;
    }
    /**
     * Most recent network attachment, or null before first attach.
     *
     * @param EsimLastAttachment|null $lastAttachment
     *
     * @return self
     */
    public function setLastAttachment(?EsimLastAttachment $lastAttachment): self
    {
        $this->initialized['lastAttachment'] = true;
        $this->lastAttachment = $lastAttachment;
        return $this;
    }
    /**
     * Tags for routing, filtering, and stats grouping, echoed on webhook events for the eSIM.
     *
     * @return list<Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    /**
     * Tags for routing, filtering, and stats grouping, echoed on webhook events for the eSIM.
     *
     * @param list<Tag>|null $tags
     *
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;
        return $this;
    }
    /**
     * Your own key-value data, echoed on webhook events for the eSIM. Maximum 2 KB serialized.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Your own key-value data, echoed on webhook events for the eSIM. Maximum 2 KB serialized.
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
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
