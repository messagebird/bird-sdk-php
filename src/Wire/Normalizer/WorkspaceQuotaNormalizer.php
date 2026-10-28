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
class WorkspaceQuotaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WorkspaceQuota::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WorkspaceQuota::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WorkspaceQuota();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('allocation_enabled', $data) && \is_int($data['allocation_enabled'])) {
            $data['allocation_enabled'] = (bool) $data['allocation_enabled'];
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
        if (\array_key_exists('kind', $data) && $data['kind'] !== null) {
            $object->setKind($data['kind']);
        }
        elseif (\array_key_exists('kind', $data) && $data['kind'] === null) {
            $object->setKind(null);
        }
        if (\array_key_exists('enforcement', $data) && $data['enforcement'] !== null) {
            $object->setEnforcement($data['enforcement']);
        }
        elseif (\array_key_exists('enforcement', $data) && $data['enforcement'] === null) {
            $object->setEnforcement(null);
        }
        if (\array_key_exists('maximum_value', $data) && $data['maximum_value'] !== null) {
            $object->setMaximumValue($data['maximum_value']);
        }
        elseif (\array_key_exists('maximum_value', $data) && $data['maximum_value'] === null) {
            $object->setMaximumValue(null);
        }
        if (\array_key_exists('organization_limit', $data) && $data['organization_limit'] !== null) {
            $object->setOrganizationLimit($data['organization_limit']);
        }
        elseif (\array_key_exists('organization_limit', $data) && $data['organization_limit'] === null) {
            $object->setOrganizationLimit(null);
        }
        if (\array_key_exists('organization_source', $data) && $data['organization_source'] !== null) {
            $object->setOrganizationSource($data['organization_source']);
        }
        elseif (\array_key_exists('organization_source', $data) && $data['organization_source'] === null) {
            $object->setOrganizationSource(null);
        }
        if (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] !== null) {
            $object->setWorkspaceLimit($this->denormalizer->denormalize($data['workspace_limit'], \MessageBird\Wire\Model\WorkspaceQuotaWorkspaceLimit::class, 'json', $context));
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
        if (\array_key_exists('limit_source', $data) && $data['limit_source'] !== null) {
            $object->setLimitSource($data['limit_source']);
        }
        elseif (\array_key_exists('limit_source', $data) && $data['limit_source'] === null) {
            $object->setLimitSource(null);
        }
        if (\array_key_exists('automatic_limit', $data) && $data['automatic_limit'] !== null) {
            $object->setAutomaticLimit($data['automatic_limit']);
        }
        elseif (\array_key_exists('automatic_limit', $data) && $data['automatic_limit'] === null) {
            $object->setAutomaticLimit(null);
        }
        if (\array_key_exists('allocation_enabled', $data) && $data['allocation_enabled'] !== null) {
            $object->setAllocationEnabled($data['allocation_enabled']);
        }
        elseif (\array_key_exists('allocation_enabled', $data) && $data['allocation_enabled'] === null) {
            $object->setAllocationEnabled(null);
        }
        if (\array_key_exists('usage', $data) && $data['usage'] !== null) {
            $object->setUsage($this->denormalizer->denormalize($data['usage'], \MessageBird\Wire\Model\WorkspaceQuotaUsage::class, 'json', $context));
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
        $dataArray['kind'] = $data->getKind();
        $dataArray['enforcement'] = $data->getEnforcement();
        $dataArray['maximum_value'] = $data->getMaximumValue();
        $dataArray['organization_limit'] = $data->getOrganizationLimit();
        $dataArray['organization_source'] = $data->getOrganizationSource();
        $dataArray['workspace_limit'] = $this->normalizer->normalize($data->getWorkspaceLimit(), 'json', $context);
        $dataArray['limit'] = $data->getLimit();
        $dataArray['limit_source'] = $data->getLimitSource();
        $dataArray['automatic_limit'] = $data->getAutomaticLimit();
        $dataArray['allocation_enabled'] = $data->getAllocationEnabled();
        $dataArray['usage'] = $this->normalizer->normalize($data->getUsage(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WorkspaceQuota::class => false];
    }
}
