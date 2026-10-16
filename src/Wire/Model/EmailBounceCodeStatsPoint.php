<?php

namespace MessageBird\Wire\Model;

/**
 * Bounce counts for a single SMTP status code over the requested period, with the per-type breakdown. This is a deliverability-debugging view keyed on what the receiving mail server returned, so it only reports the failure side: bounced recipients, and their `hard`, `soft`, `admin`, `block`, and `undetermined` split. It has no delivered, open, or rate fields.
 */
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
     * Distinct recipients whose delivery failed with this SMTP status code, approximately equal to the sum of the five `bounces.*` sub-counts. The two are computed independently, so they can differ slightly because of approximation.
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
     * Distinct recipients whose delivery failed with this SMTP status code, approximately equal to the sum of the five `bounces.*` sub-counts. The two are computed independently, so they can differ slightly because of approximation.
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Distinct recipients whose delivery failed with this SMTP status code, approximately equal to the sum of the five `bounces.*` sub-counts. The two are computed independently, so they can differ slightly because of approximation.
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
     * @param EmailBounceCodeStatsPointBounces|EmailBounceStats|array|null $bounces
     *
     * @return self
     */
    public function setBounces($bounces): self
    {
        $this->initialized['bounces'] = true;
        $this->bounces = \MessageBird\Core\ModelWrapper::normalize($bounces, EmailBounceCodeStatsPointBounces::class);
        return $this;
    }
}
