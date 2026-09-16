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
class EmailCompetitiveSendTimeCellNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveSendTimeCell::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveSendTimeCell::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveSendTimeCell();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('share_percent', $data) && \is_int($data['share_percent'])) {
            $data['share_percent'] = (float) $data['share_percent'];
        }
        if (\array_key_exists('intensity', $data) && \is_int($data['intensity'])) {
            $data['intensity'] = (float) $data['intensity'];
        }
        if (\array_key_exists('weekday', $data) && $data['weekday'] !== null) {
            $object->setWeekday($data['weekday']);
        }
        elseif (\array_key_exists('weekday', $data) && $data['weekday'] === null) {
            $object->setWeekday(null);
        }
        if (\array_key_exists('hour', $data) && $data['hour'] !== null) {
            $object->setHour($data['hour']);
        }
        elseif (\array_key_exists('hour', $data) && $data['hour'] === null) {
            $object->setHour(null);
        }
        if (\array_key_exists('share_percent', $data) && $data['share_percent'] !== null) {
            $object->setSharePercent($data['share_percent']);
        }
        elseif (\array_key_exists('share_percent', $data) && $data['share_percent'] === null) {
            $object->setSharePercent(null);
        }
        if (\array_key_exists('intensity', $data) && $data['intensity'] !== null) {
            $object->setIntensity($data['intensity']);
        }
        elseif (\array_key_exists('intensity', $data) && $data['intensity'] === null) {
            $object->setIntensity(null);
        }
        if (\array_key_exists('sample_days', $data) && $data['sample_days'] !== null) {
            $object->setSampleDays($data['sample_days']);
        }
        elseif (\array_key_exists('sample_days', $data) && $data['sample_days'] === null) {
            $object->setSampleDays(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['weekday'] = $data->getWeekday();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveSendTimeCell::class => false];
    }
}
