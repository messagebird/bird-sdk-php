<?php

namespace MessageBird\Wire\Model;

class LabelList
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
     * Every label in the workspace, ordered by name.
     *
     * @var list<Label>|null
     */
    protected $data;
    /**
     * Every label in the workspace, ordered by name.
     *
     * @return list<Label>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * Every label in the workspace, ordered by name.
     *
     * @param list<Label>|null $data
     *
     * @return self
     */
    public function setData(?array $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}
