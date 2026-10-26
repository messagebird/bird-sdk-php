<?php

namespace MessageBird\Wire\Model;

/**
 * The file to upload, sent as a `multipart/form-data` body. Include each field at most once. Each text field is limited to 8 KiB before surrounding whitespace is trimmed; its character limit also applies. When provided, `folder_id` must identify an existing folder even when the upload matches an active asset in this workspace. A duplicate keeps its existing folder.
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
     * Images: PNG, JPEG, GIF, or static WebP, up to 5 MiB (5,242,880 bytes). Every image
     * is re-encoded. Static WebP becomes JPEG or PNG; animated GIF keeps its animation.
     * Animated WebP is not supported.
     * 
     * Video (MP4, WebM, QuickTime), audio (MP3, M4A, Ogg, WAV), and PDF: up to 25 MB,
     * validated for container structure and stored byte-for-byte. Validation does not scan for malware.
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
     * Default alternative text to use when inserting the asset into content.
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
     * Images: PNG, JPEG, GIF, or static WebP, up to 5 MiB (5,242,880 bytes). Every image
     * is re-encoded. Static WebP becomes JPEG or PNG; animated GIF keeps its animation.
     * Animated WebP is not supported.
     * 
     * Video (MP4, WebM, QuickTime), audio (MP3, M4A, Ogg, WAV), and PDF: up to 25 MB,
     * validated for container structure and stored byte-for-byte. Validation does not scan for malware.
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
    
    Images: PNG, JPEG, GIF, or static WebP, up to 5 MiB (5,242,880 bytes). Every image
    is re-encoded. Static WebP becomes JPEG or PNG; animated GIF keeps its animation.
    Animated WebP is not supported.
    
    Video (MP4, WebM, QuickTime), audio (MP3, M4A, Ogg, WAV), and PDF: up to 25 MB,
    validated for container structure and stored byte-for-byte. Validation does not scan for malware.
    
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
     * Default alternative text to use when inserting the asset into content.
     *
     * @return string|null
     */
    public function getAltText(): ?string
    {
        return $this->altText;
    }
    /**
     * Default alternative text to use when inserting the asset into content.
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
