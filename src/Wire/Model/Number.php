<?php

namespace MessageBird\Wire\Model;

class Number
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
     * Identifier of this allocated number. Pass it as `number_id` to read this number, or to release it when kind is dedicated.
     *
     * @var string|null
     */
    protected $id;
    /**
     * How this number is allocated. `dedicated` is allocated to this workspace alone and billed as a subscription. `shared` is a shortcode allocated to several workspaces at once and managed by us.
     *
     * @var string|null
     */
    protected $kind;
    /**
     * Phone number in E.164 format.
     *
     * @var string|null
     */
    protected $number;
    /**
     * @var string|null
     */
    protected $countryCode;
    /**
     * Physical type of this phone number.
     *
     * @var string|null
     */
    protected $numberType;
    /**
     * Capabilities supported by this number.
     *
     * @var list<string>|null
     */
    protected $capabilities;
    /**
     * Whether this number can carry traffic.
     * 
     * - `active` means this number is allocated to your workspace and usable.
     * - `pending_compliance` means this number is allocated to your workspace and billed,
     *   but it cannot carry traffic until the ownership paperwork its country requires is
     *   accepted. Read `ownership.next` for what advances it, and re-read later if
     *   `ownership` is momentarily `null`.
     * - `released` means this number is no longer allocated to your workspace.
     * 
     * An allocated number is not always enough to send from it: some destination
     * countries also require an approved registration for the sender.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When this number was allocated to your workspace.
     *
     * @var \DateTime|null
     */
    protected $allocatedAt;
    /**
     * When this number was released. `null` while it is still allocated to your workspace.
     *
     * @var \DateTime|null
     */
    protected $releasedAt;
    /**
     * Where this number stands with the ownership paperwork its country requires. `null` when the country requires none, which is the usual case: a number with no `ownership` object is usable as soon as it is allocated. Also `null` when that standing cannot be established right now; `status` still reads `pending_compliance` while the number is blocked, so re-read this field rather than caching its absence. We manage the paperwork for shared short codes, so this field is always `null` for them.
     * 
     *
     * @var NumberOwnership|null
     */
    protected $ownership;
    /**
     * Identifier of this allocated number. Pass it as `number_id` to read this number, or to release it when kind is dedicated.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Identifier of this allocated number. Pass it as `number_id` to read this number, or to release it when kind is dedicated.
     *
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
     * How this number is allocated. `dedicated` is allocated to this workspace alone and billed as a subscription. `shared` is a shortcode allocated to several workspaces at once and managed by us.
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
     * How this number is allocated. `dedicated` is allocated to this workspace alone and billed as a subscription. `shared` is a shortcode allocated to several workspaces at once and managed by us.
     *
     * @param string|null $kind
     *
     * @return self
     */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
    /**
     * Phone number in E.164 format.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    /**
     * Phone number in E.164 format.
     *
     * @param string|null $number
     *
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Physical type of this phone number.
     *
     * @return string|null
     */
    public function getNumberType(): ?string
    {
        return $this->numberType;
    }
    /**
     * Physical type of this phone number.
     *
     * @param string|null $numberType
     *
     * @return self
     */
    public function setNumberType(?string $numberType): self
    {
        $this->initialized['numberType'] = true;
        $this->numberType = $numberType;
        return $this;
    }
    /**
     * Capabilities supported by this number.
     *
     * @return list<string>|null
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }
    /**
     * Capabilities supported by this number.
     *
     * @param list<string>|null $capabilities
     *
     * @return self
     */
    public function setCapabilities(?array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;
        return $this;
    }
    /**
     * Whether this number can carry traffic.
     * 
     * - `active` means this number is allocated to your workspace and usable.
     * - `pending_compliance` means this number is allocated to your workspace and billed,
     *   but it cannot carry traffic until the ownership paperwork its country requires is
     *   accepted. Read `ownership.next` for what advances it, and re-read later if
     *   `ownership` is momentarily `null`.
     * - `released` means this number is no longer allocated to your workspace.
     * 
     * An allocated number is not always enough to send from it: some destination
     * countries also require an approved registration for the sender.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether this number can carry traffic.
    
    - `active` means this number is allocated to your workspace and usable.
    - `pending_compliance` means this number is allocated to your workspace and billed,
     but it cannot carry traffic until the ownership paperwork its country requires is
     accepted. Read `ownership.next` for what advances it, and re-read later if
     `ownership` is momentarily `null`.
    - `released` means this number is no longer allocated to your workspace.
    
    An allocated number is not always enough to send from it: some destination
    countries also require an approved registration for the sender.
    
    *
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
     * When this number was allocated to your workspace.
     *
     * @return \DateTime|null
     */
    public function getAllocatedAt(): ?\DateTime
    {
        return $this->allocatedAt;
    }
    /**
     * When this number was allocated to your workspace.
     *
     * @param \DateTime|null $allocatedAt
     *
     * @return self
     */
    public function setAllocatedAt(?\DateTime $allocatedAt): self
    {
        $this->initialized['allocatedAt'] = true;
        $this->allocatedAt = $allocatedAt;
        return $this;
    }
    /**
     * When this number was released. `null` while it is still allocated to your workspace.
     *
     * @return \DateTime|null
     */
    public function getReleasedAt(): ?\DateTime
    {
        return $this->releasedAt;
    }
    /**
     * When this number was released. `null` while it is still allocated to your workspace.
     *
     * @param \DateTime|null $releasedAt
     *
     * @return self
     */
    public function setReleasedAt(?\DateTime $releasedAt): self
    {
        $this->initialized['releasedAt'] = true;
        $this->releasedAt = $releasedAt;
        return $this;
    }
    /**
     * Where this number stands with the ownership paperwork its country requires. `null` when the country requires none, which is the usual case: a number with no `ownership` object is usable as soon as it is allocated. Also `null` when that standing cannot be established right now; `status` still reads `pending_compliance` while the number is blocked, so re-read this field rather than caching its absence. We manage the paperwork for shared short codes, so this field is always `null` for them.
     * 
     *
     * @return NumberOwnership|null
     */
    public function getOwnership(): ?NumberOwnership
    {
        return $this->ownership;
    }
    /**
     * Where this number stands with the ownership paperwork its country requires. `null` when the country requires none, which is the usual case: a number with no `ownership` object is usable as soon as it is allocated. Also `null` when that standing cannot be established right now; `status` still reads `pending_compliance` while the number is blocked, so re-read this field rather than caching its absence. We manage the paperwork for shared short codes, so this field is always `null` for them.
     *
     * @param NumberOwnership|null $ownership
     *
     * @return self
     */
    public function setOwnership(?NumberOwnership $ownership): self
    {
        $this->initialized['ownership'] = true;
        $this->ownership = $ownership;
        return $this;
    }
}
