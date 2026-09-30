<?php

namespace MessageBird\Wire\Model;

class VoiceVerifiedNumberCreate
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
     * The phone number to register as an outbound caller ID, in E.164 format (a leading `+` followed by the country code and national number). Must be unique within the workspace. Creating the verified number starts verification: a verification call is placed to this number.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Your label for this verified number, to tell several registered numbers apart. Omit it to register the number without one and add it later. It is yours to choose and appears nowhere on a call, so it never affects what the person you are calling sees.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The phone number to register as an outbound caller ID, in E.164 format (a leading `+` followed by the country code and national number). Must be unique within the workspace. Creating the verified number starts verification: a verification call is placed to this number.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The phone number to register as an outbound caller ID, in E.164 format (a leading `+` followed by the country code and national number). Must be unique within the workspace. Creating the verified number starts verification: a verification call is placed to this number.
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
     * Your label for this verified number, to tell several registered numbers apart. Omit it to register the number without one and add it later. It is yours to choose and appears nowhere on a call, so it never affects what the person you are calling sees.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your label for this verified number, to tell several registered numbers apart. Omit it to register the number without one and add it later. It is yours to choose and appears nowhere on a call, so it never affects what the person you are calling sees.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
}
