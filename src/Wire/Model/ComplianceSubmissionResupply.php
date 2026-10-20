<?php

namespace MessageBird\Wire\Model;

/**
 * Replacement answers for an existing submission. Rejected, expired, or missing answers can
 * be supplied again; accepted answers normally cannot be changed.
 * 
 * When the requirements response marks an accepted answer as `editable_for_verifier_repair`,
 * you can replace it during that open correction and before its deadline. Accepted-answer
 * repairs must change content; unchanged accepted entries are ignored. Rejected, expired,
 * or missing answers follow the ordinary resupply rules, including same-value retries
 * after a grant is withdrawn. Supplied replacements are reviewed again.
 */
class ComplianceSubmissionResupply
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
     * @var list<ComplianceAnswer>|null
     */
    protected $answers;
    /**
     * @return list<ComplianceAnswer>|null
     */
    public function getAnswers(): ?array
    {
        return $this->answers;
    }
    /**
     * @param list<ComplianceAnswer>|null $answers
     *
     * @return self
     */
    public function setAnswers(?array $answers): self
    {
        $this->initialized['answers'] = true;
        $this->answers = $answers;
        return $this;
    }
}
