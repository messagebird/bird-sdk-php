<?php

namespace MessageBird\Wire\Model;

/**
 * Contact card with a name and profile details. With a phone number, recipients can message or save it; without one, they can save it.
 */
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
     * Valid calendar date in `YYYY-MM-DD` format.
     *
     * @var string|null
     */
    protected $birthday;
    /**
     * E.164 numbers get a WhatsApp chat button; other formats get an invite button.
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
     * @param WhatsAppContactCardSendName|WhatsAppContactNameSend|array|null $name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->initialized['name'] = true;
        $this->name = \MessageBird\Core\ModelWrapper::normalize($name, WhatsAppContactCardSendName::class);
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
     * @param WhatsAppContactCardSendOrg|WhatsAppContactOrgSend|array|null $org
     *
     * @return self
     */
    public function setOrg($org): self
    {
        $this->initialized['org'] = true;
        $this->org = \MessageBird\Core\ModelWrapper::normalize($org, WhatsAppContactCardSendOrg::class);
        return $this;
    }
    /**
     * Valid calendar date in `YYYY-MM-DD` format.
     *
     * @return string|null
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }
    /**
     * Valid calendar date in `YYYY-MM-DD` format.
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
     * E.164 numbers get a WhatsApp chat button; other formats get an invite button.
     *
     * @return list<WhatsAppContactPhoneSend>|null
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->phoneNumbers;
    }
    /**
     * E.164 numbers get a WhatsApp chat button; other formats get an invite button.
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
