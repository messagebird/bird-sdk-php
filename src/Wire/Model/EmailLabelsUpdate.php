<?php

namespace MessageBird\Wire\Model;

class EmailLabelsUpdate
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
     * Labels to apply.
     *
     * @var list<string>|null
     */
    protected $add;
    /**
     * Labels to take off.
     *
     * @var list<string>|null
     */
    protected $remove;
    /**
     * Labels to apply.
     *
     * @return list<string>|null
     */
    public function getAdd(): ?array
    {
        return $this->add;
    }
    /**
     * Labels to apply.
     *
     * @param list<string>|null $add
     *
     * @return self
     */
    public function setAdd(?array $add): self
    {
        $this->initialized['add'] = true;
        $this->add = $add;
        return $this;
    }
    /**
     * Labels to take off.
     *
     * @return list<string>|null
     */
    public function getRemove(): ?array
    {
        return $this->remove;
    }
    /**
     * Labels to take off.
     *
     * @param list<string>|null $remove
     *
     * @return self
     */
    public function setRemove(?array $remove): self
    {
        $this->initialized['remove'] = true;
        $this->remove = $remove;
        return $this;
    }
}
