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
class SMSStatsComparisonDeltaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSStatsComparisonDelta::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSStatsComparisonDelta::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSStatsComparisonDelta();
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
        if (\array_key_exists('delivered_pct_change', $data) && \is_int($data['delivered_pct_change'])) {
            $data['delivered_pct_change'] = (float) $data['delivered_pct_change'];
        }
        if (\array_key_exists('undelivered_pct_change', $data) && \is_int($data['undelivered_pct_change'])) {
            $data['undelivered_pct_change'] = (float) $data['undelivered_pct_change'];
        }
        if (\array_key_exists('failed_pct_change', $data) && \is_int($data['failed_pct_change'])) {
            $data['failed_pct_change'] = (float) $data['failed_pct_change'];
        }
        if (\array_key_exists('rejected_pct_change', $data) && \is_int($data['rejected_pct_change'])) {
            $data['rejected_pct_change'] = (float) $data['rejected_pct_change'];
        }
        if (\array_key_exists('expired_pct_change', $data) && \is_int($data['expired_pct_change'])) {
            $data['expired_pct_change'] = (float) $data['expired_pct_change'];
        }
        if (\array_key_exists('delivery_rate_pp', $data) && \is_int($data['delivery_rate_pp'])) {
            $data['delivery_rate_pp'] = (float) $data['delivery_rate_pp'];
        }
        if (\array_key_exists('failure_rate_pp', $data) && \is_int($data['failure_rate_pp'])) {
            $data['failure_rate_pp'] = (float) $data['failure_rate_pp'];
        }
        if (\array_key_exists('accepted_pct_change', $data) && $data['accepted_pct_change'] !== null) {
            $object->setAcceptedPctChange($data['accepted_pct_change']);
            unset($data['accepted_pct_change']);
        }
        elseif (\array_key_exists('accepted_pct_change', $data) && $data['accepted_pct_change'] === null) {
            $object->setAcceptedPctChange(null);
        }
        if (\array_key_exists('sent_pct_change', $data) && $data['sent_pct_change'] !== null) {
            $object->setSentPctChange($data['sent_pct_change']);
            unset($data['sent_pct_change']);
        }
        elseif (\array_key_exists('sent_pct_change', $data) && $data['sent_pct_change'] === null) {
            $object->setSentPctChange(null);
        }
        if (\array_key_exists('delivered_pct_change', $data) && $data['delivered_pct_change'] !== null) {
            $object->setDeliveredPctChange($data['delivered_pct_change']);
            unset($data['delivered_pct_change']);
        }
        elseif (\array_key_exists('delivered_pct_change', $data) && $data['delivered_pct_change'] === null) {
            $object->setDeliveredPctChange(null);
        }
        if (\array_key_exists('undelivered_pct_change', $data) && $data['undelivered_pct_change'] !== null) {
            $object->setUndeliveredPctChange($data['undelivered_pct_change']);
            unset($data['undelivered_pct_change']);
        }
        elseif (\array_key_exists('undelivered_pct_change', $data) && $data['undelivered_pct_change'] === null) {
            $object->setUndeliveredPctChange(null);
        }
        if (\array_key_exists('failed_pct_change', $data) && $data['failed_pct_change'] !== null) {
            $object->setFailedPctChange($data['failed_pct_change']);
            unset($data['failed_pct_change']);
        }
        elseif (\array_key_exists('failed_pct_change', $data) && $data['failed_pct_change'] === null) {
            $object->setFailedPctChange(null);
        }
        if (\array_key_exists('rejected_pct_change', $data) && $data['rejected_pct_change'] !== null) {
            $object->setRejectedPctChange($data['rejected_pct_change']);
            unset($data['rejected_pct_change']);
        }
        elseif (\array_key_exists('rejected_pct_change', $data) && $data['rejected_pct_change'] === null) {
            $object->setRejectedPctChange(null);
        }
        if (\array_key_exists('expired_pct_change', $data) && $data['expired_pct_change'] !== null) {
            $object->setExpiredPctChange($data['expired_pct_change']);
            unset($data['expired_pct_change']);
        }
        elseif (\array_key_exists('expired_pct_change', $data) && $data['expired_pct_change'] === null) {
            $object->setExpiredPctChange(null);
        }
        if (\array_key_exists('delivery_rate_pp', $data) && $data['delivery_rate_pp'] !== null) {
            $object->setDeliveryRatePp($data['delivery_rate_pp']);
            unset($data['delivery_rate_pp']);
        }
        elseif (\array_key_exists('delivery_rate_pp', $data) && $data['delivery_rate_pp'] === null) {
            $object->setDeliveryRatePp(null);
        }
        if (\array_key_exists('failure_rate_pp', $data) && $data['failure_rate_pp'] !== null) {
            $object->setFailureRatePp($data['failure_rate_pp']);
            unset($data['failure_rate_pp']);
        }
        elseif (\array_key_exists('failure_rate_pp', $data) && $data['failure_rate_pp'] === null) {
            $object->setFailureRatePp(null);
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
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSStatsComparisonDelta::class => false];
    }
}
