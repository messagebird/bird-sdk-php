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
class EmailCompetitiveBrandSeriesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveBrandSeries::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveBrandSeries::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveBrandSeries();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_workspace', $data) && \is_int($data['is_workspace'])) {
            $data['is_workspace'] = (bool) $data['is_workspace'];
        }
        if (\array_key_exists('watchlist_brand_id', $data) && $data['watchlist_brand_id'] !== null) {
            $object->setWatchlistBrandId($data['watchlist_brand_id']);
        }
        elseif (\array_key_exists('watchlist_brand_id', $data) && $data['watchlist_brand_id'] === null) {
            $object->setWatchlistBrandId(null);
        }
        if (\array_key_exists('is_workspace', $data) && $data['is_workspace'] !== null) {
            $object->setIsWorkspace($data['is_workspace']);
        }
        elseif (\array_key_exists('is_workspace', $data) && $data['is_workspace'] === null) {
            $object->setIsWorkspace(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('sending_domains', $data) && $data['sending_domains'] !== null) {
            $values = [];
            foreach ($data['sending_domains'] as $value) {
                $values[] = $value;
            }
            $object->setSendingDomains($values);
        }
        elseif (\array_key_exists('sending_domains', $data) && $data['sending_domains'] === null) {
            $object->setSendingDomains(null);
        }
        if (\array_key_exists('panel_status', $data) && $data['panel_status'] !== null) {
            $object->setPanelStatus($data['panel_status']);
        }
        elseif (\array_key_exists('panel_status', $data) && $data['panel_status'] === null) {
            $object->setPanelStatus(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('points', $data) && $data['points'] !== null) {
            $values_1 = [];
            foreach ($data['points'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\EmailCompetitiveVolumePoint::class, 'json', $context);
            }
            $object->setPoints($values_1);
        }
        elseif (\array_key_exists('points', $data) && $data['points'] === null) {
            $object->setPoints(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('watchlistBrandId') && null !== $data->getWatchlistBrandId()) {
            $dataArray['watchlist_brand_id'] = $data->getWatchlistBrandId();
        }
        $dataArray['panel_status'] = $data->getPanelStatus();
        $dataArray['source'] = $data->getSource();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveBrandSeries::class => false];
    }
}
