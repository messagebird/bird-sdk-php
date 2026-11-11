<?php

namespace MessageBird\Wire\Model;

/**
 * Start one upload intent. Keep client_reference unchanged when retrying this request. Changing the file or metadata requires a new reference. Optional folder_id must identify an existing folder in this workspace.
 */
class AssetUploadSessionCreate
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
     * Caller-generated UUID for this upload intent. Retries with identical input recover the same session while its receipt is retained.
     *
     * @var string|null
     */
    protected $clientReference;
    /**
     * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
     *
     * @var AssetUploadFile|null
     */
    protected $file;
    /**
     * Display name. Omitted or blank names default to the sanitized filename.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Default alternative text for the asset.
     *
     * @var string|null
     */
    protected $altText;
    /**
     * @var string|null
     */
    protected $folderId;
    /**
     * Caller-generated UUID for this upload intent. Retries with identical input recover the same session while its receipt is retained.
     *
     * @return string|null
     */
    public function getClientReference(): ?string
    {
        return $this->clientReference;
    }
    /**
     * Caller-generated UUID for this upload intent. Retries with identical input recover the same session while its receipt is retained.
     *
     * @param string|null $clientReference
     *
     * @return self
     */
    public function setClientReference(?string $clientReference): self
    {
        $this->initialized['clientReference'] = true;
        $this->clientReference = $clientReference;
        return $this;
    }
    /**
     * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
     *
     * @return AssetUploadFile|null
     */
    public function getFile(): ?AssetUploadFile
    {
        return $this->file;
    }
    /**
     * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
     *
     * @param AssetUploadFile|null $file
     *
     * @return self
     */
    public function setFile(?AssetUploadFile $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;
        return $this;
    }
    /**
     * Display name. Omitted or blank names default to the sanitized filename.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Display name. Omitted or blank names default to the sanitized filename.
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
     * Default alternative text for the asset.
     *
     * @return string|null
     */
    public function getAltText(): ?string
    {
        return $this->altText;
    }
    /**
     * Default alternative text for the asset.
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
     * @return string|null
     */
    public function getFolderId(): ?string
    {
        return $this->folderId;
    }
    /**
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
