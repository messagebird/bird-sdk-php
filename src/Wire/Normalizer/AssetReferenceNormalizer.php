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
class AssetReferenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetReference::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetReference::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetReference();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('resource_type', $data) && $data['resource_type'] !== null) {
            $object->setResourceType($data['resource_type']);
        }
        elseif (\array_key_exists('resource_type', $data) && $data['resource_type'] === null) {
            $object->setResourceType(null);
        }
        if (\array_key_exists('resource_id', $data) && $data['resource_id'] !== null) {
            $object->setResourceId($data['resource_id']);
        }
        elseif (\array_key_exists('resource_id', $data) && $data['resource_id'] === null) {
            $object->setResourceId(null);
        }
        if (\array_key_exists('resource_name', $data) && $data['resource_name'] !== null) {
            $object->setResourceName($data['resource_name']);
        }
        elseif (\array_key_exists('resource_name', $data) && $data['resource_name'] === null) {
            $object->setResourceName(null);
        }
        if (\array_key_exists('usage', $data) && $data['usage'] !== null) {
            $object->setUsage($data['usage']);
        }
        elseif (\array_key_exists('usage', $data) && $data['usage'] === null) {
            $object->setUsage(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['usage'] = $data->getUsage();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetReference::class => false];
    }
}
