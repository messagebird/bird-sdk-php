<?php

namespace MessageBird\Wire\Model;

class WhatsAppContactCardSend
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
     * @var WhatsAppContactCardSendName|null
     */
    protected $name;
    /**
     * Where the contact works.
     *
     * @var WhatsAppContactCardSendOrg|null
     */
    protected $org;
    /**
     * The contact's birthday, as `YYYY-MM-DD`. WhatsApp rejects any other shape, and a date no calendar holds is rejected too.
     * 
     *
     * @var string|null
     */
    protected $birthday;
    /**
     * The numbers on the card. A number in E.164 renders a button that opens a WhatsApp chat with it; one that is not renders an invite instead.
     * 
     *
     * @var list<WhatsAppContactPhoneSend>|null
     */
    protected $phoneNumbers;
    /**
     * @var list<WhatsAppContactEmailSend>|null
     */
    protected $emails;
    /**
     * @var list<WhatsAppContactUrlSend>|null
     */
    protected $urls;
    /**
     * @var list<WhatsAppContactAddressSend>|null
     */
    protected $addresses;
    /**
     * @return WhatsAppContactCardSendName|null
     */
    public function getName(): ?WhatsAppContactCardSendName
    {
        return $this->name;
    }
    /**
     * @param WhatsAppContactCardSendName|null $name
     *
     * @return self
     */
    public function setName(?WhatsAppContactCardSendName $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Where the contact works.
     *
     * @return WhatsAppContactCardSendOrg|null
     */
    public function getOrg(): ?WhatsAppContactCardSendOrg
    {
        return $this->org;
    }
    /**
     * Where the contact works.
     *
     * @param WhatsAppContactCardSendOrg|null $org
     *
     * @return self
     */
    public function setOrg(?WhatsAppContactCardSendOrg $org): self
    {
        $this->initialized['org'] = true;
        $this->org = $org;
        return $this;
    }
    /**
     * The contact's birthday, as `YYYY-MM-DD`. WhatsApp rejects any other shape, and a date no calendar holds is rejected too.
     * 
     *
     * @return string|null
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }
    /**
     * The contact's birthday, as `YYYY-MM-DD`. WhatsApp rejects any other shape, and a date no calendar holds is rejected too.
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
     * The numbers on the card. A number in E.164 renders a button that opens a WhatsApp chat with it; one that is not renders an invite instead.
     * 
     *
     * @return list<WhatsAppContactPhoneSend>|null
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->phoneNumbers;
    }
    /**
     * The numbers on the card. A number in E.164 renders a button that opens a WhatsApp chat with it; one that is not renders an invite instead.
     *
     * @param list<WhatsAppContactPhoneSend>|null $phoneNumbers
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
     * @return list<WhatsAppContactEmailSend>|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }
    /**
     * @param list<WhatsAppContactEmailSend>|null $emails
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
     * @return list<WhatsAppContactUrlSend>|null
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }
    /**
     * @param list<WhatsAppContactUrlSend>|null $urls
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
     * @return list<WhatsAppContactAddressSend>|null
     */
    public function getAddresses(): ?array
    {
        return $this->addresses;
    }
    /**
     * @param list<WhatsAppContactAddressSend>|null $addresses
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
