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
class WhatsAppTemplateLanguageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppTemplateLanguage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppTemplateLanguage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppTemplateLanguage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('components', $data) && $data['components'] !== null) {
            $values = [];
            foreach ($data['components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppTemplateComponent::class, 'json', $context);
            }
            $object->setComponents($values);
        }
        elseif (\array_key_exists('components', $data) && $data['components'] === null) {
            $object->setComponents(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
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
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('previous_category', $data) && $data['previous_category'] !== null) {
            $object->setPreviousCategory($data['previous_category']);
        }
        elseif (\array_key_exists('previous_category', $data) && $data['previous_category'] === null) {
            $object->setPreviousCategory(null);
        }
        if (\array_key_exists('quality', $data) && $data['quality'] !== null) {
            $object->setQuality($this->denormalizer->denormalize($data['quality'], \MessageBird\Wire\Model\WhatsAppTemplateQuality::class, 'json', $context));
        }
        elseif (\array_key_exists('quality', $data) && $data['quality'] === null) {
            $object->setQuality(null);
        }
        if (\array_key_exists('rejection', $data) && $data['rejection'] !== null) {
            $object->setRejection($this->denormalizer->denormalize($data['rejection'], \MessageBird\Wire\Model\WhatsAppTemplateLanguageRejection::class, 'json', $context));
        }
        elseif (\array_key_exists('rejection', $data) && $data['rejection'] === null) {
            $object->setRejection(null);
        }
        if (\array_key_exists('error', $data) && $data['error'] !== null) {
            $object->setError($this->denormalizer->denormalize($data['error'], \MessageBird\Wire\Model\WhatsAppTemplateLanguageError::class, 'json', $context));
        }
        elseif (\array_key_exists('error', $data) && $data['error'] === null) {
            $object->setError(null);
        }
        if (\array_key_exists('submitted_at', $data) && $data['submitted_at'] !== null) {
            $object->setSubmittedAt(new \DateTime($data['submitted_at']));
        }
        elseif (\array_key_exists('submitted_at', $data) && $data['submitted_at'] === null) {
            $object->setSubmittedAt(null);
        }
        if (\array_key_exists('approved_at', $data) && $data['approved_at'] !== null) {
            $object->setApprovedAt(new \DateTime($data['approved_at']));
        }
        elseif (\array_key_exists('approved_at', $data) && $data['approved_at'] === null) {
            $object->setApprovedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('updated_by', $data) && $data['updated_by'] !== null) {
            $object->setUpdatedBy($data['updated_by']);
        }
        elseif (\array_key_exists('updated_by', $data) && $data['updated_by'] === null) {
            $object->setUpdatedBy(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['language'] = $data->getLanguage();
        $values = [];
        foreach ($data->getComponents() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $dataArray['components'] = $values;
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['status'] = $data->getStatus();
        }
        $dataArray['revision'] = $data->getRevision();
        if ($data->isInitialized('category') && null !== $data->getCategory()) {
            $dataArray['category'] = $data->getCategory();
        }
        if ($data->isInitialized('previousCategory') && null !== $data->getPreviousCategory()) {
            $dataArray['previous_category'] = $data->getPreviousCategory();
        }
        if ($data->isInitialized('quality') && null !== $data->getQuality()) {
            $dataArray['quality'] = $this->normalizer->normalize($data->getQuality(), 'json', $context);
        }
        if ($data->isInitialized('rejection') && null !== $data->getRejection()) {
            $dataArray['rejection'] = $this->normalizer->normalize($data->getRejection(), 'json', $context);
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['error'] = $this->normalizer->normalize($data->getError(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppTemplateLanguage::class => false];
    }
}
