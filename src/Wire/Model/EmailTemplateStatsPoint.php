<?php

namespace MessageBird\Wire\Model;

class EmailTemplateStatsPoint
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
     * The template this row aggregates, the same identifier returned by the email-template endpoints. Only messages sent with a template appear in this breakdown; a template deleted after sending still appears by its ID.
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * @var EmailTemplateStatsPointDelivery|null
     */
    protected $delivery;
    /**
     * @var EmailTemplateStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * @var EmailTemplateStatsPointLatency|null
     */
    protected $latency;
    /**
     * Per-bucket rate series for this template over the window. Present only when `include_trend=true`.
     *
     * @var list<EmailStatsSeriesPoint>|null
     */
    protected $trend;
    /**
     * The template this row aggregates, the same identifier returned by the email-template endpoints. Only messages sent with a template appear in this breakdown; a template deleted after sending still appears by its ID.
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * The template this row aggregates, the same identifier returned by the email-template endpoints. Only messages sent with a template appear in this breakdown; a template deleted after sending still appears by its ID.
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
     * @return EmailTemplateStatsPointDelivery|null
     */
    public function getDelivery(): ?EmailTemplateStatsPointDelivery
    {
        return $this->delivery;
    }
    /**
     * @param EmailTemplateStatsPointDelivery|null $delivery
     *
     * @return self
     */
    public function setDelivery(?EmailTemplateStatsPointDelivery $delivery): self
    {
        $this->initialized['delivery'] = true;
        $this->delivery = $delivery;
        return $this;
    }
    /**
     * @return EmailTemplateStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailTemplateStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailTemplateStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailTemplateStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
    /**
     * @return EmailTemplateStatsPointLatency|null
     */
    public function getLatency(): ?EmailTemplateStatsPointLatency
    {
        return $this->latency;
    }
    /**
     * @param EmailTemplateStatsPointLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?EmailTemplateStatsPointLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Per-bucket rate series for this template over the window. Present only when `include_trend=true`.
     *
     * @return list<EmailStatsSeriesPoint>|null
     */
    public function getTrend(): ?array
    {
        return $this->trend;
    }
    /**
     * Per-bucket rate series for this template over the window. Present only when `include_trend=true`.
     *
     * @param list<EmailStatsSeriesPoint>|null $trend
     *
     * @return self
     */
    public function setTrend(?array $trend): self
    {
        $this->initialized['trend'] = true;
        $this->trend = $trend;
        return $this;
    }
}
