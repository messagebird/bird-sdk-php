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
class CreateVoiceCallSequenceRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\CreateVoiceCallSequenceRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\CreateVoiceCallSequenceRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\CreateVoiceCallSequenceRequest();
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
        if (\array_key_exists('definition', $data) && $data['definition'] !== null) {
            $object->setDefinition($this->denormalizer->denormalize($data['definition'], \MessageBird\Wire\Model\CreateVoiceCallSequenceRequestDefinition::class, 'json', $context));
        }
        elseif (\array_key_exists('definition', $data) && $data['definition'] === null) {
            $object->setDefinition(null);
        }
        if (\array_key_exists('entry_node_id', $data) && $data['entry_node_id'] !== null) {
            $object->setEntryNodeId($data['entry_node_id']);
        }
        elseif (\array_key_exists('entry_node_id', $data) && $data['entry_node_id'] === null) {
            $object->setEntryNodeId(null);
        }
        if (\array_key_exists('trigger_data', $data) && $data['trigger_data'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['trigger_data'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setTriggerData($values);
        }
        elseif (\array_key_exists('trigger_data', $data) && $data['trigger_data'] === null) {
            $object->setTriggerData(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['id'] = $data->getId();
        }
        if ($data->isInitialized('definition') && null !== $data->getDefinition()) {
            $dataArray['definition'] = $this->normalizer->normalize($data->getDefinition(), 'json', $context);
        }
        if (!$data->isInitialized('entryNodeId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field CreateVoiceCallSequenceRequest.entry_node_id missing');
        }
        $dataArray['entry_node_id'] = $data->getEntryNodeId();
        if (!$data->isInitialized('triggerData')) {
            throw new \MessageBird\Exception\RequestValidationException('required field CreateVoiceCallSequenceRequest.trigger_data missing');
        }
        $values = [];
        foreach ($data->getTriggerData() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['trigger_data'] = (object) $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\CreateVoiceCallSequenceRequest::class => false];
    }
}
