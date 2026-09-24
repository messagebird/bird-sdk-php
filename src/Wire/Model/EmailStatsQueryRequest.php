<?php

namespace MessageBird\Wire\Model;

class EmailStatsQueryRequest
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
     * Inclusive start, as a calendar date or RFC 3339 instant. Use the same form for from and to. Instants round down to a local quarter-hour; use Z when timezone is supplied.
     *
     * @var string|null
     */
    protected $from;
    /**
     * Inclusive end. Dates include the whole local day; instants round down to a local quarter-hour and include that quarter-hour. Dates allow up to 365 local days; instants allow up to 720 hours, subject to available history. Preserve this original bound when following cursors.
     *
     * @var string|null
     */
    protected $to;
    /**
     * IANA timezone for dates and bucket boundaries. Defaults to UTC.
     *
     * @var string|null
     */
    protected $timezone;
    /**
     * Distinct metrics to return. Unselected metrics are absent.
     *
     * @var list<string>|null
     */
    protected $metrics;
    /**
     * Recorded event context used to group results. Grouping by `tag` requires `filters.tag.name`.
     * Missing values form a null group when the metric supports that dimension.
     * 
     * Every selected metric must support the grouping dimension and every filter dimension.
     * Unsupported combinations return validation error `E04074`, even when the workspace has no events.
     * 
     * - `sending_domain`, `category`, `template_id`, `tag`: all metrics.
     * - `recipient_domain`, `ip_pool_id`, `broadcast_id`: all metrics except `sends_accepted`.
     * - `mailbox_provider`, `mailbox_provider_region`: all metrics except `sends_accepted`, `accepted`, and `rejected`.
     * - `sending_ip`: `delivered`, `bounced`, `hard_bounced`, `soft_bounced`, `admin_bounced`, `block_bounced`,
     *   `undetermined_bounced`, `deferred`, `oob_bounces`, `effective_delivered`, `all_bounces`, `delivery_rate`,
     *   `bounce_rate`, `deferral_rate`, `oob_rate`, `total_p50_ms`, `total_p95_ms`, and `total_p99_ms`.
     * - `country`, `region`, `city`, `agent_family`, `os_family`, `device_family`: `opens`, `opens_non_prefetched`,
     *   `clicks`, `unique_opens`, `unique_opens_non_prefetched`, `unique_clicks`, `confirmed_unique_opens`,
     *   and `confirmed_unique_opens_non_prefetched`.
     * - `smtp_error_code`: `bounced`, `hard_bounced`, `soft_bounced`, `admin_bounced`, `block_bounced`, and `undetermined_bounced`.
     * - `feedback_type`: `complained`.
     * 
     *
     * @var string|null
     */
    protected $groupBy;
    /**
     * Time buckets in the requested timezone. Weeks start on Monday; months start on the first day. Half days start at midnight and noon. Edge buckets count events inside the normalized period.
     *
     * @var string|null
     */
    protected $grain;
    /**
     * Predicates on the context recorded for each event. Dimensions combine with AND. Unsupported metric and dimension combinations return 422, including for an empty workspace.
     *
     * @var EmailStatsQueryFilters|null
     */
    protected $filters;
    /**
     * Metric selected for period totals, time buckets, or group ranking. Counts estimate distinct identities; rates are ratios. Latency metrics measure milliseconds from Bird acceptance to processing or delivery.
     *
     * @var string|null
     */
    protected $sort;
    /**
     * Sort direction, ascending or descending.
     *
     * @var string|null
     */
    protected $order;
    /**
     * Grouped requests only. Maximum groups per page; defaults to 25. Each group retains its complete series.
     *
     * @var int|null
     */
    protected $limit;
    /**
     * Grouped requests only. Opaque next_cursor from the previous response. Mutually exclusive with ending_before.
     *
     * @var string|null
     */
    protected $startingAfter;
    /**
     * Grouped requests only. Opaque prev_cursor for backward navigation, or refresh_cursor to read groups before the anchor in the current sort order. Mutually exclusive with starting_after.
     *
     * @var string|null
     */
    protected $endingBefore;
    /**
     * Inclusive start, as a calendar date or RFC 3339 instant. Use the same form for from and to. Instants round down to a local quarter-hour; use Z when timezone is supplied.
     *
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }
    /**
     * Inclusive start, as a calendar date or RFC 3339 instant. Use the same form for from and to. Instants round down to a local quarter-hour; use Z when timezone is supplied.
     *
     * @param string|null $from
     *
     * @return self
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;
        return $this;
    }
    /**
     * Inclusive end. Dates include the whole local day; instants round down to a local quarter-hour and include that quarter-hour. Dates allow up to 365 local days; instants allow up to 720 hours, subject to available history. Preserve this original bound when following cursors.
     *
     * @return string|null
     */
    public function getTo(): ?string
    {
        return $this->to;
    }
    /**
     * Inclusive end. Dates include the whole local day; instants round down to a local quarter-hour and include that quarter-hour. Dates allow up to 365 local days; instants allow up to 720 hours, subject to available history. Preserve this original bound when following cursors.
     *
     * @param string|null $to
     *
     * @return self
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;
        return $this;
    }
    /**
     * IANA timezone for dates and bucket boundaries. Defaults to UTC.
     *
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }
    /**
     * IANA timezone for dates and bucket boundaries. Defaults to UTC.
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
     * Distinct metrics to return. Unselected metrics are absent.
     *
     * @return list<string>|null
     */
    public function getMetrics(): ?array
    {
        return $this->metrics;
    }
    /**
     * Distinct metrics to return. Unselected metrics are absent.
     *
     * @param list<string>|null $metrics
     *
     * @return self
     */
    public function setMetrics(?array $metrics): self
    {
        $this->initialized['metrics'] = true;
        $this->metrics = $metrics;
        return $this;
    }
    /**
     * Recorded event context used to group results. Grouping by `tag` requires `filters.tag.name`.
     * Missing values form a null group when the metric supports that dimension.
     * 
     * Every selected metric must support the grouping dimension and every filter dimension.
     * Unsupported combinations return validation error `E04074`, even when the workspace has no events.
     * 
     * - `sending_domain`, `category`, `template_id`, `tag`: all metrics.
     * - `recipient_domain`, `ip_pool_id`, `broadcast_id`: all metrics except `sends_accepted`.
     * - `mailbox_provider`, `mailbox_provider_region`: all metrics except `sends_accepted`, `accepted`, and `rejected`.
     * - `sending_ip`: `delivered`, `bounced`, `hard_bounced`, `soft_bounced`, `admin_bounced`, `block_bounced`,
     *   `undetermined_bounced`, `deferred`, `oob_bounces`, `effective_delivered`, `all_bounces`, `delivery_rate`,
     *   `bounce_rate`, `deferral_rate`, `oob_rate`, `total_p50_ms`, `total_p95_ms`, and `total_p99_ms`.
     * - `country`, `region`, `city`, `agent_family`, `os_family`, `device_family`: `opens`, `opens_non_prefetched`,
     *   `clicks`, `unique_opens`, `unique_opens_non_prefetched`, `unique_clicks`, `confirmed_unique_opens`,
     *   and `confirmed_unique_opens_non_prefetched`.
     * - `smtp_error_code`: `bounced`, `hard_bounced`, `soft_bounced`, `admin_bounced`, `block_bounced`, and `undetermined_bounced`.
     * - `feedback_type`: `complained`.
     * 
     *
     * @return string|null
     */
    public function getGroupBy(): ?string
    {
        return $this->groupBy;
    }
    /**
    * Recorded event context used to group results. Grouping by `tag` requires `filters.tag.name`.
    Missing values form a null group when the metric supports that dimension.
    
    Every selected metric must support the grouping dimension and every filter dimension.
    Unsupported combinations return validation error `E04074`, even when the workspace has no events.
    
    - `sending_domain`, `category`, `template_id`, `tag`: all metrics.
    - `recipient_domain`, `ip_pool_id`, `broadcast_id`: all metrics except `sends_accepted`.
    - `mailbox_provider`, `mailbox_provider_region`: all metrics except `sends_accepted`, `accepted`, and `rejected`.
    - `sending_ip`: `delivered`, `bounced`, `hard_bounced`, `soft_bounced`, `admin_bounced`, `block_bounced`,
     `undetermined_bounced`, `deferred`, `oob_bounces`, `effective_delivered`, `all_bounces`, `delivery_rate`,
     `bounce_rate`, `deferral_rate`, `oob_rate`, `total_p50_ms`, `total_p95_ms`, and `total_p99_ms`.
    - `country`, `region`, `city`, `agent_family`, `os_family`, `device_family`: `opens`, `opens_non_prefetched`,
     `clicks`, `unique_opens`, `unique_opens_non_prefetched`, `unique_clicks`, `confirmed_unique_opens`,
     and `confirmed_unique_opens_non_prefetched`.
    - `smtp_error_code`: `bounced`, `hard_bounced`, `soft_bounced`, `admin_bounced`, `block_bounced`, and `undetermined_bounced`.
    - `feedback_type`: `complained`.
    
    *
    * @param string|null $groupBy
    *
    * @return self
    */
    public function setGroupBy(?string $groupBy): self
    {
        $this->initialized['groupBy'] = true;
        $this->groupBy = $groupBy;
        return $this;
    }
    /**
     * Time buckets in the requested timezone. Weeks start on Monday; months start on the first day. Half days start at midnight and noon. Edge buckets count events inside the normalized period.
     *
     * @return string|null
     */
    public function getGrain(): ?string
    {
        return $this->grain;
    }
    /**
     * Time buckets in the requested timezone. Weeks start on Monday; months start on the first day. Half days start at midnight and noon. Edge buckets count events inside the normalized period.
     *
     * @param string|null $grain
     *
     * @return self
     */
    public function setGrain(?string $grain): self
    {
        $this->initialized['grain'] = true;
        $this->grain = $grain;
        return $this;
    }
    /**
     * Predicates on the context recorded for each event. Dimensions combine with AND. Unsupported metric and dimension combinations return 422, including for an empty workspace.
     *
     * @return EmailStatsQueryFilters|null
     */
    public function getFilters(): ?EmailStatsQueryFilters
    {
        return $this->filters;
    }
    /**
     * Predicates on the context recorded for each event. Dimensions combine with AND. Unsupported metric and dimension combinations return 422, including for an empty workspace.
     *
     * @param EmailStatsQueryFilters|null $filters
     *
     * @return self
     */
    public function setFilters(?EmailStatsQueryFilters $filters): self
    {
        $this->initialized['filters'] = true;
        $this->filters = $filters;
        return $this;
    }
    /**
     * Metric selected for period totals, time buckets, or group ranking. Counts estimate distinct identities; rates are ratios. Latency metrics measure milliseconds from Bird acceptance to processing or delivery.
     *
     * @return string|null
     */
    public function getSort(): ?string
    {
        return $this->sort;
    }
    /**
     * Metric selected for period totals, time buckets, or group ranking. Counts estimate distinct identities; rates are ratios. Latency metrics measure milliseconds from Bird acceptance to processing or delivery.
     *
     * @param string|null $sort
     *
     * @return self
     */
    public function setSort(?string $sort): self
    {
        $this->initialized['sort'] = true;
        $this->sort = $sort;
        return $this;
    }
    /**
     * Sort direction, ascending or descending.
     *
     * @return string|null
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }
    /**
     * Sort direction, ascending or descending.
     *
     * @param string|null $order
     *
     * @return self
     */
    public function setOrder(?string $order): self
    {
        $this->initialized['order'] = true;
        $this->order = $order;
        return $this;
    }
    /**
     * Grouped requests only. Maximum groups per page; defaults to 25. Each group retains its complete series.
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }
    /**
     * Grouped requests only. Maximum groups per page; defaults to 25. Each group retains its complete series.
     *
     * @param int|null $limit
     *
     * @return self
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * Grouped requests only. Opaque next_cursor from the previous response. Mutually exclusive with ending_before.
     *
     * @return string|null
     */
    public function getStartingAfter(): ?string
    {
        return $this->startingAfter;
    }
    /**
     * Grouped requests only. Opaque next_cursor from the previous response. Mutually exclusive with ending_before.
     *
     * @param string|null $startingAfter
     *
     * @return self
     */
    public function setStartingAfter(?string $startingAfter): self
    {
        $this->initialized['startingAfter'] = true;
        $this->startingAfter = $startingAfter;
        return $this;
    }
    /**
     * Grouped requests only. Opaque prev_cursor for backward navigation, or refresh_cursor to read groups before the anchor in the current sort order. Mutually exclusive with starting_after.
     *
     * @return string|null
     */
    public function getEndingBefore(): ?string
    {
        return $this->endingBefore;
    }
    /**
     * Grouped requests only. Opaque prev_cursor for backward navigation, or refresh_cursor to read groups before the anchor in the current sort order. Mutually exclusive with starting_after.
     *
     * @param string|null $endingBefore
     *
     * @return self
     */
    public function setEndingBefore(?string $endingBefore): self
    {
        $this->initialized['endingBefore'] = true;
        $this->endingBefore = $endingBefore;
        return $this;
    }
}
