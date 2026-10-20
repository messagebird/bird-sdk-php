<?php

namespace MessageBird\Wire\Model;

/**
 * Ownership paperwork for a number being ordered, where its country requires any. Optional always: the order completes and the number is yours either way, and supplying this only decides whether it can carry traffic sooner. Read `GET /v1/compliance/requirements` for the number to learn what is asked for, or file it after the order with `POST /v1/compliance/submissions`. Filing this cannot fail your order: if it is refused, the number is still yours and you can file again. The answers are a legal representation filed under the name of the business they describe. Sending this block uses the order's existing `numbers` scope at write level.
 */
class NumbersOrderCompliance
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
     * Every answer at once, in the same shape `POST /v1/compliance/submissions` takes. There is no draft to fill in over several calls, so send a complete set.
     * 
     *
     * @var list<ComplianceAnswer>|null
     */
    protected $answers;
    /**
     * An existing party this number is held for. It fills in the business details you left out from what that party already holds, and each single-value answer you file about the party is written back onto it for next time, whatever the verdict. Documents and multi-value answers are asked fresh each time. An id belonging to another organization is rejected.
     *
     * @var string|null
     */
    protected $identityId;
    /**
     * Every answer at once, in the same shape `POST /v1/compliance/submissions` takes. There is no draft to fill in over several calls, so send a complete set.
     * 
     *
     * @return list<ComplianceAnswer>|null
     */
    public function getAnswers(): ?array
    {
        return $this->answers;
    }
    /**
     * Every answer at once, in the same shape `POST /v1/compliance/submissions` takes. There is no draft to fill in over several calls, so send a complete set.
     *
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
    /**
     * An existing party this number is held for. It fills in the business details you left out from what that party already holds, and each single-value answer you file about the party is written back onto it for next time, whatever the verdict. Documents and multi-value answers are asked fresh each time. An id belonging to another organization is rejected.
     *
     * @return string|null
     */
    public function getIdentityId(): ?string
    {
        return $this->identityId;
    }
    /**
     * An existing party this number is held for. It fills in the business details you left out from what that party already holds, and each single-value answer you file about the party is written back onto it for next time, whatever the verdict. Documents and multi-value answers are asked fresh each time. An id belonging to another organization is rejected.
     *
     * @param string|null $identityId
     *
     * @return self
     */
    public function setIdentityId(?string $identityId): self
    {
        $this->initialized['identityId'] = true;
        $this->identityId = $identityId;
        return $this;
    }
}
