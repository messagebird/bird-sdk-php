<?php

namespace MessageBird\Wire\Model;

class EmailTemplatePreview
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
     * The rendered subject line. Null when the template has no subject.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The rendered HTML body. Null when the template has no HTML body.
     *
     * @var string|null
     */
    protected $html;
    /**
     * The rendered plain-text body. Derived from the HTML when the template has no separate plain-text body, and null when it has neither.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * A language tag in BCP-47 form, for example `en` or `pt-BR`.
     *
     * @var string|null
     */
    protected $language;
    /**
     * The variables you can fill in with `parameters`. This list covers only the
     * language named by `language`. A version read combines the variables from
     * every language the version holds. Preview each language separately to see
     * its own variables.
     * 
     * Variables under the reserved `bird.` namespace are not listed here. We
     * supply those values, but you can nest sample values under `bird` in
     * `parameters` to preview them.
     * 
     *
     * @var list<TemplateVariable>|null
     */
    protected $variables;
    /**
     * The worst severity across every finding the response was computed from, which
     * is the authoritative reading: a response that caps how many findings it lists
     * still accounts here for the ones it left out. Each response's `compatibility`
     * says which content it covered.
     * 
     * - `problem`: at least one finding is a `problem`.
     * - `warning`: every finding is a `warning`.
     * - `none`: there are no findings.
     * 
     *
     * @var string|null
     */
    protected $compatibilitySeverity;
    /**
     * What the previewed HTML uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Line and column count in the `content.html` you supplied, or in the template's own HTML when you supplied none, so they address the source rather than the rendered output. Previewing a published `version` is the exception: where the stored version keeps no authored copy of a language the publish step rewrote, the positions count in that rewritten body, which no response returns. A preview renders either way. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     * 
     *
     * @var list<EmailCompatibilityFinding>|null
     */
    protected $compatibility;
    /**
     * The rendered subject line. Null when the template has no subject.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The rendered subject line. Null when the template has no subject.
     *
     * @param string|null $subject
     *
     * @return self
     */
    public function setSubject(?string $subject): self
    {
        $this->initialized['subject'] = true;
        $this->subject = $subject;
        return $this;
    }
    /**
     * The rendered HTML body. Null when the template has no HTML body.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The rendered HTML body. Null when the template has no HTML body.
     *
     * @param string|null $html
     *
     * @return self
     */
    public function setHtml(?string $html): self
    {
        $this->initialized['html'] = true;
        $this->html = $html;
        return $this;
    }
    /**
     * The rendered plain-text body. Derived from the HTML when the template has no separate plain-text body, and null when it has neither.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The rendered plain-text body. Derived from the HTML when the template has no separate plain-text body, and null when it has neither.
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
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
     * The variables you can fill in with `parameters`. This list covers only the
     * language named by `language`. A version read combines the variables from
     * every language the version holds. Preview each language separately to see
     * its own variables.
     * 
     * Variables under the reserved `bird.` namespace are not listed here. We
     * supply those values, but you can nest sample values under `bird` in
     * `parameters` to preview them.
     * 
     *
     * @return list<TemplateVariable>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
    /**
    * The variables you can fill in with `parameters`. This list covers only the
    language named by `language`. A version read combines the variables from
    every language the version holds. Preview each language separately to see
    its own variables.
    
    Variables under the reserved `bird.` namespace are not listed here. We
    supply those values, but you can nest sample values under `bird` in
    `parameters` to preview them.
    
    *
    * @param list<TemplateVariable>|null $variables
    *
    * @return self
    */
    public function setVariables(?array $variables): self
    {
        $this->initialized['variables'] = true;
        $this->variables = $variables;
        return $this;
    }
    /**
     * The worst severity across every finding the response was computed from, which
     * is the authoritative reading: a response that caps how many findings it lists
     * still accounts here for the ones it left out. Each response's `compatibility`
     * says which content it covered.
     * 
     * - `problem`: at least one finding is a `problem`.
     * - `warning`: every finding is a `warning`.
     * - `none`: there are no findings.
     * 
     *
     * @return string|null
     */
    public function getCompatibilitySeverity(): ?string
    {
        return $this->compatibilitySeverity;
    }
    /**
    * The worst severity across every finding the response was computed from, which
    is the authoritative reading: a response that caps how many findings it lists
    still accounts here for the ones it left out. Each response's `compatibility`
    says which content it covered.
    
    - `problem`: at least one finding is a `problem`.
    - `warning`: every finding is a `warning`.
    - `none`: there are no findings.
    
    *
    * @param string|null $compatibilitySeverity
    *
    * @return self
    */
    public function setCompatibilitySeverity(?string $compatibilitySeverity): self
    {
        $this->initialized['compatibilitySeverity'] = true;
        $this->compatibilitySeverity = $compatibilitySeverity;
        return $this;
    }
    /**
     * What the previewed HTML uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Line and column count in the `content.html` you supplied, or in the template's own HTML when you supplied none, so they address the source rather than the rendered output. Previewing a published `version` is the exception: where the stored version keeps no authored copy of a language the publish step rewrote, the positions count in that rewritten body, which no response returns. A preview renders either way. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     * 
     *
     * @return list<EmailCompatibilityFinding>|null
     */
    public function getCompatibility(): ?array
    {
        return $this->compatibility;
    }
    /**
     * What the previewed HTML uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Line and column count in the `content.html` you supplied, or in the template's own HTML when you supplied none, so they address the source rather than the rendered output. Previewing a published `version` is the exception: where the stored version keeps no authored copy of a language the publish step rewrote, the positions count in that rewritten body, which no response returns. A preview renders either way. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     *
     * @param list<EmailCompatibilityFinding>|null $compatibility
     *
     * @return self
     */
    public function setCompatibility(?array $compatibility): self
    {
        $this->initialized['compatibility'] = true;
        $this->compatibility = $compatibility;
        return $this;
    }
}
