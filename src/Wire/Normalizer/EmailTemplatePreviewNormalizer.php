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
class EmailTemplatePreviewNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailTemplatePreview::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailTemplatePreview::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailTemplatePreview();
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
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('html', $data) && $data['html'] !== null) {
            $object->setHtml($data['html']);
        }
        elseif (\array_key_exists('html', $data) && $data['html'] === null) {
            $object->setHtml(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('language', $data) && $data['language'] !== null) {
            $object->setLanguage($data['language']);
        }
        elseif (\array_key_exists('language', $data) && $data['language'] === null) {
            $object->setLanguage(null);
        }
        if (\array_key_exists('variables', $data) && $data['variables'] !== null) {
            $values = [];
            foreach ($data['variables'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\TemplateVariable::class, 'json', $context);
            }
            $object->setVariables($values);
        }
        elseif (\array_key_exists('variables', $data) && $data['variables'] === null) {
            $object->setVariables(null);
        }
        if (\array_key_exists('compatibility_severity', $data) && $data['compatibility_severity'] !== null) {
            $object->setCompatibilitySeverity($data['compatibility_severity']);
        }
        elseif (\array_key_exists('compatibility_severity', $data) && $data['compatibility_severity'] === null) {
            $object->setCompatibilitySeverity(null);
        }
        if (\array_key_exists('compatibility', $data) && $data['compatibility'] !== null) {
            $values_1 = [];
            foreach ($data['compatibility'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailCompatibilityFinding::class, 'json', $context);
            }
            $object->setCompatibility($values_1);
        }
        elseif (\array_key_exists('compatibility', $data) && $data['compatibility'] === null) {
            $object->setCompatibility(null);
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
        return [\MessageBird\Wire\Model\EmailTemplatePreview::class => false];
    }
}
