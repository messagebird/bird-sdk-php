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
class EsimOrderNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimOrder::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimOrder::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimOrder();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('mode', $data) && $data['mode'] !== null) {
            $object->setMode($data['mode']);
            unset($data['mode']);
        }
        elseif (\array_key_exists('mode', $data) && $data['mode'] === null) {
            $object->setMode(null);
        }
        if (\array_key_exists('offer_id', $data) && $data['offer_id'] !== null) {
            $object->setOfferId($data['offer_id']);
            unset($data['offer_id']);
        }
        elseif (\array_key_exists('offer_id', $data) && $data['offer_id'] === null) {
            $object->setOfferId(null);
        }
        if (\array_key_exists('offer_revision', $data) && $data['offer_revision'] !== null) {
            $object->setOfferRevision($data['offer_revision']);
            unset($data['offer_revision']);
        }
        elseif (\array_key_exists('offer_revision', $data) && $data['offer_revision'] === null) {
            $object->setOfferRevision(null);
        }
        if (\array_key_exists('zone_id', $data) && $data['zone_id'] !== null) {
            $object->setZoneId($data['zone_id']);
            unset($data['zone_id']);
        }
        elseif (\array_key_exists('zone_id', $data) && $data['zone_id'] === null) {
            $object->setZoneId(null);
        }
        if (\array_key_exists('esim_id', $data) && $data['esim_id'] !== null) {
            $object->setEsimId($data['esim_id']);
            unset($data['esim_id']);
        }
        elseif (\array_key_exists('esim_id', $data) && $data['esim_id'] === null) {
            $object->setEsimId(null);
        }
        if (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] !== null) {
            $object->setSubscriberId($data['subscriber_id']);
            unset($data['subscriber_id']);
        }
        elseif (\array_key_exists('subscriber_id', $data) && $data['subscriber_id'] === null) {
            $object->setSubscriberId(null);
        }
        if (\array_key_exists('recurring_subscription_id', $data) && $data['recurring_subscription_id'] !== null) {
            $object->setRecurringSubscriptionId($data['recurring_subscription_id']);
            unset($data['recurring_subscription_id']);
        }
        elseif (\array_key_exists('recurring_subscription_id', $data) && $data['recurring_subscription_id'] === null) {
            $object->setRecurringSubscriptionId(null);
        }
        if (\array_key_exists('package_id', $data) && $data['package_id'] !== null) {
            $object->setPackageId($data['package_id']);
            unset($data['package_id']);
        }
        elseif (\array_key_exists('package_id', $data) && $data['package_id'] === null) {
            $object->setPackageId(null);
        }
        if (\array_key_exists('price', $data) && $data['price'] !== null) {
            $object->setPrice($this->denormalizer->denormalize($data['price'], \MessageBird\Wire\Model\EsimOrderPrice::class, 'json', $context));
            unset($data['price']);
        }
        elseif (\array_key_exists('price', $data) && $data['price'] === null) {
            $object->setPrice(null);
        }
        if (\array_key_exists('wallet_transaction_id', $data) && $data['wallet_transaction_id'] !== null) {
            $object->setWalletTransactionId($data['wallet_transaction_id']);
            unset($data['wallet_transaction_id']);
        }
        elseif (\array_key_exists('wallet_transaction_id', $data) && $data['wallet_transaction_id'] === null) {
            $object->setWalletTransactionId(null);
        }
        if (\array_key_exists('refund_transaction_id', $data) && $data['refund_transaction_id'] !== null) {
            $object->setRefundTransactionId($data['refund_transaction_id']);
            unset($data['refund_transaction_id']);
        }
        elseif (\array_key_exists('refund_transaction_id', $data) && $data['refund_transaction_id'] === null) {
            $object->setRefundTransactionId(null);
        }
        if (\array_key_exists('delivery', $data) && $data['delivery'] !== null) {
            $object->setDelivery($this->denormalizer->denormalize($data['delivery'], \MessageBird\Wire\Model\EsimOrderDelivery::class, 'json', $context));
            unset($data['delivery']);
        }
        elseif (\array_key_exists('delivery', $data) && $data['delivery'] === null) {
            $object->setDelivery(null);
        }
        if (\array_key_exists('funding', $data) && $data['funding'] !== null) {
            $object->setFunding($this->denormalizer->denormalize($data['funding'], \MessageBird\Wire\Model\EsimOrderFunding::class, 'json', $context));
            unset($data['funding']);
        }
        elseif (\array_key_exists('funding', $data) && $data['funding'] === null) {
            $object->setFunding(null);
        }
        if (\array_key_exists('failure_code', $data) && $data['failure_code'] !== null) {
            $object->setFailureCode($data['failure_code']);
            unset($data['failure_code']);
        }
        elseif (\array_key_exists('failure_code', $data) && $data['failure_code'] === null) {
            $object->setFailureCode(null);
        }
        if (\array_key_exists('failure_reason', $data) && $data['failure_reason'] !== null) {
            $object->setFailureReason($data['failure_reason']);
            unset($data['failure_reason']);
        }
        elseif (\array_key_exists('failure_reason', $data) && $data['failure_reason'] === null) {
            $object->setFailureReason(null);
        }
        if (\array_key_exists('completed_at', $data) && $data['completed_at'] !== null) {
            $object->setCompletedAt(new \DateTime($data['completed_at']));
            unset($data['completed_at']);
        }
        elseif (\array_key_exists('completed_at', $data) && $data['completed_at'] === null) {
            $object->setCompletedAt(null);
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
        return [\MessageBird\Wire\Model\EsimOrder::class => false];
    }
}
