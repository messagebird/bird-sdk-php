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
class AMBRoutingRuleUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBRoutingRuleUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBRoutingRuleUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBRoutingRuleUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_default', $data) && \is_int($data['is_default'])) {
            $data['is_default'] = (bool) $data['is_default'];
        }
        if (\array_key_exists('business_account_id', $data) && $data['business_account_id'] !== null) {
            $object->setBusinessAccountId($data['business_account_id']);
        }
        elseif (\array_key_exists('business_account_id', $data) && $data['business_account_id'] === null) {
            $object->setBusinessAccountId(null);
        }
        if (\array_key_exists('match_kind', $data) && $data['match_kind'] !== null) {
            $object->setMatchKind($data['match_kind']);
        }
        elseif (\array_key_exists('match_kind', $data) && $data['match_kind'] === null) {
            $object->setMatchKind(null);
        }
        if (\array_key_exists('match_intent_id', $data) && $data['match_intent_id'] !== null) {
            $object->setMatchIntentId($data['match_intent_id']);
        }
        elseif (\array_key_exists('match_intent_id', $data) && $data['match_intent_id'] === null) {
            $object->setMatchIntentId(null);
        }
        if (\array_key_exists('match_group_id', $data) && $data['match_group_id'] !== null) {
            $object->setMatchGroupId($data['match_group_id']);
        }
        elseif (\array_key_exists('match_group_id', $data) && $data['match_group_id'] === null) {
            $object->setMatchGroupId(null);
        }
        if (\array_key_exists('queue', $data) && $data['queue'] !== null) {
            $object->setQueue($data['queue']);
        }
        elseif (\array_key_exists('queue', $data) && $data['queue'] === null) {
            $object->setQueue(null);
        }
        if (\array_key_exists('precedence', $data) && $data['precedence'] !== null) {
            $object->setPrecedence($data['precedence']);
        }
        elseif (\array_key_exists('precedence', $data) && $data['precedence'] === null) {
            $object->setPrecedence(null);
        }
        if (\array_key_exists('is_default', $data) && $data['is_default'] !== null) {
            $object->setIsDefault($data['is_default']);
        }
        elseif (\array_key_exists('is_default', $data) && $data['is_default'] === null) {
            $object->setIsDefault(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('businessAccountId') && null !== $data->getBusinessAccountId()) {
            $dataArray['business_account_id'] = $data->getBusinessAccountId();
        }
        if ($data->isInitialized('matchKind') && null !== $data->getMatchKind()) {
            $dataArray['match_kind'] = $data->getMatchKind();
        }
        if ($data->isInitialized('matchIntentId') && null !== $data->getMatchIntentId()) {
            $dataArray['match_intent_id'] = $data->getMatchIntentId();
        }
        if ($data->isInitialized('matchGroupId') && null !== $data->getMatchGroupId()) {
            $dataArray['match_group_id'] = $data->getMatchGroupId();
        }
        if ($data->isInitialized('queue') && null !== $data->getQueue()) {
            $dataArray['queue'] = $data->getQueue();
        }
        if ($data->isInitialized('precedence') && null !== $data->getPrecedence()) {
            $dataArray['precedence'] = $data->getPrecedence();
        }
        if ($data->isInitialized('isDefault') && null !== $data->getIsDefault()) {
            $dataArray['is_default'] = $data->getIsDefault();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBRoutingRuleUpdate::class => false];
    }
}
