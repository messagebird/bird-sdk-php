<?php

namespace MessageBird\Wire\Model;

/**
 * Content to save for one language, replacing whatever that language held. Send every field you want the language to keep: a field you omit is cleared, which is what makes saving the same content twice land the same way every time.
 */
class EmailTemplateLanguageUpsert
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
     * Links reusable blocks into this language. Send the complete language with it: `html` with one HTML comment `bird:shared-block:OCCURRENCE_UUID` per binding, placed where a section can stand (between block-level elements, not inside a paragraph or a table row), empty `text`, and the `revision` you read (0 to create the language). Key each binding by a lowercase UUID for that occurrence. A newly linked block must be unarchived and published in this exact language. Keep an occurrence's UUID to move it, use a new one to add another, and delete both its marker and its binding to remove it. To remove every link, send HTML without markers and empty `bindings`. A language edited in the Bird dashboard's visual editor cannot be saved this way from outside the dashboard (`E04108`).
     * 
     *
     * @var EmailTemplateLanguageUpsertSharedBlocks|null
     */
    protected $sharedBlocks;
    /**
     * Confirms replacing the language's custom plain-text body with text derived from the linked HTML, in the same save that links its first block. Requires `shared_blocks` and the language `revision`.
     * 
     *
     * @var bool|null
     */
    protected $replaceCustomText;
    /**
     * The email subject line. It may be empty in a draft but is required to publish.
     *
     * @var string|null
     */
    protected $subject;
    /**
     * The line an inbox shows after the subject in the message list. Leave it out and the inbox shows the opening words of the body instead.
     * 
     *
     * @var string|null
     */
    protected $previewText;
    /**
     * The HTML body for this language. On a language that links blocks, a save without `shared_blocks` is refused (`E04109`); read it with `authoring=true` for the HTML with its block markers first.
     * 
     *
     * @var string|null
     */
    protected $html;
    /**
     * The plain-text body for this language. Omit it and a plain-text alternative is derived from the HTML when you submit.
     * 
     *
     * @var string|null
     */
    protected $text;
    /**
     * The revision you last read for this language, to detect a concurrent edit. The save is rejected with a conflict if the language moved on since. Omit it to save unconditionally. Creating a language does not need one.
     * 
     *
     * @var int|null
     */
    protected $revision;
    /**
     * Links reusable blocks into this language. Send the complete language with it: `html` with one HTML comment `bird:shared-block:OCCURRENCE_UUID` per binding, placed where a section can stand (between block-level elements, not inside a paragraph or a table row), empty `text`, and the `revision` you read (0 to create the language). Key each binding by a lowercase UUID for that occurrence. A newly linked block must be unarchived and published in this exact language. Keep an occurrence's UUID to move it, use a new one to add another, and delete both its marker and its binding to remove it. To remove every link, send HTML without markers and empty `bindings`. A language edited in the Bird dashboard's visual editor cannot be saved this way from outside the dashboard (`E04108`).
     * 
     *
     * @return EmailTemplateLanguageUpsertSharedBlocks|null
     */
    public function getSharedBlocks(): ?EmailTemplateLanguageUpsertSharedBlocks
    {
        return $this->sharedBlocks;
    }
    /**
     * Links reusable blocks into this language. Send the complete language with it: `html` with one HTML comment `bird:shared-block:OCCURRENCE_UUID` per binding, placed where a section can stand (between block-level elements, not inside a paragraph or a table row), empty `text`, and the `revision` you read (0 to create the language). Key each binding by a lowercase UUID for that occurrence. A newly linked block must be unarchived and published in this exact language. Keep an occurrence's UUID to move it, use a new one to add another, and delete both its marker and its binding to remove it. To remove every link, send HTML without markers and empty `bindings`. A language edited in the Bird dashboard's visual editor cannot be saved this way from outside the dashboard (`E04108`).
     *
     * @param EmailTemplateLanguageUpsertSharedBlocks|EmailTemplateSharedBlocks|array|null $sharedBlocks
     *
     * @return self
     */
    public function setSharedBlocks($sharedBlocks): self
    {
        $this->initialized['sharedBlocks'] = true;
        $this->sharedBlocks = \MessageBird\Core\ModelWrapper::normalize($sharedBlocks, EmailTemplateLanguageUpsertSharedBlocks::class);
        return $this;
    }
    /**
     * Confirms replacing the language's custom plain-text body with text derived from the linked HTML, in the same save that links its first block. Requires `shared_blocks` and the language `revision`.
     * 
     *
     * @return bool|null
     */
    public function getReplaceCustomText(): ?bool
    {
        return $this->replaceCustomText;
    }
    /**
     * Confirms replacing the language's custom plain-text body with text derived from the linked HTML, in the same save that links its first block. Requires `shared_blocks` and the language `revision`.
     *
     * @param bool|null $replaceCustomText
     *
     * @return self
     */
    public function setReplaceCustomText(?bool $replaceCustomText): self
    {
        $this->initialized['replaceCustomText'] = true;
        $this->replaceCustomText = $replaceCustomText;
        return $this;
    }
    /**
     * The email subject line. It may be empty in a draft but is required to publish.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }
    /**
     * The email subject line. It may be empty in a draft but is required to publish.
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
     * The line an inbox shows after the subject in the message list. Leave it out and the inbox shows the opening words of the body instead.
     * 
     *
     * @return string|null
     */
    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }
    /**
     * The line an inbox shows after the subject in the message list. Leave it out and the inbox shows the opening words of the body instead.
     *
     * @param string|null $previewText
     *
     * @return self
     */
    public function setPreviewText(?string $previewText): self
    {
        $this->initialized['previewText'] = true;
        $this->previewText = $previewText;
        return $this;
    }
    /**
     * The HTML body for this language. On a language that links blocks, a save without `shared_blocks` is refused (`E04109`); read it with `authoring=true` for the HTML with its block markers first.
     * 
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }
    /**
     * The HTML body for this language. On a language that links blocks, a save without `shared_blocks` is refused (`E04109`); read it with `authoring=true` for the HTML with its block markers first.
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
     * The plain-text body for this language. Omit it and a plain-text alternative is derived from the HTML when you submit.
     * 
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * The plain-text body for this language. Omit it and a plain-text alternative is derived from the HTML when you submit.
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
     * The revision you last read for this language, to detect a concurrent edit. The save is rejected with a conflict if the language moved on since. Omit it to save unconditionally. Creating a language does not need one.
     * 
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The revision you last read for this language, to detect a concurrent edit. The save is rejected with a conflict if the language moved on since. Omit it to save unconditionally. Creating a language does not need one.
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
}
