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
class AMBTemplateVersionLanguageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBTemplateVersionLanguage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBTemplateVersionLanguage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBTemplateVersionLanguage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($this->denormalizer->denormalize($data['text'], \MessageBird\Wire\Model\AMBTemplateVersionLanguageText::class, 'json', $context));
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('rich_link', $data) && $data['rich_link'] !== null) {
            $object->setRichLink($this->denormalizer->denormalize($data['rich_link'], \MessageBird\Wire\Model\AMBTemplateVersionLanguageRichLink::class, 'json', $context));
        }
        elseif (\array_key_exists('rich_link', $data) && $data['rich_link'] === null) {
            $object->setRichLink(null);
        }
        if (\array_key_exists('interactive', $data) && $data['interactive'] !== null) {
            $object->setInteractive($this->denormalizer->denormalize($data['interactive'], \MessageBird\Wire\Model\AMBTemplateVersionLanguageInteractive::class, 'json', $context));
        }
        elseif (\array_key_exists('interactive', $data) && $data['interactive'] === null) {
            $object->setInteractive(null);
        }
        if (\array_key_exists('revision', $data) && $data['revision'] !== null) {
            $object->setRevision($data['revision']);
        }
        elseif (\array_key_exists('revision', $data) && $data['revision'] === null) {
            $object->setRevision(null);
        }
        if (\array_key_exists('content_hash', $data) && $data['content_hash'] !== null) {
            $object->setContentHash($data['content_hash']);
        }
        elseif (\array_key_exists('content_hash', $data) && $data['content_hash'] === null) {
            $object->setContentHash(null);
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
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBTemplateVersionLanguage::class => false];
    }
}
