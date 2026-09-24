<?php

namespace MessageBird\Wire\Model;

class VoiceNumber
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
    protected $id;
    /**
     * The phone number in E.164 format.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * Country the number belongs to. Null when the number is not geographic or its country cannot be determined.
     * 
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Your own label for this number, to tell several apart. Null when it has none. Only you see it, so it never affects what a caller sees.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Where this number came from, and the facts that belong to that answer. The type selects the shape. `allocation` is a number we allocated to your workspace, and it carries that allocation's identifier. `verified_number` is a number from another carrier, and it carries how far proving control of it has got.
     * 
     *
     * @var mixed|null
     */
    protected $provider;
    /**
     * @var VoiceNumberDirections|null
     */
    protected $directions;
    /**
     * @var VoiceInboundConfiguration|null
     */
    protected $inboundConfiguration;
    /**
     * When this number became usable for voice: when it was allocated to you, or when you first registered it, whichever this number is.
     * 
     *
     * @var \DateTime|null
     */
    protected $createdAt;
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
     * The phone number in E.164 format.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The phone number in E.164 format.
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
     * Country the number belongs to. Null when the number is not geographic or its country cannot be determined.
     * 
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * Country the number belongs to. Null when the number is not geographic or its country cannot be determined.
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
     * Your own label for this number, to tell several apart. Null when it has none. Only you see it, so it never affects what a caller sees.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Your own label for this number, to tell several apart. Null when it has none. Only you see it, so it never affects what a caller sees.
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
    /**
     * Where this number came from, and the facts that belong to that answer. The type selects the shape. `allocation` is a number we allocated to your workspace, and it carries that allocation's identifier. `verified_number` is a number from another carrier, and it carries how far proving control of it has got.
     * 
     *
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }
    /**
     * Where this number came from, and the facts that belong to that answer. The type selects the shape. `allocation` is a number we allocated to your workspace, and it carries that allocation's identifier. `verified_number` is a number from another carrier, and it carries how far proving control of it has got.
     *
     * @param mixed $provider
     *
     * @return self
     */
    public function setProvider($provider): self
    {
        $this->initialized['provider'] = true;
        $this->provider = $provider;
        return $this;
    }
    /**
     * @return VoiceNumberDirections|null
     */
    public function getDirections(): ?VoiceNumberDirections
    {
        return $this->directions;
    }
    /**
     * @param VoiceNumberDirections|null $directions
     *
     * @return self
     */
    public function setDirections(?VoiceNumberDirections $directions): self
    {
        $this->initialized['directions'] = true;
        $this->directions = $directions;
        return $this;
    }
    /**
     * @return VoiceInboundConfiguration|null
     */
    public function getInboundConfiguration(): ?VoiceInboundConfiguration
    {
        return $this->inboundConfiguration;
    }
    /**
     * @param VoiceInboundConfiguration|null $inboundConfiguration
     *
     * @return self
     */
    public function setInboundConfiguration(?VoiceInboundConfiguration $inboundConfiguration): self
    {
        $this->initialized['inboundConfiguration'] = true;
        $this->inboundConfiguration = $inboundConfiguration;
        return $this;
    }
    /**
     * When this number became usable for voice: when it was allocated to you, or when you first registered it, whichever this number is.
     * 
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When this number became usable for voice: when it was allocated to you, or when you first registered it, whichever this number is.
     *
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
}
