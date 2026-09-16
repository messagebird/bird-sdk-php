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
class EmailInboxInsightsGmailTabCategoryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsGmailTabCategory::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsGmailTabCategory::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsGmailTabCategory();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('overall_percent', $data) && \is_int($data['overall_percent'])) {
            $data['overall_percent'] = (float) $data['overall_percent'];
        }
        if (\array_key_exists('inbox_percent', $data) && \is_int($data['inbox_percent'])) {
            $data['inbox_percent'] = (float) $data['inbox_percent'];
        }
        if (\array_key_exists('spam_percent', $data) && \is_int($data['spam_percent'])) {
            $data['spam_percent'] = (float) $data['spam_percent'];
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('overall_percent', $data) && $data['overall_percent'] !== null) {
            $object->setOverallPercent($data['overall_percent']);
        }
        elseif (\array_key_exists('overall_percent', $data) && $data['overall_percent'] === null) {
            $object->setOverallPercent(null);
        }
        if (\array_key_exists('inbox_percent', $data) && $data['inbox_percent'] !== null) {
            $object->setInboxPercent($data['inbox_percent']);
        }
        elseif (\array_key_exists('inbox_percent', $data) && $data['inbox_percent'] === null) {
            $object->setInboxPercent(null);
        }
        if (\array_key_exists('spam_percent', $data) && $data['spam_percent'] !== null) {
            $object->setSpamPercent($data['spam_percent']);
        }
        elseif (\array_key_exists('spam_percent', $data) && $data['spam_percent'] === null) {
            $object->setSpamPercent(null);
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
        return [\MessageBird\Wire\Model\EmailInboxInsightsGmailTabCategory::class => false];
    }
}
