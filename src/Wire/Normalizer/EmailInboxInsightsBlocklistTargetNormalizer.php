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
class EmailInboxInsightsBlocklistTargetNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsBlocklistTarget::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsBlocklistTarget::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsBlocklistTarget();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_listed', $data) && \is_int($data['is_listed'])) {
            $data['is_listed'] = (bool) $data['is_listed'];
        }
        if (\array_key_exists('target', $data) && $data['target'] !== null) {
            $object->setTarget($data['target']);
        }
        elseif (\array_key_exists('target', $data) && $data['target'] === null) {
            $object->setTarget(null);
        }
        if (\array_key_exists('target_type', $data) && $data['target_type'] !== null) {
            $object->setTargetType($data['target_type']);
        }
        elseif (\array_key_exists('target_type', $data) && $data['target_type'] === null) {
            $object->setTargetType(null);
        }
        if (\array_key_exists('is_listed', $data) && $data['is_listed'] !== null) {
            $object->setIsListed($data['is_listed']);
        }
        elseif (\array_key_exists('is_listed', $data) && $data['is_listed'] === null) {
            $object->setIsListed(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('checked_at', $data) && $data['checked_at'] !== null) {
            $object->setCheckedAt(new \DateTime($data['checked_at']));
        }
        elseif (\array_key_exists('checked_at', $data) && $data['checked_at'] === null) {
            $object->setCheckedAt(null);
        }
        if (\array_key_exists('listings', $data) && $data['listings'] !== null) {
            $values = [];
            foreach ($data['listings'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailInboxInsightsBlocklistListing::class, 'json', $context);
            }
            $object->setListings($values);
        }
        elseif (\array_key_exists('listings', $data) && $data['listings'] === null) {
            $object->setListings(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['status'] = $data->getStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsBlocklistTarget::class => false];
    }
}
