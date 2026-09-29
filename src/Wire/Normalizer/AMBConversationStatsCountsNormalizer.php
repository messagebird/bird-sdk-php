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
class AMBConversationStatsCountsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversationStatsCounts::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversationStatsCounts::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversationStatsCounts();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('started', $data) && $data['started'] !== null) {
            $object->setStarted($data['started']);
        }
        elseif (\array_key_exists('started', $data) && $data['started'] === null) {
            $object->setStarted(null);
        }
        if (\array_key_exists('reopened', $data) && $data['reopened'] !== null) {
            $object->setReopened($data['reopened']);
        }
        elseif (\array_key_exists('reopened', $data) && $data['reopened'] === null) {
            $object->setReopened(null);
        }
        if (\array_key_exists('closed', $data) && $data['closed'] !== null) {
            $object->setClosed($data['closed']);
        }
        elseif (\array_key_exists('closed', $data) && $data['closed'] === null) {
            $object->setClosed(null);
        }
        if (\array_key_exists('conversations', $data) && $data['conversations'] !== null) {
            $object->setConversations($data['conversations']);
        }
        elseif (\array_key_exists('conversations', $data) && $data['conversations'] === null) {
            $object->setConversations(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBConversationStatsCounts::class => false];
    }
}
