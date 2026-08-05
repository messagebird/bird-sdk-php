<?php

namespace MessageBird\Wire\Model;

class EmailBounceCodeStatsPoint
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
     * The SMTP error code the receiving mail server returned for these bounces, as reported by that server (for example `5.1.1` for an unknown recipient, `4.2.2` for a full mailbox). The form varies by server, and the set of codes is open.
     *
     * @var string|null
     */
    protected $smtpErrorCode;
    /**
     * Distinct recipients whose delivery failed with this SMTP status code. Approximately the sum of the five `bounces.*` sub-counts; the totals are computed independently so they may differ slightly at the approximation error.
     *
     * @var int|null
     */
    protected $bounced;
    /**
     * @var EmailBounceCodeStatsPointBounces|null
     */
    protected $bounces;
    /**
     * The SMTP error code the receiving mail server returned for these bounces, as reported by that server (for example `5.1.1` for an unknown recipient, `4.2.2` for a full mailbox). The form varies by server, and the set of codes is open.
     *
     * @return string|null
     */
    public function getSmtpErrorCode(): ?string
    {
        return $this->smtpErrorCode;
    }
    /**
     * The SMTP error code the receiving mail server returned for these bounces, as reported by that server (for example `5.1.1` for an unknown recipient, `4.2.2` for a full mailbox). The form varies by server, and the set of codes is open.
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
     * Distinct recipients whose delivery failed with this SMTP status code. Approximately the sum of the five `bounces.*` sub-counts; the totals are computed independently so they may differ slightly at the approximation error.
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Distinct recipients whose delivery failed with this SMTP status code. Approximately the sum of the five `bounces.*` sub-counts; the totals are computed independently so they may differ slightly at the approximation error.
     *
     * @param int|null $bounced
     *
     * @return self
     */
    public function setBounced(?int $bounced): self
    {
        $this->initialized['bounced'] = true;
        $this->bounced = $bounced;
        return $this;
    }
    /**
     * @return EmailBounceCodeStatsPointBounces|null
     */
    public function getBounces(): ?EmailBounceCodeStatsPointBounces
    {
        return $this->bounces;
    }
    /**
     * @param EmailBounceCodeStatsPointBounces|null $bounces
     *
     * @return self
     */
    public function setBounces(?EmailBounceCodeStatsPointBounces $bounces): self
    {
        $this->initialized['bounces'] = true;
        $this->bounces = $bounces;
        return $this;
    }
}
