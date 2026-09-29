<?php

namespace MessageBird\Wire\Model;

class AMBRichLinkReference
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
     * Title supplied by Apple for the preview.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Messages extension identifier supplied by Apple, when present.
     *
     * @var string|null
     */
    protected $bid;
    /**
     * Signature binding the reference to the business, when supplied by Apple.
     *
     * @var string|null
     */
    protected $dataRefSig;
    /**
     * Location of the encrypted preview.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Owner identifier supplied by Apple.
     *
     * @var string|null
     */
    protected $owner;
    /**
     * Signature supplied by Apple.
     *
     * @var string|null
     */
    protected $signatureBase64;
    /**
     * Decryption key supplied by Apple.
     *
     * @var string|null
     */
    protected $key;
    /**
     * Size of the encrypted preview in bytes.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Title supplied by Apple for the preview.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Title supplied by Apple for the preview.
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * Messages extension identifier supplied by Apple, when present.
     *
     * @return string|null
     */
    public function getBid(): ?string
    {
        return $this->bid;
    }
    /**
     * Messages extension identifier supplied by Apple, when present.
     *
     * @param string|null $bid
     *
     * @return self
     */
    public function setBid(?string $bid): self
    {
        $this->initialized['bid'] = true;
        $this->bid = $bid;
        return $this;
    }
    /**
     * Signature binding the reference to the business, when supplied by Apple.
     *
     * @return string|null
     */
    public function getDataRefSig(): ?string
    {
        return $this->dataRefSig;
    }
    /**
     * Signature binding the reference to the business, when supplied by Apple.
     *
     * @param string|null $dataRefSig
     *
     * @return self
     */
    public function setDataRefSig(?string $dataRefSig): self
    {
        $this->initialized['dataRefSig'] = true;
        $this->dataRefSig = $dataRefSig;
        return $this;
    }
    /**
     * Location of the encrypted preview.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Location of the encrypted preview.
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
     * Owner identifier supplied by Apple.
     *
     * @return string|null
     */
    public function getOwner(): ?string
    {
        return $this->owner;
    }
    /**
     * Owner identifier supplied by Apple.
     *
     * @param string|null $owner
     *
     * @return self
     */
    public function setOwner(?string $owner): self
    {
        $this->initialized['owner'] = true;
        $this->owner = $owner;
        return $this;
    }
    /**
     * Signature supplied by Apple.
     *
     * @return string|null
     */
    public function getSignatureBase64(): ?string
    {
        return $this->signatureBase64;
    }
    /**
     * Signature supplied by Apple.
     *
     * @param string|null $signatureBase64
     *
     * @return self
     */
    public function setSignatureBase64(?string $signatureBase64): self
    {
        $this->initialized['signatureBase64'] = true;
        $this->signatureBase64 = $signatureBase64;
        return $this;
    }
    /**
     * Decryption key supplied by Apple.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * Decryption key supplied by Apple.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * Size of the encrypted preview in bytes.
     *
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }
    /**
     * Size of the encrypted preview in bytes.
     *
     * @param int|null $size
     *
     * @return self
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }
}
