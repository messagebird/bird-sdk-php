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
class AMBStatsComparisonDeltaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBStatsComparisonDelta::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBStatsComparisonDelta::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBStatsComparisonDelta();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('accepted_pct_change', $data) && \is_int($data['accepted_pct_change'])) {
            $data['accepted_pct_change'] = (float) $data['accepted_pct_change'];
        }
        if (\array_key_exists('sent_pct_change', $data) && \is_int($data['sent_pct_change'])) {
            $data['sent_pct_change'] = (float) $data['sent_pct_change'];
        }
        if (\array_key_exists('send_failed_pct_change', $data) && \is_int($data['send_failed_pct_change'])) {
            $data['send_failed_pct_change'] = (float) $data['send_failed_pct_change'];
        }
        if (\array_key_exists('rejected_pct_change', $data) && \is_int($data['rejected_pct_change'])) {
            $data['rejected_pct_change'] = (float) $data['rejected_pct_change'];
        }
        if (\array_key_exists('accepted_pct_change', $data) && $data['accepted_pct_change'] !== null) {
            $object->setAcceptedPctChange($data['accepted_pct_change']);
        }
        elseif (\array_key_exists('accepted_pct_change', $data) && $data['accepted_pct_change'] === null) {
            $object->setAcceptedPctChange(null);
        }
        if (\array_key_exists('sent_pct_change', $data) && $data['sent_pct_change'] !== null) {
            $object->setSentPctChange($data['sent_pct_change']);
        }
        elseif (\array_key_exists('sent_pct_change', $data) && $data['sent_pct_change'] === null) {
            $object->setSentPctChange(null);
        }
        if (\array_key_exists('send_failed_pct_change', $data) && $data['send_failed_pct_change'] !== null) {
            $object->setSendFailedPctChange($data['send_failed_pct_change']);
        }
        elseif (\array_key_exists('send_failed_pct_change', $data) && $data['send_failed_pct_change'] === null) {
            $object->setSendFailedPctChange(null);
        }
        if (\array_key_exists('rejected_pct_change', $data) && $data['rejected_pct_change'] !== null) {
            $object->setRejectedPctChange($data['rejected_pct_change']);
        }
        elseif (\array_key_exists('rejected_pct_change', $data) && $data['rejected_pct_change'] === null) {
            $object->setRejectedPctChange(null);
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
        return [\MessageBird\Wire\Model\AMBStatsComparisonDelta::class => false];
    }
}
