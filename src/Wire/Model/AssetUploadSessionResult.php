<?php

namespace MessageBird\Wire\Model;

/**
 * Saved publication result. Retrying completion returns this receipt even if the asset has since been removed or become unavailable.
 */
class AssetUploadSessionResult extends \ArrayObject
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
    protected $assetId;
    /**
     * Whether the upload reused an existing active asset with identical source bytes. Reused assets keep their original metadata and folder.
     *
     * @var bool|null
     */
    protected $reusedExisting;
    /**
     * When publication completed.
     *
     * @var \DateTime|null
     */
    protected $completedAt;
    /**
     * @return string|null
     */
    public function getAssetId(): ?string
    {
        return $this->assetId;
    }
    /**
     * @param string|null $assetId
     *
     * @return self
     */
    public function setAssetId(?string $assetId): self
    {
        $this->initialized['assetId'] = true;
        $this->assetId = $assetId;
        return $this;
    }
    /**
     * Whether the upload reused an existing active asset with identical source bytes. Reused assets keep their original metadata and folder.
     *
     * @return bool|null
     */
    public function getReusedExisting(): ?bool
    {
        return $this->reusedExisting;
    }
    /**
     * Whether the upload reused an existing active asset with identical source bytes. Reused assets keep their original metadata and folder.
     *
     * @param bool|null $reusedExisting
     *
     * @return self
     */
    public function setReusedExisting(?bool $reusedExisting): self
    {
        $this->initialized['reusedExisting'] = true;
        $this->reusedExisting = $reusedExisting;
        return $this;
    }
    /**
     * When publication completed.
     *
     * @return \DateTime|null
     */
    public function getCompletedAt(): ?\DateTime
    {
        return $this->completedAt;
    }
    /**
     * When publication completed.
     *
     * @param \DateTime|null $completedAt
     *
     * @return self
     */
    public function setCompletedAt(?\DateTime $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;
        return $this;
    }
}
