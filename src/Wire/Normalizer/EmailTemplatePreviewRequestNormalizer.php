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
class EmailTemplatePreviewRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplatePreviewRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplatePreviewRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplatePreviewRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('content', $data) && $data['content'] !== null) {
            $object->setContent($this->denormalizer->denormalize($data['content'], \MessageBird\Wire\Model\EmailTemplatePreviewRequestContent::class, 'json', $context));
        }
        elseif (\array_key_exists('content', $data) && $data['content'] === null) {
            $object->setContent(null);
        }
        if (\array_key_exists('parameters', $data) && $data['parameters'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['parameters'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setParameters($values);
        }
        elseif (\array_key_exists('parameters', $data) && $data['parameters'] === null) {
            $object->setParameters(null);
        }
        if (\array_key_exists('contact', $data) && $data['contact'] !== null) {
            $object->setContact($data['contact']);
        }
        elseif (\array_key_exists('contact', $data) && $data['contact'] === null) {
            $object->setContact(null);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('version', $data) && $data['version'] !== null) {
            $object->setVersion($data['version']);
        }
        elseif (\array_key_exists('version', $data) && $data['version'] === null) {
            $object->setVersion(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('content') && null !== $data->getContent()) {
            $dataArray['content'] = $this->normalizer->normalize($data->getContent(), 'json', $context);
        }
        if ($data->isInitialized('parameters') && null !== $data->getParameters()) {
            $values = [];
            foreach ($data->getParameters() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['parameters'] = (object) $values;
        }
        if ($data->isInitialized('contact') && null !== $data->getContact()) {
            $dataArray['contact'] = $data->getContact();
        }
        if ($data->isInitialized('language') && null !== $data->getLanguage()) {
            $dataArray['language'] = $data->getLanguage();
        }
        if ($data->isInitialized('version') && null !== $data->getVersion()) {
            $dataArray['version'] = $data->getVersion();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplatePreviewRequest::class => false];
    }
}
