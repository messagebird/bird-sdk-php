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
class WorkspaceRateLimitUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WorkspaceRateLimitUsage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WorkspaceRateLimitUsage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WorkspaceRateLimitUsage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('observed_at', $data) && $data['observed_at'] !== null) {
            $object->setObservedAt(new \DateTime($data['observed_at']));
        }
        elseif (\array_key_exists('observed_at', $data) && $data['observed_at'] === null) {
            $object->setObservedAt(null);
        }
        if (\array_key_exists('organization_limit', $data) && $data['organization_limit'] !== null) {
            $object->setOrganizationLimit($data['organization_limit']);
        }
        elseif (\array_key_exists('organization_limit', $data) && $data['organization_limit'] === null) {
            $object->setOrganizationLimit(null);
        }
        if (\array_key_exists('organization_remaining', $data) && $data['organization_remaining'] !== null) {
            $object->setOrganizationRemaining($data['organization_remaining']);
        }
        elseif (\array_key_exists('organization_remaining', $data) && $data['organization_remaining'] === null) {
            $object->setOrganizationRemaining(null);
        }
        if (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] !== null) {
            $object->setWorkspaceLimit($data['workspace_limit']);
        }
        elseif (\array_key_exists('workspace_limit', $data) && $data['workspace_limit'] === null) {
            $object->setWorkspaceLimit(null);
        }
        if (\array_key_exists('workspace_remaining', $data) && $data['workspace_remaining'] !== null) {
            $object->setWorkspaceRemaining($data['workspace_remaining']);
        }
        elseif (\array_key_exists('workspace_remaining', $data) && $data['workspace_remaining'] === null) {
            $object->setWorkspaceRemaining(null);
        }
        if (\array_key_exists('resets_in_seconds', $data) && $data['resets_in_seconds'] !== null) {
            $object->setResetsInSeconds($data['resets_in_seconds']);
        }
        elseif (\array_key_exists('resets_in_seconds', $data) && $data['resets_in_seconds'] === null) {
            $object->setResetsInSeconds(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['status'] = $data->getStatus();
        $dataArray['observed_at'] = $data->getObservedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['organization_limit'] = $data->getOrganizationLimit();
        $dataArray['organization_remaining'] = $data->getOrganizationRemaining();
        $dataArray['workspace_limit'] = $data->getWorkspaceLimit();
        $dataArray['workspace_remaining'] = $data->getWorkspaceRemaining();
        $dataArray['resets_in_seconds'] = $data->getResetsInSeconds();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WorkspaceRateLimitUsage::class => false];
    }
}
