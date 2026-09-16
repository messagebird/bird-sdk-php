<?php

namespace MessageBird\Wire\Model;

class EmailInboxInsightsWeighting
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
     * The measurement's own identifier for the audience mix, carried through so a client can tell two weightings apart without comparing `basis` strings. No operation accepts it.
     * 
     *
     * @var string|null
     */
    protected $weightSetId;
    /**
     * Which audience mix the weighting used. Null when the measurement weighted these figures by a method this API does not model: the enum is closed so that a client can branch on it exhaustively, which means an unfamiliar method has to answer "not one of these" rather than be passed through. `basis` usually still describes the method in words when that happens.
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * The weighting method behind the rates, as the measurement names it. A slug rather than a sentence, so render it as a label and do not expect it to read as English. Null when the measurement did not state one, which pairs with `source`: both describe the method, so neither can claim to know it when the measurement was silent.
     * 
     *
     * @var string|null
     */
    protected $basis;
    /**
     * The measurement's own identifier for the audience mix, carried through so a client can tell two weightings apart without comparing `basis` strings. No operation accepts it.
     * 
     *
     * @return string|null
     */
    public function getWeightSetId(): ?string
    {
        return $this->weightSetId;
    }
    /**
     * The measurement's own identifier for the audience mix, carried through so a client can tell two weightings apart without comparing `basis` strings. No operation accepts it.
     *
     * @param string|null $weightSetId
     *
     * @return self
     */
    public function setWeightSetId(?string $weightSetId): self
    {
        $this->initialized['weightSetId'] = true;
        $this->weightSetId = $weightSetId;
        return $this;
    }
    /**
     * Which audience mix the weighting used. Null when the measurement weighted these figures by a method this API does not model: the enum is closed so that a client can branch on it exhaustively, which means an unfamiliar method has to answer "not one of these" rather than be passed through. `basis` usually still describes the method in words when that happens.
     * 
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * Which audience mix the weighting used. Null when the measurement weighted these figures by a method this API does not model: the enum is closed so that a client can branch on it exhaustively, which means an unfamiliar method has to answer "not one of these" rather than be passed through. `basis` usually still describes the method in words when that happens.
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * The weighting method behind the rates, as the measurement names it. A slug rather than a sentence, so render it as a label and do not expect it to read as English. Null when the measurement did not state one, which pairs with `source`: both describe the method, so neither can claim to know it when the measurement was silent.
     * 
     *
     * @return string|null
     */
    public function getBasis(): ?string
    {
        return $this->basis;
    }
    /**
     * The weighting method behind the rates, as the measurement names it. A slug rather than a sentence, so render it as a label and do not expect it to read as English. Null when the measurement did not state one, which pairs with `source`: both describe the method, so neither can claim to know it when the measurement was silent.
     *
     * @param string|null $basis
     *
     * @return self
     */
    public function setBasis(?string $basis): self
    {
        $this->initialized['basis'] = true;
        $this->basis = $basis;
        return $this;
    }
}
