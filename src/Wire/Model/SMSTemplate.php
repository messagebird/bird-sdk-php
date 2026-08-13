<?php

namespace MessageBird\Wire\Model;

class SMSTemplate
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
     * The template's stable handle. Pass it (or the id) as the template reference when sending.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Human-readable description of what the template is for.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
     *
     * @var string|null
     */
    protected $scope;
    /**
     * Content classification applied to messages sent from this template.
     *
     * @var string|null
     */
    protected $category;
    /**
     * The template body in its default language, shown for preview. Variable placeholders appear inline (for example `{{ code }}`).
     * 
     *
     * @var string|null
     */
    protected $body;
    /**
     * The typed slots this template fills in from the values you supply when sending.
     *
     * @var list<TemplateVariable>|null
     */
    protected $variables;
    /**
     * The languages this template is available in, as BCP-47 tags.
     *
     * @var list<string>|null
     */
    protected $availableLanguages;
    /**
     * The template's lifecycle state. `active` means the template can be sent; every built-in Bird template is `active`. `draft` (being edited), `pending` (submitted for review), `approved` (passed review), and `rejected` (failed review) describe a workspace-authored template's authoring lifecycle; workspace-authored SMS templates are not available yet, so today every template is `active`.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * The current editable draft version. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @var string|null
     */
    protected $draftVersionId;
    /**
     * The currently published version, or null if the template has never been published. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @var string|null
     */
    protected $publishedVersionId;
    /**
     * The draft's revision counter. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @var int|null
     */
    protected $revision;
    /**
     * When the template was created. Null for built-in templates.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When the template was last updated. Null for built-in templates.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
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
     * The template's stable handle. Pass it (or the id) as the template reference when sending.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The template's stable handle. Pass it (or the id) as the template reference when sending.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Human-readable description of what the template is for.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Human-readable description of what the template is for.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * Whether the template is one of our built-in templates (`system`) or one your workspace created (`workspace`).
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * Content classification applied to messages sent from this template.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }
    /**
     * Content classification applied to messages sent from this template.
     *
     * @param string|null $category
     *
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;
        return $this;
    }
    /**
     * The template body in its default language, shown for preview. Variable placeholders appear inline (for example `{{ code }}`).
     * 
     *
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }
    /**
     * The template body in its default language, shown for preview. Variable placeholders appear inline (for example `{{ code }}`).
     *
     * @param string|null $body
     *
     * @return self
     */
    public function setBody(?string $body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;
        return $this;
    }
    /**
     * The typed slots this template fills in from the values you supply when sending.
     *
     * @return list<TemplateVariable>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
    /**
     * The typed slots this template fills in from the values you supply when sending.
     *
     * @param list<TemplateVariable>|null $variables
     *
     * @return self
     */
    public function setVariables(?array $variables): self
    {
        $this->initialized['variables'] = true;
        $this->variables = $variables;
        return $this;
    }
    /**
     * The languages this template is available in, as BCP-47 tags.
     *
     * @return list<string>|null
     */
    public function getAvailableLanguages(): ?array
    {
        return $this->availableLanguages;
    }
    /**
     * The languages this template is available in, as BCP-47 tags.
     *
     * @param list<string>|null $availableLanguages
     *
     * @return self
     */
    public function setAvailableLanguages(?array $availableLanguages): self
    {
        $this->initialized['availableLanguages'] = true;
        $this->availableLanguages = $availableLanguages;
        return $this;
    }
    /**
     * The template's lifecycle state. `active` means the template can be sent; every built-in Bird template is `active`. `draft` (being edited), `pending` (submitted for review), `approved` (passed review), and `rejected` (failed review) describe a workspace-authored template's authoring lifecycle; workspace-authored SMS templates are not available yet, so today every template is `active`.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The template's lifecycle state. `active` means the template can be sent; every built-in Bird template is `active`. `draft` (being edited), `pending` (submitted for review), `approved` (passed review), and `rejected` (failed review) describe a workspace-authored template's authoring lifecycle; workspace-authored SMS templates are not available yet, so today every template is `active`.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * The current editable draft version. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @return string|null
     */
    public function getDraftVersionId(): ?string
    {
        return $this->draftVersionId;
    }
    /**
     * The current editable draft version. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @param string|null $draftVersionId
     *
     * @return self
     */
    public function setDraftVersionId(?string $draftVersionId): self
    {
        $this->initialized['draftVersionId'] = true;
        $this->draftVersionId = $draftVersionId;
        return $this;
    }
    /**
     * The currently published version, or null if the template has never been published. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @return string|null
     */
    public function getPublishedVersionId(): ?string
    {
        return $this->publishedVersionId;
    }
    /**
     * The currently published version, or null if the template has never been published. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @param string|null $publishedVersionId
     *
     * @return self
     */
    public function setPublishedVersionId(?string $publishedVersionId): self
    {
        $this->initialized['publishedVersionId'] = true;
        $this->publishedVersionId = $publishedVersionId;
        return $this;
    }
    /**
     * The draft's revision counter. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @return int|null
     */
    public function getRevision(): ?int
    {
        return $this->revision;
    }
    /**
     * The draft's revision counter. Always null today: SMS templates are not yet versioned; present for parity with email templates.
     *
     * @param int|null $revision
     *
     * @return self
     */
    public function setRevision(?int $revision): self
    {
        $this->initialized['revision'] = true;
        $this->revision = $revision;
        return $this;
    }
    /**
     * When the template was created. Null for built-in templates.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the template was created. Null for built-in templates.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When the template was last updated. Null for built-in templates.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
    /**
     * When the template was last updated. Null for built-in templates.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
