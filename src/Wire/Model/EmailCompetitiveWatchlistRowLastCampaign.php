<?php

namespace MessageBird\Wire\Model;

class EmailCompetitiveWatchlistRowLastCampaign extends \ArrayObject
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
     * The identifier for this campaign. Use it to fetch this one campaign on its own.
     * 
     * It is a string, and it needs to stay one. The values are long enough that
     * JavaScript, and any other language that stores every number as a floating point
     * value, will round them, and a rounded identifier matches no campaign at all.
     * Compare it and pass it back as text.
     * 
     *
     * @var string|null
     */
    protected $id;
    /**
     * The subject line the panel saw on this campaign.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * When the panel first saw this campaign arrive.
     *
     * @var \DateTime|null
     */
    protected $sentAt;
    /**
     * Where the panel's capture of the rendered email can be fetched, null when it captured none. Panels image only some of what they observe, so an absent creative is an ordinary outcome rather than a failed one. The image is served from the panel's own host rather than from ours, so a page embedding it has to allow that host.
     * 
     *
     * @var string|null
     */
    protected $imageUrl;
    /**
     * The identifier for this campaign. Use it to fetch this one campaign on its own.
     * 
     * It is a string, and it needs to stay one. The values are long enough that
     * JavaScript, and any other language that stores every number as a floating point
     * value, will round them, and a rounded identifier matches no campaign at all.
     * Compare it and pass it back as text.
     * 
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
    * The identifier for this campaign. Use it to fetch this one campaign on its own.
    
    It is a string, and it needs to stay one. The values are long enough that
    JavaScript, and any other language that stores every number as a floating point
    value, will round them, and a rounded identifier matches no campaign at all.
    Compare it and pass it back as text.
    
    *
    * @param string|null $id
    *
    * @return self
    */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The subject line the panel saw on this campaign.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The subject line the panel saw on this campaign.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * When the panel first saw this campaign arrive.
     *
     * @return \DateTime|null
     */
    public function getSentAt(): ?\DateTime
    {
        return $this->sentAt;
    }
    /**
     * When the panel first saw this campaign arrive.
     *
     * @param \DateTime|null $sentAt
     *
     * @return self
     */
    public function setSentAt(?\DateTime $sentAt): self
    {
        $this->initialized['sentAt'] = true;
        $this->sentAt = $sentAt;
        return $this;
    }
    /**
     * Where the panel's capture of the rendered email can be fetched, null when it captured none. Panels image only some of what they observe, so an absent creative is an ordinary outcome rather than a failed one. The image is served from the panel's own host rather than from ours, so a page embedding it has to allow that host.
     * 
     *
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }
    /**
     * Where the panel's capture of the rendered email can be fetched, null when it captured none. Panels image only some of what they observe, so an absent creative is an ordinary outcome rather than a failed one. The image is served from the panel's own host rather than from ours, so a page embedding it has to allow that host.
     *
     * @param string|null $imageUrl
     *
     * @return self
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->initialized['imageUrl'] = true;
        $this->imageUrl = $imageUrl;
        return $this;
    }
}
