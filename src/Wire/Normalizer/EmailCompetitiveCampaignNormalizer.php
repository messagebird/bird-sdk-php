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
class EmailCompetitiveCampaignNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveCampaign::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveCampaign::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveCampaign();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('read_rate', $data) && \is_int($data['read_rate'])) {
            $data['read_rate'] = (float) $data['read_rate'];
        }
        if (\array_key_exists('discount_percent', $data) && \is_int($data['discount_percent'])) {
            $data['discount_percent'] = (float) $data['discount_percent'];
        }
        if (\array_key_exists('inbox_rate', $data) && \is_int($data['inbox_rate'])) {
            $data['inbox_rate'] = (float) $data['inbox_rate'];
        }
        if (\array_key_exists('spam_rate', $data) && \is_int($data['spam_rate'])) {
            $data['spam_rate'] = (float) $data['spam_rate'];
        }
        if (\array_key_exists('has_creative', $data) && \is_int($data['has_creative'])) {
            $data['has_creative'] = (bool) $data['has_creative'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
            unset($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('sent_at', $data) && $data['sent_at'] !== null) {
            $object->setSentAt(new \DateTime($data['sent_at']));
            unset($data['sent_at']);
        }
        elseif (\array_key_exists('sent_at', $data) && $data['sent_at'] === null) {
            $object->setSentAt(null);
        }
        if (\array_key_exists('image_url', $data) && $data['image_url'] !== null) {
            $object->setImageUrl($data['image_url']);
            unset($data['image_url']);
        }
        elseif (\array_key_exists('image_url', $data) && $data['image_url'] === null) {
            $object->setImageUrl(null);
        }
        if (\array_key_exists('reach', $data) && $data['reach'] !== null) {
            $object->setReach($data['reach']);
            unset($data['reach']);
        }
        elseif (\array_key_exists('reach', $data) && $data['reach'] === null) {
            $object->setReach(null);
        }
        if (\array_key_exists('read_rate', $data) && $data['read_rate'] !== null) {
            $object->setReadRate($data['read_rate']);
            unset($data['read_rate']);
        }
        elseif (\array_key_exists('read_rate', $data) && $data['read_rate'] === null) {
            $object->setReadRate(null);
        }
        if (\array_key_exists('has_creative', $data) && $data['has_creative'] !== null) {
            $object->setHasCreative($data['has_creative']);
            unset($data['has_creative']);
        }
        elseif (\array_key_exists('has_creative', $data) && $data['has_creative'] === null) {
            $object->setHasCreative(null);
        }
        if (\array_key_exists('discount_percent', $data) && $data['discount_percent'] !== null) {
            $object->setDiscountPercent($data['discount_percent']);
            unset($data['discount_percent']);
        }
        elseif (\array_key_exists('discount_percent', $data) && $data['discount_percent'] === null) {
            $object->setDiscountPercent(null);
        }
        if (\array_key_exists('inbox_rate', $data) && $data['inbox_rate'] !== null) {
            $object->setInboxRate($data['inbox_rate']);
            unset($data['inbox_rate']);
        }
        elseif (\array_key_exists('inbox_rate', $data) && $data['inbox_rate'] === null) {
            $object->setInboxRate(null);
        }
        if (\array_key_exists('spam_rate', $data) && $data['spam_rate'] !== null) {
            $object->setSpamRate($data['spam_rate']);
            unset($data['spam_rate']);
        }
        elseif (\array_key_exists('spam_rate', $data) && $data['spam_rate'] === null) {
            $object->setSpamRate(null);
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
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveCampaign::class => false];
    }
}
