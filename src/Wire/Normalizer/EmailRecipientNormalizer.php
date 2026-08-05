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
class EmailRecipientNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailRecipient::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailRecipient::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailRecipient();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('parent_id', $data) && $data['parent_id'] !== null) {
            $object->setParentId($data['parent_id']);
        }
        elseif (\array_key_exists('parent_id', $data) && $data['parent_id'] === null) {
            $object->setParentId(null);
        }
        if (\array_key_exists('role', $data) && $data['role'] !== null) {
            $object->setRole($data['role']);
        }
        elseif (\array_key_exists('role', $data) && $data['role'] === null) {
            $object->setRole(null);
        }
        if (\array_key_exists('recipient', $data) && $data['recipient'] !== null) {
            $object->setRecipient($data['recipient']);
        }
        elseif (\array_key_exists('recipient', $data) && $data['recipient'] === null) {
            $object->setRecipient(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] !== null) {
            $object->setRejectionReason($data['rejection_reason']);
        }
        elseif (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] === null) {
            $object->setRejectionReason(null);
        }
        if (\array_key_exists('bounce_type', $data) && $data['bounce_type'] !== null) {
            $object->setBounceType($data['bounce_type']);
        }
        elseif (\array_key_exists('bounce_type', $data) && $data['bounce_type'] === null) {
            $object->setBounceType(null);
        }
        if (\array_key_exists('bounce_code', $data) && $data['bounce_code'] !== null) {
            $object->setBounceCode($data['bounce_code']);
        }
        elseif (\array_key_exists('bounce_code', $data) && $data['bounce_code'] === null) {
            $object->setBounceCode(null);
        }
        if (\array_key_exists('bounce_description', $data) && $data['bounce_description'] !== null) {
            $object->setBounceDescription($data['bounce_description']);
        }
        elseif (\array_key_exists('bounce_description', $data) && $data['bounce_description'] === null) {
            $object->setBounceDescription(null);
        }
        if (\array_key_exists('processed_at', $data) && $data['processed_at'] !== null) {
            $object->setProcessedAt(new \DateTime($data['processed_at']));
        }
        elseif (\array_key_exists('processed_at', $data) && $data['processed_at'] === null) {
            $object->setProcessedAt(null);
        }
        if (\array_key_exists('delivered_at', $data) && $data['delivered_at'] !== null) {
            $object->setDeliveredAt(new \DateTime($data['delivered_at']));
        }
        elseif (\array_key_exists('delivered_at', $data) && $data['delivered_at'] === null) {
            $object->setDeliveredAt(null);
        }
        if (\array_key_exists('processing_latency_ms', $data) && $data['processing_latency_ms'] !== null) {
            $object->setProcessingLatencyMs($data['processing_latency_ms']);
        }
        elseif (\array_key_exists('processing_latency_ms', $data) && $data['processing_latency_ms'] === null) {
            $object->setProcessingLatencyMs(null);
        }
        if (\array_key_exists('delivery_latency_ms', $data) && $data['delivery_latency_ms'] !== null) {
            $object->setDeliveryLatencyMs($data['delivery_latency_ms']);
        }
        elseif (\array_key_exists('delivery_latency_ms', $data) && $data['delivery_latency_ms'] === null) {
            $object->setDeliveryLatencyMs(null);
        }
        if (\array_key_exists('total_latency_ms', $data) && $data['total_latency_ms'] !== null) {
            $object->setTotalLatencyMs($data['total_latency_ms']);
        }
        elseif (\array_key_exists('total_latency_ms', $data) && $data['total_latency_ms'] === null) {
            $object->setTotalLatencyMs(null);
        }
        if (\array_key_exists('open_count', $data) && $data['open_count'] !== null) {
            $object->setOpenCount($data['open_count']);
        }
        elseif (\array_key_exists('open_count', $data) && $data['open_count'] === null) {
            $object->setOpenCount(null);
        }
        if (\array_key_exists('click_count', $data) && $data['click_count'] !== null) {
            $object->setClickCount($data['click_count']);
        }
        elseif (\array_key_exists('click_count', $data) && $data['click_count'] === null) {
            $object->setClickCount(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['parent_id'] = $data->getParentId();
        $dataArray['role'] = $data->getRole();
        $dataArray['recipient'] = $data->getRecipient();
        if ($data->isInitialized('name')) {
            $dataArray['name'] = $data->getName();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailRecipient::class => false];
    }
}
