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
class EmailInboxInsightsSeedTestDetailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestDetail::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailInboxInsightsSeedTestDetail::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailInboxInsightsSeedTestDetail();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('inbox_rate_percent', $data) && \is_int($data['inbox_rate_percent'])) {
            $data['inbox_rate_percent'] = (float) $data['inbox_rate_percent'];
        }
        if (\array_key_exists('test_id', $data) && $data['test_id'] !== null) {
            $object->setTestId($data['test_id']);
            unset($data['test_id']);
        }
        elseif (\array_key_exists('test_id', $data) && $data['test_id'] === null) {
            $object->setTestId(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
            unset($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('tested_at', $data) && $data['tested_at'] !== null) {
            $object->setTestedAt(new \DateTime($data['tested_at']));
            unset($data['tested_at']);
        }
        elseif (\array_key_exists('tested_at', $data) && $data['tested_at'] === null) {
            $object->setTestedAt(null);
        }
        if (\array_key_exists('list_type', $data) && $data['list_type'] !== null) {
            $object->setListType($data['list_type']);
            unset($data['list_type']);
        }
        elseif (\array_key_exists('list_type', $data) && $data['list_type'] === null) {
            $object->setListType(null);
        }
        if (\array_key_exists('engagement_profile', $data) && $data['engagement_profile'] !== null) {
            $object->setEngagementProfile($data['engagement_profile']);
            unset($data['engagement_profile']);
        }
        elseif (\array_key_exists('engagement_profile', $data) && $data['engagement_profile'] === null) {
            $object->setEngagementProfile(null);
        }
        if (\array_key_exists('seed_count', $data) && $data['seed_count'] !== null) {
            $object->setSeedCount($data['seed_count']);
            unset($data['seed_count']);
        }
        elseif (\array_key_exists('seed_count', $data) && $data['seed_count'] === null) {
            $object->setSeedCount(null);
        }
        if (\array_key_exists('inbox_rate_percent', $data) && $data['inbox_rate_percent'] !== null) {
            $object->setInboxRatePercent($data['inbox_rate_percent']);
            unset($data['inbox_rate_percent']);
        }
        elseif (\array_key_exists('inbox_rate_percent', $data) && $data['inbox_rate_percent'] === null) {
            $object->setInboxRatePercent(null);
        }
        if (\array_key_exists('providers', $data) && $data['providers'] !== null) {
            $object->setProviders($this->denormalizer->denormalize($data['providers'], \MessageBird\Wire\Model\EmailInboxInsightsSeedTestProviders::class, 'json', $context));
            unset($data['providers']);
        }
        elseif (\array_key_exists('providers', $data) && $data['providers'] === null) {
            $object->setProviders(null);
        }
        if (\array_key_exists('auth', $data) && $data['auth'] !== null) {
            $object->setAuth($this->denormalizer->denormalize($data['auth'], \MessageBird\Wire\Model\EmailInboxInsightsSeedTestAuth::class, 'json', $context));
            unset($data['auth']);
        }
        elseif (\array_key_exists('auth', $data) && $data['auth'] === null) {
            $object->setAuth(null);
        }
        if (\array_key_exists('engagement_split', $data) && $data['engagement_split'] !== null) {
            $object->setEngagementSplit($this->denormalizer->denormalize($data['engagement_split'], \MessageBird\Wire\Model\EmailInboxInsightsSeedEngagementSplit::class, 'json', $context));
            unset($data['engagement_split']);
        }
        elseif (\array_key_exists('engagement_split', $data) && $data['engagement_split'] === null) {
            $object->setEngagementSplit(null);
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
        $dataArray['providers'] = $this->normalizer->normalize($data->getProviders(), 'json', $context);
        $dataArray['auth'] = $this->normalizer->normalize($data->getAuth(), 'json', $context);
        $dataArray['engagement_split'] = $this->normalizer->normalize($data->getEngagementSplit(), 'json', $context);
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailInboxInsightsSeedTestDetail::class => false];
    }
}
