<?php

namespace MessageBird\Wire\Model;

class EmailTemplateSubmit
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
     * Check the draft without actually submitting it. Every language gets checked and every problem gets reported back to you, but nothing is frozen and no new version gets created. Give a validation run its own `Idempotency-Key`, separate from the real submit that follows it. You can also send no key. The validation request and real submit have different bodies, so using the same key for both is rejected as key reuse.
     * 
     *
     * @var bool|null
     */
    protected $validateOnly = false;
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     * 
     *
     * @var int|null
     */
    protected $expectedRevision;
    /**
     * Languages to process when submitting an already-published version. Email templates accept submissions only for drafts, so setting this field for an email template is rejected.
     * 
     *
     * @var list<string>|null
     */
    protected $languages;
    /**
     * Check the draft without actually submitting it. Every language gets checked and every problem gets reported back to you, but nothing is frozen and no new version gets created. Give a validation run its own `Idempotency-Key`, separate from the real submit that follows it. You can also send no key. The validation request and real submit have different bodies, so using the same key for both is rejected as key reuse.
     * 
     *
     * @return bool|null
     */
    public function getValidateOnly(): ?bool
    {
        return $this->validateOnly;
    }
    /**
     * Check the draft without actually submitting it. Every language gets checked and every problem gets reported back to you, but nothing is frozen and no new version gets created. Give a validation run its own `Idempotency-Key`, separate from the real submit that follows it. You can also send no key. The validation request and real submit have different bodies, so using the same key for both is rejected as key reuse.
     *
     * @param bool|null $validateOnly
     *
     * @return self
     */
    public function setValidateOnly(?bool $validateOnly): self
    {
        $this->initialized['validateOnly'] = true;
        $this->validateOnly = $validateOnly;
        return $this;
    }
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     * 
     *
     * @return int|null
     */
    public function getExpectedRevision(): ?int
    {
        return $this->expectedRevision;
    }
    /**
     * The draft revision you last read (from the template's `revision` field). A stale value returns a conflict so you can reload and retry.
     *
     * @param int|null $expectedRevision
     *
     * @return self
     */
    public function setExpectedRevision(?int $expectedRevision): self
    {
        $this->initialized['expectedRevision'] = true;
        $this->expectedRevision = $expectedRevision;
        return $this;
    }
    /**
     * Languages to process when submitting an already-published version. Email templates accept submissions only for drafts, so setting this field for an email template is rejected.
     * 
     *
     * @return list<string>|null
     */
    public function getLanguages(): ?array
    {
        return $this->languages;
    }
    /**
     * Languages to process when submitting an already-published version. Email templates accept submissions only for drafts, so setting this field for an email template is rejected.
     *
     * @param list<string>|null $languages
     *
     * @return self
     */
    public function setLanguages(?array $languages): self
    {
        $this->initialized['languages'] = true;
        $this->languages = $languages;
        return $this;
    }
}
