<?php

namespace MessageBird\Wire\Model;

/**
 * One language included in a block change.
 */
class EmailBlockSubmissionLanguage
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
     * Draft revision this snapshot was taken from.
     *
     * @var int|null
     */
    protected $draftRevision;
    /**
     * @var string|null
     */
    protected $candidateRevisionId;
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
     * Draft revision this snapshot was taken from.
     *
     * @return int|null
     */
    public function getDraftRevision(): ?int
    {
        return $this->draftRevision;
    }
    /**
     * Draft revision this snapshot was taken from.
     *
     * @param int|null $draftRevision
     *
     * @return self
     */
    public function setDraftRevision(?int $draftRevision): self
    {
        $this->initialized['draftRevision'] = true;
        $this->draftRevision = $draftRevision;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCandidateRevisionId(): ?string
    {
        return $this->candidateRevisionId;
    }
    /**
     * @param string|null $candidateRevisionId
     *
     * @return self
     */
    public function setCandidateRevisionId(?string $candidateRevisionId): self
    {
        $this->initialized['candidateRevisionId'] = true;
        $this->candidateRevisionId = $candidateRevisionId;
        return $this;
    }
}
