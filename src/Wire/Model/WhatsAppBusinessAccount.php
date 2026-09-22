<?php

namespace MessageBird\Wire\Model;

class WhatsAppBusinessAccount
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
     * Unique identifier for the WhatsApp Business Account.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Meta's own identifier for this WhatsApp Business Account. This is the value to send when creating a template on the account.
     * 
     *
     * @var string|null
     */
    protected $waba;
    /**
     * The account's name, as WhatsApp reports it.
     *
     * @var string|null
     */
    protected $name;
    /**
     * WhatsApp's own state for this account as of `meta_synced_at`. The status is `active` until WhatsApp reports otherwise. WhatsApp already considers an account usable if Bird could connect a number under it. The absence of a reading is therefore not evidence of another state.
     *
     * @var string|null
     */
    protected $status;
    /**
     * How far WhatsApp's review of this account had got as of `meta_synced_at`. Absent until WhatsApp has reported it.
     *
     * @var string|null
     */
    protected $accountReviewStatus;
    /**
     * Whether Meta had verified the business behind this account as of `meta_synced_at`. Absent until Meta has reported it.
     *
     * @var string|null
     */
    protected $businessVerificationStatus;
    /**
     * Whether this account can use WhatsApp's Marketing Messages API, as of `meta_synced_at`. Absent until WhatsApp has reported it. Distinct from the owning portfolio's `marketing_messages_onboarding_status` (`portfolio.marketing_messages_onboarding_status`), which Meta gives the same field name but a different vocabulary: this one is the account's own eligibility, that one is the portfolio's Terms-of-Service progress.
     *
     * @var string|null
     */
    protected $marketingMessagesOnboardingStatus;
    /**
     * The Meta business portfolio that owns this account. Absent until Meta has reported it. The portfolio is where a messaging limit is set, so every account it owns shares one.
     *
     * @var WhatsAppBusinessAccountPortfolio|null
     */
    protected $portfolio;
    /**
     * WhatsApp's ban on this account, absent unless Bird was told of one. `status` is what the account said when Bird last read it; this is what WhatsApp announced, which arrives only on the webhook that announces it and is never re-read.
     *
     * @var WhatsAppBusinessAccountBan|null
     */
    protected $ban;
    /**
     * Meta's own messaging health for this account as of `meta_synced_at`. Absent until Bird has read it, and absent again when the stored reading did not parse at all. An entity whose verdict falls outside this vocabulary is dropped on its own and the rest of the report still ships, so `entities` can be shorter than Meta's. A `blocked` verdict on the `waba` entity is why template sends fail with Meta's `#200` even though the number reads `active`: for example `error_code` `141006` names a payment method Meta rejected on the account.
     *
     * @var WhatsAppBusinessAccountMetaHealthStatus|null
     */
    protected $metaHealthStatus;
    /**
     * When Bird last read this account's state from WhatsApp. `status`, `account_review_status`, `business_verification_status`, `marketing_messages_onboarding_status`, `portfolio` and `meta_health_status` are all that reading rather than live values; Bird re-reads roughly hourly. Absent for an account Bird has never read back.
     *
     * @var \DateTime|null
     */
    protected $metaSyncedAt;
    /**
     * When this account was connected.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When this account was last changed.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Unique identifier for the WhatsApp Business Account.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier for the WhatsApp Business Account.
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
     * Meta's own identifier for this WhatsApp Business Account. This is the value to send when creating a template on the account.
     * 
     *
     * @return string|null
     */
    public function getWaba(): ?string
    {
        return $this->waba;
    }
    /**
     * Meta's own identifier for this WhatsApp Business Account. This is the value to send when creating a template on the account.
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
     * The account's name, as WhatsApp reports it.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The account's name, as WhatsApp reports it.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * WhatsApp's own state for this account as of `meta_synced_at`. The status is `active` until WhatsApp reports otherwise. WhatsApp already considers an account usable if Bird could connect a number under it. The absence of a reading is therefore not evidence of another state.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * WhatsApp's own state for this account as of `meta_synced_at`. The status is `active` until WhatsApp reports otherwise. WhatsApp already considers an account usable if Bird could connect a number under it. The absence of a reading is therefore not evidence of another state.
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
     * How far WhatsApp's review of this account had got as of `meta_synced_at`. Absent until WhatsApp has reported it.
     *
     * @return string|null
     */
    public function getAccountReviewStatus(): ?string
    {
        return $this->accountReviewStatus;
    }
    /**
     * How far WhatsApp's review of this account had got as of `meta_synced_at`. Absent until WhatsApp has reported it.
     *
     * @param string|null $accountReviewStatus
     *
     * @return self
     */
    public function setAccountReviewStatus(?string $accountReviewStatus): self
    {
        $this->initialized['accountReviewStatus'] = true;
        $this->accountReviewStatus = $accountReviewStatus;
        return $this;
    }
    /**
     * Whether Meta had verified the business behind this account as of `meta_synced_at`. Absent until Meta has reported it.
     *
     * @return string|null
     */
    public function getBusinessVerificationStatus(): ?string
    {
        return $this->businessVerificationStatus;
    }
    /**
     * Whether Meta had verified the business behind this account as of `meta_synced_at`. Absent until Meta has reported it.
     *
     * @param string|null $businessVerificationStatus
     *
     * @return self
     */
    public function setBusinessVerificationStatus(?string $businessVerificationStatus): self
    {
        $this->initialized['businessVerificationStatus'] = true;
        $this->businessVerificationStatus = $businessVerificationStatus;
        return $this;
    }
    /**
     * Whether this account can use WhatsApp's Marketing Messages API, as of `meta_synced_at`. Absent until WhatsApp has reported it. Distinct from the owning portfolio's `marketing_messages_onboarding_status` (`portfolio.marketing_messages_onboarding_status`), which Meta gives the same field name but a different vocabulary: this one is the account's own eligibility, that one is the portfolio's Terms-of-Service progress.
     *
     * @return string|null
     */
    public function getMarketingMessagesOnboardingStatus(): ?string
    {
        return $this->marketingMessagesOnboardingStatus;
    }
    /**
     * Whether this account can use WhatsApp's Marketing Messages API, as of `meta_synced_at`. Absent until WhatsApp has reported it. Distinct from the owning portfolio's `marketing_messages_onboarding_status` (`portfolio.marketing_messages_onboarding_status`), which Meta gives the same field name but a different vocabulary: this one is the account's own eligibility, that one is the portfolio's Terms-of-Service progress.
     *
     * @param string|null $marketingMessagesOnboardingStatus
     *
     * @return self
     */
    public function setMarketingMessagesOnboardingStatus(?string $marketingMessagesOnboardingStatus): self
    {
        $this->initialized['marketingMessagesOnboardingStatus'] = true;
        $this->marketingMessagesOnboardingStatus = $marketingMessagesOnboardingStatus;
        return $this;
    }
    /**
     * The Meta business portfolio that owns this account. Absent until Meta has reported it. The portfolio is where a messaging limit is set, so every account it owns shares one.
     *
     * @return WhatsAppBusinessAccountPortfolio|null
     */
    public function getPortfolio(): ?WhatsAppBusinessAccountPortfolio
    {
        return $this->portfolio;
    }
    /**
     * The Meta business portfolio that owns this account. Absent until Meta has reported it. The portfolio is where a messaging limit is set, so every account it owns shares one.
     *
     * @param WhatsAppBusinessAccountPortfolio|null $portfolio
     *
     * @return self
     */
    public function setPortfolio(?WhatsAppBusinessAccountPortfolio $portfolio): self
    {
        $this->initialized['portfolio'] = true;
        $this->portfolio = $portfolio;
        return $this;
    }
    /**
     * WhatsApp's ban on this account, absent unless Bird was told of one. `status` is what the account said when Bird last read it; this is what WhatsApp announced, which arrives only on the webhook that announces it and is never re-read.
     *
     * @return WhatsAppBusinessAccountBan|null
     */
    public function getBan(): ?WhatsAppBusinessAccountBan
    {
        return $this->ban;
    }
    /**
     * WhatsApp's ban on this account, absent unless Bird was told of one. `status` is what the account said when Bird last read it; this is what WhatsApp announced, which arrives only on the webhook that announces it and is never re-read.
     *
     * @param WhatsAppBusinessAccountBan|null $ban
     *
     * @return self
     */
    public function setBan(?WhatsAppBusinessAccountBan $ban): self
    {
        $this->initialized['ban'] = true;
        $this->ban = $ban;
        return $this;
    }
    /**
     * Meta's own messaging health for this account as of `meta_synced_at`. Absent until Bird has read it, and absent again when the stored reading did not parse at all. An entity whose verdict falls outside this vocabulary is dropped on its own and the rest of the report still ships, so `entities` can be shorter than Meta's. A `blocked` verdict on the `waba` entity is why template sends fail with Meta's `#200` even though the number reads `active`: for example `error_code` `141006` names a payment method Meta rejected on the account.
     *
     * @return WhatsAppBusinessAccountMetaHealthStatus|null
     */
    public function getMetaHealthStatus(): ?WhatsAppBusinessAccountMetaHealthStatus
    {
        return $this->metaHealthStatus;
    }
    /**
     * Meta's own messaging health for this account as of `meta_synced_at`. Absent until Bird has read it, and absent again when the stored reading did not parse at all. An entity whose verdict falls outside this vocabulary is dropped on its own and the rest of the report still ships, so `entities` can be shorter than Meta's. A `blocked` verdict on the `waba` entity is why template sends fail with Meta's `#200` even though the number reads `active`: for example `error_code` `141006` names a payment method Meta rejected on the account.
     *
     * @param WhatsAppBusinessAccountMetaHealthStatus|null $metaHealthStatus
     *
     * @return self
     */
    public function setMetaHealthStatus(?WhatsAppBusinessAccountMetaHealthStatus $metaHealthStatus): self
    {
        $this->initialized['metaHealthStatus'] = true;
        $this->metaHealthStatus = $metaHealthStatus;
        return $this;
    }
    /**
     * When Bird last read this account's state from WhatsApp. `status`, `account_review_status`, `business_verification_status`, `marketing_messages_onboarding_status`, `portfolio` and `meta_health_status` are all that reading rather than live values; Bird re-reads roughly hourly. Absent for an account Bird has never read back.
     *
     * @return \DateTime|null
     */
    public function getMetaSyncedAt(): ?\DateTime
    {
        return $this->metaSyncedAt;
    }
    /**
     * When Bird last read this account's state from WhatsApp. `status`, `account_review_status`, `business_verification_status`, `marketing_messages_onboarding_status`, `portfolio` and `meta_health_status` are all that reading rather than live values; Bird re-reads roughly hourly. Absent for an account Bird has never read back.
     *
     * @param \DateTime|null $metaSyncedAt
     *
     * @return self
     */
    public function setMetaSyncedAt(?\DateTime $metaSyncedAt): self
    {
        $this->initialized['metaSyncedAt'] = true;
        $this->metaSyncedAt = $metaSyncedAt;
        return $this;
    }
    /**
     * When this account was connected.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When this account was connected.
     *
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
     * When this account was last changed.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this account was last changed.
     *
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
