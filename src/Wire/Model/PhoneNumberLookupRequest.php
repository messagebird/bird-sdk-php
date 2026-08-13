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
     * The phone number to look up, in E.164 format, which is a leading `+`, the country calling code, then the national number.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The paid properties to enrich the answer with. Omit it, or send an empty array, to get the free baseline and make no vendor call.
     * 
     * Each delivered property is billed on top of the lookup itself. A property that could not be answered is reported in `properties` and is not billed.
     * 
     *
     * @var list<string>|null
     */
    protected $type;
    /**
     * The phone number to look up, in E.164 format, which is a leading `+`, the country calling code, then the national number.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The phone number to look up, in E.164 format, which is a leading `+`, the country calling code, then the national number.
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
     * The paid properties to enrich the answer with. Omit it, or send an empty array, to get the free baseline and make no vendor call.
     * 
     * Each delivered property is billed on top of the lookup itself. A property that could not be answered is reported in `properties` and is not billed.
     * 
     *
     * @return list<string>|null
     */
    public function getType(): ?array
    {
        return $this->type;
    }
    /**
    * The paid properties to enrich the answer with. Omit it, or send an empty array, to get the free baseline and make no vendor call.
    
    Each delivered property is billed on top of the lookup itself. A property that could not be answered is reported in `properties` and is not billed.
    
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
