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
class SMSKeywordRuleUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\SMSKeywordRuleUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\SMSKeywordRuleUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\SMSKeywordRuleUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('confirmed_self_managed', $data) && \is_int($data['confirmed_self_managed'])) {
            $data['confirmed_self_managed'] = (bool) $data['confirmed_self_managed'];
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
        if (\array_key_exists('reply', $data) && $data['reply'] !== null) {
            $object->setReply($data['reply']);
        }
        elseif (\array_key_exists('reply', $data) && $data['reply'] === null) {
            $object->setReply(null);
        }
        if (\array_key_exists('confirmed_self_managed', $data) && $data['confirmed_self_managed'] !== null) {
            $object->setConfirmedSelfManaged($data['confirmed_self_managed']);
        }
        elseif (\array_key_exists('confirmed_self_managed', $data) && $data['confirmed_self_managed'] === null) {
            $object->setConfirmedSelfManaged(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('keywords') && null !== $data->getKeywords()) {
            $values = [];
            foreach ($data->getKeywords() as $value) {
                $values[] = $value;
            }
            $dataArray['keywords'] = $values;
        }
        if ($data->isInitialized('reply')) {
            $dataArray['reply'] = $data->getReply();
        }
        if ($data->isInitialized('confirmedSelfManaged') && null !== $data->getConfirmedSelfManaged()) {
            $dataArray['confirmed_self_managed'] = $data->getConfirmedSelfManaged();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\SMSKeywordRuleUpdate::class => false];
    }
}
