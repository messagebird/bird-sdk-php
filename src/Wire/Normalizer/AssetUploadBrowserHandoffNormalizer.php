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
class AssetUploadBrowserHandoffNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AssetUploadBrowserHandoff::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AssetUploadBrowserHandoff::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AssetUploadBrowserHandoff();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('session', $data) && $data['session'] !== null) {
            $object->setSession($this->denormalizer->denormalize($data['session'], \MessageBird\Wire\Model\AssetUploadBrowserHandoffSession::class, 'json', $context));
        }
        elseif (\array_key_exists('session', $data) && $data['session'] === null) {
            $object->setSession(null);
        }
        if (\array_key_exists('browser_url', $data) && $data['browser_url'] !== null) {
            $object->setBrowserUrl($data['browser_url']);
        }
        elseif (\array_key_exists('browser_url', $data) && $data['browser_url'] === null) {
            $object->setBrowserUrl(null);
        }
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if (!$data->isInitialized('session')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadBrowserHandoff.session missing');
        }
        $dataArray['session'] = $this->normalizer->normalize($data->getSession(), 'json', $context);
        if (!$data->isInitialized('browserUrl')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadBrowserHandoff.browser_url missing');
        }
        $dataArray['browser_url'] = $data->getBrowserUrl();
        if (!$data->isInitialized('next')) {
            throw new \MessageBird\Exception\RequestValidationException('required field AssetUploadBrowserHandoff.next missing');
        }
        $values = [];
        foreach ($data->getNext() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['next'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AssetUploadBrowserHandoff::class => false];
    }
}
