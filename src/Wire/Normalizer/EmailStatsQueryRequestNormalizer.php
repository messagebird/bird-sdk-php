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
class EmailStatsQueryRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsQueryRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsQueryRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsQueryRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $object->setTo($data['to']);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('timezone', $data) && $data['timezone'] !== null) {
            $object->setTimezone($data['timezone']);
        }
        elseif (\array_key_exists('timezone', $data) && $data['timezone'] === null) {
            $object->setTimezone(null);
        }
        if (\array_key_exists('metrics', $data) && $data['metrics'] !== null) {
            $values = [];
            foreach ($data['metrics'] as $value) {
                $values[] = $value;
            }
            $object->setMetrics($values);
        }
        elseif (\array_key_exists('metrics', $data) && $data['metrics'] === null) {
            $object->setMetrics(null);
        }
        if (\array_key_exists('group_by', $data) && $data['group_by'] !== null) {
            $object->setGroupBy($data['group_by']);
        }
        elseif (\array_key_exists('group_by', $data) && $data['group_by'] === null) {
            $object->setGroupBy(null);
        }
        if (\array_key_exists('grain', $data) && $data['grain'] !== null) {
            $object->setGrain($data['grain']);
        }
        elseif (\array_key_exists('grain', $data) && $data['grain'] === null) {
            $object->setGrain(null);
        }
        if (\array_key_exists('filters', $data) && $data['filters'] !== null) {
            $object->setFilters($this->denormalizer->denormalize($data['filters'], \MessageBird\Wire\Model\EmailStatsQueryFilters::class, 'json', $context));
        }
        elseif (\array_key_exists('filters', $data) && $data['filters'] === null) {
            $object->setFilters(null);
        }
        if (\array_key_exists('sort', $data) && $data['sort'] !== null) {
            $object->setSort($data['sort']);
        }
        elseif (\array_key_exists('sort', $data) && $data['sort'] === null) {
            $object->setSort(null);
        }
        if (\array_key_exists('order', $data) && $data['order'] !== null) {
            $object->setOrder($data['order']);
        }
        elseif (\array_key_exists('order', $data) && $data['order'] === null) {
            $object->setOrder(null);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($data['limit']);
        }
        elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        if (\array_key_exists('starting_after', $data) && $data['starting_after'] !== null) {
            $object->setStartingAfter($data['starting_after']);
        }
        elseif (\array_key_exists('starting_after', $data) && $data['starting_after'] === null) {
            $object->setStartingAfter(null);
        }
        if (\array_key_exists('ending_before', $data) && $data['ending_before'] !== null) {
            $object->setEndingBefore($data['ending_before']);
        }
        elseif (\array_key_exists('ending_before', $data) && $data['ending_before'] === null) {
            $object->setEndingBefore(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['from'] = $data->getFrom();
        $dataArray['to'] = $data->getTo();
        if ($data->isInitialized('timezone') && null !== $data->getTimezone()) {
            $dataArray['timezone'] = $data->getTimezone();
        }
        $values = [];
        foreach ($data->getMetrics() as $value) {
            $values[] = $value;
        }
        $dataArray['metrics'] = $values;
        if ($data->isInitialized('groupBy') && null !== $data->getGroupBy()) {
            $dataArray['group_by'] = $data->getGroupBy();
        }
        if ($data->isInitialized('grain') && null !== $data->getGrain()) {
            $dataArray['grain'] = $data->getGrain();
        }
        if ($data->isInitialized('filters') && null !== $data->getFilters()) {
            $dataArray['filters'] = $this->normalizer->normalize($data->getFilters(), 'json', $context);
        }
        if ($data->isInitialized('sort') && null !== $data->getSort()) {
            $dataArray['sort'] = $data->getSort();
        }
        if ($data->isInitialized('order') && null !== $data->getOrder()) {
            $dataArray['order'] = $data->getOrder();
        }
        if ($data->isInitialized('limit') && null !== $data->getLimit()) {
            $dataArray['limit'] = $data->getLimit();
        }
        if ($data->isInitialized('startingAfter') && null !== $data->getStartingAfter()) {
            $dataArray['starting_after'] = $data->getStartingAfter();
        }
        if ($data->isInitialized('endingBefore') && null !== $data->getEndingBefore()) {
            $dataArray['ending_before'] = $data->getEndingBefore();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsQueryRequest::class => false];
    }
}
