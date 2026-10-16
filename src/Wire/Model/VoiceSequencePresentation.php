<?php

namespace MessageBird\Wire\Model;

/**
 * Optional editor layout, labels and saved authoring samples. These fields do not drive execution. Their bytes still count toward definition and execution size limits.
 */
class VoiceSequencePresentation extends \ArrayObject
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
     * Saved authoring scenario. Values are checked against node contracts only when explicitly submitted to preview or evaluation.
     *
     * @var VoiceSequenceSavedPreview|null
     */
    protected $preview;
    /**
     * Saved authoring scenario. Values are checked against node contracts only when explicitly submitted to preview or evaluation.
     *
     * @return VoiceSequenceSavedPreview|null
     */
    public function getPreview(): ?VoiceSequenceSavedPreview
    {
        return $this->preview;
    }
    /**
     * Saved authoring scenario. Values are checked against node contracts only when explicitly submitted to preview or evaluation.
     *
     * @param VoiceSequenceSavedPreview|null $preview
     *
     * @return self
     */
    public function setPreview(?VoiceSequenceSavedPreview $preview): self
    {
        $this->initialized['preview'] = true;
        $this->preview = $preview;
        return $this;
    }
}
