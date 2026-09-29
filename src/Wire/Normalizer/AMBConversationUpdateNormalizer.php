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
class AMBConversationUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversationUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversationUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversationUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('read', $data) && \is_int($data['read'])) {
            $data['read'] = (bool) $data['read'];
        }
        if (\array_key_exists('assigned_to', $data) && $data['assigned_to'] !== null) {
            $object->setAssignedTo($data['assigned_to']);
        }
        elseif (\array_key_exists('assigned_to', $data) && $data['assigned_to'] === null) {
            $object->setAssignedTo(null);
        }
        if (\array_key_exists('labels', $data) && $data['labels'] !== null) {
            $values = [];
            foreach ($data['labels'] as $value) {
                $values[] = $value;
            }
            $object->setLabels($values);
        }
        elseif (\array_key_exists('labels', $data) && $data['labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('read', $data) && $data['read'] !== null) {
            $object->setRead($data['read']);
        }
        elseif (\array_key_exists('read', $data) && $data['read'] === null) {
            $object->setRead(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('assignedTo')) {
            $dataArray['assigned_to'] = $data->getAssignedTo();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values = [];
            foreach ($data->getLabels() as $value) {
                $values[] = $value;
            }
            $dataArray['labels'] = $values;
        }
        if ($data->isInitialized('read') && null !== $data->getRead()) {
            $dataArray['read'] = $data->getRead();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBConversationUpdate::class => false];
    }
}
