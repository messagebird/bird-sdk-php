<?php

namespace MessageBird\Wire\Model;

/**
 * The app's occupied channels. The Realtime service does not paginate this listing, so all occupied channels are returned in one response.
 */
class RealtimeChannelsList
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
     * The occupied channels, sorted by name.
     *
     * @var list<RealtimeChannelListItem>|null
     */
    protected $data;
    /**
     * The occupied channels, sorted by name.
     *
     * @return list<RealtimeChannelListItem>|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    /**
     * The occupied channels, sorted by name.
     *
     * @param list<RealtimeChannelListItem>|null $data
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
