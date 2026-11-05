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
class AMBConversationRoutingChangeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversationRoutingChange::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversationRoutingChange::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversationRoutingChange();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('group_id', $data) && $data['group_id'] !== null) {
            $object->setGroupId($data['group_id']);
            unset($data['group_id']);
        }
        elseif (\array_key_exists('group_id', $data) && $data['group_id'] === null) {
            $object->setGroupId(null);
        }
        if (\array_key_exists('intent_id', $data) && $data['intent_id'] !== null) {
            $object->setIntentId($data['intent_id']);
            unset($data['intent_id']);
        }
        elseif (\array_key_exists('intent_id', $data) && $data['intent_id'] === null) {
            $object->setIntentId(null);
        }
        if (\array_key_exists('entry_point', $data) && $data['entry_point'] !== null) {
            $object->setEntryPoint($data['entry_point']);
            unset($data['entry_point']);
        }
        elseif (\array_key_exists('entry_point', $data) && $data['entry_point'] === null) {
            $object->setEntryPoint(null);
        }
        if (\array_key_exists('queue', $data) && $data['queue'] !== null) {
            $object->setQueue($data['queue']);
            unset($data['queue']);
        }
        elseif (\array_key_exists('queue', $data) && $data['queue'] === null) {
            $object->setQueue(null);
        }
        if (\array_key_exists('message_id', $data) && $data['message_id'] !== null) {
            $object->setMessageId($data['message_id']);
            unset($data['message_id']);
        }
        elseif (\array_key_exists('message_id', $data) && $data['message_id'] === null) {
            $object->setMessageId(null);
        }
        if (\array_key_exists('received_at', $data) && $data['received_at'] !== null) {
            $object->setReceivedAt(new \DateTime($data['received_at']));
            unset($data['received_at']);
        }
        elseif (\array_key_exists('received_at', $data) && $data['received_at'] === null) {
            $object->setReceivedAt(null);
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
        if (!$data->isInitialized('groupId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationRoutingChange.group_id missing');
        }
        $dataArray['group_id'] = $data->getGroupId();
        if (!$data->isInitialized('intentId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationRoutingChange.intent_id missing');
        }
        $dataArray['intent_id'] = $data->getIntentId();
        if (!$data->isInitialized('entryPoint')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationRoutingChange.entry_point missing');
        }
        $dataArray['entry_point'] = $data->getEntryPoint();
        if (!$data->isInitialized('queue')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationRoutingChange.queue missing');
        }
        $dataArray['queue'] = $data->getQueue();
        if (!$data->isInitialized('messageId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationRoutingChange.message_id missing');
        }
        $dataArray['message_id'] = $data->getMessageId();
        if (!$data->isInitialized('receivedAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationRoutingChange.received_at missing');
        }
        $dataArray['received_at'] = $data->getReceivedAt()->format('Y-m-d\TH:i:sP');
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBConversationRoutingChange::class => false];
    }
}
