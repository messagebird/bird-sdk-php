<?php

namespace MessageBird\Wire\Model;

class AMBMessageKindStatsPoint
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
     * Derived message classification for filtering and statistics. Send requests use the native content.type families. Create Apple Pay and authentication requests through the conversation payment and authentication operations.
     * 
     * - text: Text, optionally with a subject.
     * - attachment: One or more files, images, audio clips, or videos.
     * - rich_link: A link with a preview card.
     * - quick_reply: Two to five reply choices.
     * - list_picker: A grouped menu of choices.
     * - time_picker: Appointment time slots; a reply may contain only a selected label.
     * - form: A multi-page form.
     * - imessage_app: A custom iMessage app interaction on a compatible device.
     * - interactive: An opaque interactive reference whose subtype is unknown.
     * - apple_pay: An Apple Pay request created through the conversation payment operations.
     * - authenticate: An identity verification request created through the conversation authentication operations.
     *
     * @var string|null
     */
    protected $messageKind;
    /**
     * Outbound Apple Messages for Business counts for the requested scope, attributed to when each message was accepted. Apple Messages for Business has no delivery receipt, so there is no `delivered` count anywhere in this API: `sent` is the last outbound state Bird observes for a message. Very large counts are close estimates rather than exact tallies. Rates are computed once here, clamped to 1, and null when nothing was accepted.
     * 
     *
     * @var AMBOutboundStatsCounts|null
     */
    protected $counts;
    /**
     * Processing-latency percentiles in milliseconds for the requested scope, from acceptance to Apple handoff. Apple Messages for Business has no delivery receipt, so there is no `delivery` or `total` member beside `processing`. Conversation response timing is reported separately in `first_response`. Always present; every percentile is null when no qualifying message in scope has a measurement.
     * 
     *
     * @var AMBStatsLatency|null
     */
    protected $latency;
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @var AMBStatsQuantiles|null
     */
    protected $firstResponse;
    /**
     * Derived message classification for filtering and statistics. Send requests use the native content.type families. Create Apple Pay and authentication requests through the conversation payment and authentication operations.
     * 
     * - text: Text, optionally with a subject.
     * - attachment: One or more files, images, audio clips, or videos.
     * - rich_link: A link with a preview card.
     * - quick_reply: Two to five reply choices.
     * - list_picker: A grouped menu of choices.
     * - time_picker: Appointment time slots; a reply may contain only a selected label.
     * - form: A multi-page form.
     * - imessage_app: A custom iMessage app interaction on a compatible device.
     * - interactive: An opaque interactive reference whose subtype is unknown.
     * - apple_pay: An Apple Pay request created through the conversation payment operations.
     * - authenticate: An identity verification request created through the conversation authentication operations.
     *
     * @return string|null
     */
    public function getMessageKind(): ?string
    {
        return $this->messageKind;
    }
    /**
    * Derived message classification for filtering and statistics. Send requests use the native content.type families. Create Apple Pay and authentication requests through the conversation payment and authentication operations.
    
    - text: Text, optionally with a subject.
    - attachment: One or more files, images, audio clips, or videos.
    - rich_link: A link with a preview card.
    - quick_reply: Two to five reply choices.
    - list_picker: A grouped menu of choices.
    - time_picker: Appointment time slots; a reply may contain only a selected label.
    - form: A multi-page form.
    - imessage_app: A custom iMessage app interaction on a compatible device.
    - interactive: An opaque interactive reference whose subtype is unknown.
    - apple_pay: An Apple Pay request created through the conversation payment operations.
    - authenticate: An identity verification request created through the conversation authentication operations.
    *
    * @param string|null $messageKind
    *
    * @return self
    */
    public function setMessageKind(?string $messageKind): self
    {
        $this->initialized['messageKind'] = true;
        $this->messageKind = $messageKind;
        return $this;
    }
    /**
     * Outbound Apple Messages for Business counts for the requested scope, attributed to when each message was accepted. Apple Messages for Business has no delivery receipt, so there is no `delivered` count anywhere in this API: `sent` is the last outbound state Bird observes for a message. Very large counts are close estimates rather than exact tallies. Rates are computed once here, clamped to 1, and null when nothing was accepted.
     * 
     *
     * @return AMBOutboundStatsCounts|null
     */
    public function getCounts(): ?AMBOutboundStatsCounts
    {
        return $this->counts;
    }
    /**
     * Outbound Apple Messages for Business counts for the requested scope, attributed to when each message was accepted. Apple Messages for Business has no delivery receipt, so there is no `delivered` count anywhere in this API: `sent` is the last outbound state Bird observes for a message. Very large counts are close estimates rather than exact tallies. Rates are computed once here, clamped to 1, and null when nothing was accepted.
     *
     * @param AMBOutboundStatsCounts|null $counts
     *
     * @return self
     */
    public function setCounts(?AMBOutboundStatsCounts $counts): self
    {
        $this->initialized['counts'] = true;
        $this->counts = $counts;
        return $this;
    }
    /**
     * Processing-latency percentiles in milliseconds for the requested scope, from acceptance to Apple handoff. Apple Messages for Business has no delivery receipt, so there is no `delivery` or `total` member beside `processing`. Conversation response timing is reported separately in `first_response`. Always present; every percentile is null when no qualifying message in scope has a measurement.
     * 
     *
     * @return AMBStatsLatency|null
     */
    public function getLatency(): ?AMBStatsLatency
    {
        return $this->latency;
    }
    /**
     * Processing-latency percentiles in milliseconds for the requested scope, from acceptance to Apple handoff. Apple Messages for Business has no delivery receipt, so there is no `delivery` or `total` member beside `processing`. Conversation response timing is reported separately in `first_response`. Always present; every percentile is null when no qualifying message in scope has a measurement.
     *
     * @param AMBStatsLatency|null $latency
     *
     * @return self
     */
    public function setLatency(?AMBStatsLatency $latency): self
    {
        $this->initialized['latency'] = true;
        $this->latency = $latency;
        return $this;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     * 
     *
     * @return AMBStatsQuantiles|null
     */
    public function getFirstResponse(): ?AMBStatsQuantiles
    {
        return $this->firstResponse;
    }
    /**
     * Approximate p50, p95, and p99 latency percentiles in milliseconds for one latency family. All three are null when no qualifying event contributed a measurement.
     *
     * @param AMBStatsQuantiles|null $firstResponse
     *
     * @return self
     */
    public function setFirstResponse(?AMBStatsQuantiles $firstResponse): self
    {
        $this->initialized['firstResponse'] = true;
        $this->firstResponse = $firstResponse;
        return $this;
    }
}
