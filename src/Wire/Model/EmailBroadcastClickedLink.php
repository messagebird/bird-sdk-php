<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastClickedLink
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
     * The clicked URL.
     *
     * @var string|null
     */
    protected $url;
    /**
     * What the link said, resolved by the name used by the most clicks that carried one. Null when no click through this URL ever carried a name.
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * Total clicks through this URL, including clicks that carried no link name.
     *
     * @var int|null
     */
    protected $clickCount;
    /**
     * Number of distinct recipients who clicked this URL at least once.
     *
     * @var int|null
     */
    protected $recipientCount;
    /**
     * The clicked URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The clicked URL.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * What the link said, resolved by the name used by the most clicks that carried one. Null when no click through this URL ever carried a name.
     * 
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * What the link said, resolved by the name used by the most clicks that carried one. Null when no click through this URL ever carried a name.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Total clicks through this URL, including clicks that carried no link name.
     *
     * @return int|null
     */
    public function getClickCount(): ?int
    {
        return $this->clickCount;
    }
    /**
     * Total clicks through this URL, including clicks that carried no link name.
     *
     * @param int|null $clickCount
     *
     * @return self
     */
    public function setClickCount(?int $clickCount): self
    {
        $this->initialized['clickCount'] = true;
        $this->clickCount = $clickCount;
        return $this;
    }
    /**
     * Number of distinct recipients who clicked this URL at least once.
     *
     * @return int|null
     */
    public function getRecipientCount(): ?int
    {
        return $this->recipientCount;
    }
    /**
     * Number of distinct recipients who clicked this URL at least once.
     *
     * @param int|null $recipientCount
     *
     * @return self
     */
    public function setRecipientCount(?int $recipientCount): self
    {
        $this->initialized['recipientCount'] = true;
        $this->recipientCount = $recipientCount;
        return $this;
    }
}
