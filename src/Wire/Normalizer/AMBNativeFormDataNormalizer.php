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
class AMBNativeFormDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBNativeFormData::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBNativeFormData::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBNativeFormData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('private', $data) && \is_int($data['private'])) {
            $data['private'] = (bool) $data['private'];
        }
        if (\array_key_exists('show_summary', $data) && \is_int($data['show_summary'])) {
            $data['show_summary'] = (bool) $data['show_summary'];
        }
        if (\array_key_exists('start_page_identifier', $data) && $data['start_page_identifier'] !== null) {
            $object->setStartPageIdentifier($data['start_page_identifier']);
        }
        elseif (\array_key_exists('start_page_identifier', $data) && $data['start_page_identifier'] === null) {
            $object->setStartPageIdentifier(null);
        }
        if (\array_key_exists('private', $data) && $data['private'] !== null) {
            $object->setPrivate($data['private']);
        }
        elseif (\array_key_exists('private', $data) && $data['private'] === null) {
            $object->setPrivate(null);
        }
        if (\array_key_exists('show_summary', $data) && $data['show_summary'] !== null) {
            $object->setShowSummary($data['show_summary']);
        }
        elseif (\array_key_exists('show_summary', $data) && $data['show_summary'] === null) {
            $object->setShowSummary(null);
        }
        if (\array_key_exists('splash', $data) && $data['splash'] !== null) {
            $object->setSplash($this->denormalizer->denormalize($data['splash'], \MessageBird\Wire\Model\AMBFormSplash::class, 'json', $context));
        }
        elseif (\array_key_exists('splash', $data) && $data['splash'] === null) {
            $object->setSplash(null);
        }
        if (\array_key_exists('pages', $data) && $data['pages'] !== null) {
            $values = [];
            foreach ($data['pages'] as $value) {
                $values[] = $value;
            }
            $object->setPages($values);
        }
        elseif (\array_key_exists('pages', $data) && $data['pages'] === null) {
            $object->setPages(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['start_page_identifier'] = $data->getStartPageIdentifier();
        if ($data->isInitialized('private') && null !== $data->getPrivate()) {
            $dataArray['private'] = $data->getPrivate();
        }
        if ($data->isInitialized('showSummary') && null !== $data->getShowSummary()) {
            $dataArray['show_summary'] = $data->getShowSummary();
        }
        if ($data->isInitialized('splash') && null !== $data->getSplash()) {
            $dataArray['splash'] = $this->normalizer->normalize($data->getSplash(), 'json', $context);
        }
        $values = [];
        foreach ($data->getPages() as $value) {
            $values[] = $value;
        }
        $dataArray['pages'] = $values;
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBNativeFormData::class => false];
    }
}
