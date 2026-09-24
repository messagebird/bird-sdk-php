<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryDimensions
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
     * Recorded sending domain value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $sendingDomain;
    /**
     * Recorded category value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $category;
    /**
     * Recorded template id value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * Recorded tag value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $tag;
    /**
     * Recorded recipient domain value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $recipientDomain;
    /**
     * Recorded mailbox provider value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $mailboxProvider;
    /**
     * Recorded mailbox provider region value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $mailboxProviderRegion;
    /**
     * Recorded sending ip value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $sendingIp;
    /**
     * Recorded ip pool id value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $ipPoolId;
    /**
     * Recorded broadcast id value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $broadcastId;
    /**
     * Recorded country value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $country;
    /**
     * Recorded region value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $region;
    /**
     * Recorded city value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $city;
    /**
     * Recorded agent family value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $agentFamily;
    /**
     * Recorded os family value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $osFamily;
    /**
     * Recorded device family value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $deviceFamily;
    /**
     * Recorded smtp error code value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $smtpErrorCode;
    /**
     * Recorded feedback type value. Null represents missing context and differs from an empty string.
     *
     * @var string|null
     */
    protected $feedbackType;
    /**
     * Recorded sending domain value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getSendingDomain(): ?string
    {
        return $this->sendingDomain;
    }
    /**
     * Recorded sending domain value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $sendingDomain
     *
     * @return self
     */
    public function setSendingDomain(?string $sendingDomain): self
    {
        $this->initialized['sendingDomain'] = true;
        $this->sendingDomain = $sendingDomain;
        return $this;
    }
    /**
     * Recorded category value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Recorded category value. Null represents missing context and differs from an empty string.
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
     * Recorded template id value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * Recorded template id value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
    /**
     * Recorded tag value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }
    /**
     * Recorded tag value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $tag
     *
     * @return self
     */
    public function setTag(?string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
        return $this;
    }
    /**
     * Recorded recipient domain value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getRecipientDomain(): ?string
    {
        return $this->recipientDomain;
    }
    /**
     * Recorded recipient domain value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $recipientDomain
     *
     * @return self
     */
    public function setRecipientDomain(?string $recipientDomain): self
    {
        $this->initialized['recipientDomain'] = true;
        $this->recipientDomain = $recipientDomain;
        return $this;
    }
    /**
     * Recorded mailbox provider value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getMailboxProvider(): ?string
    {
        return $this->mailboxProvider;
    }
    /**
     * Recorded mailbox provider value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $mailboxProvider
     *
     * @return self
     */
    public function setMailboxProvider(?string $mailboxProvider): self
    {
        $this->initialized['mailboxProvider'] = true;
        $this->mailboxProvider = $mailboxProvider;
        return $this;
    }
    /**
     * Recorded mailbox provider region value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getMailboxProviderRegion(): ?string
    {
        return $this->mailboxProviderRegion;
    }
    /**
     * Recorded mailbox provider region value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $mailboxProviderRegion
     *
     * @return self
     */
    public function setMailboxProviderRegion(?string $mailboxProviderRegion): self
    {
        $this->initialized['mailboxProviderRegion'] = true;
        $this->mailboxProviderRegion = $mailboxProviderRegion;
        return $this;
    }
    /**
     * Recorded sending ip value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getSendingIp(): ?string
    {
        return $this->sendingIp;
    }
    /**
     * Recorded sending ip value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $sendingIp
     *
     * @return self
     */
    public function setSendingIp(?string $sendingIp): self
    {
        $this->initialized['sendingIp'] = true;
        $this->sendingIp = $sendingIp;
        return $this;
    }
    /**
     * Recorded ip pool id value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getIpPoolId(): ?string
    {
        return $this->ipPoolId;
    }
    /**
     * Recorded ip pool id value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $ipPoolId
     *
     * @return self
     */
    public function setIpPoolId(?string $ipPoolId): self
    {
        $this->initialized['ipPoolId'] = true;
        $this->ipPoolId = $ipPoolId;
        return $this;
    }
    /**
     * Recorded broadcast id value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getBroadcastId(): ?string
    {
        return $this->broadcastId;
    }
    /**
     * Recorded broadcast id value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $broadcastId
     *
     * @return self
     */
    public function setBroadcastId(?string $broadcastId): self
    {
        $this->initialized['broadcastId'] = true;
        $this->broadcastId = $broadcastId;
        return $this;
    }
    /**
     * Recorded country value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }
    /**
     * Recorded country value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * Recorded region value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }
    /**
     * Recorded region value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $region
     *
     * @return self
     */
    public function setRegion(?string $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;
        return $this;
    }
    /**
     * Recorded city value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
    /**
     * Recorded city value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $city
     *
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;
        return $this;
    }
    /**
     * Recorded agent family value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getAgentFamily(): ?string
    {
        return $this->agentFamily;
    }
    /**
     * Recorded agent family value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $agentFamily
     *
     * @return self
     */
    public function setAgentFamily(?string $agentFamily): self
    {
        $this->initialized['agentFamily'] = true;
        $this->agentFamily = $agentFamily;
        return $this;
    }
    /**
     * Recorded os family value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getOsFamily(): ?string
    {
        return $this->osFamily;
    }
    /**
     * Recorded os family value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $osFamily
     *
     * @return self
     */
    public function setOsFamily(?string $osFamily): self
    {
        $this->initialized['osFamily'] = true;
        $this->osFamily = $osFamily;
        return $this;
    }
    /**
     * Recorded device family value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getDeviceFamily(): ?string
    {
        return $this->deviceFamily;
    }
    /**
     * Recorded device family value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $deviceFamily
     *
     * @return self
     */
    public function setDeviceFamily(?string $deviceFamily): self
    {
        $this->initialized['deviceFamily'] = true;
        $this->deviceFamily = $deviceFamily;
        return $this;
    }
    /**
     * Recorded smtp error code value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getSmtpErrorCode(): ?string
    {
        return $this->smtpErrorCode;
    }
    /**
     * Recorded smtp error code value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $smtpErrorCode
     *
     * @return self
     */
    public function setSmtpErrorCode(?string $smtpErrorCode): self
    {
        $this->initialized['smtpErrorCode'] = true;
        $this->smtpErrorCode = $smtpErrorCode;
        return $this;
    }
    /**
     * Recorded feedback type value. Null represents missing context and differs from an empty string.
     *
     * @return string|null
     */
    public function getFeedbackType(): ?string
    {
        return $this->feedbackType;
    }
    /**
     * Recorded feedback type value. Null represents missing context and differs from an empty string.
     *
     * @param string|null $feedbackType
     *
     * @return self
     */
    public function setFeedbackType(?string $feedbackType): self
    {
        $this->initialized['feedbackType'] = true;
        $this->feedbackType = $feedbackType;
        return $this;
    }
}
