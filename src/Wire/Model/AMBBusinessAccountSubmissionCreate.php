<?php

namespace MessageBird\Wire\Model;

/**
 * The submission commits three distinct attachments uploaded to this workspace. `readiness_attachment_id` identifies the PDF business readiness assessment; `use_cases_attachment_id` identifies the PDF describing proposed customer use cases; `video_attachment_id` identifies the MP4 demonstration of the customer experience. Invalid or duplicate evidence returns 422.
 */
class AMBBusinessAccountSubmissionCreate
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
     * @var string|null
     */
    protected $readinessAttachmentId;
    /**
     * @var string|null
     */
    protected $useCasesAttachmentId;
    /**
     * @var string|null
     */
    protected $videoAttachmentId;
    /**
     * @return string|null
     */
    public function getReadinessAttachmentId(): ?string
    {
        return $this->readinessAttachmentId;
    }
    /**
     * @param string|null $readinessAttachmentId
     *
     * @return self
     */
    public function setReadinessAttachmentId(?string $readinessAttachmentId): self
    {
        $this->initialized['readinessAttachmentId'] = true;
        $this->readinessAttachmentId = $readinessAttachmentId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getUseCasesAttachmentId(): ?string
    {
        return $this->useCasesAttachmentId;
    }
    /**
     * @param string|null $useCasesAttachmentId
     *
     * @return self
     */
    public function setUseCasesAttachmentId(?string $useCasesAttachmentId): self
    {
        $this->initialized['useCasesAttachmentId'] = true;
        $this->useCasesAttachmentId = $useCasesAttachmentId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getVideoAttachmentId(): ?string
    {
        return $this->videoAttachmentId;
    }
    /**
     * @param string|null $videoAttachmentId
     *
     * @return self
     */
    public function setVideoAttachmentId(?string $videoAttachmentId): self
    {
        $this->initialized['videoAttachmentId'] = true;
        $this->videoAttachmentId = $videoAttachmentId;
        return $this;
    }
}
