<?php

namespace MessageBird\Wire\Model;

class WhatsAppBusinessAccountPortfolio extends \ArrayObject
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
     * Meta's identifier for the portfolio. Treat it as an opaque string.
     *
     * @var string|null
     */
    protected $metaId;
    /**
     * The portfolio's name, as Meta reports it. Absent when Meta returned none.
     *
     * @var string|null
     */
    protected $name;
    /**
     * How far this portfolio has got through Meta's Marketing Messages terms of service. Absent until Meta has reported it. Distinct from the account's own `marketing_messages_onboarding_status`, which Meta gives the same field name but a different vocabulary: that one is the account's own eligibility, this one is the portfolio's Terms-of-Service progress.
     *
     * @var string|null
     */
    protected $marketingMessagesOnboardingStatus;
    /**
     * Meta's identifier for the portfolio. Treat it as an opaque string.
     *
     * @return string|null
     */
    public function getMetaId(): ?string
    {
        return $this->metaId;
    }
    /**
     * Meta's identifier for the portfolio. Treat it as an opaque string.
     *
     * @param string|null $metaId
     *
     * @return self
     */
    public function setMetaId(?string $metaId): self
    {
        $this->initialized['metaId'] = true;
        $this->metaId = $metaId;
        return $this;
    }
    /**
     * The portfolio's name, as Meta reports it. Absent when Meta returned none.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The portfolio's name, as Meta reports it. Absent when Meta returned none.
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
     * How far this portfolio has got through Meta's Marketing Messages terms of service. Absent until Meta has reported it. Distinct from the account's own `marketing_messages_onboarding_status`, which Meta gives the same field name but a different vocabulary: that one is the account's own eligibility, this one is the portfolio's Terms-of-Service progress.
     *
     * @return string|null
     */
    public function getMarketingMessagesOnboardingStatus(): ?string
    {
        return $this->marketingMessagesOnboardingStatus;
    }
    /**
     * How far this portfolio has got through Meta's Marketing Messages terms of service. Absent until Meta has reported it. Distinct from the account's own `marketing_messages_onboarding_status`, which Meta gives the same field name but a different vocabulary: that one is the account's own eligibility, this one is the portfolio's Terms-of-Service progress.
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
}
