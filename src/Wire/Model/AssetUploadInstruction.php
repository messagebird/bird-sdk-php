<?php

namespace MessageBird\Wire\Model;

/**
 * Send the original file bytes to this URL with the exact headers and content length. Send no Bird credentials or cookies. Keep the URL private and call complete after the PUT succeeds.
 */
class AssetUploadInstruction
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
     * HTTP method for transferring the file.
     *
     * @var string|null
     */
    protected $method;
    /**
     * Temporary HTTPS upload URL. It can be reused for the same fixed file until expiry.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Headers the upload request must send exactly as provided.
     *
     * @var array<string, string>|null
     */
    protected $requiredHeaders;
    /**
     * Required HTTP content length in bytes.
     *
     * @var int|null
     */
    protected $contentLength;
    /**
     * Upload instruction expiry, bounded by the session and signing credentials.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * HTTP method for transferring the file.
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }
    /**
     * HTTP method for transferring the file.
     *
     * @param string|null $method
     *
     * @return self
     */
    public function setMethod(?string $method): self
    {
        $this->initialized['method'] = true;
        $this->method = $method;
        return $this;
    }
    /**
     * Temporary HTTPS upload URL. It can be reused for the same fixed file until expiry.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Temporary HTTPS upload URL. It can be reused for the same fixed file until expiry.
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
     * Headers the upload request must send exactly as provided.
     *
     * @return array<string, string>|null
     */
    public function getRequiredHeaders(): ?iterable
    {
        return $this->requiredHeaders;
    }
    /**
     * Headers the upload request must send exactly as provided.
     *
     * @param array<string, string>|null $requiredHeaders
     *
     * @return self
     */
    public function setRequiredHeaders(?iterable $requiredHeaders): self
    {
        $this->initialized['requiredHeaders'] = true;
        $this->requiredHeaders = $requiredHeaders;
        return $this;
    }
    /**
     * Required HTTP content length in bytes.
     *
     * @return int|null
     */
    public function getContentLength(): ?int
    {
        return $this->contentLength;
    }
    /**
     * Required HTTP content length in bytes.
     *
     * @param int|null $contentLength
     *
     * @return self
     */
    public function setContentLength(?int $contentLength): self
    {
        $this->initialized['contentLength'] = true;
        $this->contentLength = $contentLength;
        return $this;
    }
    /**
     * Upload instruction expiry, bounded by the session and signing credentials.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * Upload instruction expiry, bounded by the session and signing credentials.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
}
