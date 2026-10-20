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
class ComplianceAnswerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\ComplianceAnswer::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\ComplianceAnswer::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\ComplianceAnswer();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('key', $data) && $data['key'] !== null) {
            $object->setKey($data['key']);
        }
        elseif (\array_key_exists('key', $data) && $data['key'] === null) {
            $object->setKey(null);
        }
        if (\array_key_exists('value', $data) && $data['value'] !== null) {
            $object->setValue($data['value']);
        }
        elseif (\array_key_exists('value', $data) && $data['value'] === null) {
            $object->setValue(null);
        }
        if (\array_key_exists('attachment_id', $data) && $data['attachment_id'] !== null) {
            $object->setAttachmentId($data['attachment_id']);
        }
        elseif (\array_key_exists('attachment_id', $data) && $data['attachment_id'] === null) {
            $object->setAttachmentId(null);
        }
        if (\array_key_exists('values', $data) && $data['values'] !== null) {
            $values = [];
            foreach ($data['values'] as $value) {
                $values[] = $value;
            }
            $object->setValues($values);
        }
        elseif (\array_key_exists('values', $data) && $data['values'] === null) {
            $object->setValues(null);
        }
        if (\array_key_exists('attachment_ids', $data) && $data['attachment_ids'] !== null) {
            $values_1 = [];
            foreach ($data['attachment_ids'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAttachmentIds($values_1);
        }
        elseif (\array_key_exists('attachment_ids', $data) && $data['attachment_ids'] === null) {
            $object->setAttachmentIds(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['key'] = $data->getKey();
        if ($data->isInitialized('value') && null !== $data->getValue()) {
            $dataArray['value'] = $data->getValue();
        }
        if ($data->isInitialized('attachmentId') && null !== $data->getAttachmentId()) {
            $dataArray['attachment_id'] = $data->getAttachmentId();
        }
        if ($data->isInitialized('values') && null !== $data->getValues()) {
            $values = [];
            foreach ($data->getValues() as $value) {
                $values[] = $value;
            }
            $dataArray['values'] = $values;
        }
        if ($data->isInitialized('attachmentIds') && null !== $data->getAttachmentIds()) {
            $values_1 = [];
            foreach ($data->getAttachmentIds() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['attachment_ids'] = $values_1;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\ComplianceAnswer::class => false];
    }
}
