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
class BillingWalletNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\BillingWallet::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\BillingWallet::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\BillingWallet();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('provisional', $data) && \is_int($data['provisional'])) {
            $data['provisional'] = (bool) $data['provisional'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('currency_code', $data) && $data['currency_code'] !== null) {
            $object->setCurrencyCode($data['currency_code']);
        }
        elseif (\array_key_exists('currency_code', $data) && $data['currency_code'] === null) {
            $object->setCurrencyCode(null);
        }
        if (\array_key_exists('balance', $data) && $data['balance'] !== null) {
            $object->setBalance($data['balance']);
        }
        elseif (\array_key_exists('balance', $data) && $data['balance'] === null) {
            $object->setBalance(null);
        }
        if (\array_key_exists('settled_balance', $data) && $data['settled_balance'] !== null) {
            $object->setSettledBalance($data['settled_balance']);
        }
        elseif (\array_key_exists('settled_balance', $data) && $data['settled_balance'] === null) {
            $object->setSettledBalance(null);
        }
        if (\array_key_exists('renewal_reserved', $data) && $data['renewal_reserved'] !== null) {
            $object->setRenewalReserved($data['renewal_reserved']);
        }
        elseif (\array_key_exists('renewal_reserved', $data) && $data['renewal_reserved'] === null) {
            $object->setRenewalReserved(null);
        }
        if (\array_key_exists('renewal_required', $data) && $data['renewal_required'] !== null) {
            $object->setRenewalRequired($data['renewal_required']);
        }
        elseif (\array_key_exists('renewal_required', $data) && $data['renewal_required'] === null) {
            $object->setRenewalRequired(null);
        }
        if (\array_key_exists('collection_status', $data) && $data['collection_status'] !== null) {
            $object->setCollectionStatus($data['collection_status']);
        }
        elseif (\array_key_exists('collection_status', $data) && $data['collection_status'] === null) {
            $object->setCollectionStatus(null);
        }
        if (\array_key_exists('collection_renewal', $data) && $data['collection_renewal'] !== null) {
            $object->setCollectionRenewal($data['collection_renewal']);
        }
        elseif (\array_key_exists('collection_renewal', $data) && $data['collection_renewal'] === null) {
            $object->setCollectionRenewal(null);
        }
        if (\array_key_exists('collection_required', $data) && $data['collection_required'] !== null) {
            $object->setCollectionRequired($data['collection_required']);
        }
        elseif (\array_key_exists('collection_required', $data) && $data['collection_required'] === null) {
            $object->setCollectionRequired(null);
        }
        if (\array_key_exists('collection_usage_buffer', $data) && $data['collection_usage_buffer'] !== null) {
            $object->setCollectionUsageBuffer($data['collection_usage_buffer']);
        }
        elseif (\array_key_exists('collection_usage_buffer', $data) && $data['collection_usage_buffer'] === null) {
            $object->setCollectionUsageBuffer(null);
        }
        if (\array_key_exists('collection_deficit', $data) && $data['collection_deficit'] !== null) {
            $object->setCollectionDeficit($data['collection_deficit']);
        }
        elseif (\array_key_exists('collection_deficit', $data) && $data['collection_deficit'] === null) {
            $object->setCollectionDeficit(null);
        }
        if (\array_key_exists('credit_limit', $data) && $data['credit_limit'] !== null) {
            $object->setCreditLimit($data['credit_limit']);
        }
        elseif (\array_key_exists('credit_limit', $data) && $data['credit_limit'] === null) {
            $object->setCreditLimit(null);
        }
        if (\array_key_exists('provisional', $data) && $data['provisional'] !== null) {
            $object->setProvisional($data['provisional']);
        }
        elseif (\array_key_exists('provisional', $data) && $data['provisional'] === null) {
            $object->setProvisional(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['currency_code'] = $data->getCurrencyCode();
        $dataArray['balance'] = $data->getBalance();
        $dataArray['settled_balance'] = $data->getSettledBalance();
        $dataArray['renewal_reserved'] = $data->getRenewalReserved();
        $dataArray['renewal_required'] = $data->getRenewalRequired();
        $dataArray['collection_status'] = $data->getCollectionStatus();
        $dataArray['collection_renewal'] = $data->getCollectionRenewal();
        $dataArray['collection_required'] = $data->getCollectionRequired();
        $dataArray['collection_usage_buffer'] = $data->getCollectionUsageBuffer();
        $dataArray['collection_deficit'] = $data->getCollectionDeficit();
        $dataArray['credit_limit'] = $data->getCreditLimit();
        $dataArray['provisional'] = $data->getProvisional();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\BillingWallet::class => false];
    }
}
