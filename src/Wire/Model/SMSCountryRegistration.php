<?php

namespace MessageBird\Wire\Model;

class SMSCountryRegistration
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
    protected $countryCode;
    /**
     * Current registration policy for this destination and sender type. Omitted if the policy or sender is no longer available.
     *
     * @var string|null
     */
    protected $registrationMode;
    /**
     * Expected sender ID behavior for this registration's message categories. Optional registration preserves the sender ID once approved. Required registration can still use an overwritten sender ID after approval. Omitted if the policy or sender is no longer available.
     * 
     *
     * @var string|null
     */
    protected $senderIdBehavior;
    /**
     * The registration program behind this row. Null for a country that required none, which is the state a row records rather than a program called "none".
     * 
     *
     * @var string|null
     */
    protected $program;
    /**
     * Message category this registration is approved for. Null means the registration is unrestricted and admits any category.
     * 
     *
     * @var string|null
     */
    protected $category;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * The program artifact that decided this registration, null where none produced it. Which resource it names follows from `program`, and its id prefix tells you too: a toll-free verification for `tfn`, or a campaign number link for `10dlc`. The link connects this number to its campaign. Get the campaign from [Get a 10DLC campaign number link](/docs/api/reference/get-tcr-campaign-number-link). Worth following when the status is `under_review`, because that value covers both the carrier still reviewing and the carrier waiting on more information from you, and only the program's own resource tells those apart.
     * 
     *
     * @var string|null
     */
    protected $programRef;
    /**
     * Reason the registration was rejected, shown when the status is `rejected`. Null for registrations that were never rejected.
     * 
     *
     * @var string|null
     */
    protected $rejectionReason;
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
     * Current registration policy for this destination and sender type. Omitted if the policy or sender is no longer available.
     *
     * @return string|null
     */
    public function getRegistrationMode(): ?string
    {
        return $this->registrationMode;
    }
    /**
     * Current registration policy for this destination and sender type. Omitted if the policy or sender is no longer available.
     *
     * @param string|null $registrationMode
     *
     * @return self
     */
    public function setRegistrationMode(?string $registrationMode): self
    {
        $this->initialized['registrationMode'] = true;
        $this->registrationMode = $registrationMode;
        return $this;
    }
    /**
     * Expected sender ID behavior for this registration's message categories. Optional registration preserves the sender ID once approved. Required registration can still use an overwritten sender ID after approval. Omitted if the policy or sender is no longer available.
     * 
     *
     * @return string|null
     */
    public function getSenderIdBehavior(): ?string
    {
        return $this->senderIdBehavior;
    }
    /**
     * Expected sender ID behavior for this registration's message categories. Optional registration preserves the sender ID once approved. Required registration can still use an overwritten sender ID after approval. Omitted if the policy or sender is no longer available.
     *
     * @param string|null $senderIdBehavior
     *
     * @return self
     */
    public function setSenderIdBehavior(?string $senderIdBehavior): self
    {
        $this->initialized['senderIdBehavior'] = true;
        $this->senderIdBehavior = $senderIdBehavior;
        return $this;
    }
    /**
     * The registration program behind this row. Null for a country that required none, which is the state a row records rather than a program called "none".
     * 
     *
     * @return string|null
     */
    public function getProgram(): ?string
    {
        return $this->program;
    }
    /**
     * The registration program behind this row. Null for a country that required none, which is the state a row records rather than a program called "none".
     *
     * @param string|null $program
     *
     * @return self
     */
    public function setProgram(?string $program): self
    {
        $this->initialized['program'] = true;
        $this->program = $program;
        return $this;
    }
    /**
     * Message category this registration is approved for. Null means the registration is unrestricted and admits any category.
     * 
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Message category this registration is approved for. Null means the registration is unrestricted and admits any category.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
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
     * The program artifact that decided this registration, null where none produced it. Which resource it names follows from `program`, and its id prefix tells you too: a toll-free verification for `tfn`, or a campaign number link for `10dlc`. The link connects this number to its campaign. Get the campaign from [Get a 10DLC campaign number link](/docs/api/reference/get-tcr-campaign-number-link). Worth following when the status is `under_review`, because that value covers both the carrier still reviewing and the carrier waiting on more information from you, and only the program's own resource tells those apart.
     * 
     *
     * @return string|null
     */
    public function getProgramRef(): ?string
    {
        return $this->programRef;
    }
    /**
     * The program artifact that decided this registration, null where none produced it. Which resource it names follows from `program`, and its id prefix tells you too: a toll-free verification for `tfn`, or a campaign number link for `10dlc`. The link connects this number to its campaign. Get the campaign from [Get a 10DLC campaign number link](/docs/api/reference/get-tcr-campaign-number-link). Worth following when the status is `under_review`, because that value covers both the carrier still reviewing and the carrier waiting on more information from you, and only the program's own resource tells those apart.
     *
     * @param string|null $programRef
     *
     * @return self
     */
    public function setProgramRef(?string $programRef): self
    {
        $this->initialized['programRef'] = true;
        $this->programRef = $programRef;
        return $this;
    }
    /**
     * Reason the registration was rejected, shown when the status is `rejected`. Null for registrations that were never rejected.
     * 
     *
     * @return string|null
     */
    public function getRejectionReason(): ?string
    {
        return $this->rejectionReason;
    }
    /**
     * Reason the registration was rejected, shown when the status is `rejected`. Null for registrations that were never rejected.
     *
     * @param string|null $rejectionReason
     *
     * @return self
     */
    public function setRejectionReason(?string $rejectionReason): self
    {
        $this->initialized['rejectionReason'] = true;
        $this->rejectionReason = $rejectionReason;
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
