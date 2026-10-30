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
class WebhookClientCertificateCertificateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WebhookClientCertificateCertificate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WebhookClientCertificateCertificate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WebhookClientCertificateCertificate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
            unset($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('issuer', $data) && $data['issuer'] !== null) {
            $object->setIssuer($data['issuer']);
            unset($data['issuer']);
        }
        elseif (\array_key_exists('issuer', $data) && $data['issuer'] === null) {
            $object->setIssuer(null);
        }
        if (\array_key_exists('serial_number', $data) && $data['serial_number'] !== null) {
            $object->setSerialNumber($data['serial_number']);
            unset($data['serial_number']);
        }
        elseif (\array_key_exists('serial_number', $data) && $data['serial_number'] === null) {
            $object->setSerialNumber(null);
        }
        if (\array_key_exists('fingerprint_sha256', $data) && $data['fingerprint_sha256'] !== null) {
            $object->setFingerprintSha256($data['fingerprint_sha256']);
            unset($data['fingerprint_sha256']);
        }
        elseif (\array_key_exists('fingerprint_sha256', $data) && $data['fingerprint_sha256'] === null) {
            $object->setFingerprintSha256(null);
        }
        if (\array_key_exists('not_before', $data) && $data['not_before'] !== null) {
            $object->setNotBefore(new \DateTime($data['not_before']));
            unset($data['not_before']);
        }
        elseif (\array_key_exists('not_before', $data) && $data['not_before'] === null) {
            $object->setNotBefore(null);
        }
        if (\array_key_exists('not_after', $data) && $data['not_after'] !== null) {
            $object->setNotAfter(new \DateTime($data['not_after']));
            unset($data['not_after']);
        }
        elseif (\array_key_exists('not_after', $data) && $data['not_after'] === null) {
            $object->setNotAfter(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['subject'] = $data->getSubject();
        $dataArray['issuer'] = $data->getIssuer();
        $dataArray['serial_number'] = $data->getSerialNumber();
        $dataArray['fingerprint_sha256'] = $data->getFingerprintSha256();
        $dataArray['not_before'] = $data->getNotBefore()->format('Y-m-d\TH:i:sP');
        $dataArray['not_after'] = $data->getNotAfter()->format('Y-m-d\TH:i:sP');
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WebhookClientCertificateCertificate::class => false];
    }
}
