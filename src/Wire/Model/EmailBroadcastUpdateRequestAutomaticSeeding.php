<?php

namespace MessageBird\Wire\Model;

/**
 * How a broadcast takes part in automatic seeding. The seed pool, engagement profile and regions come from the workspace's automatic seeding settings.
 */
class EmailBroadcastUpdateRequestAutomaticSeeding extends \ArrayObject
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
     * Whether the broadcast sends seed copies. False sends none, even when the audience contains a contact at the trigger address. A seeded send spends one of the organization's seed tests. When the workspace's automatic seeding is off or the organization has no seed tests left, the broadcast still sends without seed copies; validate the broadcast first to see these as warnings.
     * 
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * A contact whose values fill the personal fields in the seed copies, such as a first name. It must belong to this workspace but need not be in the audience; choosing it does not change who receives the broadcast. Its details reach external seed mailboxes, so use a test contact. While seeding is enabled, sending refuses a chosen contact that has since been deleted, so choose another or leave it out. Leave it out to fill personal fields with their fallback values.
     * 
     *
     * @var string|null
     */
    protected $exampleContactId;
    /**
     * Whether the broadcast sends seed copies. False sends none, even when the audience contains a contact at the trigger address. A seeded send spends one of the organization's seed tests. When the workspace's automatic seeding is off or the organization has no seed tests left, the broadcast still sends without seed copies; validate the broadcast first to see these as warnings.
     * 
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * Whether the broadcast sends seed copies. False sends none, even when the audience contains a contact at the trigger address. A seeded send spends one of the organization's seed tests. When the workspace's automatic seeding is off or the organization has no seed tests left, the broadcast still sends without seed copies; validate the broadcast first to see these as warnings.
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
     * A contact whose values fill the personal fields in the seed copies, such as a first name. It must belong to this workspace but need not be in the audience; choosing it does not change who receives the broadcast. Its details reach external seed mailboxes, so use a test contact. While seeding is enabled, sending refuses a chosen contact that has since been deleted, so choose another or leave it out. Leave it out to fill personal fields with their fallback values.
     * 
     *
     * @return string|null
     */
    public function getExampleContactId(): ?string
    {
        return $this->exampleContactId;
    }
    /**
     * A contact whose values fill the personal fields in the seed copies, such as a first name. It must belong to this workspace but need not be in the audience; choosing it does not change who receives the broadcast. Its details reach external seed mailboxes, so use a test contact. While seeding is enabled, sending refuses a chosen contact that has since been deleted, so choose another or leave it out. Leave it out to fill personal fields with their fallback values.
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
