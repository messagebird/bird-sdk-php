<?php

namespace MessageBird\Wire\Model;

class VerificationCheckResult
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
     * Whether the submitted passcode verified this verification. `true` means the passcode was correct and the verification is now complete; `false` means it did not verify, and `reason` says why. A verification that has already reached a final state is no longer checkable and returns `404`.
     *
     * @var bool|null
     */
    protected $success;
    /**
     * Why the check did not succeed:
     * 
     * - `incorrect_code`: The passcode was wrong and attempts remain.
     * - `expired`: The validity window elapsed.
     * - `attempts_exhausted`: Too many incorrect attempts were submitted.
     * 
     * `null` when `success` is `true`. Treat unrecognized values as reasons added
     * later.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * @var Verification|null
     */
    protected $verification;
    /**
     * The number of check attempts left while the verification is still pending, or `null` once it has reached a final state.
     *
     * @var int|null
     */
    protected $attemptsRemaining;
    /**
     * Whether the submitted passcode verified this verification. `true` means the passcode was correct and the verification is now complete; `false` means it did not verify, and `reason` says why. A verification that has already reached a final state is no longer checkable and returns `404`.
     *
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }
    /**
     * Whether the submitted passcode verified this verification. `true` means the passcode was correct and the verification is now complete; `false` means it did not verify, and `reason` says why. A verification that has already reached a final state is no longer checkable and returns `404`.
     *
     * @param bool|null $success
     *
     * @return self
     */
    public function setSuccess(?bool $success): self
    {
        $this->initialized['success'] = true;
        $this->success = $success;
        return $this;
    }
    /**
     * Why the check did not succeed:
     * 
     * - `incorrect_code`: The passcode was wrong and attempts remain.
     * - `expired`: The validity window elapsed.
     * - `attempts_exhausted`: Too many incorrect attempts were submitted.
     * 
     * `null` when `success` is `true`. Treat unrecognized values as reasons added
     * later.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
    * Why the check did not succeed:
    
    - `incorrect_code`: The passcode was wrong and attempts remain.
    - `expired`: The validity window elapsed.
    - `attempts_exhausted`: Too many incorrect attempts were submitted.
    
    `null` when `success` is `true`. Treat unrecognized values as reasons added
    later.
    *
    * @param string|null $reason
    *
    * @return self
    */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * @return Verification|null
     */
    public function getVerification(): ?Verification
    {
        return $this->verification;
    }
    /**
     * @param Verification|null $verification
     *
     * @return self
     */
    public function setVerification(?Verification $verification): self
    {
        $this->initialized['verification'] = true;
        $this->verification = $verification;
        return $this;
    }
    /**
     * The number of check attempts left while the verification is still pending, or `null` once it has reached a final state.
     *
     * @return int|null
     */
    public function getAttemptsRemaining(): ?int
    {
        return $this->attemptsRemaining;
    }
    /**
     * The number of check attempts left while the verification is still pending, or `null` once it has reached a final state.
     *
     * @param int|null $attemptsRemaining
     *
     * @return self
     */
    public function setAttemptsRemaining(?int $attemptsRemaining): self
    {
        $this->initialized['attemptsRemaining'] = true;
        $this->attemptsRemaining = $attemptsRemaining;
        return $this;
    }
}
