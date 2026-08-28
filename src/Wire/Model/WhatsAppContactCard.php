<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactCard
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
     * Why the card arrived. `contact_request` means the contact tapped a button this workspace sent asking for their number, which is the only signal that the message answers that ask; `other` means they shared a card in the chat. Open enum: treat an unrecognized value as a way of sharing added since.
     * 
     *
     * @var string|null
     */
    protected $origin;
    /**
     * The contact's card in vCard format. WhatsApp sends it on a card shared in the chat and omits it on a button tap, which carries the number alone.
     * 
     *
     * @var string|null
     */
    protected $vcard;
    /**
     * The contact's name, when the card carries one.
     *
     * @var WhatsAppContactCardName|null
     */
    protected $name;
    /**
     * Where the contact works, when the card carries it.
     *
     * @var WhatsAppContactCardOrg|null
     */
    protected $org;
    /**
     * The contact's birthday, which WhatsApp sends as `YYYY-MM-DD`. Passed through as text rather than typed as a date: the value comes off the contact's own device unvalidated, and a card we could not parse would otherwise have to lose the field or fail the whole read.
     * 
     *
     * @var string|null
     */
    protected $birthday;
    /**
     * The numbers on the card. A button tap carries the contact's own number here, which is the point of asking.
     * 
     *
     * @var list<WhatsAppContactPhone>|null
     */
    protected $phoneNumbers;
    /**
     * @var list<WhatsAppContactEmail>|null
     */
    protected $emails;
    /**
     * @var list<WhatsAppContactUrl>|null
     */
    protected $urls;
    /**
     * @var list<WhatsAppContactAddress>|null
     */
    protected $addresses;
    /**
     * Why the card arrived. `contact_request` means the contact tapped a button this workspace sent asking for their number, which is the only signal that the message answers that ask; `other` means they shared a card in the chat. Open enum: treat an unrecognized value as a way of sharing added since.
     * 
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * Why the card arrived. `contact_request` means the contact tapped a button this workspace sent asking for their number, which is the only signal that the message answers that ask; `other` means they shared a card in the chat. Open enum: treat an unrecognized value as a way of sharing added since.
     *
     * @param string|null $origin
     *
     * @return self
     */
    public function setOrigin(?string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
    /**
     * The contact's card in vCard format. WhatsApp sends it on a card shared in the chat and omits it on a button tap, which carries the number alone.
     * 
     *
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }
    /**
     * The contact's card in vCard format. WhatsApp sends it on a card shared in the chat and omits it on a button tap, which carries the number alone.
     *
     * @param string|null $vcard
     *
     * @return self
     */
    public function setVcard(?string $vcard): self
    {
        $this->initialized['vcard'] = true;
        $this->vcard = $vcard;
        return $this;
    }
    /**
     * The contact's name, when the card carries one.
     *
     * @return WhatsAppContactCardName|null
     */
    public function getName(): ?WhatsAppContactCardName
    {
        return $this->name;
    }
    /**
     * The contact's name, when the card carries one.
     *
     * @param WhatsAppContactCardName|null $name
     *
     * @return self
     */
    public function setName(?WhatsAppContactCardName $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Where the contact works, when the card carries it.
     *
     * @return WhatsAppContactCardOrg|null
     */
    public function getOrg(): ?WhatsAppContactCardOrg
    {
        return $this->org;
    }
    /**
     * Where the contact works, when the card carries it.
     *
     * @param WhatsAppContactCardOrg|null $org
     *
     * @return self
     */
    public function setOrg(?WhatsAppContactCardOrg $org): self
    {
        $this->initialized['org'] = true;
        $this->org = $org;
        return $this;
    }
    /**
     * The contact's birthday, which WhatsApp sends as `YYYY-MM-DD`. Passed through as text rather than typed as a date: the value comes off the contact's own device unvalidated, and a card we could not parse would otherwise have to lose the field or fail the whole read.
     * 
     *
     * @return string|null
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }
    /**
     * The contact's birthday, which WhatsApp sends as `YYYY-MM-DD`. Passed through as text rather than typed as a date: the value comes off the contact's own device unvalidated, and a card we could not parse would otherwise have to lose the field or fail the whole read.
     *
     * @param string|null $birthday
     *
     * @return self
     */
    public function setBirthday(?string $birthday): self
    {
        $this->initialized['birthday'] = true;
        $this->birthday = $birthday;
        return $this;
    }
    /**
     * The numbers on the card. A button tap carries the contact's own number here, which is the point of asking.
     * 
     *
     * @return list<WhatsAppContactPhone>|null
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->phoneNumbers;
    }
    /**
     * The numbers on the card. A button tap carries the contact's own number here, which is the point of asking.
     *
     * @param list<WhatsAppContactPhone>|null $phoneNumbers
     *
     * @return self
     */
    public function setPhoneNumbers(?array $phoneNumbers): self
    {
        $this->initialized['phoneNumbers'] = true;
        $this->phoneNumbers = $phoneNumbers;
        return $this;
    }
    /**
     * @return list<WhatsAppContactEmail>|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }
    /**
     * @param list<WhatsAppContactEmail>|null $emails
     *
     * @return self
     */
    public function setEmails(?array $emails): self
    {
        $this->initialized['emails'] = true;
        $this->emails = $emails;
        return $this;
    }
    /**
     * @return list<WhatsAppContactUrl>|null
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }
    /**
     * @param list<WhatsAppContactUrl>|null $urls
     *
     * @return self
     */
    public function setUrls(?array $urls): self
    {
        $this->initialized['urls'] = true;
        $this->urls = $urls;
        return $this;
    }
    /**
     * @return list<WhatsAppContactAddress>|null
     */
    public function getAddresses(): ?array
    {
        return $this->addresses;
    }
    /**
     * @param list<WhatsAppContactAddress>|null $addresses
     *
     * @return self
     */
    public function setAddresses(?array $addresses): self
    {
        $this->initialized['addresses'] = true;
        $this->addresses = $addresses;
        return $this;
    }
}
