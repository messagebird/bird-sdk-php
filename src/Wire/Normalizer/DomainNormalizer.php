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
class DomainNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\Domain::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\Domain::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\Domain();
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
        if (\array_key_exists('workspace_id', $data) && $data['workspace_id'] !== null) {
            $object->setWorkspaceId($data['workspace_id']);
        }
        elseif (\array_key_exists('workspace_id', $data) && $data['workspace_id'] === null) {
            $object->setWorkspaceId(null);
        }
        if (\array_key_exists('domain', $data) && $data['domain'] !== null) {
            $object->setDomain($data['domain']);
        }
        elseif (\array_key_exists('domain', $data) && $data['domain'] === null) {
            $object->setDomain(null);
        }
        if (\array_key_exists('vendor', $data) && $data['vendor'] !== null) {
            $object->setVendor($data['vendor']);
        }
        elseif (\array_key_exists('vendor', $data) && $data['vendor'] === null) {
            $object->setVendor(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('settings', $data) && $data['settings'] !== null) {
            $object->setSettings($this->denormalizer->denormalize($data['settings'], \MessageBird\Wire\Model\DomainSettings::class, 'json', $context));
        }
        elseif (\array_key_exists('settings', $data) && $data['settings'] === null) {
            $object->setSettings(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('dkim', $data) && $data['dkim'] !== null) {
            $object->setDkim($this->denormalizer->denormalize($data['dkim'], \MessageBird\Wire\Model\DomainDKIM::class, 'json', $context));
        }
        elseif (\array_key_exists('dkim', $data) && $data['dkim'] === null) {
            $object->setDkim(null);
        }
        if (\array_key_exists('capabilities', $data) && $data['capabilities'] !== null) {
            $object->setCapabilities($this->denormalizer->denormalize($data['capabilities'], \MessageBird\Wire\Model\DomainCapabilities::class, 'json', $context));
        }
        elseif (\array_key_exists('capabilities', $data) && $data['capabilities'] === null) {
            $object->setCapabilities(null);
        }
        if (\array_key_exists('dns_records', $data) && $data['dns_records'] !== null) {
            $values_1 = [];
            foreach ($data['dns_records'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\DNSRecord::class, 'json', $context);
            }
            $object->setDnsRecords($values_1);
        }
        elseif (\array_key_exists('dns_records', $data) && $data['dns_records'] === null) {
            $object->setDnsRecords(null);
        }
        if (\array_key_exists('last_checked_at', $data) && $data['last_checked_at'] !== null) {
            $object->setLastCheckedAt(new \DateTime($data['last_checked_at']));
        }
        elseif (\array_key_exists('last_checked_at', $data) && $data['last_checked_at'] === null) {
            $object->setLastCheckedAt(null);
        }
        if (\array_key_exists('verified_at', $data) && $data['verified_at'] !== null) {
            $object->setVerifiedAt(new \DateTime($data['verified_at']));
        }
        elseif (\array_key_exists('verified_at', $data) && $data['verified_at'] === null) {
            $object->setVerifiedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['settings'] = $this->normalizer->normalize($data->getSettings(), 'json', $context);
        $dataArray['dkim'] = $this->normalizer->normalize($data->getDkim(), 'json', $context);
        $dataArray['capabilities'] = $this->normalizer->normalize($data->getCapabilities(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\Domain::class => false];
    }
}
