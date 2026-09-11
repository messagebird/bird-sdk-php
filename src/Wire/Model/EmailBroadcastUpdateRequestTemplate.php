<?php

namespace MessageBird\Wire\Model;

class EmailBroadcastUpdateRequestTemplate extends \ArrayObject
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
    protected $id;
    /**
     * The template version this broadcast is fixed to. It is chosen when the broadcast is prepared for sending, so publishing a new version while the broadcast is going out cannot change what the rest of the recipients get. Null until the broadcast is prepared.
     * 
     *
     * @var string|null
     */
    protected $versionId;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The template version this broadcast is fixed to. It is chosen when the broadcast is prepared for sending, so publishing a new version while the broadcast is going out cannot change what the rest of the recipients get. Null until the broadcast is prepared.
     * 
     *
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }
    /**
     * The template version this broadcast is fixed to. It is chosen when the broadcast is prepared for sending, so publishing a new version while the broadcast is going out cannot change what the rest of the recipients get. Null until the broadcast is prepared.
     *
     * @param string|null $versionId
     *
     * @return self
     */
    public function setVersionId(?string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
        return $this;
    }
}
