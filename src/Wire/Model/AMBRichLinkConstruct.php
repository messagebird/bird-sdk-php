<?php

namespace MessageBird\Wire\Model;

/**
 * Asks Apple to build the rich link preview when the message is sent. Use `POST /v1/amb/messages/construct-payload` beforehand only to check the URL and see the preview's title.
 */
class AMBRichLinkConstruct
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
     * The App Clip, Apple Music, or Apple Maps URL to build a preview for. An `http://` URL is refused with a `422` `AMBEndpointNotHTTPS`. Apple builds the preview when the message is sent. If Apple refuses the URL, or fails to build it with a `500` at least 5 times over at least 10 minutes, the message ends `send_failed` with `bird:construct_rejected`; send `rich_link` content with your own `title` and `image` instead. If Apple stays unreachable for the whole retry budget, the message ends `send_failed` with `bird:attempts_exhausted`.
     *
     * @var string|null
     */
    protected $url;
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @var string|null
     */
    protected $storeRegion;
    /**
     * The App Clip, Apple Music, or Apple Maps URL to build a preview for. An `http://` URL is refused with a `422` `AMBEndpointNotHTTPS`. Apple builds the preview when the message is sent. If Apple refuses the URL, or fails to build it with a `500` at least 5 times over at least 10 minutes, the message ends `send_failed` with `bird:construct_rejected`; send `rich_link` content with your own `title` and `image` instead. If Apple stays unreachable for the whole retry budget, the message ends `send_failed` with `bird:attempts_exhausted`.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The App Clip, Apple Music, or Apple Maps URL to build a preview for. An `http://` URL is refused with a `422` `AMBEndpointNotHTTPS`. Apple builds the preview when the message is sent. If Apple refuses the URL, or fails to build it with a `500` at least 5 times over at least 10 minutes, the message ends `send_failed` with `bird:construct_rejected`; send `rich_link` content with your own `title` and `image` instead. If Apple stays unreachable for the whole retry budget, the message ends `send_failed` with `bird:attempts_exhausted`.
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
     * ISO 3166-1 alpha-2 country code.
     *
     * @return string|null
     */
    public function getStoreRegion(): ?string
    {
        return $this->storeRegion;
    }
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @param string|null $storeRegion
     *
     * @return self
     */
    public function setStoreRegion(?string $storeRegion): self
    {
        $this->initialized['storeRegion'] = true;
        $this->storeRegion = $storeRegion;
        return $this;
    }
}
