<?php

namespace MessageBird\Wire\Model;

class EmailCompatibilityFinding
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
     * Which rule produced a finding.
     * 
     * - `html_script`: a `<script>` tag.
     * - `html_event_handlers`: a JavaScript event-handler attribute such as `onclick`.
     * - `html_embedded_content`: an `<iframe>`, `<embed>`, or `<object>`.
     * - `html_linked_stylesheet`: a `<link rel="stylesheet">`.
     * - `css_at_import`: an `@import` rule.
     * - `html_form`: a `<form>`, `<input>`, `<select>`, or `<textarea>`.
     * - `html_svg`: an inline `<svg>`.
     * - `html_media`: a `<video>` or `<audio>` element.
     * - `css_display_flex_grid`: `display: flex` or `display: grid`, and their `inline-` forms.
     * - `css_position_fixed_sticky`: `position: fixed` or `position: sticky`.
     * - `css_variables_no_fallback`: a `var()` with no fallback value.
     * - `css_viewport_units`: a `vh` or `vw` length.
     * - `html_button`: a `<button>` element.
     * - `css_math_functions`: `clamp()`, `min()`, or `max()`.
     * - `css_modern_color`: `oklch()`, `oklab()`, `lch()`, or `lab()`.
     * - `html_web_page_markup`: markup a web framework left behind, such as a `data-reactroot` attribute or a `__next` element id.
     * 
     *
     * @var string|null
     */
    protected $ruleId;
    /**
     * What a finding costs you.
     * 
     * - `problem`: the pattern does nothing at all. The client removes the markup, never loads the stylesheet carrying it, or will not operate the control. Where a finding names clients, that is what happens in those clients.
     * - `warning`: it does something, but not what you wrote.
     * 
     * Neither one refuses a save, a submit, or a send.
     * 
     *
     * @var string|null
     */
    protected $severity;
    /**
     * Which language's content this finding is in. Null when the call covered a single language.
     * 
     *
     * @var string|null
     */
    protected $language;
    /**
     * Which field of that language the finding is in. Always `html`; the subject and the plain-text body are not checked.
     * 
     *
     * @var string|null
     */
    protected $field;
    /**
     * What is wrong and which clients it affects, worded to show to whoever is authoring the template. It covers the rule's whole category rather than the exact text that matched, so a rule covering `<video>` and `<audio>` names both whichever one is on the line. Show `fix` and then `partial` after it.
     * 
     *
     * @var string|null
     */
    protected $message;
    /**
     * What to use instead. Null when there is no drop-in alternative and the fix is a restructure.
     * 
     *
     * @var string|null
     */
    protected $fix;
    /**
     * Which clients support the feature only partly. Null when no client's support is partial.
     * 
     *
     * @var string|null
     */
    protected $partial;
    /**
     * The 1-based line the pattern is on, in the HTML the containing response's `compatibility` says it covered.
     * 
     *
     * @var int|null
     */
    protected $line;
    /**
     * The 1-based column the pattern starts at, on that line.
     *
     * @var int|null
     */
    protected $column;
    /**
     * The source text that matched, starting at `line` and `column`: the smallest span that identifies what is wrong. Never the enclosing line. For a finding on a whole element, the span runs from the opening tag through the close tag, because the client drops the element's content along with its markup. Cut at 256 characters, so an element holding a long body is quoted from its start rather than in full.
     * 
     *
     * @var string|null
     */
    protected $match;
    /**
     * Every client family that does not support the feature at all, in alphabetical order by each entry's `family`. Empty on a finding whose `message`, `fix`, and `partial` name no client. `message` names at most four families; this names all of them.
     * 
     *
     * @var list<EmailClientSupport>|null
     */
    protected $unsupportedClients;
    /**
     * Every client family that renders something other than what you wrote, in alphabetical order by each entry's `family`. Empty when no client's support is partial, which is also when `partial` is null. `partial` names at most four families; this names all of them.
     * 
     *
     * @var list<EmailClientSupport>|null
     */
    protected $partialClients;
    /**
     * Which rule produced a finding.
     * 
     * - `html_script`: a `<script>` tag.
     * - `html_event_handlers`: a JavaScript event-handler attribute such as `onclick`.
     * - `html_embedded_content`: an `<iframe>`, `<embed>`, or `<object>`.
     * - `html_linked_stylesheet`: a `<link rel="stylesheet">`.
     * - `css_at_import`: an `@import` rule.
     * - `html_form`: a `<form>`, `<input>`, `<select>`, or `<textarea>`.
     * - `html_svg`: an inline `<svg>`.
     * - `html_media`: a `<video>` or `<audio>` element.
     * - `css_display_flex_grid`: `display: flex` or `display: grid`, and their `inline-` forms.
     * - `css_position_fixed_sticky`: `position: fixed` or `position: sticky`.
     * - `css_variables_no_fallback`: a `var()` with no fallback value.
     * - `css_viewport_units`: a `vh` or `vw` length.
     * - `html_button`: a `<button>` element.
     * - `css_math_functions`: `clamp()`, `min()`, or `max()`.
     * - `css_modern_color`: `oklch()`, `oklab()`, `lch()`, or `lab()`.
     * - `html_web_page_markup`: markup a web framework left behind, such as a `data-reactroot` attribute or a `__next` element id.
     * 
     *
     * @return string|null
     */
    public function getRuleId(): ?string
    {
        return $this->ruleId;
    }
    /**
    * Which rule produced a finding.
    
    - `html_script`: a `<script>` tag.
    - `html_event_handlers`: a JavaScript event-handler attribute such as `onclick`.
    - `html_embedded_content`: an `<iframe>`, `<embed>`, or `<object>`.
    - `html_linked_stylesheet`: a `<link rel="stylesheet">`.
    - `css_at_import`: an `@import` rule.
    - `html_form`: a `<form>`, `<input>`, `<select>`, or `<textarea>`.
    - `html_svg`: an inline `<svg>`.
    - `html_media`: a `<video>` or `<audio>` element.
    - `css_display_flex_grid`: `display: flex` or `display: grid`, and their `inline-` forms.
    - `css_position_fixed_sticky`: `position: fixed` or `position: sticky`.
    - `css_variables_no_fallback`: a `var()` with no fallback value.
    - `css_viewport_units`: a `vh` or `vw` length.
    - `html_button`: a `<button>` element.
    - `css_math_functions`: `clamp()`, `min()`, or `max()`.
    - `css_modern_color`: `oklch()`, `oklab()`, `lch()`, or `lab()`.
    - `html_web_page_markup`: markup a web framework left behind, such as a `data-reactroot` attribute or a `__next` element id.
    
    *
    * @param string|null $ruleId
    *
    * @return self
    */
    public function setRuleId(?string $ruleId): self
    {
        $this->initialized['ruleId'] = true;
        $this->ruleId = $ruleId;
        return $this;
    }
    /**
     * What a finding costs you.
     * 
     * - `problem`: the pattern does nothing at all. The client removes the markup, never loads the stylesheet carrying it, or will not operate the control. Where a finding names clients, that is what happens in those clients.
     * - `warning`: it does something, but not what you wrote.
     * 
     * Neither one refuses a save, a submit, or a send.
     * 
     *
     * @return string|null
     */
    public function getSeverity(): ?string
    {
        return $this->severity;
    }
    /**
    * What a finding costs you.
    
    - `problem`: the pattern does nothing at all. The client removes the markup, never loads the stylesheet carrying it, or will not operate the control. Where a finding names clients, that is what happens in those clients.
    - `warning`: it does something, but not what you wrote.
    
    Neither one refuses a save, a submit, or a send.
    
    *
    * @param string|null $severity
    *
    * @return self
    */
    public function setSeverity(?string $severity): self
    {
        $this->initialized['severity'] = true;
        $this->severity = $severity;
        return $this;
    }
    /**
     * Which language's content this finding is in. Null when the call covered a single language.
     * 
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Which language's content this finding is in. Null when the call covered a single language.
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
     * Which field of that language the finding is in. Always `html`; the subject and the plain-text body are not checked.
     * 
     *
     * @return string|null
     */
    public function getField(): ?string
    {
        return $this->field;
    }
    /**
     * Which field of that language the finding is in. Always `html`; the subject and the plain-text body are not checked.
     *
     * @param string|null $field
     *
     * @return self
     */
    public function setField(?string $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;
        return $this;
    }
    /**
     * What is wrong and which clients it affects, worded to show to whoever is authoring the template. It covers the rule's whole category rather than the exact text that matched, so a rule covering `<video>` and `<audio>` names both whichever one is on the line. Show `fix` and then `partial` after it.
     * 
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * What is wrong and which clients it affects, worded to show to whoever is authoring the template. It covers the rule's whole category rather than the exact text that matched, so a rule covering `<video>` and `<audio>` names both whichever one is on the line. Show `fix` and then `partial` after it.
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * What to use instead. Null when there is no drop-in alternative and the fix is a restructure.
     * 
     *
     * @return string|null
     */
    public function getFix(): ?string
    {
        return $this->fix;
    }
    /**
     * What to use instead. Null when there is no drop-in alternative and the fix is a restructure.
     *
     * @param string|null $fix
     *
     * @return self
     */
    public function setFix(?string $fix): self
    {
        $this->initialized['fix'] = true;
        $this->fix = $fix;
        return $this;
    }
    /**
     * Which clients support the feature only partly. Null when no client's support is partial.
     * 
     *
     * @return string|null
     */
    public function getPartial(): ?string
    {
        return $this->partial;
    }
    /**
     * Which clients support the feature only partly. Null when no client's support is partial.
     *
     * @param string|null $partial
     *
     * @return self
     */
    public function setPartial(?string $partial): self
    {
        $this->initialized['partial'] = true;
        $this->partial = $partial;
        return $this;
    }
    /**
     * The 1-based line the pattern is on, in the HTML the containing response's `compatibility` says it covered.
     * 
     *
     * @return int|null
     */
    public function getLine(): ?int
    {
        return $this->line;
    }
    /**
     * The 1-based line the pattern is on, in the HTML the containing response's `compatibility` says it covered.
     *
     * @param int|null $line
     *
     * @return self
     */
    public function setLine(?int $line): self
    {
        $this->initialized['line'] = true;
        $this->line = $line;
        return $this;
    }
    /**
     * The 1-based column the pattern starts at, on that line.
     *
     * @return int|null
     */
    public function getColumn(): ?int
    {
        return $this->column;
    }
    /**
     * The 1-based column the pattern starts at, on that line.
     *
     * @param int|null $column
     *
     * @return self
     */
    public function setColumn(?int $column): self
    {
        $this->initialized['column'] = true;
        $this->column = $column;
        return $this;
    }
    /**
     * The source text that matched, starting at `line` and `column`: the smallest span that identifies what is wrong. Never the enclosing line. For a finding on a whole element, the span runs from the opening tag through the close tag, because the client drops the element's content along with its markup. Cut at 256 characters, so an element holding a long body is quoted from its start rather than in full.
     * 
     *
     * @return string|null
     */
    public function getMatch(): ?string
    {
        return $this->match;
    }
    /**
     * The source text that matched, starting at `line` and `column`: the smallest span that identifies what is wrong. Never the enclosing line. For a finding on a whole element, the span runs from the opening tag through the close tag, because the client drops the element's content along with its markup. Cut at 256 characters, so an element holding a long body is quoted from its start rather than in full.
     *
     * @param string|null $match
     *
     * @return self
     */
    public function setMatch(?string $match): self
    {
        $this->initialized['match'] = true;
        $this->match = $match;
        return $this;
    }
    /**
     * Every client family that does not support the feature at all, in alphabetical order by each entry's `family`. Empty on a finding whose `message`, `fix`, and `partial` name no client. `message` names at most four families; this names all of them.
     * 
     *
     * @return list<EmailClientSupport>|null
     */
    public function getUnsupportedClients(): ?array
    {
        return $this->unsupportedClients;
    }
    /**
     * Every client family that does not support the feature at all, in alphabetical order by each entry's `family`. Empty on a finding whose `message`, `fix`, and `partial` name no client. `message` names at most four families; this names all of them.
     *
     * @param list<EmailClientSupport>|null $unsupportedClients
     *
     * @return self
     */
    public function setUnsupportedClients(?array $unsupportedClients): self
    {
        $this->initialized['unsupportedClients'] = true;
        $this->unsupportedClients = $unsupportedClients;
        return $this;
    }
    /**
     * Every client family that renders something other than what you wrote, in alphabetical order by each entry's `family`. Empty when no client's support is partial, which is also when `partial` is null. `partial` names at most four families; this names all of them.
     * 
     *
     * @return list<EmailClientSupport>|null
     */
    public function getPartialClients(): ?array
    {
        return $this->partialClients;
    }
    /**
     * Every client family that renders something other than what you wrote, in alphabetical order by each entry's `family`. Empty when no client's support is partial, which is also when `partial` is null. `partial` names at most four families; this names all of them.
     *
     * @param list<EmailClientSupport>|null $partialClients
     *
     * @return self
     */
    public function setPartialClients(?array $partialClients): self
    {
        $this->initialized['partialClients'] = true;
        $this->partialClients = $partialClients;
        return $this;
    }
}
