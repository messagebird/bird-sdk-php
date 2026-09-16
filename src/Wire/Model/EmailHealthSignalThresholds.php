<?php

namespace MessageBird\Wire\Model;

class EmailHealthSignalThresholds extends \ArrayObject
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
     * Which side of the boundaries is at risk. `above` for higher-is-worse rates (bounce, complaint), `below` for lower-is-worse rates (delivery).
     *
     * @var string|null
     */
    protected $direction;
    /**
     * Crossing this boundary in the risk direction moves the signal to `watching`, as a fraction.
     *
     * @var float|null
     */
    protected $watching;
    /**
     * Crossing this boundary in the risk direction moves the signal to `throttled`, as a fraction.
     *
     * @var float|null
     */
    protected $throttled;
    /**
     * Which side of the boundaries is at risk. `above` for higher-is-worse rates (bounce, complaint), `below` for lower-is-worse rates (delivery).
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }
    /**
     * Which side of the boundaries is at risk. `above` for higher-is-worse rates (bounce, complaint), `below` for lower-is-worse rates (delivery).
     *
     * @param string|null $direction
     *
     * @return self
     */
    public function setDirection(?string $direction): self
    {
        $this->initialized['direction'] = true;
        $this->direction = $direction;
        return $this;
    }
    /**
     * Crossing this boundary in the risk direction moves the signal to `watching`, as a fraction.
     *
     * @return float|null
     */
    public function getWatching(): ?float
    {
        return $this->watching;
    }
    /**
     * Crossing this boundary in the risk direction moves the signal to `watching`, as a fraction.
     *
     * @param float|null $watching
     *
     * @return self
     */
    public function setWatching(?float $watching): self
    {
        $this->initialized['watching'] = true;
        $this->watching = $watching;
        return $this;
    }
    /**
     * Crossing this boundary in the risk direction moves the signal to `throttled`, as a fraction.
     *
     * @return float|null
     */
    public function getThrottled(): ?float
    {
        return $this->throttled;
    }
    /**
     * Crossing this boundary in the risk direction moves the signal to `throttled`, as a fraction.
     *
     * @param float|null $throttled
     *
     * @return self
     */
    public function setThrottled(?float $throttled): self
    {
        $this->initialized['throttled'] = true;
        $this->throttled = $throttled;
        return $this;
    }
}
