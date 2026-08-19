<?php

namespace MessageBird\Wire\Model;

class DNSRecord
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
     * The DNS record type to publish, determined by `purpose`.
     * 
     * - `TXT`: used for the `dkim` and `dmarc` purposes.
     * - `CNAME`: used for the `return_path` and `tracking` purposes.
     * - `MX`: used for the `inbound_mx` purpose.
     * 
     *
     * @var string|null
     */
    protected $type;
    /**
     * The record name: the part you enter in your DNS provider's `Name` or `Host` field, relative to the DNS zone the record belongs in (your registered domain). For a sending domain `mail.acme.com` the DKIM record name is `bird1._domainkey.mail`, entered in the `acme.com` zone. `@` for records at the zone apex.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * The fully qualified hostname for this record (for example, `bird1._domainkey.mail.acme.com`).
     * 
     *
     * @var string|null
     */
    protected $host;
    /**
     * The value to publish, as entered in your DNS provider's `Value` or `Content` field. For `TXT`, enter the full record content. For `CNAME`, enter the target hostname. For `MX`, enter the priority followed by the mail server hostname.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * What this record is for.
     * 
     * - `dkim`: signs outbound mail and proves domain ownership.
     * - `return_path`: identifies the return-path (bounce) CNAME for sending.
     * - `tracking`: identifies the optional branded open/click tracking CNAME.
     * - `inbound_mx`: identifies the MX record routing mail to us for receiving.
     *   Always present wherever inbound is available, as a regional reference,
     *   regardless of whether receiving is enabled; publishing it does not
     *   enable receiving on its own: see `DomainUpdate.inbound`.
     * - `dmarc`: identifies the advisory DMARC policy record.
     * 
     *
     * @var string|null
     */
    protected $purpose;
    /**
     * Lifecycle state of this record.
     * 
     * - `active`: the record backs the domain's current configuration.
     * - `pending`: the record belongs to a staged configuration change;
     *   publish it to complete the change.
     * - `deprecated`: the record belonged to a previous configuration.
     *   Keep it in DNS until `safe_to_remove` is `true`; in-flight mail and
     *   previously sent tracked links may still resolve through it.
     * 
     *
     * @var string|null
     */
    protected $state;
    /**
     * Whether this record can be skipped. Optional records enable extra functionality (for example, tracking) but are not required for sending.
     * 
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * Verification status of this record's most recent DNS check.
     * 
     * - `pending`: the record has not verified yet; publish it (or correct it)
     *   and it verifies on the next check.
     * - `verified`: the most recent check matched the expected value.
     * - `warning`: the record verified before and a recent check no longer
     *   matched, but it is still within the grace period. Sending is not yet
     *   affected; fix the record before the grace period ends to avoid it
     *   being blocked.
     * - `failed`: the record verified before but later checks kept failing
     *   past the grace period; the configuration has regressed and needs
     *   attention.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * Human-readable detail for a failed check on this record: what was found in DNS and why it did not match. `null` when the record is verified or not yet checked.
     * 
     *
     * @var string|null
     */
    protected $error;
    /**
     * Only set on `deprecated` records: `true` once the record is no longer referenced by in-flight mail or live tracked links and can be deleted from your DNS. `null` on `active` and `pending` records.
     * 
     *
     * @var bool|null
     */
    protected $safeToRemove;
    /**
     * The DNS record type to publish, determined by `purpose`.
     * 
     * - `TXT`: used for the `dkim` and `dmarc` purposes.
     * - `CNAME`: used for the `return_path` and `tracking` purposes.
     * - `MX`: used for the `inbound_mx` purpose.
     * 
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
    * The DNS record type to publish, determined by `purpose`.
    
    - `TXT`: used for the `dkim` and `dmarc` purposes.
    - `CNAME`: used for the `return_path` and `tracking` purposes.
    - `MX`: used for the `inbound_mx` purpose.
    
    *
    * @param string|null $type
    *
    * @return self
    */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The record name: the part you enter in your DNS provider's `Name` or `Host` field, relative to the DNS zone the record belongs in (your registered domain). For a sending domain `mail.acme.com` the DKIM record name is `bird1._domainkey.mail`, entered in the `acme.com` zone. `@` for records at the zone apex.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The record name: the part you enter in your DNS provider's `Name` or `Host` field, relative to the DNS zone the record belongs in (your registered domain). For a sending domain `mail.acme.com` the DKIM record name is `bird1._domainkey.mail`, entered in the `acme.com` zone. `@` for records at the zone apex.
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
     * The fully qualified hostname for this record (for example, `bird1._domainkey.mail.acme.com`).
     * 
     *
     * @return string|null
     */
    public function getHost(): ?string
    {
        return $this->host;
    }
    /**
     * The fully qualified hostname for this record (for example, `bird1._domainkey.mail.acme.com`).
     *
     * @param string|null $host
     *
     * @return self
     */
    public function setHost(?string $host): self
    {
        $this->initialized['host'] = true;
        $this->host = $host;
        return $this;
    }
    /**
     * The value to publish, as entered in your DNS provider's `Value` or `Content` field. For `TXT`, enter the full record content. For `CNAME`, enter the target hostname. For `MX`, enter the priority followed by the mail server hostname.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * The value to publish, as entered in your DNS provider's `Value` or `Content` field. For `TXT`, enter the full record content. For `CNAME`, enter the target hostname. For `MX`, enter the priority followed by the mail server hostname.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * What this record is for.
     * 
     * - `dkim`: signs outbound mail and proves domain ownership.
     * - `return_path`: identifies the return-path (bounce) CNAME for sending.
     * - `tracking`: identifies the optional branded open/click tracking CNAME.
     * - `inbound_mx`: identifies the MX record routing mail to us for receiving.
     *   Always present wherever inbound is available, as a regional reference,
     *   regardless of whether receiving is enabled; publishing it does not
     *   enable receiving on its own: see `DomainUpdate.inbound`.
     * - `dmarc`: identifies the advisory DMARC policy record.
     * 
     *
     * @return string|null
     */
    public function getPurpose(): ?string
    {
        return $this->purpose;
    }
    /**
    * What this record is for.
    
    - `dkim`: signs outbound mail and proves domain ownership.
    - `return_path`: identifies the return-path (bounce) CNAME for sending.
    - `tracking`: identifies the optional branded open/click tracking CNAME.
    - `inbound_mx`: identifies the MX record routing mail to us for receiving.
     Always present wherever inbound is available, as a regional reference,
     regardless of whether receiving is enabled; publishing it does not
     enable receiving on its own: see `DomainUpdate.inbound`.
    - `dmarc`: identifies the advisory DMARC policy record.
    
    *
    * @param string|null $purpose
    *
    * @return self
    */
    public function setPurpose(?string $purpose): self
    {
        $this->initialized['purpose'] = true;
        $this->purpose = $purpose;
        return $this;
    }
    /**
     * Lifecycle state of this record.
     * 
     * - `active`: the record backs the domain's current configuration.
     * - `pending`: the record belongs to a staged configuration change;
     *   publish it to complete the change.
     * - `deprecated`: the record belonged to a previous configuration.
     *   Keep it in DNS until `safe_to_remove` is `true`; in-flight mail and
     *   previously sent tracked links may still resolve through it.
     * 
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
    * Lifecycle state of this record.
    
    - `active`: the record backs the domain's current configuration.
    - `pending`: the record belongs to a staged configuration change;
     publish it to complete the change.
    - `deprecated`: the record belonged to a previous configuration.
     Keep it in DNS until `safe_to_remove` is `true`; in-flight mail and
     previously sent tracked links may still resolve through it.
    
    *
    * @param string|null $state
    *
    * @return self
    */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * Whether this record can be skipped. Optional records enable extra functionality (for example, tracking) but are not required for sending.
     * 
     *
     * @return bool|null
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }
    /**
     * Whether this record can be skipped. Optional records enable extra functionality (for example, tracking) but are not required for sending.
     *
     * @param bool|null $optional
     *
     * @return self
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;
        return $this;
    }
    /**
     * Verification status of this record's most recent DNS check.
     * 
     * - `pending`: the record has not verified yet; publish it (or correct it)
     *   and it verifies on the next check.
     * - `verified`: the most recent check matched the expected value.
     * - `warning`: the record verified before and a recent check no longer
     *   matched, but it is still within the grace period. Sending is not yet
     *   affected; fix the record before the grace period ends to avoid it
     *   being blocked.
     * - `failed`: the record verified before but later checks kept failing
     *   past the grace period; the configuration has regressed and needs
     *   attention.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Verification status of this record's most recent DNS check.
    
    - `pending`: the record has not verified yet; publish it (or correct it)
     and it verifies on the next check.
    - `verified`: the most recent check matched the expected value.
    - `warning`: the record verified before and a recent check no longer
     matched, but it is still within the grace period. Sending is not yet
     affected; fix the record before the grace period ends to avoid it
     being blocked.
    - `failed`: the record verified before but later checks kept failing
     past the grace period; the configuration has regressed and needs
     attention.
    
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
     * Human-readable detail for a failed check on this record: what was found in DNS and why it did not match. `null` when the record is verified or not yet checked.
     * 
     *
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }
    /**
     * Human-readable detail for a failed check on this record: what was found in DNS and why it did not match. `null` when the record is verified or not yet checked.
     *
     * @param string|null $error
     *
     * @return self
     */
    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
    /**
     * Only set on `deprecated` records: `true` once the record is no longer referenced by in-flight mail or live tracked links and can be deleted from your DNS. `null` on `active` and `pending` records.
     * 
     *
     * @return bool|null
     */
    public function getSafeToRemove(): ?bool
    {
        return $this->safeToRemove;
    }
    /**
     * Only set on `deprecated` records: `true` once the record is no longer referenced by in-flight mail or live tracked links and can be deleted from your DNS. `null` on `active` and `pending` records.
     *
     * @param bool|null $safeToRemove
     *
     * @return self
     */
    public function setSafeToRemove(?bool $safeToRemove): self
    {
        $this->initialized['safeToRemove'] = true;
        $this->safeToRemove = $safeToRemove;
        return $this;
    }
}
