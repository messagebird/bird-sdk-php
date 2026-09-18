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
class WhatsAppKeywordRuleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppKeywordRule::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppKeywordRule::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppKeywordRule();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
            $object->setScope($data['scope']);
        }
        elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
            $object->setScope(null);
        }
        if (\array_key_exists('operation', $data) && $data['operation'] !== null) {
            $object->setOperation($data['operation']);
        }
        elseif (\array_key_exists('operation', $data) && $data['operation'] === null) {
            $object->setOperation(null);
        }
        if (\array_key_exists('country', $data) && $data['country'] !== null) {
            $object->setCountry($data['country']);
        }
        elseif (\array_key_exists('country', $data) && $data['country'] === null) {
            $object->setCountry(null);
        }
        if (\array_key_exists('waba', $data) && $data['waba'] !== null) {
            $object->setWaba($data['waba']);
        }
        elseif (\array_key_exists('waba', $data) && $data['waba'] === null) {
            $object->setWaba(null);
        }
        if (\array_key_exists('keywords', $data) && $data['keywords'] !== null) {
            $values = [];
            foreach ($data['keywords'] as $value) {
                $values[] = $value;
            }
            $object->setKeywords($values);
        }
        elseif (\array_key_exists('keywords', $data) && $data['keywords'] === null) {
            $object->setKeywords(null);
        }
        if (\array_key_exists('effective_keywords', $data) && $data['effective_keywords'] !== null) {
            $values_1 = [];
            foreach ($data['effective_keywords'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setEffectiveKeywords($values_1);
        }
        elseif (\array_key_exists('effective_keywords', $data) && $data['effective_keywords'] === null) {
            $object->setEffectiveKeywords(null);
        }
        if (\array_key_exists('reply', $data) && $data['reply'] !== null) {
            $object->setReply($data['reply']);
        }
        elseif (\array_key_exists('reply', $data) && $data['reply'] === null) {
            $object->setReply(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
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
        $dataArray['id'] = $data->getId();
        $dataArray['scope'] = $data->getScope();
        $dataArray['operation'] = $data->getOperation();
        if ($data->isInitialized('country')) {
            $dataArray['country'] = $data->getCountry();
        }
        if ($data->isInitialized('waba')) {
            $dataArray['waba'] = $data->getWaba();
        }
        $values = [];
        foreach ($data->getKeywords() as $value) {
            $values[] = $value;
        }
        $dataArray['keywords'] = $values;
        $values_1 = [];
        foreach ($data->getEffectiveKeywords() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['effective_keywords'] = $values_1;
        if ($data->isInitialized('reply')) {
            $dataArray['reply'] = $data->getReply();
        }
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppKeywordRule::class => false];
    }
}
