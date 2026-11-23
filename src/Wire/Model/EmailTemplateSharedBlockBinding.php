<?php

namespace MessageBird\Wire\Model;

/**
 * The shared block one occurrence in a template language links. The link follows the block's latest published content in that language.
 */
class EmailTemplateSharedBlockBinding
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
    protected $blockId;
    /**
     * @return string|null
     */
    public function getBlockId(): ?string
    {
        return $this->blockId;
    }
    /**
     * @param string|null $blockId
     *
     * @return self
     */
    public function setBlockId(?string $blockId): self
    {
        $this->initialized['blockId'] = true;
        $this->blockId = $blockId;
        return $this;
    }
}
