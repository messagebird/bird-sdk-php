<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookup
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
     * The number that was looked up, in E.164 format.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The ISO 3166-1 alpha-2 country of the number. Absent when the number belongs to no single country, as a non-geographic range does.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * The network that serves the number today. Absent when no network could be identified.
     *
     * @var PhoneNumberLookupNetworkInfo|null
     */
    protected $networkInfo;
    /**
     * The network that issued the number's range. It differs from `network_info` when the number has been ported. Absent when the issuing network could not be identified.
     *
     * @var PhoneNumberLookupOriginalNetworkInfo|null
     */
    protected $originalNetworkInfo;
    /**
     * Notable characteristics of the number. Empty when none apply.
     *
     * @var list<string>|null
     */
    protected $flags;
    /**
     * @var string|null
     */
    protected $lineType;
    /**
     * The allocated service of the number's range. Absent unless you requested the `classification` property.
     *
     * @var PhoneNumberLookupClassification|null
     */
    protected $classification;
    /**
     * Whether the number is live on its network. Absent unless you requested the `presence` property.
     *
     * @var PhoneNumberLookupPresence|null
     */
    protected $presence;
    /**
     * Whether the number is roaming. Absent unless you requested the `roaming` property.
     *
     * @var PhoneNumberLookupRoaming|null
     */
    protected $roaming;
    /**
     * When the number's SIM last changed. Absent unless you requested the `sim_swap` property.
     *
     * @var PhoneNumberLookupSimSwap|null
     */
    protected $simSwap;
    /**
     * The number's porting record. Absent unless you requested the `porting` property.
     *
     * @var PhoneNumberLookupPorting|null
     */
    protected $porting;
    /**
     * The number's credibility score. Absent unless you requested the `score` property.
     *
     * @var PhoneNumberLookupScore|null
     */
    protected $score;
    /**
     * The number that was looked up, in E.164 format.
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * The number that was looked up, in E.164 format.
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
     * The ISO 3166-1 alpha-2 country of the number. Absent when the number belongs to no single country, as a non-geographic range does.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * The ISO 3166-1 alpha-2 country of the number. Absent when the number belongs to no single country, as a non-geographic range does.
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
     * The network that serves the number today. Absent when no network could be identified.
     *
     * @return PhoneNumberLookupNetworkInfo|null
     */
    public function getNetworkInfo(): ?PhoneNumberLookupNetworkInfo
    {
        return $this->networkInfo;
    }
    /**
     * The network that serves the number today. Absent when no network could be identified.
     *
     * @param PhoneNumberLookupNetworkInfo|null $networkInfo
     *
     * @return self
     */
    public function setNetworkInfo(?PhoneNumberLookupNetworkInfo $networkInfo): self
    {
        $this->initialized['networkInfo'] = true;
        $this->networkInfo = $networkInfo;
        return $this;
    }
    /**
     * The network that issued the number's range. It differs from `network_info` when the number has been ported. Absent when the issuing network could not be identified.
     *
     * @return PhoneNumberLookupOriginalNetworkInfo|null
     */
    public function getOriginalNetworkInfo(): ?PhoneNumberLookupOriginalNetworkInfo
    {
        return $this->originalNetworkInfo;
    }
    /**
     * The network that issued the number's range. It differs from `network_info` when the number has been ported. Absent when the issuing network could not be identified.
     *
     * @param PhoneNumberLookupOriginalNetworkInfo|null $originalNetworkInfo
     *
     * @return self
     */
    public function setOriginalNetworkInfo(?PhoneNumberLookupOriginalNetworkInfo $originalNetworkInfo): self
    {
        $this->initialized['originalNetworkInfo'] = true;
        $this->originalNetworkInfo = $originalNetworkInfo;
        return $this;
    }
    /**
     * Notable characteristics of the number. Empty when none apply.
     *
     * @return list<string>|null
     */
    public function getFlags(): ?array
    {
        return $this->flags;
    }
    /**
     * Notable characteristics of the number. Empty when none apply.
     *
     * @param list<string>|null $flags
     *
     * @return self
     */
    public function setFlags(?array $flags): self
    {
        $this->initialized['flags'] = true;
        $this->flags = $flags;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getLineType(): ?string
    {
        return $this->lineType;
    }
    /**
     * @param string|null $lineType
     *
     * @return self
     */
    public function setLineType(?string $lineType): self
    {
        $this->initialized['lineType'] = true;
        $this->lineType = $lineType;
        return $this;
    }
    /**
     * The allocated service of the number's range. Absent unless you requested the `classification` property.
     *
     * @return PhoneNumberLookupClassification|null
     */
    public function getClassification(): ?PhoneNumberLookupClassification
    {
        return $this->classification;
    }
    /**
     * The allocated service of the number's range. Absent unless you requested the `classification` property.
     *
     * @param PhoneNumberLookupClassification|null $classification
     *
     * @return self
     */
    public function setClassification(?PhoneNumberLookupClassification $classification): self
    {
        $this->initialized['classification'] = true;
        $this->classification = $classification;
        return $this;
    }
    /**
     * Whether the number is live on its network. Absent unless you requested the `presence` property.
     *
     * @return PhoneNumberLookupPresence|null
     */
    public function getPresence(): ?PhoneNumberLookupPresence
    {
        return $this->presence;
    }
    /**
     * Whether the number is live on its network. Absent unless you requested the `presence` property.
     *
     * @param PhoneNumberLookupPresence|null $presence
     *
     * @return self
     */
    public function setPresence(?PhoneNumberLookupPresence $presence): self
    {
        $this->initialized['presence'] = true;
        $this->presence = $presence;
        return $this;
    }
    /**
     * Whether the number is roaming. Absent unless you requested the `roaming` property.
     *
     * @return PhoneNumberLookupRoaming|null
     */
    public function getRoaming(): ?PhoneNumberLookupRoaming
    {
        return $this->roaming;
    }
    /**
     * Whether the number is roaming. Absent unless you requested the `roaming` property.
     *
     * @param PhoneNumberLookupRoaming|null $roaming
     *
     * @return self
     */
    public function setRoaming(?PhoneNumberLookupRoaming $roaming): self
    {
        $this->initialized['roaming'] = true;
        $this->roaming = $roaming;
        return $this;
    }
    /**
     * When the number's SIM last changed. Absent unless you requested the `sim_swap` property.
     *
     * @return PhoneNumberLookupSimSwap|null
     */
    public function getSimSwap(): ?PhoneNumberLookupSimSwap
    {
        return $this->simSwap;
    }
    /**
     * When the number's SIM last changed. Absent unless you requested the `sim_swap` property.
     *
     * @param PhoneNumberLookupSimSwap|null $simSwap
     *
     * @return self
     */
    public function setSimSwap(?PhoneNumberLookupSimSwap $simSwap): self
    {
        $this->initialized['simSwap'] = true;
        $this->simSwap = $simSwap;
        return $this;
    }
    /**
     * The number's porting record. Absent unless you requested the `porting` property.
     *
     * @return PhoneNumberLookupPorting|null
     */
    public function getPorting(): ?PhoneNumberLookupPorting
    {
        return $this->porting;
    }
    /**
     * The number's porting record. Absent unless you requested the `porting` property.
     *
     * @param PhoneNumberLookupPorting|null $porting
     *
     * @return self
     */
    public function setPorting(?PhoneNumberLookupPorting $porting): self
    {
        $this->initialized['porting'] = true;
        $this->porting = $porting;
        return $this;
    }
    /**
     * The number's credibility score. Absent unless you requested the `score` property.
     *
     * @return PhoneNumberLookupScore|null
     */
    public function getScore(): ?PhoneNumberLookupScore
    {
        return $this->score;
    }
    /**
     * The number's credibility score. Absent unless you requested the `score` property.
     *
     * @param PhoneNumberLookupScore|null $score
     *
     * @return self
     */
    public function setScore(?PhoneNumberLookupScore $score): self
    {
        $this->initialized['score'] = true;
        $this->score = $score;
        return $this;
    }
}
