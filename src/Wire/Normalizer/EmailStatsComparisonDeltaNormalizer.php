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
class EmailStatsComparisonDeltaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsComparisonDelta::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsComparisonDelta::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsComparisonDelta();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sends_accepted_pct_change', $data) && \is_int($data['sends_accepted_pct_change'])) {
            $data['sends_accepted_pct_change'] = (float) $data['sends_accepted_pct_change'];
        }
        if (\array_key_exists('delivered_pct_change', $data) && \is_int($data['delivered_pct_change'])) {
            $data['delivered_pct_change'] = (float) $data['delivered_pct_change'];
        }
        if (\array_key_exists('bounced_pct_change', $data) && \is_int($data['bounced_pct_change'])) {
            $data['bounced_pct_change'] = (float) $data['bounced_pct_change'];
        }
        if (\array_key_exists('complained_pct_change', $data) && \is_int($data['complained_pct_change'])) {
            $data['complained_pct_change'] = (float) $data['complained_pct_change'];
        }
        if (\array_key_exists('opened_pct_change', $data) && \is_int($data['opened_pct_change'])) {
            $data['opened_pct_change'] = (float) $data['opened_pct_change'];
        }
        if (\array_key_exists('delivery_rate_pp', $data) && \is_int($data['delivery_rate_pp'])) {
            $data['delivery_rate_pp'] = (float) $data['delivery_rate_pp'];
        }
        if (\array_key_exists('open_rate_pp', $data) && \is_int($data['open_rate_pp'])) {
            $data['open_rate_pp'] = (float) $data['open_rate_pp'];
        }
        if (\array_key_exists('click_rate_pp', $data) && \is_int($data['click_rate_pp'])) {
            $data['click_rate_pp'] = (float) $data['click_rate_pp'];
        }
        if (\array_key_exists('bounce_rate_pp', $data) && \is_int($data['bounce_rate_pp'])) {
            $data['bounce_rate_pp'] = (float) $data['bounce_rate_pp'];
        }
        if (\array_key_exists('complaint_rate_pp', $data) && \is_int($data['complaint_rate_pp'])) {
            $data['complaint_rate_pp'] = (float) $data['complaint_rate_pp'];
        }
        if (\array_key_exists('unsubscribe_rate_pp', $data) && \is_int($data['unsubscribe_rate_pp'])) {
            $data['unsubscribe_rate_pp'] = (float) $data['unsubscribe_rate_pp'];
        }
        if (\array_key_exists('sends_accepted_pct_change', $data) && $data['sends_accepted_pct_change'] !== null) {
            $object->setSendsAcceptedPctChange($data['sends_accepted_pct_change']);
            unset($data['sends_accepted_pct_change']);
        }
        elseif (\array_key_exists('sends_accepted_pct_change', $data) && $data['sends_accepted_pct_change'] === null) {
            $object->setSendsAcceptedPctChange(null);
        }
        if (\array_key_exists('delivered_pct_change', $data) && $data['delivered_pct_change'] !== null) {
            $object->setDeliveredPctChange($data['delivered_pct_change']);
            unset($data['delivered_pct_change']);
        }
        elseif (\array_key_exists('delivered_pct_change', $data) && $data['delivered_pct_change'] === null) {
            $object->setDeliveredPctChange(null);
        }
        if (\array_key_exists('bounced_pct_change', $data) && $data['bounced_pct_change'] !== null) {
            $object->setBouncedPctChange($data['bounced_pct_change']);
            unset($data['bounced_pct_change']);
        }
        elseif (\array_key_exists('bounced_pct_change', $data) && $data['bounced_pct_change'] === null) {
            $object->setBouncedPctChange(null);
        }
        if (\array_key_exists('complained_pct_change', $data) && $data['complained_pct_change'] !== null) {
            $object->setComplainedPctChange($data['complained_pct_change']);
            unset($data['complained_pct_change']);
        }
        elseif (\array_key_exists('complained_pct_change', $data) && $data['complained_pct_change'] === null) {
            $object->setComplainedPctChange(null);
        }
        if (\array_key_exists('opened_pct_change', $data) && $data['opened_pct_change'] !== null) {
            $object->setOpenedPctChange($data['opened_pct_change']);
            unset($data['opened_pct_change']);
        }
        elseif (\array_key_exists('opened_pct_change', $data) && $data['opened_pct_change'] === null) {
            $object->setOpenedPctChange(null);
        }
        if (\array_key_exists('delivery_rate_pp', $data) && $data['delivery_rate_pp'] !== null) {
            $object->setDeliveryRatePp($data['delivery_rate_pp']);
            unset($data['delivery_rate_pp']);
        }
        elseif (\array_key_exists('delivery_rate_pp', $data) && $data['delivery_rate_pp'] === null) {
            $object->setDeliveryRatePp(null);
        }
        if (\array_key_exists('open_rate_pp', $data) && $data['open_rate_pp'] !== null) {
            $object->setOpenRatePp($data['open_rate_pp']);
            unset($data['open_rate_pp']);
        }
        elseif (\array_key_exists('open_rate_pp', $data) && $data['open_rate_pp'] === null) {
            $object->setOpenRatePp(null);
        }
        if (\array_key_exists('click_rate_pp', $data) && $data['click_rate_pp'] !== null) {
            $object->setClickRatePp($data['click_rate_pp']);
            unset($data['click_rate_pp']);
        }
        elseif (\array_key_exists('click_rate_pp', $data) && $data['click_rate_pp'] === null) {
            $object->setClickRatePp(null);
        }
        if (\array_key_exists('bounce_rate_pp', $data) && $data['bounce_rate_pp'] !== null) {
            $object->setBounceRatePp($data['bounce_rate_pp']);
            unset($data['bounce_rate_pp']);
        }
        elseif (\array_key_exists('bounce_rate_pp', $data) && $data['bounce_rate_pp'] === null) {
            $object->setBounceRatePp(null);
        }
        if (\array_key_exists('complaint_rate_pp', $data) && $data['complaint_rate_pp'] !== null) {
            $object->setComplaintRatePp($data['complaint_rate_pp']);
            unset($data['complaint_rate_pp']);
        }
        elseif (\array_key_exists('complaint_rate_pp', $data) && $data['complaint_rate_pp'] === null) {
            $object->setComplaintRatePp(null);
        }
        if (\array_key_exists('unsubscribe_rate_pp', $data) && $data['unsubscribe_rate_pp'] !== null) {
            $object->setUnsubscribeRatePp($data['unsubscribe_rate_pp']);
            unset($data['unsubscribe_rate_pp']);
        }
        elseif (\array_key_exists('unsubscribe_rate_pp', $data) && $data['unsubscribe_rate_pp'] === null) {
            $object->setUnsubscribeRatePp(null);
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
        return [\MessageBird\Wire\Model\EmailStatsComparisonDelta::class => false];
    }
}
