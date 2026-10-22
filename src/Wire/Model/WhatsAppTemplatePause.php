<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp's record of why it paused or disabled one language. Set when WhatsApp pauses or disables the language and removed once the language can send again. Present only on the version currently in service.
 */
class WhatsAppTemplatePause
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
     * When WhatsApp paused or disabled the language.
     *
     * @var \DateTime|null
     */
    protected $startedAt;
    /**
     * WhatsApp's label for why it took a language out of service: its `other_info.title`, lowercased. `first_pause` and `second_pause` are the first and second pauses for a low quality rating, which last three and six hours. `rate_limiting_pause` is a pause WhatsApp applied to limit sending. `disabled` means WhatsApp stopped the language from sending after repeated pauses. This is an open enum. Accept unrecognized values.
     * 
     *
     * @var string|null
     */
    protected $reason;
    /**
     * WhatsApp's explanation of the pause or disablement, passed through unmodified. Absent when WhatsApp sent none.
     * 
     *
     * @var string|null
     */
    protected $description;
    /**
     * When WhatsApp paused or disabled the language.
     *
     * @return \DateTime|null
     */
    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }
    /**
     * When WhatsApp paused or disabled the language.
     *
     * @param \DateTime|null $startedAt
     *
     * @return self
     */
    public function setStartedAt(?\DateTime $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;
        return $this;
    }
    /**
     * WhatsApp's label for why it took a language out of service: its `other_info.title`, lowercased. `first_pause` and `second_pause` are the first and second pauses for a low quality rating, which last three and six hours. `rate_limiting_pause` is a pause WhatsApp applied to limit sending. `disabled` means WhatsApp stopped the language from sending after repeated pauses. This is an open enum. Accept unrecognized values.
     * 
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * WhatsApp's label for why it took a language out of service: its `other_info.title`, lowercased. `first_pause` and `second_pause` are the first and second pauses for a low quality rating, which last three and six hours. `rate_limiting_pause` is a pause WhatsApp applied to limit sending. `disabled` means WhatsApp stopped the language from sending after repeated pauses. This is an open enum. Accept unrecognized values.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * WhatsApp's explanation of the pause or disablement, passed through unmodified. Absent when WhatsApp sent none.
     * 
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * WhatsApp's explanation of the pause or disablement, passed through unmodified. Absent when WhatsApp sent none.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
}
