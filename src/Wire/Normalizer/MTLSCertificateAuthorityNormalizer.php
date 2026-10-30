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
class MTLSCertificateAuthorityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\MTLSCertificateAuthority::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\MTLSCertificateAuthority::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\MTLSCertificateAuthority();
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
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('fingerprint_sha256', $data) && $data['fingerprint_sha256'] !== null) {
            $object->setFingerprintSha256($data['fingerprint_sha256']);
        }
        elseif (\array_key_exists('fingerprint_sha256', $data) && $data['fingerprint_sha256'] === null) {
            $object->setFingerprintSha256(null);
        }
        if (\array_key_exists('not_before', $data) && $data['not_before'] !== null) {
            $object->setNotBefore(new \DateTime($data['not_before']));
        }
        elseif (\array_key_exists('not_before', $data) && $data['not_before'] === null) {
            $object->setNotBefore(null);
        }
        if (\array_key_exists('not_after', $data) && $data['not_after'] !== null) {
            $object->setNotAfter(new \DateTime($data['not_after']));
        }
        elseif (\array_key_exists('not_after', $data) && $data['not_after'] === null) {
            $object->setNotAfter(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['subject'] = $data->getSubject();
        $dataArray['fingerprint_sha256'] = $data->getFingerprintSha256();
        $dataArray['not_before'] = $data->getNotBefore()->format('Y-m-d\TH:i:sP');
        $dataArray['not_after'] = $data->getNotAfter()->format('Y-m-d\TH:i:sP');
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\MTLSCertificateAuthority::class => false];
    }
}
