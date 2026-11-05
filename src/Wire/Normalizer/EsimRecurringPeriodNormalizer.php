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
class EsimRecurringPeriodNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EsimRecurringPeriod::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EsimRecurringPeriod::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EsimRecurringPeriod();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] !== null) {
            $object->setDeliveryMode($data['delivery_mode']);
        }
        elseif (\array_key_exists('delivery_mode', $data) && $data['delivery_mode'] === null) {
            $object->setDeliveryMode(null);
        }
        if (\array_key_exists('period_start', $data) && $data['period_start'] !== null) {
            $object->setPeriodStart(new \DateTime($data['period_start']));
        }
        elseif (\array_key_exists('period_start', $data) && $data['period_start'] === null) {
            $object->setPeriodStart(null);
        }
        if (\array_key_exists('period_end', $data) && $data['period_end'] !== null) {
            $object->setPeriodEnd(new \DateTime($data['period_end']));
        }
        elseif (\array_key_exists('period_end', $data) && $data['period_end'] === null) {
            $object->setPeriodEnd(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('net_amount', $data) && $data['net_amount'] !== null) {
            $object->setNetAmount($this->denormalizer->denormalize($data['net_amount'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('net_amount', $data) && $data['net_amount'] === null) {
            $object->setNetAmount(null);
        }
        if (\array_key_exists('tax_amount', $data) && $data['tax_amount'] !== null) {
            $object->setTaxAmount($this->denormalizer->denormalize($data['tax_amount'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('tax_amount', $data) && $data['tax_amount'] === null) {
            $object->setTaxAmount(null);
        }
        if (\array_key_exists('total_amount', $data) && $data['total_amount'] !== null) {
            $object->setTotalAmount($this->denormalizer->denormalize($data['total_amount'], \MessageBird\Wire\Model\Money::class, 'json', $context));
        }
        elseif (\array_key_exists('total_amount', $data) && $data['total_amount'] === null) {
            $object->setTotalAmount(null);
        }
        if (\array_key_exists('wallet_transaction_id', $data) && $data['wallet_transaction_id'] !== null) {
            $object->setWalletTransactionId($data['wallet_transaction_id']);
        }
        elseif (\array_key_exists('wallet_transaction_id', $data) && $data['wallet_transaction_id'] === null) {
            $object->setWalletTransactionId(null);
        }
        if (\array_key_exists('refund_transaction_id', $data) && $data['refund_transaction_id'] !== null) {
            $object->setRefundTransactionId($data['refund_transaction_id']);
        }
        elseif (\array_key_exists('refund_transaction_id', $data) && $data['refund_transaction_id'] === null) {
            $object->setRefundTransactionId(null);
        }
        if (\array_key_exists('order_id', $data) && $data['order_id'] !== null) {
            $object->setOrderId($data['order_id']);
        }
        elseif (\array_key_exists('order_id', $data) && $data['order_id'] === null) {
            $object->setOrderId(null);
        }
        if (\array_key_exists('order_status', $data) && $data['order_status'] !== null) {
            $object->setOrderStatus($data['order_status']);
        }
        elseif (\array_key_exists('order_status', $data) && $data['order_status'] === null) {
            $object->setOrderStatus(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('deliveryMode')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.delivery_mode missing');
        }
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        if (!$data->isInitialized('periodStart')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.period_start missing');
        }
        $dataArray['period_start'] = $data->getPeriodStart()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('periodEnd')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.period_end missing');
        }
        $dataArray['period_end'] = $data->getPeriodEnd()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('status')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.status missing');
        }
        $dataArray['status'] = $data->getStatus();
        if (!$data->isInitialized('netAmount')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.net_amount missing');
        }
        $dataArray['net_amount'] = $this->normalizer->normalize($data->getNetAmount(), 'json', $context);
        if (!$data->isInitialized('taxAmount')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.tax_amount missing');
        }
        $dataArray['tax_amount'] = $this->normalizer->normalize($data->getTaxAmount(), 'json', $context);
        if (!$data->isInitialized('totalAmount')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.total_amount missing');
        }
        $dataArray['total_amount'] = $this->normalizer->normalize($data->getTotalAmount(), 'json', $context);
        if (!$data->isInitialized('walletTransactionId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.wallet_transaction_id missing');
        }
        $dataArray['wallet_transaction_id'] = $data->getWalletTransactionId();
        if (!$data->isInitialized('refundTransactionId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.refund_transaction_id missing');
        }
        $dataArray['refund_transaction_id'] = $data->getRefundTransactionId();
        if (!$data->isInitialized('orderId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.order_id missing');
        }
        $dataArray['order_id'] = $data->getOrderId();
        if (!$data->isInitialized('orderStatus')) {
            throw new \MessageBird\Exception\RequestValidationException('required field EsimRecurringPeriod.order_status missing');
        }
        $dataArray['order_status'] = $data->getOrderStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EsimRecurringPeriod::class => false];
    }
}
