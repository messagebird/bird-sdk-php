<?php

namespace MessageBird\Wire\Model;

class SMSMessageSendRequestOptions extends \ArrayObject
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
     * Replace characters outside the GSM-7 alphabet with their closest GSM-7 equivalent before sending: typically curly quotes, dashes, ellipses, fullwidth forms, and non-breaking spaces.
     * 
     * One such character forces the whole body into `UCS2`, which more than halves the characters that fit in a segment, so replacing them often lowers the segment count and the cost.
     * 
     * Disabled by default, because it alters the body you composed. The replacement is all-or-nothing: a body that still holds a character outside the alphabet afterwards, such as an emoji or a non-Latin script, is sent exactly as you supplied it. Read the message back to see what was applied: `text` is the body as sent.
     * 
     *
     * @var bool|null
     */
    protected $smartEncoding = false;
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @var bool|null
     */
    protected $trackClicks;
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @var float|null
     */
    protected $maxPricePerSegment;
    /**
     * Replace characters outside the GSM-7 alphabet with their closest GSM-7 equivalent before sending: typically curly quotes, dashes, ellipses, fullwidth forms, and non-breaking spaces.
     * 
     * One such character forces the whole body into `UCS2`, which more than halves the characters that fit in a segment, so replacing them often lowers the segment count and the cost.
     * 
     * Disabled by default, because it alters the body you composed. The replacement is all-or-nothing: a body that still holds a character outside the alphabet afterwards, such as an emoji or a non-Latin script, is sent exactly as you supplied it. Read the message back to see what was applied: `text` is the body as sent.
     * 
     *
     * @return bool|null
     */
    public function getSmartEncoding(): ?bool
    {
        return $this->smartEncoding;
    }
    /**
    * Replace characters outside the GSM-7 alphabet with their closest GSM-7 equivalent before sending: typically curly quotes, dashes, ellipses, fullwidth forms, and non-breaking spaces.
    
    One such character forces the whole body into `UCS2`, which more than halves the characters that fit in a segment, so replacing them often lowers the segment count and the cost.
    
    Disabled by default, because it alters the body you composed. The replacement is all-or-nothing: a body that still holds a character outside the alphabet afterwards, such as an emoji or a non-Latin script, is sent exactly as you supplied it. Read the message back to see what was applied: `text` is the body as sent.
    
    *
    * @param bool|null $smartEncoding
    *
    * @return self
    */
    public function setSmartEncoding(?bool $smartEncoding): self
    {
        $this->initialized['smartEncoding'] = true;
        $this->smartEncoding = $smartEncoding;
        return $this;
    }
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @return bool|null
     */
    public function getTrackClicks(): ?bool
    {
        return $this->trackClicks;
    }
    /**
     * Preview feature: link click tracking. Defaults to `false`. Currently unavailable; setting this to `true` returns `422 SMSUnsupportedFeature`.
     *
     * @param bool|null $trackClicks
     *
     * @return self
     */
    public function setTrackClicks(?bool $trackClicks): self
    {
        $this->initialized['trackClicks'] = true;
        $this->trackClicks = $trackClicks;
        return $this;
    }
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @return float|null
     */
    public function getMaxPricePerSegment(): ?float
    {
        return $this->maxPricePerSegment;
    }
    /**
     * Preview feature: per-segment price ceiling. Currently unavailable; supplying this field returns `422 SMSUnsupportedFeature`.
     *
     * @param float|null $maxPricePerSegment
     *
     * @return self
     */
    public function setMaxPricePerSegment(?float $maxPricePerSegment): self
    {
        $this->initialized['maxPricePerSegment'] = true;
        $this->maxPricePerSegment = $maxPricePerSegment;
        return $this;
    }
}
