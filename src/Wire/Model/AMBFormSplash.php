<?php

namespace MessageBird\Wire\Model;

class AMBFormSplash
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
    protected $header;
    /**
     * @var string|null
     */
    protected $splashText;
    /**
     * @var string|null
     */
    protected $buttonTitle;
    /**
     * @var string|null
     */
    protected $imageIdentifier;
    /**
     * @return string|null
     */
    public function getHeader(): ?string
    {
        return $this->header;
    }
    /**
     * @param string|null $header
     *
     * @return self
     */
    public function setHeader(?string $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSplashText(): ?string
    {
        return $this->splashText;
    }
    /**
     * @param string|null $splashText
     *
     * @return self
     */
    public function setSplashText(?string $splashText): self
    {
        $this->initialized['splashText'] = true;
        $this->splashText = $splashText;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getButtonTitle(): ?string
    {
        return $this->buttonTitle;
    }
    /**
     * @param string|null $buttonTitle
     *
     * @return self
     */
    public function setButtonTitle(?string $buttonTitle): self
    {
        $this->initialized['buttonTitle'] = true;
        $this->buttonTitle = $buttonTitle;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getImageIdentifier(): ?string
    {
        return $this->imageIdentifier;
    }
    /**
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
}
