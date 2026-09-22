<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroup extends \ArrayObject
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
     * Unique identifier for the group. Accepted by every `/v1/whatsapp/groups/{group_id}` operation, and as `to` when sending a message to the group.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The business number that created the group. It is the group's admin and the number every message to the group is sent from. Fixed when the group is created.
     * 
     *
     * @var string|null
     */
    protected $whatsappNumberId;
    /**
     * Meta's identifier for the WhatsApp Business Account recorded when the group was created. This is a historical snapshot, not a live account directory projection. Null for a number we operate on your behalf, whose account is not yours to see.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The group's name, shown to participants and to anyone who opens the invite link.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The group's description, shown alongside the subject. Null when the group has none.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Where the group stands. A group is messageable only while it is `active`.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Whether opening the invite link joins the group outright or raises a join request to approve.
     *
     * @var string|null
     */
    protected $joinApprovalMode;
    /**
     * The link that lets someone join the group, which is the only way in. A group has one link at a time. Null while the group is `pending`, since WhatsApp issues the link when it confirms the group. Rotating it through `POST /v1/whatsapp/groups/{group_id}/invite-link/rotate` replaces it, and every link the group had before then stops working.
     * 
     *
     * @var string|null
     */
    protected $inviteLink;
    /**
     * Who is in the group, as of the last update WhatsApp sent, and the whole set rather than a page: WhatsApp holds a group to a handful of people, so there is never a page's worth to return. The business number that created the group is its admin and is not listed.
     * 
     *
     * @var list<WhatsAppGroupParticipant>|null
     */
    protected $participants;
    /**
     * How many people are in the group, excluding your business.
     *
     * @var int|null
     */
    protected $participantCount;
    /**
     * The group's pins, newest first. WhatsApp holds a few at once, and pinning past that unpins the oldest rather than refusing. No entry here is merely requested. An entry stays listed until it is unpinned, so one whose `pinned_until` has passed is still listed after WhatsApp has taken it off the chat.
     * 
     *
     * @var list<WhatsAppGroupPinnedMessage>|null
     */
    protected $pinnedMessages;
    /**
     * Address of the group's picture, as WhatsApp serves it. Null when the group has none.
     *
     * @var string|null
     */
    protected $profilePictureUrl;
    /**
     * The last change asked of this group or participant, and where it got to. WhatsApp confirms a change on a webhook rather than in its reply, so an operation is `pending` until that arrives. While it is, another change to the same thing is refused with a `409` `WhatsAppGroupUpdateInProgress`; a change to a different participant is not, so several removals can be in flight at once. Absent on something nothing has been asked of yet.
     * 
     *
     * @var WhatsAppGroupOperation|null
     */
    protected $lastOperation;
    /**
     * When WhatsApp suspended the group. Present only while the group is `suspended`, and gone once WhatsApp lifts the suspension.
     *
     * @var \DateTime|null
     */
    protected $suspendedAt;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Unique identifier for the group. Accepted by every `/v1/whatsapp/groups/{group_id}` operation, and as `to` when sending a message to the group.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier for the group. Accepted by every `/v1/whatsapp/groups/{group_id}` operation, and as `to` when sending a message to the group.
     *
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
     * The business number that created the group. It is the group's admin and the number every message to the group is sent from. Fixed when the group is created.
     * 
     *
     * @return string|null
     */
    public function getWhatsappNumberId(): ?string
    {
        return $this->whatsappNumberId;
    }
    /**
     * The business number that created the group. It is the group's admin and the number every message to the group is sent from. Fixed when the group is created.
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
     * Meta's identifier for the WhatsApp Business Account recorded when the group was created. This is a historical snapshot, not a live account directory projection. Null for a number we operate on your behalf, whose account is not yours to see.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * Meta's identifier for the WhatsApp Business Account recorded when the group was created. This is a historical snapshot, not a live account directory projection. Null for a number we operate on your behalf, whose account is not yours to see.
     *
     * @param string|null $waba
     *
     * @return self
     */
    public function setWaba(?string $waba): self
    {
        $this->initialized['waba'] = true;
        $this->waba = $waba;
        return $this;
    }
    /**
     * The group's name, shown to participants and to anyone who opens the invite link.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The group's name, shown to participants and to anyone who opens the invite link.
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
     * The group's description, shown alongside the subject. Null when the group has none.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * The group's description, shown alongside the subject. Null when the group has none.
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
     * Where the group stands. A group is messageable only while it is `active`.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Where the group stands. A group is messageable only while it is `active`.
     *
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
     * Whether opening the invite link joins the group outright or raises a join request to approve.
     *
     * @return string|null
     */
    public function getJoinApprovalMode(): ?string
    {
        return $this->joinApprovalMode;
    }
    /**
     * Whether opening the invite link joins the group outright or raises a join request to approve.
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
    /**
     * The link that lets someone join the group, which is the only way in. A group has one link at a time. Null while the group is `pending`, since WhatsApp issues the link when it confirms the group. Rotating it through `POST /v1/whatsapp/groups/{group_id}/invite-link/rotate` replaces it, and every link the group had before then stops working.
     * 
     *
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }
    /**
     * The link that lets someone join the group, which is the only way in. A group has one link at a time. Null while the group is `pending`, since WhatsApp issues the link when it confirms the group. Rotating it through `POST /v1/whatsapp/groups/{group_id}/invite-link/rotate` replaces it, and every link the group had before then stops working.
     *
     * @param string|null $inviteLink
     *
     * @return self
     */
    public function setInviteLink(?string $inviteLink): self
    {
        $this->initialized['inviteLink'] = true;
        $this->inviteLink = $inviteLink;
        return $this;
    }
    /**
     * Who is in the group, as of the last update WhatsApp sent, and the whole set rather than a page: WhatsApp holds a group to a handful of people, so there is never a page's worth to return. The business number that created the group is its admin and is not listed.
     * 
     *
     * @return list<WhatsAppGroupParticipant>|null
     */
    public function getParticipants(): ?array
    {
        return $this->participants;
    }
    /**
     * Who is in the group, as of the last update WhatsApp sent, and the whole set rather than a page: WhatsApp holds a group to a handful of people, so there is never a page's worth to return. The business number that created the group is its admin and is not listed.
     *
     * @param list<WhatsAppGroupParticipant>|null $participants
     *
     * @return self
     */
    public function setParticipants(?array $participants): self
    {
        $this->initialized['participants'] = true;
        $this->participants = $participants;
        return $this;
    }
    /**
     * How many people are in the group, excluding your business.
     *
     * @return int|null
     */
    public function getParticipantCount(): ?int
    {
        return $this->participantCount;
    }
    /**
     * How many people are in the group, excluding your business.
     *
     * @param int|null $participantCount
     *
     * @return self
     */
    public function setParticipantCount(?int $participantCount): self
    {
        $this->initialized['participantCount'] = true;
        $this->participantCount = $participantCount;
        return $this;
    }
    /**
     * The group's pins, newest first. WhatsApp holds a few at once, and pinning past that unpins the oldest rather than refusing. No entry here is merely requested. An entry stays listed until it is unpinned, so one whose `pinned_until` has passed is still listed after WhatsApp has taken it off the chat.
     * 
     *
     * @return list<WhatsAppGroupPinnedMessage>|null
     */
    public function getPinnedMessages(): ?array
    {
        return $this->pinnedMessages;
    }
    /**
     * The group's pins, newest first. WhatsApp holds a few at once, and pinning past that unpins the oldest rather than refusing. No entry here is merely requested. An entry stays listed until it is unpinned, so one whose `pinned_until` has passed is still listed after WhatsApp has taken it off the chat.
     *
     * @param list<WhatsAppGroupPinnedMessage>|null $pinnedMessages
     *
     * @return self
     */
    public function setPinnedMessages(?array $pinnedMessages): self
    {
        $this->initialized['pinnedMessages'] = true;
        $this->pinnedMessages = $pinnedMessages;
        return $this;
    }
    /**
     * Address of the group's picture, as WhatsApp serves it. Null when the group has none.
     *
     * @return string|null
     */
    public function getProfilePictureUrl(): ?string
    {
        return $this->profilePictureUrl;
    }
    /**
     * Address of the group's picture, as WhatsApp serves it. Null when the group has none.
     *
     * @param string|null $profilePictureUrl
     *
     * @return self
     */
    public function setProfilePictureUrl(?string $profilePictureUrl): self
    {
        $this->initialized['profilePictureUrl'] = true;
        $this->profilePictureUrl = $profilePictureUrl;
        return $this;
    }
    /**
     * The last change asked of this group or participant, and where it got to. WhatsApp confirms a change on a webhook rather than in its reply, so an operation is `pending` until that arrives. While it is, another change to the same thing is refused with a `409` `WhatsAppGroupUpdateInProgress`; a change to a different participant is not, so several removals can be in flight at once. Absent on something nothing has been asked of yet.
     * 
     *
     * @return WhatsAppGroupOperation|null
     */
    public function getLastOperation(): ?WhatsAppGroupOperation
    {
        return $this->lastOperation;
    }
    /**
     * The last change asked of this group or participant, and where it got to. WhatsApp confirms a change on a webhook rather than in its reply, so an operation is `pending` until that arrives. While it is, another change to the same thing is refused with a `409` `WhatsAppGroupUpdateInProgress`; a change to a different participant is not, so several removals can be in flight at once. Absent on something nothing has been asked of yet.
     *
     * @param WhatsAppGroupOperation|null $lastOperation
     *
     * @return self
     */
    public function setLastOperation(?WhatsAppGroupOperation $lastOperation): self
    {
        $this->initialized['lastOperation'] = true;
        $this->lastOperation = $lastOperation;
        return $this;
    }
    /**
     * When WhatsApp suspended the group. Present only while the group is `suspended`, and gone once WhatsApp lifts the suspension.
     *
     * @return \DateTime|null
     */
    public function getSuspendedAt(): ?\DateTime
    {
        return $this->suspendedAt;
    }
    /**
     * When WhatsApp suspended the group. Present only while the group is `suspended`, and gone once WhatsApp lifts the suspension.
     *
     * @param \DateTime|null $suspendedAt
     *
     * @return self
     */
    public function setSuspendedAt(?\DateTime $suspendedAt): self
    {
        $this->initialized['suspendedAt'] = true;
        $this->suspendedAt = $suspendedAt;
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
