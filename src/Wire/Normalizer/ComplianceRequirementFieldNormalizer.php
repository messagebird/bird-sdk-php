<?php

namespace MessageBird\Wire\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use MessageBird\Wire\Runtime\Normalizer\CheckArray;
use MessageBird\Wire\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ComplianceRequirementFieldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ComplianceRequirementField::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ComplianceRequirementField::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ComplianceRequirementField();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('required', $data) && \is_int($data['required'])) {
            $data['required'] = (bool) $data['required'];
        }
        if (\array_key_exists('prefilled', $data) && \is_int($data['prefilled'])) {
            $data['prefilled'] = (bool) $data['prefilled'];
        }
        if (\array_key_exists('editable_for_verifier_repair', $data) && \is_int($data['editable_for_verifier_repair'])) {
            $data['editable_for_verifier_repair'] = (bool) $data['editable_for_verifier_repair'];
        }
        if (\array_key_exists('parent_key', $data) && $data['parent_key'] !== null) {
            $object->setParentKey($data['parent_key']);
        }
        elseif (\array_key_exists('parent_key', $data) && $data['parent_key'] === null) {
            $object->setParentKey(null);
        }
        if (\array_key_exists('document_key', $data) && $data['document_key'] !== null) {
            $object->setDocumentKey($data['document_key']);
        }
        elseif (\array_key_exists('document_key', $data) && $data['document_key'] === null) {
            $object->setDocumentKey(null);
        }
        if (\array_key_exists('parent_label', $data) && $data['parent_label'] !== null) {
            $object->setParentLabel($data['parent_label']);
        }
        elseif (\array_key_exists('parent_label', $data) && $data['parent_label'] === null) {
            $object->setParentLabel(null);
        }
        if (\array_key_exists('parent_help_text', $data) && $data['parent_help_text'] !== null) {
            $object->setParentHelpText($data['parent_help_text']);
        }
        elseif (\array_key_exists('parent_help_text', $data) && $data['parent_help_text'] === null) {
            $object->setParentHelpText(null);
        }
        if (\array_key_exists('key', $data) && $data['key'] !== null) {
            $object->setKey($data['key']);
        }
        elseif (\array_key_exists('key', $data) && $data['key'] === null) {
            $object->setKey(null);
        }
        if (\array_key_exists('label', $data) && $data['label'] !== null) {
            $object->setLabel($data['label']);
        }
        elseif (\array_key_exists('label', $data) && $data['label'] === null) {
            $object->setLabel(null);
        }
        if (\array_key_exists('help_text', $data) && $data['help_text'] !== null) {
            $object->setHelpText($data['help_text']);
        }
        elseif (\array_key_exists('help_text', $data) && $data['help_text'] === null) {
            $object->setHelpText(null);
        }
        if (\array_key_exists('data_type', $data) && $data['data_type'] !== null) {
            $object->setDataType($data['data_type']);
        }
        elseif (\array_key_exists('data_type', $data) && $data['data_type'] === null) {
            $object->setDataType(null);
        }
        if (\array_key_exists('required', $data) && $data['required'] !== null) {
            $object->setRequired($data['required']);
        }
        elseif (\array_key_exists('required', $data) && $data['required'] === null) {
            $object->setRequired(null);
        }
        if (\array_key_exists('section', $data) && $data['section'] !== null) {
            $object->setSection($data['section']);
        }
        elseif (\array_key_exists('section', $data) && $data['section'] === null) {
            $object->setSection(null);
        }
        if (\array_key_exists('section_label', $data) && $data['section_label'] !== null) {
            $object->setSectionLabel($data['section_label']);
        }
        elseif (\array_key_exists('section_label', $data) && $data['section_label'] === null) {
            $object->setSectionLabel(null);
        }
        if (\array_key_exists('options', $data) && $data['options'] !== null) {
            $values = [];
            foreach ($data['options'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\ComplianceRequirementFieldOption::class, 'json', $context);
            }
            $object->setOptions($values);
        }
        elseif (\array_key_exists('options', $data) && $data['options'] === null) {
            $object->setOptions(null);
        }
        if (\array_key_exists('validation', $data) && $data['validation'] !== null) {
            $object->setValidation($this->denormalizer->denormalize($data['validation'], \MessageBird\Wire\Model\ComplianceRequirementFieldValidation::class, 'json', $context));
        }
        elseif (\array_key_exists('validation', $data) && $data['validation'] === null) {
            $object->setValidation(null);
        }
        if (\array_key_exists('template_url', $data) && $data['template_url'] !== null) {
            $object->setTemplateUrl($data['template_url']);
        }
        elseif (\array_key_exists('template_url', $data) && $data['template_url'] === null) {
            $object->setTemplateUrl(null);
        }
        if (\array_key_exists('max_items', $data) && $data['max_items'] !== null) {
            $object->setMaxItems($data['max_items']);
        }
        elseif (\array_key_exists('max_items', $data) && $data['max_items'] === null) {
            $object->setMaxItems(null);
        }
        if (\array_key_exists('value', $data) && $data['value'] !== null) {
            $object->setValue($data['value']);
        }
        elseif (\array_key_exists('value', $data) && $data['value'] === null) {
            $object->setValue(null);
        }
        if (\array_key_exists('prefilled', $data) && $data['prefilled'] !== null) {
            $object->setPrefilled($data['prefilled']);
        }
        elseif (\array_key_exists('prefilled', $data) && $data['prefilled'] === null) {
            $object->setPrefilled(null);
        }
        if (\array_key_exists('attachment_id', $data) && $data['attachment_id'] !== null) {
            $object->setAttachmentId($data['attachment_id']);
        }
        elseif (\array_key_exists('attachment_id', $data) && $data['attachment_id'] === null) {
            $object->setAttachmentId(null);
        }
        if (\array_key_exists('values', $data) && $data['values'] !== null) {
            $values_1 = [];
            foreach ($data['values'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setValues($values_1);
        }
        elseif (\array_key_exists('values', $data) && $data['values'] === null) {
            $object->setValues(null);
        }
        if (\array_key_exists('attachment_ids', $data) && $data['attachment_ids'] !== null) {
            $values_2 = [];
            foreach ($data['attachment_ids'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setAttachmentIds($values_2);
        }
        elseif (\array_key_exists('attachment_ids', $data) && $data['attachment_ids'] === null) {
            $object->setAttachmentIds(null);
        }
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('decided_at', $data) && $data['decided_at'] !== null) {
            $object->setDecidedAt(new \DateTime($data['decided_at']));
        }
        elseif (\array_key_exists('decided_at', $data) && $data['decided_at'] === null) {
            $object->setDecidedAt(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt(new \DateTime($data['expires_at']));
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('editable_for_verifier_repair', $data) && $data['editable_for_verifier_repair'] !== null) {
            $object->setEditableForVerifierRepair($data['editable_for_verifier_repair']);
        }
        elseif (\array_key_exists('editable_for_verifier_repair', $data) && $data['editable_for_verifier_repair'] === null) {
            $object->setEditableForVerifierRepair(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\ComplianceRequirementField::class => false];
    }
}
