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
class EsimNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\Esim::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\Esim::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\Esim();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('usage_available', $data) && \is_int($data['usage_available'])) {
            $data['usage_available'] = (bool) $data['usage_available'];
        }
        if (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] !== null) {
            $object->setSubscriberId($data['subscriber_id']);
            unset($data['subscriber_id']);
        }
        elseif (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] === null) {
            $object->setSubscriberId(null);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('mode', $data) && $data['mode'] !== null) {
            $object->setMode($data['mode']);
            unset($data['mode']);
        }
        elseif (\array_key_exists('mode', $data) && $data['mode'] === null) {
            $object->setMode(null);
        }
        if (\array_key_exists('iccid', $data) && $data['iccid'] !== null) {
            $object->setIccid($data['iccid']);
            unset($data['iccid']);
        }
        elseif (\array_key_exists('iccid', $data) && $data['iccid'] === null) {
            $object->setIccid(null);
        }
        if (\array_key_exists('phone_number', $data) && $data['phone_number'] !== null) {
            $object->setPhoneNumber($data['phone_number']);
            unset($data['phone_number']);
        }
        elseif (\array_key_exists('phone_number', $data) && $data['phone_number'] === null) {
            $object->setPhoneNumber(null);
        }
        if (\array_key_exists('capabilities', $data) && $data['capabilities'] !== null) {
            $object->setCapabilities($this->denormalizer->denormalize($data['capabilities'], \MessageBird\Wire\Model\EsimCapabilities::class, 'json', $context));
            unset($data['capabilities']);
        }
        elseif (\array_key_exists('capabilities', $data) && $data['capabilities'] === null) {
            $object->setCapabilities(null);
        }
        if (\array_key_exists('order_id', $data) && $data['order_id'] !== null) {
            $object->setOrderId($data['order_id']);
            unset($data['order_id']);
        }
        elseif (\array_key_exists('order_id', $data) && $data['order_id'] === null) {
            $object->setOrderId(null);
        }
        if (\array_key_exists('display_name', $data) && $data['display_name'] !== null) {
            $object->setDisplayName($data['display_name']);
            unset($data['display_name']);
        }
        elseif (\array_key_exists('display_name', $data) && $data['display_name'] === null) {
            $object->setDisplayName(null);
        }
        if (\array_key_exists('installation', $data) && $data['installation'] !== null) {
            $object->setInstallation($this->denormalizer->denormalize($data['installation'], \MessageBird\Wire\Model\EsimInstallationWrapper::class, 'json', $context));
            unset($data['installation']);
        }
        elseif (\array_key_exists('installation', $data) && $data['installation'] === null) {
            $object->setInstallation(null);
        }
        if (\array_key_exists('packages', $data) && $data['packages'] !== null) {
            $values = [];
            foreach ($data['packages'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EsimPackage::class, 'json', $context);
            }
            $object->setPackages($values);
            unset($data['packages']);
        }
        elseif (\array_key_exists('packages', $data) && $data['packages'] === null) {
            $object->setPackages(null);
        }
        if (\array_key_exists('zone_balances', $data) && $data['zone_balances'] !== null) {
            $values_1 = [];
            foreach ($data['zone_balances'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EsimZoneBalance::class, 'json', $context);
            }
            $object->setZoneBalances($values_1);
            unset($data['zone_balances']);
        }
        elseif (\array_key_exists('zone_balances', $data) && $data['zone_balances'] === null) {
            $object->setZoneBalances(null);
        }
        if (\array_key_exists('available_actions', $data) && $data['available_actions'] !== null) {
            $values_2 = [];
            foreach ($data['available_actions'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\EsimAvailableAction::class, 'json', $context);
            }
            $object->setAvailableActions($values_2);
            unset($data['available_actions']);
        }
        elseif (\array_key_exists('available_actions', $data) && $data['available_actions'] === null) {
            $object->setAvailableActions(null);
        }
        if (\array_key_exists('package_limit', $data) && $data['package_limit'] !== null) {
            $object->setPackageLimit($data['package_limit']);
            unset($data['package_limit']);
        }
        elseif (\array_key_exists('package_limit', $data) && $data['package_limit'] === null) {
            $object->setPackageLimit(null);
        }
        if (\array_key_exists('usage_available', $data) && $data['usage_available'] !== null) {
            $object->setUsageAvailable($data['usage_available']);
            unset($data['usage_available']);
        }
        elseif (\array_key_exists('usage_available', $data) && $data['usage_available'] === null) {
            $object->setUsageAvailable(null);
        }
        if (\array_key_exists('balance_reporting', $data) && $data['balance_reporting'] !== null) {
            $object->setBalanceReporting($data['balance_reporting']);
            unset($data['balance_reporting']);
        }
        elseif (\array_key_exists('balance_reporting', $data) && $data['balance_reporting'] === null) {
            $object->setBalanceReporting(null);
        }
        if (\array_key_exists('ready_until', $data) && $data['ready_until'] !== null) {
            $object->setReadyUntil(new \DateTime($data['ready_until']));
            unset($data['ready_until']);
        }
        elseif (\array_key_exists('ready_until', $data) && $data['ready_until'] === null) {
            $object->setReadyUntil(null);
        }
        if (\array_key_exists('activated_at', $data) && $data['activated_at'] !== null) {
            $object->setActivatedAt(new \DateTime($data['activated_at']));
            unset($data['activated_at']);
        }
        elseif (\array_key_exists('activated_at', $data) && $data['activated_at'] === null) {
            $object->setActivatedAt(null);
        }
        if (\array_key_exists('active_until', $data) && $data['active_until'] !== null) {
            $object->setActiveUntil(new \DateTime($data['active_until']));
            unset($data['active_until']);
        }
        elseif (\array_key_exists('active_until', $data) && $data['active_until'] === null) {
            $object->setActiveUntil(null);
        }
        if (\array_key_exists('last_attachment', $data) && $data['last_attachment'] !== null) {
            $object->setLastAttachment($this->denormalizer->denormalize($data['last_attachment'], \MessageBird\Wire\Model\EsimLastAttachment::class, 'json', $context));
            unset($data['last_attachment']);
        }
        elseif (\array_key_exists('last_attachment', $data) && $data['last_attachment'] === null) {
            $object->setLastAttachment(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_3 = [];
            foreach ($data['tags'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_3);
            unset($data['tags']);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value_4) {
                $values_4[$key] = $value_4;
            }
            $object->setMetadata($values_4);
            unset($data['metadata']);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        foreach ($data as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_5;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('displayName')) {
            $dataArray['display_name'] = $data->getDisplayName();
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values = [];
            foreach ($data->getTags() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['tags'] = $values;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_1 = [];
            foreach ($data->getMetadata() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['metadata'] = (object) $values_1;
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_2;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\Esim::class => false];
    }
}
