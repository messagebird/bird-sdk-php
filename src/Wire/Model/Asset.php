<?php

namespace MessageBird\Wire\Model;

class Asset extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * The asset's permanent public URL. Safe to embed or link in sent messages; for a document the usable form is a link.
     *
     * @var string|null
     */
    protected $url;
    /**
     * A small preview of the asset, for rendering a picker or a grid. Intended for your own interfaces rather than for embedding in messages. Null for every kind but `image`: generating a preview of a video, an audio file, or a document would mean rendering its contents, which the library does not do. Show an icon for the `kind` instead.
     *
     * @var string|null
     */
    protected $thumbnailUrl;
    /**
     * The asset's display name. Defaults to the uploaded file's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The stored file's media type, determined from its contents.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * The category a media-library asset's type falls into. Use it to group or filter a
     * mixed library.
     * 
     * - `image`: covers PNG, JPEG, and GIF.
     * - `video`: covers MP4, WebM, and QuickTime.
     * - `audio`: covers MP3, M4A, Ogg, and WAV.
     * - `document`: covers PDF.
     * 
     *
     * @var string|null
     */
    protected $kind;
    /**
     * The stored file's size in bytes. Images are re-encoded on upload, so for those this can differ from the size of the file you sent. Every other kind is stored byte-for-byte.
     *
     * @var int|null
     */
    protected $sizeBytes;
    /**
     * The stored image's width in pixels. Null for every kind but `image`.
     *
     * @var int|null
     */
    protected $width;
    /**
     * The stored image's height in pixels. Null for every kind but `image`.
     *
     * @var int|null
     */
    protected $height;
    /**
     * Default alternative text describing the asset, carried along whenever it is placed. Most mail clients block images by default, so for an image this is often the only thing a recipient reads.
     *
     * @var string|null
     */
    protected $altText;
    /**
     * The folder the asset is filed in, or null when it sits at the top level of the library. Filing an asset never changes its URL.
     *
     * @var string|null
     */
    protected $folderId;
    /**
     * When the asset was removed from the library, or null if it is still listed. A removed asset keeps serving at its original URL.
     *
     * @var \DateTime|null
     */
    protected $deletedAt;
    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
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
     * The asset's permanent public URL. Safe to embed or link in sent messages; for a document the usable form is a link.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The asset's permanent public URL. Safe to embed or link in sent messages; for a document the usable form is a link.
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
     * A small preview of the asset, for rendering a picker or a grid. Intended for your own interfaces rather than for embedding in messages. Null for every kind but `image`: generating a preview of a video, an audio file, or a document would mean rendering its contents, which the library does not do. Show an icon for the `kind` instead.
     *
     * @return string|null
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }
    /**
     * A small preview of the asset, for rendering a picker or a grid. Intended for your own interfaces rather than for embedding in messages. Null for every kind but `image`: generating a preview of a video, an audio file, or a document would mean rendering its contents, which the library does not do. Show an icon for the `kind` instead.
     *
     * @param string|null $thumbnailUrl
     *
     * @return self
     */
    public function setThumbnailUrl(?string $thumbnailUrl): self
    {
        $this->initialized['thumbnailUrl'] = true;
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }
    /**
     * The asset's display name. Defaults to the uploaded file's name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The asset's display name. Defaults to the uploaded file's name.
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
     * The stored file's media type, determined from its contents.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * The stored file's media type, determined from its contents.
     *
     * @param string|null $contentType
     *
     * @return self
     */
    public function setContentType(?string $contentType): self
    {
        $this->initialized['contentType'] = true;
        $this->contentType = $contentType;
        return $this;
    }
    /**
     * The category a media-library asset's type falls into. Use it to group or filter a
     * mixed library.
     * 
     * - `image`: covers PNG, JPEG, and GIF.
     * - `video`: covers MP4, WebM, and QuickTime.
     * - `audio`: covers MP3, M4A, Ogg, and WAV.
     * - `document`: covers PDF.
     * 
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }
    /**
    * The category a media-library asset's type falls into. Use it to group or filter a
    mixed library.
    
    - `image`: covers PNG, JPEG, and GIF.
    - `video`: covers MP4, WebM, and QuickTime.
    - `audio`: covers MP3, M4A, Ogg, and WAV.
    - `document`: covers PDF.
    
    *
    * @param string|null $kind
    *
    * @return self
    */
    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
    /**
     * The stored file's size in bytes. Images are re-encoded on upload, so for those this can differ from the size of the file you sent. Every other kind is stored byte-for-byte.
     *
     * @return int|null
     */
    public function getSizeBytes(): ?int
    {
        return $this->sizeBytes;
    }
    /**
     * The stored file's size in bytes. Images are re-encoded on upload, so for those this can differ from the size of the file you sent. Every other kind is stored byte-for-byte.
     *
     * @param int|null $sizeBytes
     *
     * @return self
     */
    public function setSizeBytes(?int $sizeBytes): self
    {
        $this->initialized['sizeBytes'] = true;
        $this->sizeBytes = $sizeBytes;
        return $this;
    }
    /**
     * The stored image's width in pixels. Null for every kind but `image`.
     *
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }
    /**
     * The stored image's width in pixels. Null for every kind but `image`.
     *
     * @param int|null $width
     *
     * @return self
     */
    public function setWidth(?int $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;
        return $this;
    }
    /**
     * The stored image's height in pixels. Null for every kind but `image`.
     *
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }
    /**
     * The stored image's height in pixels. Null for every kind but `image`.
     *
     * @param int|null $height
     *
     * @return self
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;
        return $this;
    }
    /**
     * Default alternative text describing the asset, carried along whenever it is placed. Most mail clients block images by default, so for an image this is often the only thing a recipient reads.
     *
     * @return string|null
     */
    public function getAltText(): ?string
    {
        return $this->altText;
    }
    /**
     * Default alternative text describing the asset, carried along whenever it is placed. Most mail clients block images by default, so for an image this is often the only thing a recipient reads.
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
     * The folder the asset is filed in, or null when it sits at the top level of the library. Filing an asset never changes its URL.
     *
     * @return string|null
     */
    public function getFolderId(): ?string
    {
        return $this->folderId;
    }
    /**
     * The folder the asset is filed in, or null when it sits at the top level of the library. Filing an asset never changes its URL.
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
    /**
     * When the asset was removed from the library, or null if it is still listed. A removed asset keeps serving at its original URL.
     *
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }
    /**
     * When the asset was removed from the library, or null if it is still listed. A removed asset keeps serving at its original URL.
     *
     * @param \DateTime|null $deletedAt
     *
     * @return self
     */
    public function setDeletedAt(?\DateTime $deletedAt): self
    {
        $this->initialized['deletedAt'] = true;
        $this->deletedAt = $deletedAt;
        return $this;
    }
}
