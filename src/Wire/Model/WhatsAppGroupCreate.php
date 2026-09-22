<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupCreate
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
     * The business number that will own and administer the group, as its id in `GET /v1/whatsapp/numbers`. It must be a number your workspace can send from, and WhatsApp must have granted it Official Business Account status; a number without that status returns a `412` `WhatsAppGroupsNotEligible`. The number cannot be changed afterwards, and every message to the group is sent from it.
     * 
     *
     * @var string|null
     */
    protected $whatsappNumberId;
    /**
     * The group's name, shown to participants and to anyone who opens the invite link. Surrounding whitespace is trimmed.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The group's description, shown alongside the subject.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Whether opening the invite link joins the group outright, or raises a join request for you to approve. Defaults to `auto_approve`. It cannot be changed once the group exists.
     * 
     *
     * @var string|null
     */
    protected $joinApprovalMode;
    /**
     * The business number that will own and administer the group, as its id in `GET /v1/whatsapp/numbers`. It must be a number your workspace can send from, and WhatsApp must have granted it Official Business Account status; a number without that status returns a `412` `WhatsAppGroupsNotEligible`. The number cannot be changed afterwards, and every message to the group is sent from it.
     * 
     *
     * @return string|null
     */
    public function getWhatsappNumberId(): ?string
    {
        return $this->whatsappNumberId;
    }
    /**
     * The business number that will own and administer the group, as its id in `GET /v1/whatsapp/numbers`. It must be a number your workspace can send from, and WhatsApp must have granted it Official Business Account status; a number without that status returns a `412` `WhatsAppGroupsNotEligible`. The number cannot be changed afterwards, and every message to the group is sent from it.
     *
     * @param string|null $whatsappNumberId
     *
     * @return self
     */
    public function setWhatsappNumberId(?string $whatsappNumberId): self
    {
        $this->initialized['whatsappNumberId'] = true;
        $this->whatsappNumberId = $whatsappNumberId;
        return $this;
    }
    /**
     * The group's name, shown to participants and to anyone who opens the invite link. Surrounding whitespace is trimmed.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The group's name, shown to participants and to anyone who opens the invite link. Surrounding whitespace is trimmed.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * The group's description, shown alongside the subject.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The group's description, shown alongside the subject.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Whether opening the invite link joins the group outright, or raises a join request for you to approve. Defaults to `auto_approve`. It cannot be changed once the group exists.
     * 
     *
     * @return string|null
     */
    public function getJoinApprovalMode(): ?string
    {
        return $this->joinApprovalMode;
    }
    /**
     * Whether opening the invite link joins the group outright, or raises a join request for you to approve. Defaults to `auto_approve`. It cannot be changed once the group exists.
     *
     * @param string|null $joinApprovalMode
     *
     * @return self
     */
    public function setJoinApprovalMode(?string $joinApprovalMode): self
    {
        $this->initialized['joinApprovalMode'] = true;
        $this->joinApprovalMode = $joinApprovalMode;
        return $this;
    }
}
