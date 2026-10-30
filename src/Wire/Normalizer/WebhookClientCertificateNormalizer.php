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
class WebhookClientCertificateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WebhookClientCertificate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WebhookClientCertificate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WebhookClientCertificate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('state', $data) && $data['state'] !== null) {
            $object->setState($data['state']);
        }
        elseif (\array_key_exists('state', $data) && $data['state'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('crl_check', $data) && $data['crl_check'] !== null) {
            $object->setCrlCheck($data['crl_check']);
        }
        elseif (\array_key_exists('crl_check', $data) && $data['crl_check'] === null) {
            $object->setCrlCheck(null);
        }
        if (\array_key_exists('certificate', $data) && $data['certificate'] !== null) {
            $object->setCertificate($this->denormalizer->denormalize($data['certificate'], \MessageBird\Wire\Model\WebhookClientCertificateCertificate::class, 'json', $context));
        }
        elseif (\array_key_exists('certificate', $data) && $data['certificate'] === null) {
            $object->setCertificate(null);
        }
        if (\array_key_exists('signing_request', $data) && $data['signing_request'] !== null) {
            $object->setSigningRequest($this->denormalizer->denormalize($data['signing_request'], \MessageBird\Wire\Model\WebhookClientCertificateSigningRequest::class, 'json', $context));
        }
        elseif (\array_key_exists('signing_request', $data) && $data['signing_request'] === null) {
            $object->setSigningRequest(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['state'] = $data->getState();
        $dataArray['crl_check'] = $data->getCrlCheck();
        $dataArray['certificate'] = $this->normalizer->normalize($data->getCertificate(), 'json', $context);
        $dataArray['signing_request'] = $this->normalizer->normalize($data->getSigningRequest(), 'json', $context);
        $dataArray['updated_at'] = $data->getUpdatedAt()?->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WebhookClientCertificate::class => false];
    }
}
