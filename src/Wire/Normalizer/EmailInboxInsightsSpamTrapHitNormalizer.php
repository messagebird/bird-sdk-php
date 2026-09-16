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
class EmailInboxInsightsSpamTrapHitNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsSpamTrapHit::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsSpamTrapHit::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsSpamTrapHit();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('first_seen', $data) && $data['first_seen'] !== null) {
            $object->setFirstSeen(new \DateTime($data['first_seen']));
        }
        elseif (\array_key_exists('first_seen', $data) && $data['first_seen'] === null) {
            $object->setFirstSeen(null);
        }
        if (\array_key_exists('last_seen', $data) && $data['last_seen'] !== null) {
            $object->setLastSeen(new \DateTime($data['last_seen']));
        }
        elseif (\array_key_exists('last_seen', $data) && $data['last_seen'] === null) {
            $object->setLastSeen(null);
        }
        if (\array_key_exists('ip_address', $data) && $data['ip_address'] !== null) {
            $object->setIpAddress($data['ip_address']);
        }
        elseif (\array_key_exists('ip_address', $data) && $data['ip_address'] === null) {
            $object->setIpAddress(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('hit_count', $data) && $data['hit_count'] !== null) {
            $object->setHitCount($data['hit_count']);
        }
        elseif (\array_key_exists('hit_count', $data) && $data['hit_count'] === null) {
            $object->setHitCount(null);
        }
        if (\array_key_exists('trap_age_days', $data) && $data['trap_age_days'] !== null) {
            $object->setTrapAgeDays($data['trap_age_days']);
        }
        elseif (\array_key_exists('trap_age_days', $data) && $data['trap_age_days'] === null) {
            $object->setTrapAgeDays(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['source'] = $data->getSource();
        $dataArray['type'] = $data->getType();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsSpamTrapHit::class => false];
    }
}
