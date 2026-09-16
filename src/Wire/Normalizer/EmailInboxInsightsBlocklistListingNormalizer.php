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
class EmailInboxInsightsBlocklistListingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsBlocklistListing::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsBlocklistListing::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsBlocklistListing();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_active', $data) && \is_int($data['is_active'])) {
            $data['is_active'] = (bool) $data['is_active'];
        }
        if (\array_key_exists('is_active', $data) && $data['is_active'] !== null) {
            $object->setIsActive($data['is_active']);
        }
        elseif (\array_key_exists('is_active', $data) && $data['is_active'] === null) {
            $object->setIsActive(null);
        }
        if (\array_key_exists('reason_code', $data) && $data['reason_code'] !== null) {
            $object->setReasonCode($data['reason_code']);
        }
        elseif (\array_key_exists('reason_code', $data) && $data['reason_code'] === null) {
            $object->setReasonCode(null);
        }
        if (\array_key_exists('provider', $data) && $data['provider'] !== null) {
            $object->setProvider($data['provider']);
        }
        elseif (\array_key_exists('provider', $data) && $data['provider'] === null) {
            $object->setProvider(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('first_detected', $data) && $data['first_detected'] !== null) {
            $object->setFirstDetected(new \DateTime($data['first_detected']));
        }
        elseif (\array_key_exists('first_detected', $data) && $data['first_detected'] === null) {
            $object->setFirstDetected(null);
        }
        if (\array_key_exists('last_detected', $data) && $data['last_detected'] !== null) {
            $object->setLastDetected(new \DateTime($data['last_detected']));
        }
        elseif (\array_key_exists('last_detected', $data) && $data['last_detected'] === null) {
            $object->setLastDetected(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsBlocklistListing::class => false];
    }
}
