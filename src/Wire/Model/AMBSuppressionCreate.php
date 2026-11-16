<?php

namespace MessageBird\Wire\Model;

/**
 * Stops messages to one address, for one business account or for every account in the workspace.
 */
class AMBSuppressionCreate
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
    protected $businessAccountId;
    /**
     * The customer to stop messaging: a phone number in E.164 format with a leading plus sign, or the exact opaque identifier Apple supplied. `address_type` says which.
     * 
     *
     * @var string|null
     */
    protected $address;
    /**
     * What kind of value `address` holds.
     * 
     * - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
     * - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
     * 
     *
     * @var string|null
     */
    protected $addressType;
    /**
     * @return string|null
     */
    public function getBusinessAccountId(): ?string
    {
        return $this->businessAccountId;
    }
    /**
     * @param string|null $businessAccountId
     *
     * @return self
     */
    public function setBusinessAccountId(?string $businessAccountId): self
    {
        $this->initialized['businessAccountId'] = true;
        $this->businessAccountId = $businessAccountId;
        return $this;
    }
    /**
     * The customer to stop messaging: a phone number in E.164 format with a leading plus sign, or the exact opaque identifier Apple supplied. `address_type` says which.
     * 
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * The customer to stop messaging: a phone number in E.164 format with a leading plus sign, or the exact opaque identifier Apple supplied. `address_type` says which.
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * What kind of value `address` holds.
     * 
     * - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
     * - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
     * 
     *
     * @return string|null
     */
    public function getAddressType(): ?string
    {
        return $this->addressType;
    }
    /**
    * What kind of value `address` holds.
    
    - `phone_number` means `address` is the customer's phone number. Apple's CloseSession event carries a phone number rather than an opaque identifier, so a suppression opened by a close on a conversation identified by phone number takes this kind.
    - `opaque_user_id` means `address` is the opaque identifier Apple assigns to the customer's conversation with the business, stable across a close and a later re-initiation.
    
    *
    * @param string|null $addressType
    *
    * @return self
    */
    public function setAddressType(?string $addressType): self
    {
        $this->initialized['addressType'] = true;
        $this->addressType = $addressType;
        return $this;
    }
}
