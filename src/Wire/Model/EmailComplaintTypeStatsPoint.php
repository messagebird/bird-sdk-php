<?php

namespace MessageBird\Wire\Model;

class EmailComplaintTypeStatsPoint
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
     * The complaint classification reported by the mailbox provider's feedback loop, in the abuse-reporting-format vocabulary (for example `abuse`, `fraud`, `virus`, `other`). The set is open.
     *
     * @var string|null
     */
    protected $feedbackType;
    /**
     * Distinct recipients who reported a message as spam with this complaint type at any point in the period.
     *
     * @var int|null
     */
    protected $complained;
    /**
     * The complaint classification reported by the mailbox provider's feedback loop, in the abuse-reporting-format vocabulary (for example `abuse`, `fraud`, `virus`, `other`). The set is open.
     *
     * @return string|null
     */
    public function getFeedbackType(): ?string
    {
        return $this->feedbackType;
    }
    /**
     * The complaint classification reported by the mailbox provider's feedback loop, in the abuse-reporting-format vocabulary (for example `abuse`, `fraud`, `virus`, `other`). The set is open.
     *
     * @param string|null $feedbackType
     *
     * @return self
     */
    public function setFeedbackType(?string $feedbackType): self
    {
        $this->initialized['feedbackType'] = true;
        $this->feedbackType = $feedbackType;
        return $this;
    }
    /**
     * Distinct recipients who reported a message as spam with this complaint type at any point in the period.
     *
     * @return int|null
     */
    public function getComplained(): ?int
    {
        return $this->complained;
    }
    /**
     * Distinct recipients who reported a message as spam with this complaint type at any point in the period.
     *
     * @param int|null $complained
     *
     * @return self
     */
    public function setComplained(?int $complained): self
    {
        $this->initialized['complained'] = true;
        $this->complained = $complained;
        return $this;
    }
}
