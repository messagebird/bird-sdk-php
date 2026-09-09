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
class WhatsAppTemplateVersionSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppTemplateVersionSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppTemplateVersionSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppTemplateVersionSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('template_id', $data) && $data['template_id'] !== null) {
            $object->setTemplateId($data['template_id']);
        }
        elseif (\array_key_exists('template_id', $data) && $data['template_id'] === null) {
            $object->setTemplateId(null);
        }
        if (\array_key_exists('version_number', $data) && $data['version_number'] !== null) {
            $object->setVersionNumber($data['version_number']);
        }
        elseif (\array_key_exists('version_number', $data) && $data['version_number'] === null) {
            $object->setVersionNumber(null);
        }
        if (\array_key_exists('submitted_at', $data) && $data['submitted_at'] !== null) {
            $object->setSubmittedAt(new \DateTime($data['submitted_at']));
        }
        elseif (\array_key_exists('submitted_at', $data) && $data['submitted_at'] === null) {
            $object->setSubmittedAt(null);
        }
        if (\array_key_exists('languages', $data) && $data['languages'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['languages'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppTemplateLanguageState::class, 'json', $context);
            }
            $object->setLanguages($values);
        }
        elseif (\array_key_exists('languages', $data) && $data['languages'] === null) {
            $object->setLanguages(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values_1 = [];
            foreach ($data['next'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values_1);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['template_id'] = $data->getTemplateId();
        $values = [];
        foreach ($data->getLanguages() as $key => $value) {
            $values[$key] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['languages'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppTemplateVersionSummary::class => false];
    }
}
