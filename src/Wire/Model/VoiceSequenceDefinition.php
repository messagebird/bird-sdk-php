<?php

namespace MessageBird\Wire\Model;

class VoiceSequenceDefinition
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
     * Version of the voice graph definition envelope.
     *
     * @var int|null
     */
    protected $schemaVersion;
    /**
     * Expression language used by explicitly marked values in a voice sequence definition.
     *
     * @var string|null
     */
    protected $expressionEnvironment;
    /**
     * Nodes keyed by stable IDs. Incomplete node objects may be saved in a draft. Array order has no execution meaning.
     *
     * @var list<array<string, mixed>>|null
     */
    protected $nodes;
    /**
     * Sequence policies being authored. Omission leaves the definition without explicit settings.
     *
     * @var array<string, mixed>|null
     */
    protected $settings;
    /**
     * Optional editor layout, labels and saved authoring samples. These fields do not drive execution. Their bytes still count toward definition and execution size limits.
     *
     * @var VoiceSequencePresentation|null
     */
    protected $presentation;
    /**
     * Version of the voice graph definition envelope.
     *
     * @return int|null
     */
    public function getSchemaVersion(): ?int
    {
        return $this->schemaVersion;
    }
    /**
     * Version of the voice graph definition envelope.
     *
     * @param int|null $schemaVersion
     *
     * @return self
     */
    public function setSchemaVersion(?int $schemaVersion): self
    {
        $this->initialized['schemaVersion'] = true;
        $this->schemaVersion = $schemaVersion;
        return $this;
    }
    /**
     * Expression language used by explicitly marked values in a voice sequence definition.
     *
     * @return string|null
     */
    public function getExpressionEnvironment(): ?string
    {
        return $this->expressionEnvironment;
    }
    /**
     * Expression language used by explicitly marked values in a voice sequence definition.
     *
     * @param string|null $expressionEnvironment
     *
     * @return self
     */
    public function setExpressionEnvironment(?string $expressionEnvironment): self
    {
        $this->initialized['expressionEnvironment'] = true;
        $this->expressionEnvironment = $expressionEnvironment;
        return $this;
    }
    /**
     * Nodes keyed by stable IDs. Incomplete node objects may be saved in a draft. Array order has no execution meaning.
     *
     * @return list<array<string, mixed>>|null
     */
    public function getNodes(): ?array
    {
        return $this->nodes;
    }
    /**
     * Nodes keyed by stable IDs. Incomplete node objects may be saved in a draft. Array order has no execution meaning.
     *
     * @param list<array<string, mixed>>|null $nodes
     *
     * @return self
     */
    public function setNodes(?array $nodes): self
    {
        $this->initialized['nodes'] = true;
        $this->nodes = $nodes;
        return $this;
    }
    /**
     * Sequence policies being authored. Omission leaves the definition without explicit settings.
     *
     * @return array<string, mixed>|null
     */
    public function getSettings(): ?iterable
    {
        return $this->settings;
    }
    /**
     * Sequence policies being authored. Omission leaves the definition without explicit settings.
     *
     * @param array<string, mixed>|null $settings
     *
     * @return self
     */
    public function setSettings(?iterable $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;
        return $this;
    }
    /**
     * Optional editor layout, labels and saved authoring samples. These fields do not drive execution. Their bytes still count toward definition and execution size limits.
     *
     * @return VoiceSequencePresentation|null
     */
    public function getPresentation(): ?VoiceSequencePresentation
    {
        return $this->presentation;
    }
    /**
     * Optional editor layout, labels and saved authoring samples. These fields do not drive execution. Their bytes still count toward definition and execution size limits.
     *
     * @param VoiceSequencePresentation|null $presentation
     *
     * @return self
     */
    public function setPresentation(?VoiceSequencePresentation $presentation): self
    {
        $this->initialized['presentation'] = true;
        $this->presentation = $presentation;
        return $this;
    }
}
