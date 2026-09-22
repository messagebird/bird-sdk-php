<?php

namespace MessageBird\Wire\Model;

class WhatsAppGroupParticipant
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
     * Business-scoped user ID, Meta's identifier for this person against your business. The one identifier every participant has: WhatsApp always sends it, and it is stable for as long as they are in the group.
     * 
     *
     * @var string|null
     */
    protected $bsuid;
    /**
     * Phone number in E.164 format. Absent when WhatsApp withholds it, which it does for anyone who has not shared their number with your business, so a group is normally a mix of participants with one and without.
     * 
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * The WhatsApp username this person chose. Absent when they have none, and not an identifier to address them by: it is theirs to change, so it names them in a list rather than keying anything.
     * 
     *
     * @var string|null
     */
    protected $username;
    /**
     * The last change asked of this group or participant, and where it got to. WhatsApp confirms a change on a webhook rather than in its reply, so an operation is `pending` until that arrives. While it is, another change to the same thing is refused with a `409` `WhatsAppGroupUpdateInProgress`; a change to a different participant is not, so several removals can be in flight at once. Absent on something nothing has been asked of yet.
     * 
     *
     * @var WhatsAppGroupOperation|null
     */
    protected $lastOperation;
    /**
     * Business-scoped user ID, Meta's identifier for this person against your business. The one identifier every participant has: WhatsApp always sends it, and it is stable for as long as they are in the group.
     * 
     *
     * @return string|null
     */
    public function getBsuid(): ?string
    {
        return $this->bsuid;
    }
    /**
     * Business-scoped user ID, Meta's identifier for this person against your business. The one identifier every participant has: WhatsApp always sends it, and it is stable for as long as they are in the group.
     *
     * @param string|null $bsuid
     *
     * @return self
     */
    public function setBsuid(?string $bsuid): self
    {
        $this->initialized['bsuid'] = true;
        $this->bsuid = $bsuid;
        return $this;
    }
    /**
     * Phone number in E.164 format. Absent when WhatsApp withholds it, which it does for anyone who has not shared their number with your business, so a group is normally a mix of participants with one and without.
     * 
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Phone number in E.164 format. Absent when WhatsApp withholds it, which it does for anyone who has not shared their number with your business, so a group is normally a mix of participants with one and without.
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
     * The WhatsApp username this person chose. Absent when they have none, and not an identifier to address them by: it is theirs to change, so it names them in a list rather than keying anything.
     * 
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * The WhatsApp username this person chose. Absent when they have none, and not an identifier to address them by: it is theirs to change, so it names them in a list rather than keying anything.
     *
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
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
}
