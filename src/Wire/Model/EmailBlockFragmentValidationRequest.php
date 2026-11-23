<?php

namespace MessageBird\Wire\Model;

/**
 * Check a section's markup, variables and contact properties without saving it.
 */
class EmailBlockFragmentValidationRequest
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
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
     *
     * @var EmailBlockFragment|null
     */
    protected $fragment;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;
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
