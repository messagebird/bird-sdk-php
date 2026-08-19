<?php

namespace MessageBird\Wire\Model;

class SMSKeywordRuleList
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
     * The keyword rules that apply to your workspace, Bird's defaults included. Ordered most specific first, so the first rule whose keywords match an inbound message is the one that runs. The set is small and returned in full; this list is not paginated.
     * 
     *
     * @var list<SMSKeywordRule>|null
     */
    protected $data;
    /**
     * The keyword rules that apply to your workspace, Bird's defaults included. Ordered most specific first, so the first rule whose keywords match an inbound message is the one that runs. The set is small and returned in full; this list is not paginated.
     * 
     *
     * @return list<SMSKeywordRule>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The keyword rules that apply to your workspace, Bird's defaults included. Ordered most specific first, so the first rule whose keywords match an inbound message is the one that runs. The set is small and returned in full; this list is not paginated.
     *
     * @param list<SMSKeywordRule>|null $data
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
