<?php

namespace MessageBird\Wire\Model;

class WhatsAppMetaHealthError
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
     * Meta's numeric health error code, for example `141006` (payment method error), `141010` (business not verified), `141014` (account banned).
     *
     * @var int|null
     */
    protected $errorCode;
    /**
     * Meta's own sentence describing the block.
     *
     * @var string|null
     */
    protected $errorDescription;
    /**
     * Meta's own suggested remedy. Absent when Meta gave none.
     *
     * @var string|null
     */
    protected $possibleSolution;
    /**
     * Meta's numeric health error code, for example `141006` (payment method error), `141010` (business not verified), `141014` (account banned).
     *
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }
    /**
     * Meta's numeric health error code, for example `141006` (payment method error), `141010` (business not verified), `141014` (account banned).
     *
     * @param int|null $errorCode
     *
     * @return self
     */
    public function setErrorCode(?int $errorCode): self
    {
        $this->initialized['errorCode'] = true;
        $this->errorCode = $errorCode;
        return $this;
    }
    /**
     * Meta's own sentence describing the block.
     *
     * @return string|null
     */
    public function getErrorDescription(): ?string
    {
        return $this->errorDescription;
    }
    /**
     * Meta's own sentence describing the block.
     *
     * @param string|null $errorDescription
     *
     * @return self
     */
    public function setErrorDescription(?string $errorDescription): self
    {
        $this->initialized['errorDescription'] = true;
        $this->errorDescription = $errorDescription;
        return $this;
    }
    /**
     * Meta's own suggested remedy. Absent when Meta gave none.
     *
     * @return string|null
     */
    public function getPossibleSolution(): ?string
    {
        return $this->possibleSolution;
    }
    /**
     * Meta's own suggested remedy. Absent when Meta gave none.
     *
     * @param string|null $possibleSolution
     *
     * @return self
     */
    public function setPossibleSolution(?string $possibleSolution): self
    {
        $this->initialized['possibleSolution'] = true;
        $this->possibleSolution = $possibleSolution;
        return $this;
    }
}
