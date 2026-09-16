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
class EmailCompetitiveNotableFeedNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveNotableFeed::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveNotableFeed::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveNotableFeed();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('truncated', $data) && \is_int($data['truncated'])) {
            $data['truncated'] = (bool) $data['truncated'];
        }
        if (\array_key_exists('period', $data) && $data['period'] !== null) {
            $object->setPeriod($this->denormalizer->denormalize($data['period'], \MessageBird\Wire\Model\EmailCompetitivePeriod::class, 'json', $context));
        }
        elseif (\array_key_exists('period', $data) && $data['period'] === null) {
            $object->setPeriod(null);
        }
        if (\array_key_exists('panel_status', $data) && $data['panel_status'] !== null) {
            $object->setPanelStatus($data['panel_status']);
        }
        elseif (\array_key_exists('panel_status', $data) && $data['panel_status'] === null) {
            $object->setPanelStatus(null);
        }
        if (\array_key_exists('data', $data) && $data['data'] !== null) {
            $values = [];
            foreach ($data['data'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\EmailCompetitiveNotableCampaign::class, 'json', $context);
            }
            $object->setData($values);
        }
        elseif (\array_key_exists('data', $data) && $data['data'] === null) {
            $object->setData(null);
        }
        if (\array_key_exists('truncated', $data) && $data['truncated'] !== null) {
            $object->setTruncated($data['truncated']);
        }
        elseif (\array_key_exists('truncated', $data) && $data['truncated'] === null) {
            $object->setTruncated(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['period'] = $this->normalizer->normalize($data->getPeriod(), 'json', $context);
        $dataArray['panel_status'] = $data->getPanelStatus();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveNotableFeed::class => false];
    }
}
