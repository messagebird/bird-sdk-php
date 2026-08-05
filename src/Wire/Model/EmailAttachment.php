<?php

namespace MessageBird\Wire\Model;

class EmailAttachment
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
     * Filename shown to the recipient. Required.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Base64-encoded attachment bytes. Required. Counts toward the 20 MB estimated generated message-size cap after encoding and MIME wrapping.
     * 
     *
     * @var string|null
     */
    protected $content;
    /**
     * Preview feature — provide a URL and Bird fetches the attachment for you. Currently unavailable. Use `content` instead. The schema currently requires `content`, so a request with only `path` is rejected with 422 for missing `content`; a request supplying both `content` and `path` is rejected with 422 `UnsupportedEmailFeature` until this preview ships. When generally available: HTTPS-only, single redirect followed and re-validated, private IP ranges blocked, request timeout enforced, fetched content counts toward the 20 MB estimated generated message-size cap after encoding and MIME wrapping.
     * 
     *
     * @var string|null
     */
    protected $path;
    /**
     * MIME type. Inferred from `filename` extension when omitted. Used to enforce the blocklist of disallowed executable / script types.
     * 
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * RFC 2392 Content-ID. When set, the attachment is rendered inline and can be referenced from the HTML body as `<img src="cid:{content_id}"/>`. When omitted, the attachment is rendered as a regular file attachment.
     * 
     *
     * @var string|null
     */
    protected $contentId;
    /**
     * Filename shown to the recipient. Required.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Filename shown to the recipient. Required.
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
     * Base64-encoded attachment bytes. Required. Counts toward the 20 MB estimated generated message-size cap after encoding and MIME wrapping.
     * 
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
    /**
     * Base64-encoded attachment bytes. Required. Counts toward the 20 MB estimated generated message-size cap after encoding and MIME wrapping.
     *
     * @param string|null $content
     *
     * @return self
     */
    public function setContent(?string $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
        return $this;
    }
    /**
     * Preview feature — provide a URL and Bird fetches the attachment for you. Currently unavailable. Use `content` instead. The schema currently requires `content`, so a request with only `path` is rejected with 422 for missing `content`; a request supplying both `content` and `path` is rejected with 422 `UnsupportedEmailFeature` until this preview ships. When generally available: HTTPS-only, single redirect followed and re-validated, private IP ranges blocked, request timeout enforced, fetched content counts toward the 20 MB estimated generated message-size cap after encoding and MIME wrapping.
     * 
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
    /**
     * Preview feature — provide a URL and Bird fetches the attachment for you. Currently unavailable. Use `content` instead. The schema currently requires `content`, so a request with only `path` is rejected with 422 for missing `content`; a request supplying both `content` and `path` is rejected with 422 `UnsupportedEmailFeature` until this preview ships. When generally available: HTTPS-only, single redirect followed and re-validated, private IP ranges blocked, request timeout enforced, fetched content counts toward the 20 MB estimated generated message-size cap after encoding and MIME wrapping.
     *
     * @param string|null $path
     *
     * @return self
     */
    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }
    /**
     * MIME type. Inferred from `filename` extension when omitted. Used to enforce the blocklist of disallowed executable / script types.
     * 
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * MIME type. Inferred from `filename` extension when omitted. Used to enforce the blocklist of disallowed executable / script types.
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
     * RFC 2392 Content-ID. When set, the attachment is rendered inline and can be referenced from the HTML body as `<img src="cid:{content_id}"/>`. When omitted, the attachment is rendered as a regular file attachment.
     * 
     *
     * @return string|null
     */
    public function getContentId(): ?string
    {
        return $this->contentId;
    }
    /**
     * RFC 2392 Content-ID. When set, the attachment is rendered inline and can be referenced from the HTML body as `<img src="cid:{content_id}"/>`. When omitted, the attachment is rendered as a regular file attachment.
     *
     * @param string|null $contentId
     *
     * @return self
     */
    public function setContentId(?string $contentId): self
    {
        $this->initialized['contentId'] = true;
        $this->contentId = $contentId;
        return $this;
    }
}
