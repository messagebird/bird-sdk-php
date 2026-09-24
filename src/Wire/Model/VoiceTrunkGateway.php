<?php

namespace MessageBird\Wire\Model;

class VoiceTrunkGateway extends \ArrayObject
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
     * @var string|null
     */
    protected $trunkId;
    /**
     * SIP URI an inbound call to this trunk is forwarded to. The host only: which number is dialed at that host comes from `destination_format`, because it changes with every call.
     * 
     *
     * @var string|null
     */
    protected $sipUri;
    /**
     * The order gateways are tried in, lowest first. Gateways sharing a priority take an equal share of calls, and any of them may be tried first on a given call.
     * 
     *
     * @var int|null
     */
    protected $priority;
    /**
     * How the calling number is spelled to this gateway, as a template whose
     * `{number}` stands for the number without its leading `+`. It is stated
     * in the `P-Asserted-Identity` header of the delivered call.
     * 
     * A gateway that has not asked for anything else reports `+{number}`,
     * which is E.164. A format with no `{number}` states that same identity on
     * every call, whoever called.
     * 
     *
     * @var string|null
     */
    protected $originationFormat;
    /**
     * How this gateway formats the dialed number. In the template,
     * `{number}` represents the number without its leading `+`. The result
     * is placed before the `sip_uri` host. For example, `1234#{number}`
     * formats `+31201234567` as
     * `sip:1234#31201234567@pbx.example.com:5060`.
     * 
     * A gateway that has not asked for anything else reports `+{number}`,
     * which is E.164. A format with no `{number}` is dialed as it stands, so
     * every number the trunk answers reaches that one number.
     * 
     *
     * @var string|null
     */
    protected $destinationFormat;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
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
    public function getTrunkId(): ?string
    {
        return $this->trunkId;
    }
    /**
     * @param string|null $trunkId
     *
     * @return self
     */
    public function setTrunkId(?string $trunkId): self
    {
        $this->initialized['trunkId'] = true;
        $this->trunkId = $trunkId;
        return $this;
    }
    /**
     * SIP URI an inbound call to this trunk is forwarded to. The host only: which number is dialed at that host comes from `destination_format`, because it changes with every call.
     * 
     *
     * @return string|null
     */
    public function getSipUri(): ?string
    {
        return $this->sipUri;
    }
    /**
     * SIP URI an inbound call to this trunk is forwarded to. The host only: which number is dialed at that host comes from `destination_format`, because it changes with every call.
     *
     * @param string|null $sipUri
     *
     * @return self
     */
    public function setSipUri(?string $sipUri): self
    {
        $this->initialized['sipUri'] = true;
        $this->sipUri = $sipUri;
        return $this;
    }
    /**
     * The order gateways are tried in, lowest first. Gateways sharing a priority take an equal share of calls, and any of them may be tried first on a given call.
     * 
     *
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }
    /**
     * The order gateways are tried in, lowest first. Gateways sharing a priority take an equal share of calls, and any of them may be tried first on a given call.
     *
     * @param int|null $priority
     *
     * @return self
     */
    public function setPriority(?int $priority): self
    {
        $this->initialized['priority'] = true;
        $this->priority = $priority;
        return $this;
    }
    /**
     * How the calling number is spelled to this gateway, as a template whose
     * `{number}` stands for the number without its leading `+`. It is stated
     * in the `P-Asserted-Identity` header of the delivered call.
     * 
     * A gateway that has not asked for anything else reports `+{number}`,
     * which is E.164. A format with no `{number}` states that same identity on
     * every call, whoever called.
     * 
     *
     * @return string|null
     */
    public function getOriginationFormat(): ?string
    {
        return $this->originationFormat;
    }
    /**
    * How the calling number is spelled to this gateway, as a template whose
    `{number}` stands for the number without its leading `+`. It is stated
    in the `P-Asserted-Identity` header of the delivered call.
    
    A gateway that has not asked for anything else reports `+{number}`,
    which is E.164. A format with no `{number}` states that same identity on
    every call, whoever called.
    
    *
    * @param string|null $originationFormat
    *
    * @return self
    */
    public function setOriginationFormat(?string $originationFormat): self
    {
        $this->initialized['originationFormat'] = true;
        $this->originationFormat = $originationFormat;
        return $this;
    }
    /**
     * How this gateway formats the dialed number. In the template,
     * `{number}` represents the number without its leading `+`. The result
     * is placed before the `sip_uri` host. For example, `1234#{number}`
     * formats `+31201234567` as
     * `sip:1234#31201234567@pbx.example.com:5060`.
     * 
     * A gateway that has not asked for anything else reports `+{number}`,
     * which is E.164. A format with no `{number}` is dialed as it stands, so
     * every number the trunk answers reaches that one number.
     * 
     *
     * @return string|null
     */
    public function getDestinationFormat(): ?string
    {
        return $this->destinationFormat;
    }
    /**
    * How this gateway formats the dialed number. In the template,
    `{number}` represents the number without its leading `+`. The result
    is placed before the `sip_uri` host. For example, `1234#{number}`
    formats `+31201234567` as
    `sip:1234#31201234567@pbx.example.com:5060`.
    
    A gateway that has not asked for anything else reports `+{number}`,
    which is E.164. A format with no `{number}` is dialed as it stands, so
    every number the trunk answers reaches that one number.
    
    *
    * @param string|null $destinationFormat
    *
    * @return self
    */
    public function setDestinationFormat(?string $destinationFormat): self
    {
        $this->initialized['destinationFormat'] = true;
        $this->destinationFormat = $destinationFormat;
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
