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
class SMSSuppressionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSSuppression::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSSuppression::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSSuppression();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('blocking', $data) && \is_int($data['blocking'])) {
            $data['blocking'] = (bool) $data['blocking'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('destination', $data) && $data['destination'] !== null) {
            $object->setDestination($data['destination']);
        }
        elseif (\array_key_exists('destination', $data) && $data['destination'] === null) {
            $object->setDestination(null);
        }
        if (\array_key_exists('originator', $data) && $data['originator'] !== null) {
            $object->setOriginator($data['originator']);
        }
        elseif (\array_key_exists('originator', $data) && $data['originator'] === null) {
            $object->setOriginator(null);
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
        if (\array_key_exists('blocking', $data) && $data['blocking'] !== null) {
            $object->setBlocking($data['blocking']);
        }
        elseif (\array_key_exists('blocking', $data) && $data['blocking'] === null) {
            $object->setBlocking(null);
        }
        if (\array_key_exists('source_sms_id', $data) && $data['source_sms_id'] !== null) {
            $object->setSourceSmsId($data['source_sms_id']);
        }
        elseif (\array_key_exists('source_sms_id', $data) && $data['source_sms_id'] === null) {
            $object->setSourceSmsId(null);
        }
        if (\array_key_exists('effective_at', $data) && $data['effective_at'] !== null) {
            $object->setEffectiveAt(new \DateTime($data['effective_at']));
        }
        elseif (\array_key_exists('effective_at', $data) && $data['effective_at'] === null) {
            $object->setEffectiveAt(null);
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
        if (\array_key_exists('source_end_sms_id', $data) && $data['source_end_sms_id'] !== null) {
            $object->setSourceEndSmsId($data['source_end_sms_id']);
        }
        elseif (\array_key_exists('source_end_sms_id', $data) && $data['source_end_sms_id'] === null) {
            $object->setSourceEndSmsId(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('last_asserted_at', $data) && $data['last_asserted_at'] !== null) {
            $object->setLastAssertedAt(new \DateTime($data['last_asserted_at']));
        }
        elseif (\array_key_exists('last_asserted_at', $data) && $data['last_asserted_at'] === null) {
            $object->setLastAssertedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['destination'] = $data->getDestination();
        $dataArray['originator'] = $data->getOriginator();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSSuppression::class => false];
    }
}
