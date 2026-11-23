<?php

namespace MessageBird\Wire\Model;

/**
 * Save a full draft section or copy a retained published revision into its draft. Supply exactly one of fragment or from_revision_id. Copying a revision preserves its source reference and never republishes it. source_revision_id is accepted only with authored fragment content; omitting it clears translation provenance. A new language takes the authoring mode of its first fragment, and an existing language keeps its mode: content in the other mode returns 422.
 */
class EmailBlockLanguageUpsert
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
     * Draft revision last read, or zero to create a missing language. A concurrent change returns 409.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @var EmailBlockFragment|null
     */
    protected $fragment;
    /**
     * @var string|null
     */
    protected $sourceRevisionId;
    /**
     * @var string|null
     */
    protected $fromRevisionId;
    /**
     * Draft revision last read, or zero to create a missing language. A concurrent change returns 409.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * Draft revision last read, or zero to create a missing language. A concurrent change returns 409.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @return EmailBlockFragment|null
     */
    public function getFragment(): ?EmailBlockFragment
    {
        return $this->fragment;
    }
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @param EmailBlockFragment|null $fragment
     *
     * @return self
     */
    public function setFragment(?EmailBlockFragment $fragment): self
    {
        $this->initialized['fragment'] = true;
        $this->fragment = $fragment;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSourceRevisionId(): ?string
    {
        return $this->sourceRevisionId;
    }
    /**
     * @param string|null $sourceRevisionId
     *
     * @return self
     */
    public function setSourceRevisionId(?string $sourceRevisionId): self
    {
        $this->initialized['sourceRevisionId'] = true;
        $this->sourceRevisionId = $sourceRevisionId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getFromRevisionId(): ?string
    {
        return $this->fromRevisionId;
    }
    /**
     * @param string|null $fromRevisionId
     *
     * @return self
     */
    public function setFromRevisionId(?string $fromRevisionId): self
    {
        $this->initialized['fromRevisionId'] = true;
        $this->fromRevisionId = $fromRevisionId;
        return $this;
    }
}
