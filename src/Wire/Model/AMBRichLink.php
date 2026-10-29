<?php

namespace MessageBird\Wire\Model;

/**
 * A link with a preview card. Supply your own preview in `rich_link_data`, or ask Apple to build it with `rich_link_construct`. To introduce the link, send `text` alongside it.
 */
class AMBRichLink
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
     * @var AMBNativeRichLinkData|null
     */
    protected $richLinkData;
    /**
     * Asks Apple to build the rich link preview when the message is sent. Use `POST /v1/amb/messages/construct-payload` beforehand only to check the URL and see the preview's title.
     *
     * @var AMBRichLinkConstruct|null
     */
    protected $richLinkConstruct;
    /**
     * @return AMBNativeRichLinkData|null
     */
    public function getRichLinkData(): ?AMBNativeRichLinkData
    {
        return $this->richLinkData;
    }
    /**
     * @param AMBNativeRichLinkData|null $richLinkData
     *
     * @return self
     */
    public function setRichLinkData(?AMBNativeRichLinkData $richLinkData): self
    {
        $this->initialized['richLinkData'] = true;
        $this->richLinkData = $richLinkData;
        return $this;
    }
    /**
     * Asks Apple to build the rich link preview when the message is sent. Use `POST /v1/amb/messages/construct-payload` beforehand only to check the URL and see the preview's title.
     *
     * @return AMBRichLinkConstruct|null
     */
    public function getRichLinkConstruct(): ?AMBRichLinkConstruct
    {
        return $this->richLinkConstruct;
    }
    /**
     * Asks Apple to build the rich link preview when the message is sent. Use `POST /v1/amb/messages/construct-payload` beforehand only to check the URL and see the preview's title.
     *
     * @param AMBRichLinkConstruct|null $richLinkConstruct
     *
     * @return self
     */
    public function setRichLinkConstruct(?AMBRichLinkConstruct $richLinkConstruct): self
    {
        $this->initialized['richLinkConstruct'] = true;
        $this->richLinkConstruct = $richLinkConstruct;
        return $this;
    }
}
