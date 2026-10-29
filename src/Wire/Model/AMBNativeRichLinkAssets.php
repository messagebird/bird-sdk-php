<?php

namespace MessageBird\Wire\Model;

class AMBNativeRichLinkAssets
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
     * @var AMBNativeRichLinkImage|null
     */
    protected $image;
    /**
     * @var AMBNativeRichLinkVideo|null
     */
    protected $video;
    /**
     * @return AMBNativeRichLinkImage|null
     */
    public function getImage(): ?AMBNativeRichLinkImage
    {
        return $this->image;
    }
    /**
     * @param AMBNativeRichLinkImage|null $image
     *
     * @return self
     */
    public function setImage(?AMBNativeRichLinkImage $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;
        return $this;
    }
    /**
     * @return AMBNativeRichLinkVideo|null
     */
    public function getVideo(): ?AMBNativeRichLinkVideo
    {
        return $this->video;
    }
    /**
     * @param AMBNativeRichLinkVideo|null $video
     *
     * @return self
     */
    public function setVideo(?AMBNativeRichLinkVideo $video): self
    {
        $this->initialized['video'] = true;
        $this->video = $video;
        return $this;
    }
}
