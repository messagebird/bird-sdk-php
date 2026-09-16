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
class EmailCompetitiveProviderPlacementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveProviderPlacement::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveProviderPlacement::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveProviderPlacement();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inbox_rate', $data) && \is_int($data['inbox_rate'])) {
            $data['inbox_rate'] = (float) $data['inbox_rate'];
        }
        if (\array_key_exists('spam_rate', $data) && \is_int($data['spam_rate'])) {
            $data['spam_rate'] = (float) $data['spam_rate'];
        }
        if (\array_key_exists('workspace_inbox_rate', $data) && \is_int($data['workspace_inbox_rate'])) {
            $data['workspace_inbox_rate'] = (float) $data['workspace_inbox_rate'];
        }
        if (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] !== null) {
            $object->setMailboxProvider($data['mailbox_provider']);
        }
        elseif (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] === null) {
            $object->setMailboxProvider(null);
        }
        if (\array_key_exists('inbox_rate', $data) && $data['inbox_rate'] !== null) {
            $object->setInboxRate($data['inbox_rate']);
        }
        elseif (\array_key_exists('inbox_rate', $data) && $data['inbox_rate'] === null) {
            $object->setInboxRate(null);
        }
        if (\array_key_exists('spam_rate', $data) && $data['spam_rate'] !== null) {
            $object->setSpamRate($data['spam_rate']);
        }
        elseif (\array_key_exists('spam_rate', $data) && $data['spam_rate'] === null) {
            $object->setSpamRate(null);
        }
        if (\array_key_exists('workspace_inbox_rate', $data) && $data['workspace_inbox_rate'] !== null) {
            $object->setWorkspaceInboxRate($data['workspace_inbox_rate']);
        }
        elseif (\array_key_exists('workspace_inbox_rate', $data) && $data['workspace_inbox_rate'] === null) {
            $object->setWorkspaceInboxRate(null);
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
        return [\MessageBird\Wire\Model\EmailCompetitiveProviderPlacement::class => false];
    }
}
