<?php

namespace MessageBird\Wire\Model;

class SMSTemplateList
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
     * The templates available to your workspace. The catalogue is small and returned in full; this list is not paginated.
     *
     * @var list<SMSTemplate>|null
     */
    protected $data;
    /**
     * The templates available to your workspace. The catalogue is small and returned in full; this list is not paginated.
     *
     * @return list<SMSTemplate>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The templates available to your workspace. The catalogue is small and returned in full; this list is not paginated.
     *
     * @param list<SMSTemplate>|null $data
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
