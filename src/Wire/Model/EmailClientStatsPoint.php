<?php

namespace MessageBird\Wire\Model;

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
     * @param EmailClientStatsPointEngagement|null $engagement
     *
     * @return self
     */
    public function setEngagement(?EmailClientStatsPointEngagement $engagement): self
    {
        $this->initialized['engagement'] = true;
        $this->engagement = $engagement;
        return $this;
    }
}
