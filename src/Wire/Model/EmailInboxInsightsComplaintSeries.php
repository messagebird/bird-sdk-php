<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsComplaintSeries
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
     * One point per bucket.
     *
     * @var list<EmailInboxInsightsComplaintSeriesPoint>|null
     */
    protected $items;
    /**
     * Whether a section of the response carries figures, and when it does not, why.
     * 
     * `ok` means the section is populated. `no_data` means the measurement ran and
     * observed nothing to report for this domain in the period. `not_configured`
     * means the section needs a setup step that has not been completed yet, such as
     * connecting Google Postmaster Tools; treat it as an invitation to finish
     * setup rather than a fault. `unavailable` means the figures could not be retrieved this time and
     * the same request may well succeed on a retry; the rest of the response is
     * unaffected. `not_applicable` means the section is meaningless for this domain
     * in this period, so there is nothing to show or fix.
     * 
     * A successful response never implies every section is populated; read each
     * section's status rather than assuming figures are present.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * One point per bucket.
     *
     * @return list<EmailInboxInsightsComplaintSeriesPoint>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * One point per bucket.
     *
     * @param list<EmailInboxInsightsComplaintSeriesPoint>|null $items
     *
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
    /**
     * Whether a section of the response carries figures, and when it does not, why.
     * 
     * `ok` means the section is populated. `no_data` means the measurement ran and
     * observed nothing to report for this domain in the period. `not_configured`
     * means the section needs a setup step that has not been completed yet, such as
     * connecting Google Postmaster Tools; treat it as an invitation to finish
     * setup rather than a fault. `unavailable` means the figures could not be retrieved this time and
     * the same request may well succeed on a retry; the rest of the response is
     * unaffected. `not_applicable` means the section is meaningless for this domain
     * in this period, so there is nothing to show or fix.
     * 
     * A successful response never implies every section is populated; read each
     * section's status rather than assuming figures are present.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Whether a section of the response carries figures, and when it does not, why.
    
    `ok` means the section is populated. `no_data` means the measurement ran and
    observed nothing to report for this domain in the period. `not_configured`
    means the section needs a setup step that has not been completed yet, such as
    connecting Google Postmaster Tools; treat it as an invitation to finish
    setup rather than a fault. `unavailable` means the figures could not be retrieved this time and
    the same request may well succeed on a retry; the rest of the response is
    unaffected. `not_applicable` means the section is meaningless for this domain
    in this period, so there is nothing to show or fix.
    
    A successful response never implies every section is populated; read each
    section's status rather than assuming figures are present.
    
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
}
