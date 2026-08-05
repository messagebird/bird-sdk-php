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
class EmailLabelsUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailLabelsUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailLabelsUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailLabelsUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('add', $data) && $data['add'] !== null) {
            $values = [];
            foreach ($data['add'] as $value) {
                $values[] = $value;
            }
            $object->setAdd($values);
        }
        elseif (\array_key_exists('add', $data) && $data['add'] === null) {
            $object->setAdd(null);
        }
        if (\array_key_exists('remove', $data) && $data['remove'] !== null) {
            $values_1 = [];
            foreach ($data['remove'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRemove($values_1);
        }
        elseif (\array_key_exists('remove', $data) && $data['remove'] === null) {
            $object->setRemove(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('add') && null !== $data->getAdd()) {
            $values = [];
            foreach ($data->getAdd() as $value) {
                $values[] = $value;
            }
            $dataArray['add'] = $values;
        }
        if ($data->isInitialized('remove') && null !== $data->getRemove()) {
            $values_1 = [];
            foreach ($data->getRemove() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['remove'] = $values_1;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailLabelsUpdate::class => false];
    }
}
