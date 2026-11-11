<?php

namespace MessageBird\Wire\Model;

/**
 * Exact properties of the active source file. Calculate size and SHA-256 from its bytes before creating a session or preparing a browser-selected source. Images allow up to 5,242,880 bytes; other supported media allow up to 25,000,000 bytes.
 */
class AssetUploadFile
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
     * Source filename, including its extension.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Media type of the source file. Supported values are `image/png`, `image/jpeg`, `image/gif`, `video/mp4`, `video/webm`, `video/quicktime`, `audio/mpeg`, `audio/mp4`, `audio/ogg`, `audio/wav`, and `application/pdf`.
     * 
     * Supply the exact value without parameters. Unsupported values return `E20001`. Completion checks this against the file's contents.
     * 
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * Exact size of the source file in bytes.
     *
     * @var int|null
     */
    protected $sizeBytes;
    /**
     * SHA-256 of the source bytes, encoded as lowercase hexadecimal.
     *
     * @var string|null
     */
    protected $sha256;
    /**
     * Source filename, including its extension.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Source filename, including its extension.
     *
     * @param string|null $filename
     *
     * @return self
     */
    public function setFilename(?string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;
        return $this;
    }
    /**
     * Media type of the source file. Supported values are `image/png`, `image/jpeg`, `image/gif`, `video/mp4`, `video/webm`, `video/quicktime`, `audio/mpeg`, `audio/mp4`, `audio/ogg`, `audio/wav`, and `application/pdf`.
     * 
     * Supply the exact value without parameters. Unsupported values return `E20001`. Completion checks this against the file's contents.
     * 
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
    * Media type of the source file. Supported values are `image/png`, `image/jpeg`, `image/gif`, `video/mp4`, `video/webm`, `video/quicktime`, `audio/mpeg`, `audio/mp4`, `audio/ogg`, `audio/wav`, and `application/pdf`.
    
    Supply the exact value without parameters. Unsupported values return `E20001`. Completion checks this against the file's contents.
    
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
     * Exact size of the source file in bytes.
     *
     * @return int|null
     */
    public function getSizeBytes(): ?int
    {
        return $this->sizeBytes;
    }
    /**
     * Exact size of the source file in bytes.
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
     * SHA-256 of the source bytes, encoded as lowercase hexadecimal.
     *
     * @return string|null
     */
    public function getSha256(): ?string
    {
        return $this->sha256;
    }
    /**
     * SHA-256 of the source bytes, encoded as lowercase hexadecimal.
     *
     * @param string|null $sha256
     *
     * @return self
     */
    public function setSha256(?string $sha256): self
    {
        $this->initialized['sha256'] = true;
        $this->sha256 = $sha256;
        return $this;
    }
}
