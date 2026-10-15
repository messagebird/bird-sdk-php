<?php

namespace MessageBird\Wire\Model;

class AssetUpdate
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
     * The asset's display name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Default alternative text describing the image. Send null to clear it.
     *
     * @var string|null
     */
    protected $altText;
    /**
     * The folder to file the asset in. Send null to move it to the top level of the library. Moving an asset never changes its URL.
     *
     * @var string|null
     */
    protected $folderId;
    /**
     * The asset's display name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The asset's display name.
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
     * Default alternative text describing the image. Send null to clear it.
     *
     * @return string|null
     */
    public function getAltText(): ?string
    {
        return $this->altText;
    }
    /**
     * Default alternative text describing the image. Send null to clear it.
     *
     * @param string|null $altText
     *
     * @return self
     */
    public function setAltText(?string $altText): self
    {
        $this->initialized['altText'] = true;
        $this->altText = $altText;
        return $this;
    }
    /**
     * The folder to file the asset in. Send null to move it to the top level of the library. Moving an asset never changes its URL.
     *
     * @return string|null
     */
    public function getFolderId(): ?string
    {
        return $this->folderId;
    }
    /**
     * The folder to file the asset in. Send null to move it to the top level of the library. Moving an asset never changes its URL.
     *
     * @param string|null $folderId
     *
     * @return self
     */
    public function setFolderId(?string $folderId): self
    {
        $this->initialized['folderId'] = true;
        $this->folderId = $folderId;
        return $this;
    }
}
