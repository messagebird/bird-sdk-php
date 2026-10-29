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
class WorkspaceRateLimitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WorkspaceRateLimit::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WorkspaceRateLimit::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WorkspaceRateLimit();
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
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
        }
        elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('unit', $data) && $data['unit'] !== null) {
            $object->setUnit($data['unit']);
        }
        elseif (\array_key_exists('unit', $data) && $data['unit'] === null) {
            $object->setUnit(null);
        }
        if (\array_key_exists('window_seconds', $data) && $data['window_seconds'] !== null) {
            $object->setWindowSeconds($data['window_seconds']);
        }
        elseif (\array_key_exists('window_seconds', $data) && $data['window_seconds'] === null) {
            $object->setWindowSeconds(null);
        }
        if (\array_key_exists('organization_limit', $data) && $data['organization_limit'] !== null) {
            $object->setOrganizationLimit($data['organization_limit']);
        }
        elseif (\array_key_exists('organization_limit', $data) && $data['organization_limit'] === null) {
            $object->setOrganizationLimit(null);
        }
        if (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] !== null) {
            $object->setWorkspaceLimit($this->denormalizer->denormalize($data['workspace_limit'], \MessageBird\Wire\Model\WorkspaceRateLimitWorkspaceLimit::class, 'json', $context));
        }
        elseif (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] === null) {
            $object->setWorkspaceLimit(null);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($data['limit']);
        }
        elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        if (\array_key_exists('attribution', $data) && $data['attribution'] !== null) {
            $object->setAttribution($this->denormalizer->denormalize($data['attribution'], \MessageBird\Wire\Model\WorkspaceRateLimitAttribution::class, 'json', $context));
        }
        elseif (\array_key_exists('attribution', $data) && $data['attribution'] === null) {
            $object->setAttribution(null);
        }
        if (\array_key_exists('usage', $data) && $data['usage'] !== null) {
            $object->setUsage($this->denormalizer->denormalize($data['usage'], \MessageBird\Wire\Model\WorkspaceRateLimitUsage::class, 'json', $context));
        }
        elseif (\array_key_exists('usage', $data) && $data['usage'] === null) {
            $object->setUsage(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['key'] = $data->getKey();
        $dataArray['name'] = $data->getName();
        $dataArray['description'] = $data->getDescription();
        $dataArray['unit'] = $data->getUnit();
        $dataArray['window_seconds'] = $data->getWindowSeconds();
        $dataArray['organization_limit'] = $data->getOrganizationLimit();
        $dataArray['workspace_limit'] = $this->normalizer->normalize($data->getWorkspaceLimit(), 'json', $context);
        $dataArray['limit'] = $data->getLimit();
        $dataArray['attribution'] = $this->normalizer->normalize($data->getAttribution(), 'json', $context);
        $dataArray['usage'] = $this->normalizer->normalize($data->getUsage(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WorkspaceRateLimit::class => false];
    }
}
