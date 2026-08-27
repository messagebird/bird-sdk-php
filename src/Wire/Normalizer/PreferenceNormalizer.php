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
class PreferenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\Preference::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\Preference::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\Preference();
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
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
            unset($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('handle', $data) && $data['handle'] !== null) {
            $object->setHandle($data['handle']);
            unset($data['handle']);
        }
        elseif (\array_key_exists('handle', $data) && $data['handle'] === null) {
            $object->setHandle(null);
        }
        if (\array_key_exists('sender_scope', $data) && $data['sender_scope'] !== null) {
            $object->setSenderScope($data['sender_scope']);
            unset($data['sender_scope']);
        }
        elseif (\array_key_exists('sender_scope', $data) && $data['sender_scope'] === null) {
            $object->setSenderScope(null);
        }
        if (\array_key_exists('topic_id', $data) && $data['topic_id'] !== null) {
            $object->setTopicId($data['topic_id']);
            unset($data['topic_id']);
        }
        elseif (\array_key_exists('topic_id', $data) && $data['topic_id'] === null) {
            $object->setTopicId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('coverage', $data) && $data['coverage'] !== null) {
            $object->setCoverage($data['coverage']);
            unset($data['coverage']);
        }
        elseif (\array_key_exists('coverage', $data) && $data['coverage'] === null) {
            $object->setCoverage(null);
        }
        if (\array_key_exists('effective_at', $data) && $data['effective_at'] !== null) {
            $object->setEffectiveAt(new \DateTime($data['effective_at']));
            unset($data['effective_at']);
        }
        elseif (\array_key_exists('effective_at', $data) && $data['effective_at'] === null) {
            $object->setEffectiveAt(null);
        }
        if (\array_key_exists('origin', $data) && $data['origin'] !== null) {
            $object->setOrigin($data['origin']);
            unset($data['origin']);
        }
        elseif (\array_key_exists('origin', $data) && $data['origin'] === null) {
            $object->setOrigin(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
            unset($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('consented_at', $data) && $data['consented_at'] !== null) {
            $object->setConsentedAt(new \DateTime($data['consented_at']));
            unset($data['consented_at']);
        }
        elseif (\array_key_exists('consented_at', $data) && $data['consented_at'] === null) {
            $object->setConsentedAt(null);
        }
        if (\array_key_exists('contact_id', $data) && $data['contact_id'] !== null) {
            $object->setContactId($data['contact_id']);
            unset($data['contact_id']);
        }
        elseif (\array_key_exists('contact_id', $data) && $data['contact_id'] === null) {
            $object->setContactId(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\Preference::class => false];
    }
}
