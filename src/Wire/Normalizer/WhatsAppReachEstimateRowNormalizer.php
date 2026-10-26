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
class WhatsAppReachEstimateRowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppReachEstimateRow::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppReachEstimateRow::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppReachEstimateRow();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('cost_lower_bound', $data) && \is_int($data['cost_lower_bound'])) {
            $data['cost_lower_bound'] = (float) $data['cost_lower_bound'];
        }
        if (\array_key_exists('cost_upper_bound', $data) && \is_int($data['cost_upper_bound'])) {
            $data['cost_upper_bound'] = (float) $data['cost_upper_bound'];
        }
        if (\array_key_exists('bid_amount', $data) && $data['bid_amount'] !== null) {
            $object->setBidAmount($data['bid_amount']);
        }
        elseif (\array_key_exists('bid_amount', $data) && $data['bid_amount'] === null) {
            $object->setBidAmount(null);
        }
        if (\array_key_exists('users', $data) && $data['users'] !== null) {
            $object->setUsers($data['users']);
        }
        elseif (\array_key_exists('users', $data) && $data['users'] === null) {
            $object->setUsers(null);
        }
        if (\array_key_exists('deliveries_lower_bound', $data) && $data['deliveries_lower_bound'] !== null) {
            $object->setDeliveriesLowerBound($data['deliveries_lower_bound']);
        }
        elseif (\array_key_exists('deliveries_lower_bound', $data) && $data['deliveries_lower_bound'] === null) {
            $object->setDeliveriesLowerBound(null);
        }
        if (\array_key_exists('deliveries_upper_bound', $data) && $data['deliveries_upper_bound'] !== null) {
            $object->setDeliveriesUpperBound($data['deliveries_upper_bound']);
        }
        elseif (\array_key_exists('deliveries_upper_bound', $data) && $data['deliveries_upper_bound'] === null) {
            $object->setDeliveriesUpperBound(null);
        }
        if (\array_key_exists('cost_lower_bound', $data) && $data['cost_lower_bound'] !== null) {
            $object->setCostLowerBound($data['cost_lower_bound']);
        }
        elseif (\array_key_exists('cost_lower_bound', $data) && $data['cost_lower_bound'] === null) {
            $object->setCostLowerBound(null);
        }
        if (\array_key_exists('cost_upper_bound', $data) && $data['cost_upper_bound'] !== null) {
            $object->setCostUpperBound($data['cost_upper_bound']);
        }
        elseif (\array_key_exists('cost_upper_bound', $data) && $data['cost_upper_bound'] === null) {
            $object->setCostUpperBound(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['bid_amount'] = $data->getBidAmount();
        $dataArray['users'] = $data->getUsers();
        $dataArray['deliveries_lower_bound'] = $data->getDeliveriesLowerBound();
        $dataArray['deliveries_upper_bound'] = $data->getDeliveriesUpperBound();
        $dataArray['cost_lower_bound'] = $data->getCostLowerBound();
        $dataArray['cost_upper_bound'] = $data->getCostUpperBound();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppReachEstimateRow::class => false];
    }
}
