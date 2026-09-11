<?php

namespace MessageBird\Wire\Model;

class EmailTemplateLanguage
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
     * This language's revision counter. Send it back when you save this language so a concurrent edit is caught instead of silently overwritten. It counts only this language's own changes, so editing another language never invalidates it.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * A hash over this language's content, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API. Null for a language saved before fingerprints were recorded.
     * 
     *
     * @var string|null
     */
    protected $contentHash;
    /**
     * When this language was last saved. Null if that is not recorded.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * One language's content for an email template. Each language carries its own subject, preview text and bodies, so a translation can differ in wording and length from every other language without affecting them.
     * 
     *
     * @var EmailTemplateLanguageContent|null
     */
    protected $content;
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
     * What the stored HTML uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Line and column count in the `content.html` this response carries. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     * 
     *
     * @var list<EmailCompatibilityFinding>|null
     */
    protected $compatibility;
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
     * This language's revision counter. Send it back when you save this language so a concurrent edit is caught instead of silently overwritten. It counts only this language's own changes, so editing another language never invalidates it.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * This language's revision counter. Send it back when you save this language so a concurrent edit is caught instead of silently overwritten. It counts only this language's own changes, so editing another language never invalidates it.
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
     * A hash over this language's content, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API. Null for a language saved before fingerprints were recorded.
     * 
     *
     * @return string|null
     */
    public function getContentHash(): ?string
    {
        return $this->contentHash;
    }
    /**
     * A hash over this language's content, prefixed with the algorithm that produced it (`sha256:`), so the algorithm can change without the field becoming ambiguous. It tells you whether a language differs without transferring the content, and is comparable only within one version of this API. Null for a language saved before fingerprints were recorded.
     *
     * @param string|null $contentHash
     *
     * @return self
     */
    public function setContentHash(?string $contentHash): self
    {
        $this->initialized['contentHash'] = true;
        $this->contentHash = $contentHash;
        return $this;
    }
    /**
     * When this language was last saved. Null if that is not recorded.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When this language was last saved. Null if that is not recorded.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * One language's content for an email template. Each language carries its own subject, preview text and bodies, so a translation can differ in wording and length from every other language without affecting them.
     * 
     *
     * @return EmailTemplateLanguageContent|null
     */
    public function getContent(): ?EmailTemplateLanguageContent
    {
        return $this->content;
    }
    /**
     * One language's content for an email template. Each language carries its own subject, preview text and bodies, so a translation can differ in wording and length from every other language without affecting them.
     *
     * @param EmailTemplateLanguageContent|null $content
     *
     * @return self
     */
    public function setContent(?EmailTemplateLanguageContent $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
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
     * What the stored HTML uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Line and column count in the `content.html` this response carries. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
     * 
     *
     * @return list<EmailCompatibilityFinding>|null
     */
    public function getCompatibility(): ?array
    {
        return $this->compatibility;
    }
    /**
     * What the stored HTML uses that mail clients remove, ignore, or render inconsistently, in the order the patterns appear. Empty when nothing is worth reporting. Line and column count in the `content.html` this response carries. At most 200 findings come back, the first 200 in source order; `compatibility_severity` is derived from every finding the HTML produced, including any beyond those 200.
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
