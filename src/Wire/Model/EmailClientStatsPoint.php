<?php

namespace MessageBird\Wire\Model;

/**
 * Engagement counts for messages opened or clicked from a single email client, operating system, or device type over the requested period. The reading environment is resolved from open and click events only, so this breakdown reports engagement activity: opens, clicks, and the recipients behind them. It has no delivery counts and no open or click rates, because the receiving mail server reports delivery without a client or device, preventing a per-client delivered denominator and rates. Exactly one of `email_client`, `os`, and `device_type` is populated, selected by the request's `group_by`. The other two are null. Inbox-privacy prefetching also affects the detected client. As with open counts, `opens_non_prefetched` excludes opens auto-fetched by an inbox privacy feature. It includes opens caused by a person opening the message.
 */
class EmailClientStatsPoint
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
     * The mail client this row aggregates (for example `Gmail`, `Apple Mail`, `Outlook`). Populated only when `group_by=email_client`. Null otherwise.
     *
     * @var string|null
     */
    protected $emailClient;
    /**
     * The operating system this row aggregates (for example `iOS`, `Android`, `Windows`, `macOS`). Populated only when `group_by=os`. Null otherwise.
     *
     * @var string|null
     */
    protected $os;
    /**
     * The device type this row aggregates (for example `mobile`, `desktop`, `tablet`). Populated only when `group_by=device_type`. Null otherwise.
     *
     * @var string|null
     */
    protected $deviceType;
    /**
     * @var EmailClientStatsPointEngagement|null
     */
    protected $engagement;
    /**
     * The mail client this row aggregates (for example `Gmail`, `Apple Mail`, `Outlook`). Populated only when `group_by=email_client`. Null otherwise.
     *
     * @return string|null
     */
    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }
    /**
     * The mail client this row aggregates (for example `Gmail`, `Apple Mail`, `Outlook`). Populated only when `group_by=email_client`. Null otherwise.
     *
     * @param string|null $emailClient
     *
     * @return self
     */
    public function setEmailClient(?string $emailClient): self
    {
        $this->initialized['emailClient'] = true;
        $this->emailClient = $emailClient;
        return $this;
    }
    /**
     * The operating system this row aggregates (for example `iOS`, `Android`, `Windows`, `macOS`). Populated only when `group_by=os`. Null otherwise.
     *
     * @return string|null
     */
    public function getOs(): ?string
    {
        return $this->os;
    }
    /**
     * The operating system this row aggregates (for example `iOS`, `Android`, `Windows`, `macOS`). Populated only when `group_by=os`. Null otherwise.
     *
     * @param string|null $os
     *
     * @return self
     */
    public function setOs(?string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;
        return $this;
    }
    /**
     * The device type this row aggregates (for example `mobile`, `desktop`, `tablet`). Populated only when `group_by=device_type`. Null otherwise.
     *
     * @return string|null
     */
    public function getDeviceType(): ?string
    {
        return $this->deviceType;
    }
    /**
     * The device type this row aggregates (for example `mobile`, `desktop`, `tablet`). Populated only when `group_by=device_type`. Null otherwise.
     *
     * @param string|null $deviceType
     *
     * @return self
     */
    public function setDeviceType(?string $deviceType): self
    {
        $this->initialized['deviceType'] = true;
        $this->deviceType = $deviceType;
        return $this;
    }
    /**
     * @return EmailClientStatsPointEngagement|null
     */
    public function getEngagement(): ?EmailClientStatsPointEngagement
    {
        return $this->engagement;
    }
    /**
     * @param EmailClientStatsPointEngagement|EmailEngagementCounts|array|null $engagement
     *
     * @return self
     */
    public function setEngagement($engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = \MessageBird\Core\ModelWrapper::normalize($engagement, EmailClientStatsPointEngagement::class);
        return $this;
    }
}
