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
class WorkspaceQuotaUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WorkspaceQuotaUsage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WorkspaceQuotaUsage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WorkspaceQuotaUsage();
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
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('observed_at', $data) && $data['observed_at'] !== null) {
            $object->setObservedAt(new \DateTime($data['observed_at']));
            unset($data['observed_at']);
        }
        elseif (\array_key_exists('observed_at', $data) && $data['observed_at'] === null) {
            $object->setObservedAt(null);
        }
        if (\array_key_exists('organization_limit', $data) && $data['organization_limit'] !== null) {
            $object->setOrganizationLimit($data['organization_limit']);
            unset($data['organization_limit']);
        }
        elseif (\array_key_exists('organization_limit', $data) && $data['organization_limit'] === null) {
            $object->setOrganizationLimit(null);
        }
        if (\array_key_exists('organization_used', $data) && $data['organization_used'] !== null) {
            $object->setOrganizationUsed($data['organization_used']);
            unset($data['organization_used']);
        }
        elseif (\array_key_exists('organization_used', $data) && $data['organization_used'] === null) {
            $object->setOrganizationUsed(null);
        }
        if (\array_key_exists('workspace_used', $data) && $data['workspace_used'] !== null) {
            $object->setWorkspaceUsed($data['workspace_used']);
            unset($data['workspace_used']);
        }
        elseif (\array_key_exists('workspace_used', $data) && $data['workspace_used'] === null) {
            $object->setWorkspaceUsed(null);
        }
        if (\array_key_exists('organization_remaining', $data) && $data['organization_remaining'] !== null) {
            $object->setOrganizationRemaining($data['organization_remaining']);
            unset($data['organization_remaining']);
        }
        elseif (\array_key_exists('organization_remaining', $data) && $data['organization_remaining'] === null) {
            $object->setOrganizationRemaining(null);
        }
        if (\array_key_exists('workspace_remaining', $data) && $data['workspace_remaining'] !== null) {
            $object->setWorkspaceRemaining($data['workspace_remaining']);
            unset($data['workspace_remaining']);
        }
        elseif (\array_key_exists('workspace_remaining', $data) && $data['workspace_remaining'] === null) {
            $object->setWorkspaceRemaining(null);
        }
        if (\array_key_exists('remaining', $data) && $data['remaining'] !== null) {
            $object->setRemaining($data['remaining']);
            unset($data['remaining']);
        }
        elseif (\array_key_exists('remaining', $data) && $data['remaining'] === null) {
            $object->setRemaining(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['status'] = $data->getStatus();
        $dataArray['observed_at'] = $data->getObservedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['organization_limit'] = $data->getOrganizationLimit();
        $dataArray['organization_used'] = $data->getOrganizationUsed();
        $dataArray['workspace_used'] = $data->getWorkspaceUsed();
        $dataArray['organization_remaining'] = $data->getOrganizationRemaining();
        $dataArray['workspace_remaining'] = $data->getWorkspaceRemaining();
        $dataArray['remaining'] = $data->getRemaining();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WorkspaceQuotaUsage::class => false];
    }
}
