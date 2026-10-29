<?php

namespace MessageBird\Wire\Model;

class AMBMessageBubble
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
     * Text shown on the message bubble.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Secondary text shown below the title.
     *
     * @var string|null
     */
    protected $subtitle;
    /**
     * Layout of an Apple interactive message bubble.
     *
     * @var string|null
     */
    protected $style;
    /**
     * Identifier of an image in interactive_data.data.images. Apple ignores it for custom iMessage apps.
     *
     * @var string|null
     */
    protected $imageIdentifier;
    /**
     * Title shown over an attached image in a custom iMessage app bubble.
     *
     * @var string|null
     */
    protected $imageTitle;
    /**
     * Subtitle shown over an attached image in a custom iMessage app bubble.
     *
     * @var string|null
     */
    protected $imageSubtitle;
    /**
     * Right-aligned title in a custom iMessage app bubble.
     *
     * @var string|null
     */
    protected $secondarySubtitle;
    /**
     * Right-aligned subtitle in a custom iMessage app bubble.
     *
     * @var string|null
     */
    protected $tertiarySubtitle;
    /**
     * Text shown on the message bubble.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Text shown on the message bubble.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * Secondary text shown below the title.
     *
     * @return string|null
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }
    /**
     * Secondary text shown below the title.
     *
     * @param string|null $subtitle
     *
     * @return self
     */
    public function setSubtitle(?string $subtitle): self
    {
        $this->initialized['subtitle'] = true;
        $this->subtitle = $subtitle;
        return $this;
    }
    /**
     * Layout of an Apple interactive message bubble.
     *
     * @return string|null
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }
    /**
     * Layout of an Apple interactive message bubble.
     *
     * @param string|null $style
     *
     * @return self
     */
    public function setStyle(?string $style): self
    {
        $this->initialized['style'] = true;
        $this->style = $style;
        return $this;
    }
    /**
     * Identifier of an image in interactive_data.data.images. Apple ignores it for custom iMessage apps.
     *
     * @return string|null
     */
    public function getImageIdentifier(): ?string
    {
        return $this->imageIdentifier;
    }
    /**
     * Identifier of an image in interactive_data.data.images. Apple ignores it for custom iMessage apps.
     *
     * @param string|null $imageIdentifier
     *
     * @return self
     */
    public function setImageIdentifier(?string $imageIdentifier): self
    {
        $this->initialized['imageIdentifier'] = true;
        $this->imageIdentifier = $imageIdentifier;
        return $this;
    }
    /**
     * Title shown over an attached image in a custom iMessage app bubble.
     *
     * @return string|null
     */
    public function getImageTitle(): ?string
    {
        return $this->imageTitle;
    }
    /**
     * Title shown over an attached image in a custom iMessage app bubble.
     *
     * @param string|null $imageTitle
     *
     * @return self
     */
    public function setImageTitle(?string $imageTitle): self
    {
        $this->initialized['imageTitle'] = true;
        $this->imageTitle = $imageTitle;
        return $this;
    }
    /**
     * Subtitle shown over an attached image in a custom iMessage app bubble.
     *
     * @return string|null
     */
    public function getImageSubtitle(): ?string
    {
        return $this->imageSubtitle;
    }
    /**
     * Subtitle shown over an attached image in a custom iMessage app bubble.
     *
     * @param string|null $imageSubtitle
     *
     * @return self
     */
    public function setImageSubtitle(?string $imageSubtitle): self
    {
        $this->initialized['imageSubtitle'] = true;
        $this->imageSubtitle = $imageSubtitle;
        return $this;
    }
    /**
     * Right-aligned title in a custom iMessage app bubble.
     *
     * @return string|null
     */
    public function getSecondarySubtitle(): ?string
    {
        return $this->secondarySubtitle;
    }
    /**
     * Right-aligned title in a custom iMessage app bubble.
     *
     * @param string|null $secondarySubtitle
     *
     * @return self
     */
    public function setSecondarySubtitle(?string $secondarySubtitle): self
    {
        $this->initialized['secondarySubtitle'] = true;
        $this->secondarySubtitle = $secondarySubtitle;
        return $this;
    }
    /**
     * Right-aligned subtitle in a custom iMessage app bubble.
     *
     * @return string|null
     */
    public function getTertiarySubtitle(): ?string
    {
        return $this->tertiarySubtitle;
    }
    /**
     * Right-aligned subtitle in a custom iMessage app bubble.
     *
     * @param string|null $tertiarySubtitle
     *
     * @return self
     */
    public function setTertiarySubtitle(?string $tertiarySubtitle): self
    {
        $this->initialized['tertiarySubtitle'] = true;
        $this->tertiarySubtitle = $tertiarySubtitle;
        return $this;
    }
}
