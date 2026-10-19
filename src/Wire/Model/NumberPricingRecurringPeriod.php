<?php

namespace MessageBird\Wire\Model;

/**
 * A period: a unit and a count. A day is a fixed 24-hour UTC period. A larger `count` lengthens the period without multiplying the amount quoted for it.
 */
class NumberPricingRecurringPeriod extends \ArrayObject
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
     * The recurring interval one subscription charge covers.
     *
     * @var string|null
     */
    protected $unit;
    /**
     * Number of units in the period.
     *
     * @var int|null
     */
    protected $count;
    /**
     * The recurring interval one subscription charge covers.
     *
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }
    /**
     * The recurring interval one subscription charge covers.
     *
     * @param string|null $unit
     *
     * @return self
     */
    public function setUnit(?string $unit): self
    {
        $this->initialized['unit'] = true;
        $this->unit = $unit;
        return $this;
    }
    /**
     * Number of units in the period.
     *
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
    /**
     * Number of units in the period.
     *
     * @param int|null $count
     *
     * @return self
     */
    public function setCount(?int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
}
