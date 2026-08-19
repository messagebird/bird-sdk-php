<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupRequest
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
     * The phone number to look up, in international format: the country calling code, then the national number. The leading `+` is optional, and `00` works in its place, so `+31612345678`, `31612345678` and `0031612345678` are all the same number. A number written for dialling inside one country, with no country code, is rejected rather than guessed at.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Properties to add to the base lookup. Omit this field or send an empty
     * array to request only the base lookup.
     * 
     * Each delivered property is billed in addition to the base lookup. A
     * property that could not be answered is returned with its status and is
     * not billed.
     * 
     *
     * @var list<string>|null
     */
    protected $type;
    /**
     * The phone number to look up, in international format: the country calling code, then the national number. The leading `+` is optional, and `00` works in its place, so `+31612345678`, `31612345678` and `0031612345678` are all the same number. A number written for dialling inside one country, with no country code, is rejected rather than guessed at.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The phone number to look up, in international format: the country calling code, then the national number. The leading `+` is optional, and `00` works in its place, so `+31612345678`, `31612345678` and `0031612345678` are all the same number. A number written for dialling inside one country, with no country code, is rejected rather than guessed at.
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
     * Properties to add to the base lookup. Omit this field or send an empty
     * array to request only the base lookup.
     * 
     * Each delivered property is billed in addition to the base lookup. A
     * property that could not be answered is returned with its status and is
     * not billed.
     * 
     *
     * @return list<string>|null
     */
    public function getType(): ?array
    {
        return $this->type;
    }
    /**
    * Properties to add to the base lookup. Omit this field or send an empty
    array to request only the base lookup.
    
    Each delivered property is billed in addition to the base lookup. A
    property that could not be answered is returned with its status and is
    not billed.
    
    *
    * @param list<string>|null $type
    *
    * @return self
    */
    public function setType(?array $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
