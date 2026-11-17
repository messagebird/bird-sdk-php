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
class AMBVerifiedIdentityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBVerifiedIdentity::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBVerifiedIdentity::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBVerifiedIdentity();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('email_verified', $data) && \is_int($data['email_verified'])) {
            $data['email_verified'] = (bool) $data['email_verified'];
        }
        if (\array_key_exists('issuer', $data) && $data['issuer'] !== null) {
            $object->setIssuer($data['issuer']);
        }
        elseif (\array_key_exists('issuer', $data) && $data['issuer'] === null) {
            $object->setIssuer(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('email', $data) && $data['email'] !== null) {
            $object->setEmail($data['email']);
        }
        elseif (\array_key_exists('email', $data) && $data['email'] === null) {
            $object->setEmail(null);
        }
        if (\array_key_exists('email_verified', $data) && $data['email_verified'] !== null) {
            $object->setEmailVerified($data['email_verified']);
        }
        elseif (\array_key_exists('email_verified', $data) && $data['email_verified'] === null) {
            $object->setEmailVerified(null);
        }
        if (\array_key_exists('authenticated_at', $data) && $data['authenticated_at'] !== null) {
            $object->setAuthenticatedAt(new \DateTime($data['authenticated_at']));
        }
        elseif (\array_key_exists('authenticated_at', $data) && $data['authenticated_at'] === null) {
            $object->setAuthenticatedAt(null);
        }
        if (\array_key_exists('verified_at', $data) && $data['verified_at'] !== null) {
            $object->setVerifiedAt(new \DateTime($data['verified_at']));
        }
        elseif (\array_key_exists('verified_at', $data) && $data['verified_at'] === null) {
            $object->setVerifiedAt(null);
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
        return [\MessageBird\Wire\Model\AMBVerifiedIdentity::class => false];
    }
}
