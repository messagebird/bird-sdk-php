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
class AMBSuppressionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBSuppression::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBSuppression::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBSuppression();
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
        if (\array_key_exists('business_account_id', $data) && $data['business_account_id'] !== null) {
            $object->setBusinessAccountId($data['business_account_id']);
        }
        elseif (\array_key_exists('business_account_id', $data) && $data['business_account_id'] === null) {
            $object->setBusinessAccountId(null);
        }
        if (\array_key_exists('address', $data) && $data['address'] !== null) {
            $object->setAddress($data['address']);
        }
        elseif (\array_key_exists('address', $data) && $data['address'] === null) {
            $object->setAddress(null);
        }
        if (\array_key_exists('address_type', $data) && $data['address_type'] !== null) {
            $object->setAddressType($data['address_type']);
        }
        elseif (\array_key_exists('address_type', $data) && $data['address_type'] === null) {
            $object->setAddressType(null);
        }
        if (\array_key_exists('reason', $data) && $data['reason'] !== null) {
            $object->setReason($data['reason']);
        }
        elseif (\array_key_exists('reason', $data) && $data['reason'] === null) {
            $object->setReason(null);
        }
        if (\array_key_exists('origin', $data) && $data['origin'] !== null) {
            $object->setOrigin($data['origin']);
        }
        elseif (\array_key_exists('origin', $data) && $data['origin'] === null) {
            $object->setOrigin(null);
        }
        if (\array_key_exists('applies_to', $data) && $data['applies_to'] !== null) {
            $object->setAppliesTo($data['applies_to']);
        }
        elseif (\array_key_exists('applies_to', $data) && $data['applies_to'] === null) {
            $object->setAppliesTo(null);
        }
        if (\array_key_exists('source_message_id', $data) && $data['source_message_id'] !== null) {
            $object->setSourceMessageId($data['source_message_id']);
        }
        elseif (\array_key_exists('source_message_id', $data) && $data['source_message_id'] === null) {
            $object->setSourceMessageId(null);
        }
        if (\array_key_exists('source_event_id', $data) && $data['source_event_id'] !== null) {
            $object->setSourceEventId($data['source_event_id']);
        }
        elseif (\array_key_exists('source_event_id', $data) && $data['source_event_id'] === null) {
            $object->setSourceEventId(null);
        }
        if (\array_key_exists('source_end_message_id', $data) && $data['source_end_message_id'] !== null) {
            $object->setSourceEndMessageId($data['source_end_message_id']);
        }
        elseif (\array_key_exists('source_end_message_id', $data) && $data['source_end_message_id'] === null) {
            $object->setSourceEndMessageId(null);
        }
        if (\array_key_exists('effective_at', $data) && $data['effective_at'] !== null) {
            $object->setEffectiveAt(new \DateTime($data['effective_at']));
        }
        elseif (\array_key_exists('effective_at', $data) && $data['effective_at'] === null) {
            $object->setEffectiveAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('ended_at', $data) && $data['ended_at'] !== null) {
            $object->setEndedAt(new \DateTime($data['ended_at']));
        }
        elseif (\array_key_exists('ended_at', $data) && $data['ended_at'] === null) {
            $object->setEndedAt(null);
        }
        if (\array_key_exists('ended_reason', $data) && $data['ended_reason'] !== null) {
            $object->setEndedReason($data['ended_reason']);
        }
        elseif (\array_key_exists('ended_reason', $data) && $data['ended_reason'] === null) {
            $object->setEndedReason(null);
        }
        if (\array_key_exists('ended_effective_at', $data) && $data['ended_effective_at'] !== null) {
            $object->setEndedEffectiveAt(new \DateTime($data['ended_effective_at']));
        }
        elseif (\array_key_exists('ended_effective_at', $data) && $data['ended_effective_at'] === null) {
            $object->setEndedEffectiveAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['address'] = $data->getAddress();
        $dataArray['address_type'] = $data->getAddressType();
        $dataArray['reason'] = $data->getReason();
        $dataArray['origin'] = $data->getOrigin();
        if ($data->isInitialized('sourceMessageId') && null !== $data->getSourceMessageId()) {
            $dataArray['source_message_id'] = $data->getSourceMessageId();
        }
        if ($data->isInitialized('sourceEventId') && null !== $data->getSourceEventId()) {
            $dataArray['source_event_id'] = $data->getSourceEventId();
        }
        if ($data->isInitialized('sourceEndMessageId') && null !== $data->getSourceEndMessageId()) {
            $dataArray['source_end_message_id'] = $data->getSourceEndMessageId();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBSuppression::class => false];
    }
}
