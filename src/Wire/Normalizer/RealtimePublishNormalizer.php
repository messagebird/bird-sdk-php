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
class RealtimePublishNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\RealtimePublish::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\RealtimePublish::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\RealtimePublish();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('event', $data) && $data['event'] !== null) {
            $object->setEvent($data['event']);
        }
        elseif (\array_key_exists('event', $data) && $data['event'] === null) {
            $object->setEvent(null);
        }
        if (\array_key_exists('channels', $data) && $data['channels'] !== null) {
            $values = [];
            foreach ($data['channels'] as $value) {
                $values[] = $value;
            }
            $object->setChannels($values);
        }
        elseif (\array_key_exists('channels', $data) && $data['channels'] === null) {
            $object->setChannels(null);
        }
        if (\array_key_exists('data', $data) && $data['data'] !== null) {
            $object->setData($data['data']);
        }
        elseif (\array_key_exists('data', $data) && $data['data'] === null) {
            $object->setData(null);
        }
        if (\array_key_exists('exclude_connection_id', $data) && $data['exclude_connection_id'] !== null) {
            $object->setExcludeConnectionId($data['exclude_connection_id']);
        }
        elseif (\array_key_exists('exclude_connection_id', $data) && $data['exclude_connection_id'] === null) {
            $object->setExcludeConnectionId(null);
        }
        if (\array_key_exists('include', $data) && $data['include'] !== null) {
            $values_1 = [];
            foreach ($data['include'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setInclude($values_1);
        }
        elseif (\array_key_exists('include', $data) && $data['include'] === null) {
            $object->setInclude(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['event'] = $data->getEvent();
        $values = [];
        foreach ($data->getChannels() as $value) {
            $values[] = $value;
        }
        $dataArray['channels'] = $values;
        if ($data->isInitialized('data') && null !== $data->getData()) {
            $dataArray['data'] = $data->getData();
        }
        if ($data->isInitialized('excludeConnectionId') && null !== $data->getExcludeConnectionId()) {
            $dataArray['exclude_connection_id'] = $data->getExcludeConnectionId();
        }
        if ($data->isInitialized('include') && null !== $data->getInclude()) {
            $values_1 = [];
            foreach ($data->getInclude() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['include'] = $values_1;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\RealtimePublish::class => false];
    }
}
