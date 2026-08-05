<?php

namespace MessageBird\Wire\Model;

class EmailStatsSeriesPoint
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
     * The day (YYYY-MM-DD) or hour (ISO 8601, on the hour) this point covers, matching the requested `trend_grain`.
     *
     * @var string|null
     */
    protected $bucket;
    /**
     * Delivered recipients in this bucket.
     *
     * @var int|null
     */
    protected $delivered;
    /**
     * Bounced recipients in this bucket.
     *
     * @var int|null
     */
    protected $bounced;
    /**
     * Delivery rate for this bucket, as a fraction. Null when nothing was delivered or bounced.
     *
     * @var float|null
     */
    protected $deliveryRate;
    /**
     * Bounce rate for this bucket, as a fraction. Null when nothing was delivered or bounced.
     *
     * @var float|null
     */
    protected $bounceRate;
    /**
     * Complaint rate for this bucket, as a fraction; event-time attribution can push it above 1 when complaints outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row complaints are not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @var float|null
     */
    protected $complaintRate;
    /**
     * Open rate for this bucket, as a fraction; event-time attribution can push it above 1 when opens outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row engagement is not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @var float|null
     */
    protected $openRate;
    /**
     * Click rate for this bucket, as a fraction; event-time attribution can push it above 1 when clicks outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row engagement is not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @var float|null
     */
    protected $clickRate;
    /**
     * The day (YYYY-MM-DD) or hour (ISO 8601, on the hour) this point covers, matching the requested `trend_grain`.
     *
     * @return string|null
     */
    public function getBucket(): ?string
    {
        return $this->bucket;
    }
    /**
     * The day (YYYY-MM-DD) or hour (ISO 8601, on the hour) this point covers, matching the requested `trend_grain`.
     *
     * @param string|null $bucket
     *
     * @return self
     */
    public function setBucket(?string $bucket): self
    {
        $this->initialized['bucket'] = true;
        $this->bucket = $bucket;
        return $this;
    }
    /**
     * Delivered recipients in this bucket.
     *
     * @return int|null
     */
    public function getDelivered(): ?int
    {
        return $this->delivered;
    }
    /**
     * Delivered recipients in this bucket.
     *
     * @param int|null $delivered
     *
     * @return self
     */
    public function setDelivered(?int $delivered): self
    {
        $this->initialized['delivered'] = true;
        $this->delivered = $delivered;
        return $this;
    }
    /**
     * Bounced recipients in this bucket.
     *
     * @return int|null
     */
    public function getBounced(): ?int
    {
        return $this->bounced;
    }
    /**
     * Bounced recipients in this bucket.
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
     * Delivery rate for this bucket, as a fraction. Null when nothing was delivered or bounced.
     *
     * @return float|null
     */
    public function getDeliveryRate(): ?float
    {
        return $this->deliveryRate;
    }
    /**
     * Delivery rate for this bucket, as a fraction. Null when nothing was delivered or bounced.
     *
     * @param float|null $deliveryRate
     *
     * @return self
     */
    public function setDeliveryRate(?float $deliveryRate): self
    {
        $this->initialized['deliveryRate'] = true;
        $this->deliveryRate = $deliveryRate;
        return $this;
    }
    /**
     * Bounce rate for this bucket, as a fraction. Null when nothing was delivered or bounced.
     *
     * @return float|null
     */
    public function getBounceRate(): ?float
    {
        return $this->bounceRate;
    }
    /**
     * Bounce rate for this bucket, as a fraction. Null when nothing was delivered or bounced.
     *
     * @param float|null $bounceRate
     *
     * @return self
     */
    public function setBounceRate(?float $bounceRate): self
    {
        $this->initialized['bounceRate'] = true;
        $this->bounceRate = $bounceRate;
        return $this;
    }
    /**
     * Complaint rate for this bucket, as a fraction; event-time attribution can push it above 1 when complaints outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row complaints are not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @return float|null
     */
    public function getComplaintRate(): ?float
    {
        return $this->complaintRate;
    }
    /**
     * Complaint rate for this bucket, as a fraction; event-time attribution can push it above 1 when complaints outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row complaints are not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @param float|null $complaintRate
     *
     * @return self
     */
    public function setComplaintRate(?float $complaintRate): self
    {
        $this->initialized['complaintRate'] = true;
        $this->complaintRate = $complaintRate;
        return $this;
    }
    /**
     * Open rate for this bucket, as a fraction; event-time attribution can push it above 1 when opens outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row engagement is not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @return float|null
     */
    public function getOpenRate(): ?float
    {
        return $this->openRate;
    }
    /**
     * Open rate for this bucket, as a fraction; event-time attribution can push it above 1 when opens outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row engagement is not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @param float|null $openRate
     *
     * @return self
     */
    public function setOpenRate(?float $openRate): self
    {
        $this->initialized['openRate'] = true;
        $this->openRate = $openRate;
        return $this;
    }
    /**
     * Click rate for this bucket, as a fraction; event-time attribution can push it above 1 when clicks outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row engagement is not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @return float|null
     */
    public function getClickRate(): ?float
    {
        return $this->clickRate;
    }
    /**
     * Click rate for this bucket, as a fraction; event-time attribution can push it above 1 when clicks outrun the bucket's deliveries. Null when nothing was delivered in the bucket. On a sending-IP row engagement is not attributed to the IP, so this reads 0 in buckets that had deliveries and null in buckets that had none.
     *
     * @param float|null $clickRate
     *
     * @return self
     */
    public function setClickRate(?float $clickRate): self
    {
        $this->initialized['clickRate'] = true;
        $this->clickRate = $clickRate;
        return $this;
    }
}
