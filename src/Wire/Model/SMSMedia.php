<?php

namespace MessageBird\Wire\Model;

/**
 * A media attachment on an MMS. Inbound attachments include carrier metadata even when their contents could not be retrieved. Outbound attachments retain the submitted URL.
 */
class SMSMedia
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
     * ID of the stored attachment. Absent for outbound URLs and inbound attachments that were not stored.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Carrier-reported media type for inbound attachments; application/octet-stream when unknown or outbound.
     *
     * @var string|null
     */
    protected $mimeType;
    /**
     * Filename the sender's device supplied, when it supplied one.
     *
     * @var string|null
     */
    protected $filename;
    /**
     * Where to download the attachment, kept for 30 days after the message is received. Null when the attachment was not stored, for example because Bird could not retrieve it from the carrier. For outbound MMS this is the submitted URL, whose availability the caller controls.
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * ID of the stored attachment. Absent for outbound URLs and inbound attachments that were not stored.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * ID of the stored attachment. Absent for outbound URLs and inbound attachments that were not stored.
     *
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
     * Carrier-reported media type for inbound attachments; application/octet-stream when unknown or outbound.
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * Carrier-reported media type for inbound attachments; application/octet-stream when unknown or outbound.
     *
     * @param string|null $mimeType
     *
     * @return self
     */
    public function setMimeType(?string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
        return $this;
    }
    /**
     * Filename the sender's device supplied, when it supplied one.
     *
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
     * Filename the sender's device supplied, when it supplied one.
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
     * Where to download the attachment, kept for 30 days after the message is received. Null when the attachment was not stored, for example because Bird could not retrieve it from the carrier. For outbound MMS this is the submitted URL, whose availability the caller controls.
     * 
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Where to download the attachment, kept for 30 days after the message is received. Null when the attachment was not stored, for example because Bird could not retrieve it from the carrier. For outbound MMS this is the submitted URL, whose availability the caller controls.
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
}
