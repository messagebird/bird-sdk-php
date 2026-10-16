<?php

namespace MessageBird\Wire\Model;

/**
 * The file to upload, sent as a `multipart/form-data` body. Include each field at most once. Each text field is limited to 8 KiB before surrounding whitespace is trimmed; its character limit also applies.
 */
class AssetUpload
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
     * The file to upload. The file's contents determine its type; a declared content
     * type is ignored.
     * 
     * Images: PNG, JPEG, GIF, or WebP, up to 5 MB. WebP is converted on upload, and
     * every image is re-encoded.
     * 
     * Video (MP4, WebM, QuickTime), audio (MP3, M4A, Ogg, WAV), and PDF: up to 25 MB,
     * stored byte-for-byte.
     * 
     *
     * @var string|null
     */
    protected $file;
    /**
     * A display name for the asset. Defaults to the uploaded file's name when omitted or empty after trimming.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Default alternative text describing the asset, carried along whenever it is placed.
     *
     * @var string|null
     */
    protected $altText;
    /**
     * @var string|null
     */
    protected $folderId;
    /**
     * The file to upload. The file's contents determine its type; a declared content
     * type is ignored.
     * 
     * Images: PNG, JPEG, GIF, or WebP, up to 5 MB. WebP is converted on upload, and
     * every image is re-encoded.
     * 
     * Video (MP4, WebM, QuickTime), audio (MP3, M4A, Ogg, WAV), and PDF: up to 25 MB,
     * stored byte-for-byte.
     * 
     *
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }
    /**
    * The file to upload. The file's contents determine its type; a declared content
    type is ignored.
    
    Images: PNG, JPEG, GIF, or WebP, up to 5 MB. WebP is converted on upload, and
    every image is re-encoded.
    
    Video (MP4, WebM, QuickTime), audio (MP3, M4A, Ogg, WAV), and PDF: up to 25 MB,
    stored byte-for-byte.
    
    *
    * @param string|null $file
    *
    * @return self
    */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;
        return $this;
    }
    /**
     * A display name for the asset. Defaults to the uploaded file's name when omitted or empty after trimming.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * A display name for the asset. Defaults to the uploaded file's name when omitted or empty after trimming.
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
     * Default alternative text describing the asset, carried along whenever it is placed.
     *
     * @return string|null
     */
    public function getAltText(): ?string
    {
        return $this->altText;
    }
    /**
     * Default alternative text describing the asset, carried along whenever it is placed.
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
