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
class CreateVoiceCallSequenceRequestDefinitionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\CreateVoiceCallSequenceRequestDefinition::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\CreateVoiceCallSequenceRequestDefinition::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\CreateVoiceCallSequenceRequestDefinition();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('schema_version', $data) && $data['schema_version'] !== null) {
            $object->setSchemaVersion($data['schema_version']);
            unset($data['schema_version']);
        }
        elseif (\array_key_exists('schema_version', $data) && $data['schema_version'] === null) {
            $object->setSchemaVersion(null);
        }
        if (\array_key_exists('expression_environment', $data) && $data['expression_environment'] !== null) {
            $object->setExpressionEnvironment($data['expression_environment']);
            unset($data['expression_environment']);
        }
        elseif (\array_key_exists('expression_environment', $data) && $data['expression_environment'] === null) {
            $object->setExpressionEnvironment(null);
        }
        if (\array_key_exists('nodes', $data) && $data['nodes'] !== null) {
            $values = [];
            foreach ($data['nodes'] as $value) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value as $key => $value_1) {
                    $values_1[$key] = $value_1;
                }
                $values[] = $values_1;
            }
            $object->setNodes($values);
            unset($data['nodes']);
        }
        elseif (\array_key_exists('nodes', $data) && $data['nodes'] === null) {
            $object->setNodes(null);
        }
        if (\array_key_exists('settings', $data) && $data['settings'] !== null) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['settings'] as $key_1 => $value_2) {
                $values_2[$key_1] = $value_2;
            }
            $object->setSettings($values_2);
            unset($data['settings']);
        }
        elseif (\array_key_exists('settings', $data) && $data['settings'] === null) {
            $object->setSettings(null);
        }
        if (\array_key_exists('presentation', $data) && $data['presentation'] !== null) {
            $object->setPresentation($this->denormalizer->denormalize($data['presentation'], \MessageBird\Wire\Model\VoiceSequencePresentation::class, 'json', $context));
            unset($data['presentation']);
        }
        elseif (\array_key_exists('presentation', $data) && $data['presentation'] === null) {
            $object->setPresentation(null);
        }
        foreach ($data as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_3;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['schema_version'] = $data->getSchemaVersion();
        $dataArray['expression_environment'] = $data->getExpressionEnvironment();
        $values = [];
        foreach ($data->getNodes() as $value) {
            $values_1 = [];
            foreach ($value as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $values[] = $values_1;
        }
        $dataArray['nodes'] = $values;
        if ($data->isInitialized('settings') && null !== $data->getSettings()) {
            $values_2 = [];
            foreach ($data->getSettings() as $key_1 => $value_2) {
                $values_2[$key_1] = $value_2;
            }
            $dataArray['settings'] = (object) $values_2;
        }
        if ($data->isInitialized('presentation') && null !== $data->getPresentation()) {
            $dataArray['presentation'] = $this->normalizer->normalize($data->getPresentation(), 'json', $context);
        }
        foreach ($data as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $dataArray[$key_2] = $value_3;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\CreateVoiceCallSequenceRequestDefinition::class => false];
    }
}
