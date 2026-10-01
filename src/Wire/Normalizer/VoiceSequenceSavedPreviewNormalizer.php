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
class VoiceSequenceSavedPreviewNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceSequenceSavedPreview::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceSequenceSavedPreview::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceSequenceSavedPreview();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('trigger_node_id', $data) && $data['trigger_node_id'] !== null) {
            $object->setTriggerNodeId($data['trigger_node_id']);
        }
        elseif (\array_key_exists('trigger_node_id', $data) && $data['trigger_node_id'] === null) {
            $object->setTriggerNodeId(null);
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
        if (\array_key_exists('node_samples', $data) && $data['node_samples'] !== null) {
            $values_1 = [];
            foreach ($data['node_samples'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setNodeSamples($values_1);
        }
        elseif (\array_key_exists('node_samples', $data) && $data['node_samples'] === null) {
            $object->setNodeSamples(null);
        }
        if (\array_key_exists('execution_sample', $data) && $data['execution_sample'] !== null) {
            $object->setExecutionSample($this->denormalizer->denormalize($data['execution_sample'], \MessageBird\Wire\Model\VoiceSequenceSavedExecutionSample::class, 'json', $context));
        }
        elseif (\array_key_exists('execution_sample', $data) && $data['execution_sample'] === null) {
            $object->setExecutionSample(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['trigger_node_id'] = $data->getTriggerNodeId();
        $values = [];
        foreach ($data->getTriggerData() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['trigger_data'] = (object) $values;
        if ($data->isInitialized('nodeSamples') && null !== $data->getNodeSamples()) {
            $values_1 = [];
            foreach ($data->getNodeSamples() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['node_samples'] = $values_1;
        }
        if ($data->isInitialized('executionSample') && null !== $data->getExecutionSample()) {
            $dataArray['execution_sample'] = $this->normalizer->normalize($data->getExecutionSample(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceSequenceSavedPreview::class => false];
    }
}
