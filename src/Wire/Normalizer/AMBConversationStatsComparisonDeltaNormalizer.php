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
class AMBConversationStatsComparisonDeltaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversationStatsComparisonDelta::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversationStatsComparisonDelta::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversationStatsComparisonDelta();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('started_pct_change', $data) && \is_int($data['started_pct_change'])) {
            $data['started_pct_change'] = (float) $data['started_pct_change'];
        }
        if (\array_key_exists('reopened_pct_change', $data) && \is_int($data['reopened_pct_change'])) {
            $data['reopened_pct_change'] = (float) $data['reopened_pct_change'];
        }
        if (\array_key_exists('closed_pct_change', $data) && \is_int($data['closed_pct_change'])) {
            $data['closed_pct_change'] = (float) $data['closed_pct_change'];
        }
        if (\array_key_exists('conversations_pct_change', $data) && \is_int($data['conversations_pct_change'])) {
            $data['conversations_pct_change'] = (float) $data['conversations_pct_change'];
        }
        if (\array_key_exists('started_pct_change', $data) && $data['started_pct_change'] !== null) {
            $object->setStartedPctChange($data['started_pct_change']);
        }
        elseif (\array_key_exists('started_pct_change', $data) && $data['started_pct_change'] === null) {
            $object->setStartedPctChange(null);
        }
        if (\array_key_exists('reopened_pct_change', $data) && $data['reopened_pct_change'] !== null) {
            $object->setReopenedPctChange($data['reopened_pct_change']);
        }
        elseif (\array_key_exists('reopened_pct_change', $data) && $data['reopened_pct_change'] === null) {
            $object->setReopenedPctChange(null);
        }
        if (\array_key_exists('closed_pct_change', $data) && $data['closed_pct_change'] !== null) {
            $object->setClosedPctChange($data['closed_pct_change']);
        }
        elseif (\array_key_exists('closed_pct_change', $data) && $data['closed_pct_change'] === null) {
            $object->setClosedPctChange(null);
        }
        if (\array_key_exists('conversations_pct_change', $data) && $data['conversations_pct_change'] !== null) {
            $object->setConversationsPctChange($data['conversations_pct_change']);
        }
        elseif (\array_key_exists('conversations_pct_change', $data) && $data['conversations_pct_change'] === null) {
            $object->setConversationsPctChange(null);
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
        return [\MessageBird\Wire\Model\AMBConversationStatsComparisonDelta::class => false];
    }
}
