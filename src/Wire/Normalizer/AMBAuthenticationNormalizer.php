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
class AMBAuthenticationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBAuthentication::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBAuthentication::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBAuthentication();
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
        if (\array_key_exists('conversation_id', $data) && $data['conversation_id'] !== null) {
            $object->setConversationId($data['conversation_id']);
        }
        elseif (\array_key_exists('conversation_id', $data) && $data['conversation_id'] === null) {
            $object->setConversationId(null);
        }
        if (\array_key_exists('provider_id', $data) && $data['provider_id'] !== null) {
            $object->setProviderId($data['provider_id']);
        }
        elseif (\array_key_exists('provider_id', $data) && $data['provider_id'] === null) {
            $object->setProviderId(null);
        }
        if (\array_key_exists('provider_revision', $data) && $data['provider_revision'] !== null) {
            $object->setProviderRevision($data['provider_revision']);
        }
        elseif (\array_key_exists('provider_revision', $data) && $data['provider_revision'] === null) {
            $object->setProviderRevision(null);
        }
        if (\array_key_exists('message_id', $data) && $data['message_id'] !== null) {
            $object->setMessageId($data['message_id']);
        }
        elseif (\array_key_exists('message_id', $data) && $data['message_id'] === null) {
            $object->setMessageId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt(new \DateTime($data['expires_at']));
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('completed_at', $data) && $data['completed_at'] !== null) {
            $object->setCompletedAt(new \DateTime($data['completed_at']));
        }
        elseif (\array_key_exists('completed_at', $data) && $data['completed_at'] === null) {
            $object->setCompletedAt(null);
        }
        if (\array_key_exists('failure_code', $data) && $data['failure_code'] !== null) {
            $object->setFailureCode($data['failure_code']);
        }
        elseif (\array_key_exists('failure_code', $data) && $data['failure_code'] === null) {
            $object->setFailureCode(null);
        }
        if (\array_key_exists('identity', $data) && $data['identity'] !== null) {
            $object->setIdentity($this->denormalizer->denormalize($data['identity'], \MessageBird\Wire\Model\AMBVerifiedIdentity::class, 'json', $context));
        }
        elseif (\array_key_exists('identity', $data) && $data['identity'] === null) {
            $object->setIdentity(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('id')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBAuthentication.id missing');
        }
        $dataArray['id'] = $data->getId();
        if (!$data->isInitialized('conversationId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBAuthentication.conversation_id missing');
        }
        $dataArray['conversation_id'] = $data->getConversationId();
        if (!$data->isInitialized('providerId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBAuthentication.provider_id missing');
        }
        $dataArray['provider_id'] = $data->getProviderId();
        if (!$data->isInitialized('status')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBAuthentication.status missing');
        }
        $dataArray['status'] = $data->getStatus();
        if ($data->isInitialized('identity') && null !== $data->getIdentity()) {
            $dataArray['identity'] = $this->normalizer->normalize($data->getIdentity(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBAuthentication::class => false];
    }
}
