<?php

namespace MessageBird\Wire\Model;

/**
 * Constraints a value must satisfy, where the requirement sets any. Which of these apply follows from its data type: `pattern`, `min_length` and `max_length` constrain `string` and `text` values, `minimum` and `maximum` constrain `number` values, and everything else is `null`. Check these before submitting and you avoid a round trip.
 */
class ComplianceFieldValidation
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
     * A regular expression the value must match. `null` when the requirement takes neither `string` nor `text`, or sets no pattern.
     *
     * @var string|null
     */
    protected $pattern;
    /**
     * Shortest accepted value. `null` when the requirement takes neither `string` nor `text`, or sets no minimum length.
     *
     * @var int|null
     */
    protected $minLength;
    /**
     * Longest accepted value. `null` when the requirement takes neither `string` nor `text`, or sets no maximum length.
     *
     * @var int|null
     */
    protected $maxLength;
    /**
     * Smallest accepted number. `null` when the requirement does not take `number`, or sets no minimum.
     *
     * @var float|null
     */
    protected $minimum;
    /**
     * Largest accepted number. `null` when the requirement does not take `number`, or sets no maximum.
     *
     * @var float|null
     */
    protected $maximum;
    /**
     * A regular expression the value must match. `null` when the requirement takes neither `string` nor `text`, or sets no pattern.
     *
     * @return string|null
     */
    public function getPattern(): ?string
    {
        return $this->pattern;
    }
    /**
     * A regular expression the value must match. `null` when the requirement takes neither `string` nor `text`, or sets no pattern.
     *
     * @param string|null $pattern
     *
     * @return self
     */
    public function setPattern(?string $pattern): self
    {
        $this->initialized['pattern'] = true;
        $this->pattern = $pattern;
        return $this;
    }
    /**
     * Shortest accepted value. `null` when the requirement takes neither `string` nor `text`, or sets no minimum length.
     *
     * @return int|null
     */
    public function getMinLength(): ?int
    {
        return $this->minLength;
    }
    /**
     * Shortest accepted value. `null` when the requirement takes neither `string` nor `text`, or sets no minimum length.
     *
     * @param int|null $minLength
     *
     * @return self
     */
    public function setMinLength(?int $minLength): self
    {
        $this->initialized['minLength'] = true;
        $this->minLength = $minLength;
        return $this;
    }
    /**
     * Longest accepted value. `null` when the requirement takes neither `string` nor `text`, or sets no maximum length.
     *
     * @return int|null
     */
    public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }
    /**
     * Longest accepted value. `null` when the requirement takes neither `string` nor `text`, or sets no maximum length.
     *
     * @param int|null $maxLength
     *
     * @return self
     */
    public function setMaxLength(?int $maxLength): self
    {
        $this->initialized['maxLength'] = true;
        $this->maxLength = $maxLength;
        return $this;
    }
    /**
     * Smallest accepted number. `null` when the requirement does not take `number`, or sets no minimum.
     *
     * @return float|null
     */
    public function getMinimum(): ?float
    {
        return $this->minimum;
    }
    /**
     * Smallest accepted number. `null` when the requirement does not take `number`, or sets no minimum.
     *
     * @param float|null $minimum
     *
     * @return self
     */
    public function setMinimum(?float $minimum): self
    {
        $this->initialized['minimum'] = true;
        $this->minimum = $minimum;
        return $this;
    }
    /**
     * Largest accepted number. `null` when the requirement does not take `number`, or sets no maximum.
     *
     * @return float|null
     */
    public function getMaximum(): ?float
    {
        return $this->maximum;
    }
    /**
     * Largest accepted number. `null` when the requirement does not take `number`, or sets no maximum.
     *
     * @param float|null $maximum
     *
     * @return self
     */
    public function setMaximum(?float $maximum): self
    {
        $this->initialized['maximum'] = true;
        $this->maximum = $maximum;
        return $this;
    }
}
