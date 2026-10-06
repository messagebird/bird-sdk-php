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
class EsimRecurringSubscriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimRecurringSubscription::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimRecurringSubscription::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimRecurringSubscription();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('cancel_at_period_end', $data) && \is_int($data['cancel_at_period_end'])) {
            $data['cancel_at_period_end'] = (bool) $data['cancel_at_period_end'];
        }
        if (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] !== null) {
            $object->setDeliveryMode($data['delivery_mode']);
        }
        elseif (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] === null) {
            $object->setDeliveryMode(null);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('esim_id', $data) && $data['esim_id'] !== null) {
            $object->setEsimId($data['esim_id']);
        }
        elseif (\array_key_exists('esim_id', $data) && $data['esim_id'] === null) {
            $object->setEsimId(null);
        }
        if (\array_key_exists('initial_order_id', $data) && $data['initial_order_id'] !== null) {
            $object->setInitialOrderId($data['initial_order_id']);
        }
        elseif (\array_key_exists('initial_order_id', $data) && $data['initial_order_id'] === null) {
            $object->setInitialOrderId(null);
        }
        if (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] !== null) {
            $object->setSubscriberId($data['subscriber_id']);
        }
        elseif (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] === null) {
            $object->setSubscriberId(null);
        }
        if (\array_key_exists('offer_id', $data) && $data['offer_id'] !== null) {
            $object->setOfferId($data['offer_id']);
        }
        elseif (\array_key_exists('offer_id', $data) && $data['offer_id'] === null) {
            $object->setOfferId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('billing_status', $data) && $data['billing_status'] !== null) {
            $object->setBillingStatus($data['billing_status']);
        }
        elseif (\array_key_exists('billing_status', $data) && $data['billing_status'] === null) {
            $object->setBillingStatus(null);
        }
        if (\array_key_exists('current_period_start', $data) && $data['current_period_start'] !== null) {
            $object->setCurrentPeriodStart(new \DateTime($data['current_period_start']));
        }
        elseif (\array_key_exists('current_period_start', $data) && $data['current_period_start'] === null) {
            $object->setCurrentPeriodStart(null);
        }
        if (\array_key_exists('current_period_end', $data) && $data['current_period_end'] !== null) {
            $object->setCurrentPeriodEnd(new \DateTime($data['current_period_end']));
        }
        elseif (\array_key_exists('current_period_end', $data) && $data['current_period_end'] === null) {
            $object->setCurrentPeriodEnd(null);
        }
        if (\array_key_exists('cancel_at_period_end', $data) && $data['cancel_at_period_end'] !== null) {
            $object->setCancelAtPeriodEnd($data['cancel_at_period_end']);
        }
        elseif (\array_key_exists('cancel_at_period_end', $data) && $data['cancel_at_period_end'] === null) {
            $object->setCancelAtPeriodEnd(null);
        }
        if (\array_key_exists('latest_order_id', $data) && $data['latest_order_id'] !== null) {
            $object->setLatestOrderId($data['latest_order_id']);
        }
        elseif (\array_key_exists('latest_order_id', $data) && $data['latest_order_id'] === null) {
            $object->setLatestOrderId(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('price', $data) && $data['price'] !== null) {
            $object->setPrice($this->denormalizer->denormalize($data['price'], \MessageBird\Wire\Model\EsimRecurringSubscriptionPrice::class, 'json', $context));
        }
        elseif (\array_key_exists('price', $data) && $data['price'] === null) {
            $object->setPrice(null);
        }
        if (\array_key_exists('model', $data) && $data['model'] !== null) {
            $object->setModel($data['model']);
        }
        elseif (\array_key_exists('model', $data) && $data['model'] === null) {
            $object->setModel(null);
        }
        if (\array_key_exists('interval_count', $data) && $data['interval_count'] !== null) {
            $object->setIntervalCount($data['interval_count']);
        }
        elseif (\array_key_exists('interval_count', $data) && $data['interval_count'] === null) {
            $object->setIntervalCount(null);
        }
        if (\array_key_exists('next_renewal_at', $data) && $data['next_renewal_at'] !== null) {
            $object->setNextRenewalAt(new \DateTime($data['next_renewal_at']));
        }
        elseif (\array_key_exists('next_renewal_at', $data) && $data['next_renewal_at'] === null) {
            $object->setNextRenewalAt(null);
        }
        if (\array_key_exists('cancellation_effective_at', $data) && $data['cancellation_effective_at'] !== null) {
            $object->setCancellationEffectiveAt(new \DateTime($data['cancellation_effective_at']));
        }
        elseif (\array_key_exists('cancellation_effective_at', $data) && $data['cancellation_effective_at'] === null) {
            $object->setCancellationEffectiveAt(null);
        }
        if (\array_key_exists('stop_reason', $data) && $data['stop_reason'] !== null) {
            $object->setStopReason($data['stop_reason']);
        }
        elseif (\array_key_exists('stop_reason', $data) && $data['stop_reason'] === null) {
            $object->setStopReason(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        $dataArray['id'] = $data->getId();
        $dataArray['esim_id'] = $data->getEsimId();
        $dataArray['initial_order_id'] = $data->getInitialOrderId();
        $dataArray['subscriber_id'] = $data->getSubscriberId();
        $dataArray['offer_id'] = $data->getOfferId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['billing_status'] = $data->getBillingStatus();
        $dataArray['current_period_start'] = $data->getCurrentPeriodStart()?->format('Y-m-d\TH:i:sP');
        $dataArray['current_period_end'] = $data->getCurrentPeriodEnd()?->format('Y-m-d\TH:i:sP');
        $dataArray['cancel_at_period_end'] = $data->getCancelAtPeriodEnd();
        $dataArray['latest_order_id'] = $data->getLatestOrderId();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['price'] = $this->normalizer->normalize($data->getPrice(), 'json', $context);
        $dataArray['model'] = $data->getModel();
        $dataArray['interval_count'] = $data->getIntervalCount();
        $dataArray['next_renewal_at'] = $data->getNextRenewalAt()?->format('Y-m-d\TH:i:sP');
        $dataArray['cancellation_effective_at'] = $data->getCancellationEffectiveAt()?->format('Y-m-d\TH:i:sP');
        $dataArray['stop_reason'] = $data->getStopReason();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimRecurringSubscription::class => false];
    }
}
