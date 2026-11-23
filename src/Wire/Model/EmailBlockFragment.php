<?php

namespace MessageBird\Wire\Model;

/**
 * One self-contained email section. Version 2 is a section written as HTML and sends `fragment_html` alone; the API, SDKs, CLI and MCP write version 2. Version 1 is reserved for sections built in the Bird dashboard's visual editor, and only the dashboard saves it. A block language keeps the version it was created with.
 */
class EmailBlockFragment
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
     * How this section is written. 2 is HTML written directly, and is the value to send from the API, SDKs, CLI and MCP. 1 is reserved for the Bird dashboard's visual editor; other callers get a `422` for it.
     *
     * @var int|null
     */
    protected $serializerVersion;
    /**
     * Section HTML. Unfinished markup can be saved as a draft; validation checks readiness separately. A version 2 section is one presentation table with one `tbody`, `tr` and `td`, and all layout stays inside that cell. The cell sets `lang` to the block language and its own typography: `font-family`, a `font-size` in pixels, `font-style`, `font-weight`, `line-height`, `letter-spacing`, `text-align` (not `start` or `end`), `text-transform`, `color`, `margin` and `padding`. Root-relative units such as `rem` are refused; use px, em or percentages. Liquid stays balanced inside the cell, cannot use `assign`, `capture`, `increment` or `decrement`, and puts no control tag inside an attribute or style value. `{{ bird.unsubscribe_url }}` appears only as bare text or as the entire `href` of an `<a>`, and never inside an `if !mso` conditional comment, which Outlook skips. No document wrapper, `<style>`, script, form, `class` or `id` attribute. A table nested in the cell needs its own `<tbody>`. Inside a complete Outlook conditional comment, prefixed Office and VML elements such as `v:fill` may self-close, and a balanced `if !mso` conditional comment that shows its content outside Outlook is accepted when it holds no other conditional comment.
     *
     * @var string|null
     */
    protected $fragmentHtml;
    /**
     * How this section is written. 2 is HTML written directly, and is the value to send from the API, SDKs, CLI and MCP. 1 is reserved for the Bird dashboard's visual editor; other callers get a `422` for it.
     *
     * @return int|null
     */
    public function getSerializerVersion(): ?int
    {
        return $this->serializerVersion;
    }
    /**
     * How this section is written. 2 is HTML written directly, and is the value to send from the API, SDKs, CLI and MCP. 1 is reserved for the Bird dashboard's visual editor; other callers get a `422` for it.
     *
     * @param int|null $serializerVersion
     *
     * @return self
     */
    public function setSerializerVersion(?int $serializerVersion): self
    {
        $this->initialized['serializerVersion'] = true;
        $this->serializerVersion = $serializerVersion;
        return $this;
    }
    /**
     * Section HTML. Unfinished markup can be saved as a draft; validation checks readiness separately. A version 2 section is one presentation table with one `tbody`, `tr` and `td`, and all layout stays inside that cell. The cell sets `lang` to the block language and its own typography: `font-family`, a `font-size` in pixels, `font-style`, `font-weight`, `line-height`, `letter-spacing`, `text-align` (not `start` or `end`), `text-transform`, `color`, `margin` and `padding`. Root-relative units such as `rem` are refused; use px, em or percentages. Liquid stays balanced inside the cell, cannot use `assign`, `capture`, `increment` or `decrement`, and puts no control tag inside an attribute or style value. `{{ bird.unsubscribe_url }}` appears only as bare text or as the entire `href` of an `<a>`, and never inside an `if !mso` conditional comment, which Outlook skips. No document wrapper, `<style>`, script, form, `class` or `id` attribute. A table nested in the cell needs its own `<tbody>`. Inside a complete Outlook conditional comment, prefixed Office and VML elements such as `v:fill` may self-close, and a balanced `if !mso` conditional comment that shows its content outside Outlook is accepted when it holds no other conditional comment.
     *
     * @return string|null
     */
    public function getFragmentHtml(): ?string
    {
        return $this->fragmentHtml;
    }
    /**
     * Section HTML. Unfinished markup can be saved as a draft; validation checks readiness separately. A version 2 section is one presentation table with one `tbody`, `tr` and `td`, and all layout stays inside that cell. The cell sets `lang` to the block language and its own typography: `font-family`, a `font-size` in pixels, `font-style`, `font-weight`, `line-height`, `letter-spacing`, `text-align` (not `start` or `end`), `text-transform`, `color`, `margin` and `padding`. Root-relative units such as `rem` are refused; use px, em or percentages. Liquid stays balanced inside the cell, cannot use `assign`, `capture`, `increment` or `decrement`, and puts no control tag inside an attribute or style value. `{{ bird.unsubscribe_url }}` appears only as bare text or as the entire `href` of an `<a>`, and never inside an `if !mso` conditional comment, which Outlook skips. No document wrapper, `<style>`, script, form, `class` or `id` attribute. A table nested in the cell needs its own `<tbody>`. Inside a complete Outlook conditional comment, prefixed Office and VML elements such as `v:fill` may self-close, and a balanced `if !mso` conditional comment that shows its content outside Outlook is accepted when it holds no other conditional comment.
     *
     * @param string|null $fragmentHtml
     *
     * @return self
     */
    public function setFragmentHtml(?string $fragmentHtml): self
    {
        $this->initialized['fragmentHtml'] = true;
        $this->fragmentHtml = $fragmentHtml;
        return $this;
    }
}
