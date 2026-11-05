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
class VoiceSessionCredentialNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\VoiceSessionCredential::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\VoiceSessionCredential::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\VoiceSessionCredential();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('username', $data) && $data['username'] !== null) {
            $object->setUsername($data['username']);
        }
        elseif (\array_key_exists('username', $data) && $data['username'] === null) {
            $object->setUsername(null);
        }
        if (\array_key_exists('password', $data) && $data['password'] !== null) {
            $object->setPassword($data['password']);
        }
        elseif (\array_key_exists('password', $data) && $data['password'] === null) {
            $object->setPassword(null);
        }
        if (\array_key_exists('realm', $data) && $data['realm'] !== null) {
            $object->setRealm($data['realm']);
        }
        elseif (\array_key_exists('realm', $data) && $data['realm'] === null) {
            $object->setRealm(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt(new \DateTime($data['expires_at']));
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('handshake_token', $data) && $data['handshake_token'] !== null) {
            $object->setHandshakeToken($data['handshake_token']);
        }
        elseif (\array_key_exists('handshake_token', $data) && $data['handshake_token'] === null) {
            $object->setHandshakeToken(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('username')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSessionCredential.username missing');
        }
        $dataArray['username'] = $data->getUsername();
        if (!$data->isInitialized('password')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSessionCredential.password missing');
        }
        $dataArray['password'] = $data->getPassword();
        if (!$data->isInitialized('realm')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSessionCredential.realm missing');
        }
        $dataArray['realm'] = $data->getRealm();
        if (!$data->isInitialized('expiresAt')) {
            throw new \MessageBird\Exception\RequestValidationException('required field VoiceSessionCredential.expires_at missing');
        }
        $dataArray['expires_at'] = $data->getExpiresAt()->format('Y-m-d\TH:i:sP');
        if ($data->isInitialized('handshakeToken') && null !== $data->getHandshakeToken()) {
            $dataArray['handshake_token'] = $data->getHandshakeToken();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\VoiceSessionCredential::class => false];
    }
}
