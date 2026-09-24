<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryFilters
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
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $sendingDomain;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryCategoryFilter|null
     */
    protected $category;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryTemplateFilter|null
     */
    protected $templateId;
    /**
     * Select one case-sensitive tag name. A name without values requires that tag to exist. Exclude-only predicates retain events without that tag. Include and exclude together accept at most 20 distinct normalized values with no overlap.
     *
     * @var EmailStatsQueryTagFilter|null
     */
    protected $tag;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $recipientDomain;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $mailboxProvider;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $mailboxProviderRegion;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $sendingIp;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryIPPoolFilter|null
     */
    protected $ipPoolId;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryBroadcastFilter|null
     */
    protected $broadcastId;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $country;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $region;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $city;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $agentFamily;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $osFamily;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $deviceFamily;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $smtpErrorCode;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @var EmailStatsQueryStringFilter|null
     */
    protected $feedbackType;
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getSendingDomain(): ?EmailStatsQueryStringFilter
    {
        return $this->sendingDomain;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $sendingDomain
     *
     * @return self
     */
    public function setSendingDomain(?EmailStatsQueryStringFilter $sendingDomain): self
    {
        $this->initialized['sendingDomain'] = true;
        $this->sendingDomain = $sendingDomain;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryCategoryFilter|null
     */
    public function getCategory(): ?EmailStatsQueryCategoryFilter
    {
        return $this->category;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryCategoryFilter|null $category
     *
     * @return self
     */
    public function setCategory(?EmailStatsQueryCategoryFilter $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryTemplateFilter|null
     */
    public function getTemplateId(): ?EmailStatsQueryTemplateFilter
    {
        return $this->templateId;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryTemplateFilter|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?EmailStatsQueryTemplateFilter $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
    /**
     * Select one case-sensitive tag name. A name without values requires that tag to exist. Exclude-only predicates retain events without that tag. Include and exclude together accept at most 20 distinct normalized values with no overlap.
     *
     * @return EmailStatsQueryTagFilter|null
     */
    public function getTag(): ?EmailStatsQueryTagFilter
    {
        return $this->tag;
    }
    /**
     * Select one case-sensitive tag name. A name without values requires that tag to exist. Exclude-only predicates retain events without that tag. Include and exclude together accept at most 20 distinct normalized values with no overlap.
     *
     * @param EmailStatsQueryTagFilter|null $tag
     *
     * @return self
     */
    public function setTag(?EmailStatsQueryTagFilter $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getRecipientDomain(): ?EmailStatsQueryStringFilter
    {
        return $this->recipientDomain;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $recipientDomain
     *
     * @return self
     */
    public function setRecipientDomain(?EmailStatsQueryStringFilter $recipientDomain): self
    {
        $this->initialized['recipientDomain'] = true;
        $this->recipientDomain = $recipientDomain;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getMailboxProvider(): ?EmailStatsQueryStringFilter
    {
        return $this->mailboxProvider;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $mailboxProvider
     *
     * @return self
     */
    public function setMailboxProvider(?EmailStatsQueryStringFilter $mailboxProvider): self
    {
        $this->initialized['mailboxProvider'] = true;
        $this->mailboxProvider = $mailboxProvider;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getMailboxProviderRegion(): ?EmailStatsQueryStringFilter
    {
        return $this->mailboxProviderRegion;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $mailboxProviderRegion
     *
     * @return self
     */
    public function setMailboxProviderRegion(?EmailStatsQueryStringFilter $mailboxProviderRegion): self
    {
        $this->initialized['mailboxProviderRegion'] = true;
        $this->mailboxProviderRegion = $mailboxProviderRegion;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getSendingIp(): ?EmailStatsQueryStringFilter
    {
        return $this->sendingIp;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $sendingIp
     *
     * @return self
     */
    public function setSendingIp(?EmailStatsQueryStringFilter $sendingIp): self
    {
        $this->initialized['sendingIp'] = true;
        $this->sendingIp = $sendingIp;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryIPPoolFilter|null
     */
    public function getIpPoolId(): ?EmailStatsQueryIPPoolFilter
    {
        return $this->ipPoolId;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryIPPoolFilter|null $ipPoolId
     *
     * @return self
     */
    public function setIpPoolId(?EmailStatsQueryIPPoolFilter $ipPoolId): self
    {
        $this->initialized['ipPoolId'] = true;
        $this->ipPoolId = $ipPoolId;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryBroadcastFilter|null
     */
    public function getBroadcastId(): ?EmailStatsQueryBroadcastFilter
    {
        return $this->broadcastId;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryBroadcastFilter|null $broadcastId
     *
     * @return self
     */
    public function setBroadcastId(?EmailStatsQueryBroadcastFilter $broadcastId): self
    {
        $this->initialized['broadcastId'] = true;
        $this->broadcastId = $broadcastId;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getCountry(): ?EmailStatsQueryStringFilter
    {
        return $this->country;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $country
     *
     * @return self
     */
    public function setCountry(?EmailStatsQueryStringFilter $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getRegion(): ?EmailStatsQueryStringFilter
    {
        return $this->region;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $region
     *
     * @return self
     */
    public function setRegion(?EmailStatsQueryStringFilter $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getCity(): ?EmailStatsQueryStringFilter
    {
        return $this->city;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $city
     *
     * @return self
     */
    public function setCity(?EmailStatsQueryStringFilter $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getAgentFamily(): ?EmailStatsQueryStringFilter
    {
        return $this->agentFamily;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $agentFamily
     *
     * @return self
     */
    public function setAgentFamily(?EmailStatsQueryStringFilter $agentFamily): self
    {
        $this->initialized['agentFamily'] = true;
        $this->agentFamily = $agentFamily;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getOsFamily(): ?EmailStatsQueryStringFilter
    {
        return $this->osFamily;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $osFamily
     *
     * @return self
     */
    public function setOsFamily(?EmailStatsQueryStringFilter $osFamily): self
    {
        $this->initialized['osFamily'] = true;
        $this->osFamily = $osFamily;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getDeviceFamily(): ?EmailStatsQueryStringFilter
    {
        return $this->deviceFamily;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $deviceFamily
     *
     * @return self
     */
    public function setDeviceFamily(?EmailStatsQueryStringFilter $deviceFamily): self
    {
        $this->initialized['deviceFamily'] = true;
        $this->deviceFamily = $deviceFamily;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getSmtpErrorCode(): ?EmailStatsQueryStringFilter
    {
        return $this->smtpErrorCode;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $smtpErrorCode
     *
     * @return self
     */
    public function setSmtpErrorCode(?EmailStatsQueryStringFilter $smtpErrorCode): self
    {
        $this->initialized['smtpErrorCode'] = true;
        $this->smtpErrorCode = $smtpErrorCode;
        return $this;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @return EmailStatsQueryStringFilter|null
     */
    public function getFeedbackType(): ?EmailStatsQueryStringFilter
    {
        return $this->feedbackType;
    }
    /**
     * Match recorded values using include or exclude. Include values combine with OR; exclusions remove matches. Missing values survive exclude-only predicates. Supply a nonempty array; at most 20 distinct values across both arrays are accepted after normalization, with no overlap.
     *
     * @param EmailStatsQueryStringFilter|null $feedbackType
     *
     * @return self
     */
    public function setFeedbackType(?EmailStatsQueryStringFilter $feedbackType): self
    {
        $this->initialized['feedbackType'] = true;
        $this->feedbackType = $feedbackType;
        return $this;
    }
}
