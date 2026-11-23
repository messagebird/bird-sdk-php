<?php

namespace MessageBird\Wire\Model;

/**
 * How a broadcast takes part in automatic seeding. The seed pool, engagement profile and regions come from the workspace's automatic seeding settings.
 */
class EmailBroadcastAutomaticSeeding extends \ArrayObject
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
     * Whether the broadcast sends seed copies. False sends none, even when the audience contains a contact at the trigger address.
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * The contact whose values fill the personal fields in the seed copies. It belongs to this workspace but need not be in the audience; choosing it does not change who receives the broadcast. Null when personal fields use their fallback values.
     * 
     *
     * @var string|null
     */
    protected $exampleContactId;
    /**
     * Whether the broadcast sends seed copies. False sends none, even when the audience contains a contact at the trigger address.
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Whether the broadcast sends seed copies. False sends none, even when the audience contains a contact at the trigger address.
     *
     * @param bool|null $enabled
     *
     * @return self
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * The contact whose values fill the personal fields in the seed copies. It belongs to this workspace but need not be in the audience; choosing it does not change who receives the broadcast. Null when personal fields use their fallback values.
     * 
     *
     * @return string|null
     */
    public function getExampleContactId(): ?string
    {
        return $this->exampleContactId;
    }
    /**
     * The contact whose values fill the personal fields in the seed copies. It belongs to this workspace but need not be in the audience; choosing it does not change who receives the broadcast. Null when personal fields use their fallback values.
     *
     * @param string|null $exampleContactId
     *
     * @return self
     */
    public function setExampleContactId(?string $exampleContactId): self
    {
        $this->initialized['exampleContactId'] = true;
        $this->exampleContactId = $exampleContactId;
        return $this;
    }
}
