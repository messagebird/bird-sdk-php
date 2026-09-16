<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveSendTimeGrid
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
     * The period every figure in the response covers, echoed back from the request.
     * 
     * Figures are fetched when the request is made, so they are current as of `to`.
     * The period always ends at the moment of the request rather than at a cached
     * boundary, which is why two requests a minute apart can differ slightly.
     * 
     *
     * @var EmailCompetitivePeriod|null
     */
    protected $period;
    /**
     * IANA timezone identifier, such as `America/New_York`, `Europe/Amsterdam`, or `UTC`.
     *
     * @var string|null
     */
    protected $timezone;
    /**
     * Whether panel figures are available for a row, and when they are not, why.
     * 
     * `ok` means the panel reported figures for the requested period. `not_in_panel`
     * means the panel does not track the sending domain at all, which is common for
     * smaller and newer senders. `no_data` means the panel tracks the domain but
     * observed no mail from it in the period. `unavailable` means the figures could
     * not be retrieved this time and the same request may well succeed on a retry.
     * 
     *
     * @var string|null
     */
    protected $panelStatus;
    /**
     * Every weekday and hour of the week, Monday first and hour ascending: 168 in all, whether or not the brand sent in them, so the grid needs no filling in. Empty when there was nothing to read, which `panel_status` explains.
     * 
     *
     * @var list<EmailCompetitiveSendTimeCell>|null
     */
    protected $cells;
    /**
     * The hour of the day the brand sends most of its mail in, totalled across the whole week, or null when nothing was observed. It carries no weekday: for most brands the hour of the day is where the pattern is and the day of the week barely moves, so naming a busiest weekday would give a figure more meaning than it has. It is also not always the darkest cell, on the same reasoning: one busy Wednesday can outweigh the hour the brand mails in every single day.
     * 
     *
     * @var EmailCompetitiveSendTimeGridPeakSendWindow|null
     */
    protected $peakSendWindow;
    /**
     * The period every figure in the response covers, echoed back from the request.
     * 
     * Figures are fetched when the request is made, so they are current as of `to`.
     * The period always ends at the moment of the request rather than at a cached
     * boundary, which is why two requests a minute apart can differ slightly.
     * 
     *
     * @return EmailCompetitivePeriod|null
     */
    public function getPeriod(): ?EmailCompetitivePeriod
    {
        return $this->period;
    }
    /**
    * The period every figure in the response covers, echoed back from the request.
    
    Figures are fetched when the request is made, so they are current as of `to`.
    The period always ends at the moment of the request rather than at a cached
    boundary, which is why two requests a minute apart can differ slightly.
    
    *
    * @param EmailCompetitivePeriod|null $period
    *
    * @return self
    */
    public function setPeriod(?EmailCompetitivePeriod $period): self
    {
        $this->initialized['period'] = true;
        $this->period = $period;
        return $this;
    }
    /**
     * IANA timezone identifier, such as `America/New_York`, `Europe/Amsterdam`, or `UTC`.
     *
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }
    /**
     * IANA timezone identifier, such as `America/New_York`, `Europe/Amsterdam`, or `UTC`.
     *
     * @param string|null $timezone
     *
     * @return self
     */
    public function setTimezone(?string $timezone): self
    {
        $this->initialized['timezone'] = true;
        $this->timezone = $timezone;
        return $this;
    }
    /**
     * Whether panel figures are available for a row, and when they are not, why.
     * 
     * `ok` means the panel reported figures for the requested period. `not_in_panel`
     * means the panel does not track the sending domain at all, which is common for
     * smaller and newer senders. `no_data` means the panel tracks the domain but
     * observed no mail from it in the period. `unavailable` means the figures could
     * not be retrieved this time and the same request may well succeed on a retry.
     * 
     *
     * @return string|null
     */
    public function getPanelStatus(): ?string
    {
        return $this->panelStatus;
    }
    /**
    * Whether panel figures are available for a row, and when they are not, why.
    
    `ok` means the panel reported figures for the requested period. `not_in_panel`
    means the panel does not track the sending domain at all, which is common for
    smaller and newer senders. `no_data` means the panel tracks the domain but
    observed no mail from it in the period. `unavailable` means the figures could
    not be retrieved this time and the same request may well succeed on a retry.
    
    *
    * @param string|null $panelStatus
    *
    * @return self
    */
    public function setPanelStatus(?string $panelStatus): self
    {
        $this->initialized['panelStatus'] = true;
        $this->panelStatus = $panelStatus;
        return $this;
    }
    /**
     * Every weekday and hour of the week, Monday first and hour ascending: 168 in all, whether or not the brand sent in them, so the grid needs no filling in. Empty when there was nothing to read, which `panel_status` explains.
     * 
     *
     * @return list<EmailCompetitiveSendTimeCell>|null
     */
    public function getCells(): ?array
    {
        return $this->cells;
    }
    /**
     * Every weekday and hour of the week, Monday first and hour ascending: 168 in all, whether or not the brand sent in them, so the grid needs no filling in. Empty when there was nothing to read, which `panel_status` explains.
     *
     * @param list<EmailCompetitiveSendTimeCell>|null $cells
     *
     * @return self
     */
    public function setCells(?array $cells): self
    {
        $this->initialized['cells'] = true;
        $this->cells = $cells;
        return $this;
    }
    /**
     * The hour of the day the brand sends most of its mail in, totalled across the whole week, or null when nothing was observed. It carries no weekday: for most brands the hour of the day is where the pattern is and the day of the week barely moves, so naming a busiest weekday would give a figure more meaning than it has. It is also not always the darkest cell, on the same reasoning: one busy Wednesday can outweigh the hour the brand mails in every single day.
     * 
     *
     * @return EmailCompetitiveSendTimeGridPeakSendWindow|null
     */
    public function getPeakSendWindow(): ?EmailCompetitiveSendTimeGridPeakSendWindow
    {
        return $this->peakSendWindow;
    }
    /**
     * The hour of the day the brand sends most of its mail in, totalled across the whole week, or null when nothing was observed. It carries no weekday: for most brands the hour of the day is where the pattern is and the day of the week barely moves, so naming a busiest weekday would give a figure more meaning than it has. It is also not always the darkest cell, on the same reasoning: one busy Wednesday can outweigh the hour the brand mails in every single day.
     *
     * @param EmailCompetitiveSendTimeGridPeakSendWindow|null $peakSendWindow
     *
     * @return self
     */
    public function setPeakSendWindow(?EmailCompetitiveSendTimeGridPeakSendWindow $peakSendWindow): self
    {
        $this->initialized['peakSendWindow'] = true;
        $this->peakSendWindow = $peakSendWindow;
        return $this;
    }
}
