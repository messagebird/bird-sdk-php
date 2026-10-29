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
class AMBFormSplashNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBFormSplash::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBFormSplash::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBFormSplash();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('header', $data) && $data['header'] !== null) {
            $object->setHeader($data['header']);
        }
        elseif (\array_key_exists('header', $data) && $data['header'] === null) {
            $object->setHeader(null);
        }
        if (\array_key_exists('splash_text', $data) && $data['splash_text'] !== null) {
            $object->setSplashText($data['splash_text']);
        }
        elseif (\array_key_exists('splash_text', $data) && $data['splash_text'] === null) {
            $object->setSplashText(null);
        }
        if (\array_key_exists('button_title', $data) && $data['button_title'] !== null) {
            $object->setButtonTitle($data['button_title']);
        }
        elseif (\array_key_exists('button_title', $data) && $data['button_title'] === null) {
            $object->setButtonTitle(null);
        }
        if (\array_key_exists('image_identifier', $data) && $data['image_identifier'] !== null) {
            $object->setImageIdentifier($data['image_identifier']);
        }
        elseif (\array_key_exists('image_identifier', $data) && $data['image_identifier'] === null) {
            $object->setImageIdentifier(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('header') && null !== $data->getHeader()) {
            $dataArray['header'] = $data->getHeader();
        }
        if ($data->isInitialized('splashText') && null !== $data->getSplashText()) {
            $dataArray['splash_text'] = $data->getSplashText();
        }
        $dataArray['button_title'] = $data->getButtonTitle();
        if ($data->isInitialized('imageIdentifier') && null !== $data->getImageIdentifier()) {
            $dataArray['image_identifier'] = $data->getImageIdentifier();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBFormSplash::class => false];
    }
}
