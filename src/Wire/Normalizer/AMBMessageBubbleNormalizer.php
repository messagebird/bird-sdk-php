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
class AMBMessageBubbleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBMessageBubble::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBMessageBubble::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBMessageBubble();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('title', $data) && $data['title'] !== null) {
            $object->setTitle($data['title']);
        }
        elseif (\array_key_exists('title', $data) && $data['title'] === null) {
            $object->setTitle(null);
        }
        if (\array_key_exists('subtitle', $data) && $data['subtitle'] !== null) {
            $object->setSubtitle($data['subtitle']);
        }
        elseif (\array_key_exists('subtitle', $data) && $data['subtitle'] === null) {
            $object->setSubtitle(null);
        }
        if (\array_key_exists('style', $data) && $data['style'] !== null) {
            $object->setStyle($data['style']);
        }
        elseif (\array_key_exists('style', $data) && $data['style'] === null) {
            $object->setStyle(null);
        }
        if (\array_key_exists('image_identifier', $data) && $data['image_identifier'] !== null) {
            $object->setImageIdentifier($data['image_identifier']);
        }
        elseif (\array_key_exists('image_identifier', $data) && $data['image_identifier'] === null) {
            $object->setImageIdentifier(null);
        }
        if (\array_key_exists('image_title', $data) && $data['image_title'] !== null) {
            $object->setImageTitle($data['image_title']);
        }
        elseif (\array_key_exists('image_title', $data) && $data['image_title'] === null) {
            $object->setImageTitle(null);
        }
        if (\array_key_exists('image_subtitle', $data) && $data['image_subtitle'] !== null) {
            $object->setImageSubtitle($data['image_subtitle']);
        }
        elseif (\array_key_exists('image_subtitle', $data) && $data['image_subtitle'] === null) {
            $object->setImageSubtitle(null);
        }
        if (\array_key_exists('secondary_subtitle', $data) && $data['secondary_subtitle'] !== null) {
            $object->setSecondarySubtitle($data['secondary_subtitle']);
        }
        elseif (\array_key_exists('secondary_subtitle', $data) && $data['secondary_subtitle'] === null) {
            $object->setSecondarySubtitle(null);
        }
        if (\array_key_exists('tertiary_subtitle', $data) && $data['tertiary_subtitle'] !== null) {
            $object->setTertiarySubtitle($data['tertiary_subtitle']);
        }
        elseif (\array_key_exists('tertiary_subtitle', $data) && $data['tertiary_subtitle'] === null) {
            $object->setTertiarySubtitle(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['title'] = $data->getTitle();
        if ($data->isInitialized('subtitle') && null !== $data->getSubtitle()) {
            $dataArray['subtitle'] = $data->getSubtitle();
        }
        if ($data->isInitialized('style') && null !== $data->getStyle()) {
            $dataArray['style'] = $data->getStyle();
        }
        if ($data->isInitialized('imageIdentifier') && null !== $data->getImageIdentifier()) {
            $dataArray['image_identifier'] = $data->getImageIdentifier();
        }
        if ($data->isInitialized('imageTitle') && null !== $data->getImageTitle()) {
            $dataArray['image_title'] = $data->getImageTitle();
        }
        if ($data->isInitialized('imageSubtitle') && null !== $data->getImageSubtitle()) {
            $dataArray['image_subtitle'] = $data->getImageSubtitle();
        }
        if ($data->isInitialized('secondarySubtitle') && null !== $data->getSecondarySubtitle()) {
            $dataArray['secondary_subtitle'] = $data->getSecondarySubtitle();
        }
        if ($data->isInitialized('tertiarySubtitle') && null !== $data->getTertiarySubtitle()) {
            $dataArray['tertiary_subtitle'] = $data->getTertiarySubtitle();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBMessageBubble::class => false];
    }
}
