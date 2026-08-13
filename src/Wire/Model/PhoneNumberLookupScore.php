<?php

namespace MessageBird\Wire\Model;

class PhoneNumberLookupScore extends \ArrayObject
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
     * @var string|null
     */
    protected $status;
    /**
     * Credibility from 0 (low) to 100 (high). A low score means the number looks less credible than a typical subscriber line in the same range; it is a signal to weigh, not a verdict. It is a composite and is not derivable from the other properties. Present only when `status` is `ok`.
     * 
     *
     * @var int|null
     */
    protected $value;
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Credibility from 0 (low) to 100 (high). A low score means the number looks less credible than a typical subscriber line in the same range; it is a signal to weigh, not a verdict. It is a composite and is not derivable from the other properties. Present only when `status` is `ok`.
     * 
     *
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }
    /**
     * Credibility from 0 (low) to 100 (high). A low score means the number looks less credible than a typical subscriber line in the same range; it is a signal to weigh, not a verdict. It is a composite and is not derivable from the other properties. Present only when `status` is `ok`.
     *
     * @param int|null $value
     *
     * @return self
     */
    public function setValue(?int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
