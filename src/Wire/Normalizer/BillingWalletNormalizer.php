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
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('currencyCode')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.currency_code missing');
        }
        $dataArray['currency_code'] = $data->getCurrencyCode();
        if (!$data->isInitialized('balance')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.balance missing');
        }
        $dataArray['balance'] = $data->getBalance();
        if (!$data->isInitialized('settledBalance')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.settled_balance missing');
        }
        $dataArray['settled_balance'] = $data->getSettledBalance();
        if (!$data->isInitialized('renewalReserved')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.renewal_reserved missing');
        }
        $dataArray['renewal_reserved'] = $data->getRenewalReserved();
        if (!$data->isInitialized('renewalRequired')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.renewal_required missing');
        }
        $dataArray['renewal_required'] = $data->getRenewalRequired();
        if (!$data->isInitialized('collectionStatus')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.collection_status missing');
        }
        $dataArray['collection_status'] = $data->getCollectionStatus();
        if (!$data->isInitialized('collectionRenewal')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.collection_renewal missing');
        }
        $dataArray['collection_renewal'] = $data->getCollectionRenewal();
        if (!$data->isInitialized('collectionRequired')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.collection_required missing');
        }
        $dataArray['collection_required'] = $data->getCollectionRequired();
        if (!$data->isInitialized('collectionUsageBuffer')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.collection_usage_buffer missing');
        }
        $dataArray['collection_usage_buffer'] = $data->getCollectionUsageBuffer();
        if (!$data->isInitialized('collectionDeficit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.collection_deficit missing');
        }
        $dataArray['collection_deficit'] = $data->getCollectionDeficit();
        if (!$data->isInitialized('creditLimit')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.credit_limit missing');
        }
        $dataArray['credit_limit'] = $data->getCreditLimit();
        if (!$data->isInitialized('provisional')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.provisional missing');
        }
        $dataArray['provisional'] = $data->getProvisional();
        if (!$data->isInitialized('createdAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.created_at missing');
        }
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        if (!$data->isInitialized('updatedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field BillingWallet.updated_at missing');
        }
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\BillingWallet::class => false];
    }
}
