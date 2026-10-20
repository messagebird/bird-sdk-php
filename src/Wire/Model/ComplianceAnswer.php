<?php

namespace MessageBird\Wire\Model;

/**
 * One answer. Which field carries it follows from the requirement, as the
 * requirements read reports it:
 * 
 * - answered once, inline: `value`
 * - answered once, with a document: `attachment_id`
 * - `max_items` set, inline: `values`
 * - `max_items` set, with documents: `attachment_ids`
 * 
 * Send exactly one of the four. Order in a list is preserved and is part of the
 * answer.
 */
class ComplianceAnswer
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
     * The requirement this answers, as given by its key in the requirements read.
     *
     * @var string|null
     */
    protected $key;
    /**
     * The answer, for a requirement answered inline. Send every answer as a string whatever its data type, so a number goes as `"1500"` and a yes-or-no as `"true"`.
     * 
     *
     * @var string|null
     */
    protected $value;
    /**
     * The uploaded document, for a requirement that takes one. Upload the file as an attachment first, then send the id it returns.
     * 
     *
     * @var string|null
     */
    protected $attachmentId;
    /**
     * The answers, for a requirement whose `max_items` is set and which is answered inline. Send each as a string whatever its data type, and send them in the order you mean them to be read. At most `max_items` of them.
     * 
     *
     * @var list<string>|null
     */
    protected $values;
    /**
     * The uploaded documents, for a requirement whose `max_items` is set and which takes documents. Upload each file first and send the ids it returns, in order. At most `max_items` of them.
     * 
     *
     * @var list<string>|null
     */
    protected $attachmentIds;
    /**
     * The requirement this answers, as given by its key in the requirements read.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
    /**
     * The requirement this answers, as given by its key in the requirements read.
     *
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The answer, for a requirement answered inline. Send every answer as a string whatever its data type, so a number goes as `"1500"` and a yes-or-no as `"true"`.
     * 
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * The answer, for a requirement answered inline. Send every answer as a string whatever its data type, so a number goes as `"1500"` and a yes-or-no as `"true"`.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * The uploaded document, for a requirement that takes one. Upload the file as an attachment first, then send the id it returns.
     * 
     *
     * @return string|null
     */
    public function getAttachmentId(): ?string
    {
        return $this->attachmentId;
    }
    /**
     * The uploaded document, for a requirement that takes one. Upload the file as an attachment first, then send the id it returns.
     *
     * @param string|null $attachmentId
     *
     * @return self
     */
    public function setAttachmentId(?string $attachmentId): self
    {
        $this->initialized['attachmentId'] = true;
        $this->attachmentId = $attachmentId;
        return $this;
    }
    /**
     * The answers, for a requirement whose `max_items` is set and which is answered inline. Send each as a string whatever its data type, and send them in the order you mean them to be read. At most `max_items` of them.
     * 
     *
     * @return list<string>|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
    /**
     * The answers, for a requirement whose `max_items` is set and which is answered inline. Send each as a string whatever its data type, and send them in the order you mean them to be read. At most `max_items` of them.
     *
     * @param list<string>|null $values
     *
     * @return self
     */
    public function setValues(?array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
    /**
     * The uploaded documents, for a requirement whose `max_items` is set and which takes documents. Upload each file first and send the ids it returns, in order. At most `max_items` of them.
     * 
     *
     * @return list<string>|null
     */
    public function getAttachmentIds(): ?array
    {
        return $this->attachmentIds;
    }
    /**
     * The uploaded documents, for a requirement whose `max_items` is set and which takes documents. Upload each file first and send the ids it returns, in order. At most `max_items` of them.
     *
     * @param list<string>|null $attachmentIds
     *
     * @return self
     */
    public function setAttachmentIds(?array $attachmentIds): self
    {
        $this->initialized['attachmentIds'] = true;
        $this->attachmentIds = $attachmentIds;
        return $this;
    }
}
