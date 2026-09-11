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
class EmailTemplateLanguageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplateLanguageSummary::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplateLanguageSummary::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplateLanguageSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('has_html', $data) && \is_int($data['has_html'])) {
            $data['has_html'] = (bool) $data['has_html'];
        }
        if (\array_key_exists('has_text', $data) && \is_int($data['has_text'])) {
            $data['has_text'] = (bool) $data['has_text'];
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
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
        if (\array_key_exists('has_html', $data) && $data['has_html'] !== null) {
            $object->setHasHtml($data['has_html']);
        }
        elseif (\array_key_exists('has_html', $data) && $data['has_html'] === null) {
            $object->setHasHtml(null);
        }
        if (\array_key_exists('has_text', $data) && $data['has_text'] !== null) {
            $object->setHasText($data['has_text']);
        }
        elseif (\array_key_exists('has_text', $data) && $data['has_text'] === null) {
            $object->setHasText(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['language'] = $data->getLanguage();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailTemplateLanguageSummary::class => false];
    }
}
