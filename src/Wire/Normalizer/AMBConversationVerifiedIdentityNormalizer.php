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
class AMBConversationVerifiedIdentityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBConversationVerifiedIdentity::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBConversationVerifiedIdentity::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBConversationVerifiedIdentity();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('historical', $data) && \is_int($data['historical'])) {
            $data['historical'] = (bool) $data['historical'];
        }
        if (\array_key_exists('authentication_id', $data) && $data['authentication_id'] !== null) {
            $object->setAuthenticationId($data['authentication_id']);
        }
        elseif (\array_key_exists('authentication_id', $data) && $data['authentication_id'] === null) {
            $object->setAuthenticationId(null);
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
        if (\array_key_exists('identity', $data) && $data['identity'] !== null) {
            $object->setIdentity($this->denormalizer->denormalize($data['identity'], \MessageBird\Wire\Model\AMBVerifiedIdentity::class, 'json', $context));
        }
        elseif (\array_key_exists('identity', $data) && $data['identity'] === null) {
            $object->setIdentity(null);
        }
        if (\array_key_exists('historical', $data) && $data['historical'] !== null) {
            $object->setHistorical($data['historical']);
        }
        elseif (\array_key_exists('historical', $data) && $data['historical'] === null) {
            $object->setHistorical(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('authenticationId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationVerifiedIdentity.authentication_id missing');
        }
        $dataArray['authentication_id'] = $data->getAuthenticationId();
        if (!$data->isInitialized('providerId')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationVerifiedIdentity.provider_id missing');
        }
        $dataArray['provider_id'] = $data->getProviderId();
        if (!$data->isInitialized('identity')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AMBConversationVerifiedIdentity.identity missing');
        }
        $dataArray['identity'] = $this->normalizer->normalize($data->getIdentity(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBConversationVerifiedIdentity::class => false];
    }
}
