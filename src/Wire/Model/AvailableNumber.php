<?php

namespace MessageBird\Wire\Model;

class AvailableNumber
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
     * Phone number in E.164 format.
     *
     * @var string|null
     */
    protected $number;
    /**
     * ISO 3166-1 alpha-2 country code.
     *
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
     * Whether ownership paperwork must be approved before outbound SMS and voice use. Customer availability accounts for organization exemptions; admin supplier searches report the general country and number-type requirement. You can acquire the number, including Bird stock, and submit paperwork afterward. Any `pricing.setup_price` is charged during purchase, plus any tax. The recurring charge, net of tax `pricing.recurring_price` multiplied by `pricing.intervals_per_charge`, is taken with any tax at assignment and at each renewal, even while approval is pending; assignment may follow completion of a pending supplier order.
     *
     * @var bool|null
     */
    protected $ownershipRegistrationRequired;
    /**
     * Where the carrier requires the business address on this number's ownership registration
     * to be. Present only when the carrier itself registers the number before it carries
     * traffic, as `anywhere` when it restricts no address; omitted otherwise. An address that does not meet the rule
     * is refused after purchase, and only an address that meets it can fix the registration.
     * If the paperwork is not approved by the registration deadline, the number is removed:
     * any setup fee is credited back, and the first recurring charge is not refunded.
     * 
     * - `anywhere`: any business address.
     * - `country`: a business address in the number's country.
     * - `number_area`: a business address inside the number's own area code, for example in
     *   Amsterdam for an Amsterdam (020) number. `ownership_address_area_name` names the area
     *   when it is known.
     * 
     *
     * @var string|null
     */
    protected $ownershipAddressScope;
    /**
     * Name of the area this local number belongs to, for example `Amsterdam`: the area a `number_area` `ownership_address_scope` refers to. Text for display; the address is not checked against it before purchase. Omitted when the number has no `number_area` rule or the area is not known.
     *
     * @var string|null
     */
    protected $ownershipAddressAreaName;
    /**
     * What your organization pays for this number. Omitted on admin supplier searches, which have no organization to price for.
     *
     * @var AvailableNumberPricingWrapper|null
     */
    protected $pricing;
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
     * ISO 3166-1 alpha-2 country code.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * ISO 3166-1 alpha-2 country code.
     *
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
     * Whether ownership paperwork must be approved before outbound SMS and voice use. Customer availability accounts for organization exemptions; admin supplier searches report the general country and number-type requirement. You can acquire the number, including Bird stock, and submit paperwork afterward. Any `pricing.setup_price` is charged during purchase, plus any tax. The recurring charge, net of tax `pricing.recurring_price` multiplied by `pricing.intervals_per_charge`, is taken with any tax at assignment and at each renewal, even while approval is pending; assignment may follow completion of a pending supplier order.
     *
     * @return bool|null
     */
    public function getOwnershipRegistrationRequired(): ?bool
    {
        return $this->ownershipRegistrationRequired;
    }
    /**
     * Whether ownership paperwork must be approved before outbound SMS and voice use. Customer availability accounts for organization exemptions; admin supplier searches report the general country and number-type requirement. You can acquire the number, including Bird stock, and submit paperwork afterward. Any `pricing.setup_price` is charged during purchase, plus any tax. The recurring charge, net of tax `pricing.recurring_price` multiplied by `pricing.intervals_per_charge`, is taken with any tax at assignment and at each renewal, even while approval is pending; assignment may follow completion of a pending supplier order.
     *
     * @param bool|null $ownershipRegistrationRequired
     *
     * @return self
     */
    public function setOwnershipRegistrationRequired(?bool $ownershipRegistrationRequired): self
    {
        $this->initialized['ownershipRegistrationRequired'] = true;
        $this->ownershipRegistrationRequired = $ownershipRegistrationRequired;
        return $this;
    }
    /**
     * Where the carrier requires the business address on this number's ownership registration
     * to be. Present only when the carrier itself registers the number before it carries
     * traffic, as `anywhere` when it restricts no address; omitted otherwise. An address that does not meet the rule
     * is refused after purchase, and only an address that meets it can fix the registration.
     * If the paperwork is not approved by the registration deadline, the number is removed:
     * any setup fee is credited back, and the first recurring charge is not refunded.
     * 
     * - `anywhere`: any business address.
     * - `country`: a business address in the number's country.
     * - `number_area`: a business address inside the number's own area code, for example in
     *   Amsterdam for an Amsterdam (020) number. `ownership_address_area_name` names the area
     *   when it is known.
     * 
     *
     * @return string|null
     */
    public function getOwnershipAddressScope(): ?string
    {
        return $this->ownershipAddressScope;
    }
    /**
    * Where the carrier requires the business address on this number's ownership registration
    to be. Present only when the carrier itself registers the number before it carries
    traffic, as `anywhere` when it restricts no address; omitted otherwise. An address that does not meet the rule
    is refused after purchase, and only an address that meets it can fix the registration.
    If the paperwork is not approved by the registration deadline, the number is removed:
    any setup fee is credited back, and the first recurring charge is not refunded.
    
    - `anywhere`: any business address.
    - `country`: a business address in the number's country.
    - `number_area`: a business address inside the number's own area code, for example in
     Amsterdam for an Amsterdam (020) number. `ownership_address_area_name` names the area
     when it is known.
    
    *
    * @param string|null $ownershipAddressScope
    *
    * @return self
    */
    public function setOwnershipAddressScope(?string $ownershipAddressScope): self
    {
        $this->initialized['ownershipAddressScope'] = true;
        $this->ownershipAddressScope = $ownershipAddressScope;
        return $this;
    }
    /**
     * Name of the area this local number belongs to, for example `Amsterdam`: the area a `number_area` `ownership_address_scope` refers to. Text for display; the address is not checked against it before purchase. Omitted when the number has no `number_area` rule or the area is not known.
     *
     * @return string|null
     */
    public function getOwnershipAddressAreaName(): ?string
    {
        return $this->ownershipAddressAreaName;
    }
    /**
     * Name of the area this local number belongs to, for example `Amsterdam`: the area a `number_area` `ownership_address_scope` refers to. Text for display; the address is not checked against it before purchase. Omitted when the number has no `number_area` rule or the area is not known.
     *
     * @param string|null $ownershipAddressAreaName
     *
     * @return self
     */
    public function setOwnershipAddressAreaName(?string $ownershipAddressAreaName): self
    {
        $this->initialized['ownershipAddressAreaName'] = true;
        $this->ownershipAddressAreaName = $ownershipAddressAreaName;
        return $this;
    }
    /**
     * What your organization pays for this number. Omitted on admin supplier searches, which have no organization to price for.
     *
     * @return AvailableNumberPricingWrapper|null
     */
    public function getPricing(): ?AvailableNumberPricingWrapper
    {
        return $this->pricing;
    }
    /**
     * What your organization pays for this number. Omitted on admin supplier searches, which have no organization to price for.
     *
     * @param AvailableNumberPricingWrapper|AvailableNumberPricing|array|null $pricing
     *
     * @return self
     */
    public function setPricing($pricing): self
    {
        $this->initialized['pricing'] = true;
        $this->pricing = \MessageBird\Core\ModelWrapper::normalize($pricing, AvailableNumberPricingWrapper::class);
        return $this;
    }
}
