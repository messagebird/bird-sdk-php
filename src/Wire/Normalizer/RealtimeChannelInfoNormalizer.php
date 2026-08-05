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
class RealtimeChannelInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\RealtimeChannelInfo::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\RealtimeChannelInfo::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\RealtimeChannelInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('occupied', $data) && \is_int($data['occupied'])) {
            $data['occupied'] = (bool) $data['occupied'];
        }
        if (\array_key_exists('member_count', $data) && $data['member_count'] !== null) {
            $object->setMemberCount($data['member_count']);
            unset($data['member_count']);
        }
        elseif (\array_key_exists('member_count', $data) && $data['member_count'] === null) {
            $object->setMemberCount(null);
        }
        if (\array_key_exists('connection_count', $data) && $data['connection_count'] !== null) {
            $object->setConnectionCount($data['connection_count']);
            unset($data['connection_count']);
        }
        elseif (\array_key_exists('connection_count', $data) && $data['connection_count'] === null) {
            $object->setConnectionCount(null);
        }
        if (\array_key_exists('occupied', $data) && $data['occupied'] !== null) {
            $object->setOccupied($data['occupied']);
            unset($data['occupied']);
        }
        elseif (\array_key_exists('occupied', $data) && $data['occupied'] === null) {
            $object->setOccupied(null);
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
        if ($data->isInitialized('memberCount') && null !== $data->getMemberCount()) {
            $dataArray['member_count'] = $data->getMemberCount();
        }
        if ($data->isInitialized('connectionCount') && null !== $data->getConnectionCount()) {
            $dataArray['connection_count'] = $data->getConnectionCount();
        }
        $dataArray['occupied'] = $data->getOccupied();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\RealtimeChannelInfo::class => false];
    }
}
