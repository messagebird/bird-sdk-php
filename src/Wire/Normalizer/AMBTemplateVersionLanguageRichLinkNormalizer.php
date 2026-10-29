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
class AMBTemplateVersionLanguageRichLinkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBTemplateVersionLanguageRichLink::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBTemplateVersionLanguageRichLink::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBTemplateVersionLanguageRichLink();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('rich_link_data', $data) && $data['rich_link_data'] !== null) {
            $object->setRichLinkData($this->denormalizer->denormalize($data['rich_link_data'], \MessageBird\Wire\Model\AMBNativeRichLinkData::class, 'json', $context));
        }
        elseif (\array_key_exists('rich_link_data', $data) && $data['rich_link_data'] === null) {
            $object->setRichLinkData(null);
        }
        if (\array_key_exists('rich_link_construct', $data) && $data['rich_link_construct'] !== null) {
            $object->setRichLinkConstruct($this->denormalizer->denormalize($data['rich_link_construct'], \MessageBird\Wire\Model\AMBRichLinkConstruct::class, 'json', $context));
        }
        elseif (\array_key_exists('rich_link_construct', $data) && $data['rich_link_construct'] === null) {
            $object->setRichLinkConstruct(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('richLinkData') && null !== $data->getRichLinkData()) {
            $dataArray['rich_link_data'] = $this->normalizer->normalize($data->getRichLinkData(), 'json', $context);
        }
        if ($data->isInitialized('richLinkConstruct') && null !== $data->getRichLinkConstruct()) {
            $dataArray['rich_link_construct'] = $this->normalizer->normalize($data->getRichLinkConstruct(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBTemplateVersionLanguageRichLink::class => false];
    }
}
