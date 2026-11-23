<?php

namespace MessageBird\Wire\Model;

/**
 * Create an unpublished block and its source-language draft.
 */
class EmailBlockCreate
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
     * Name for people choosing the block, such as when linking it into a template.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Optional notes for people maintaining the block.
     *
     * @var string|null
     */
    protected $description;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $sourceLanguage;
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @var EmailBlockFragment|null
     */
    protected $fragment;
    /**
     * Name for people choosing the block, such as when linking it into a template.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name for people choosing the block, such as when linking it into a template.
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
     * Optional notes for people maintaining the block.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Optional notes for people maintaining the block.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getSourceLanguage(): ?string
    {
        return $this->sourceLanguage;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $sourceLanguage
     *
     * @return self
     */
    public function setSourceLanguage(?string $sourceLanguage): self
    {
        $this->initialized['sourceLanguage'] = true;
        $this->sourceLanguage = $sourceLanguage;
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
}
