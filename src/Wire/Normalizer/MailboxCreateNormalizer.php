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
class MailboxCreateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\MailboxCreate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\MailboxCreate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\MailboxCreate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('local_part', $data) && $data['local_part'] !== null) {
            $object->setLocalPart($data['local_part']);
        }
        elseif (\array_key_exists('local_part', $data) && $data['local_part'] === null) {
            $object->setLocalPart(null);
        }
        if (\array_key_exists('domain', $data) && $data['domain'] !== null) {
            $object->setDomain($data['domain']);
        }
        elseif (\array_key_exists('domain', $data) && $data['domain'] === null) {
            $object->setDomain(null);
        }
        if (\array_key_exists('display_name', $data) && $data['display_name'] !== null) {
            $object->setDisplayName($data['display_name']);
        }
        elseif (\array_key_exists('display_name', $data) && $data['display_name'] === null) {
            $object->setDisplayName(null);
        }
        if (\array_key_exists('default_reply_to', $data) && $data['default_reply_to'] !== null) {
            $object->setDefaultReplyTo($data['default_reply_to']);
        }
        elseif (\array_key_exists('default_reply_to', $data) && $data['default_reply_to'] === null) {
            $object->setDefaultReplyTo(null);
        }
        if (\array_key_exists('receive_policy', $data) && $data['receive_policy'] !== null) {
            $object->setReceivePolicy($data['receive_policy']);
        }
        elseif (\array_key_exists('receive_policy', $data) && $data['receive_policy'] === null) {
            $object->setReceivePolicy(null);
        }
        if (\array_key_exists('retention_tier', $data) && $data['retention_tier'] !== null) {
            $object->setRetentionTier($data['retention_tier']);
        }
        elseif (\array_key_exists('retention_tier', $data) && $data['retention_tier'] === null) {
            $object->setRetentionTier(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setMetadata($values);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('localPart') && null !== $data->getLocalPart()) {
            $dataArray['local_part'] = $data->getLocalPart();
        }
        if ($data->isInitialized('domain') && null !== $data->getDomain()) {
            $dataArray['domain'] = $data->getDomain();
        }
        if ($data->isInitialized('displayName') && null !== $data->getDisplayName()) {
            $dataArray['display_name'] = $data->getDisplayName();
        }
        if ($data->isInitialized('defaultReplyTo') && null !== $data->getDefaultReplyTo()) {
            $dataArray['default_reply_to'] = $data->getDefaultReplyTo();
        }
        if ($data->isInitialized('receivePolicy') && null !== $data->getReceivePolicy()) {
            $dataArray['receive_policy'] = $data->getReceivePolicy();
        }
        if ($data->isInitialized('retentionTier') && null !== $data->getRetentionTier()) {
            $dataArray['retention_tier'] = $data->getRetentionTier();
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values = [];
            foreach ($data->getMetadata() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['metadata'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\MailboxCreate::class => false];
    }
}
