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
class EmailCompetitiveNotableCampaignNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailCompetitiveNotableCampaign::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailCompetitiveNotableCampaign::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailCompetitiveNotableCampaign();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('watchlist_brand_id', $data) && $data['watchlist_brand_id'] !== null) {
            $object->setWatchlistBrandId($data['watchlist_brand_id']);
        }
        elseif (\array_key_exists('watchlist_brand_id', $data) && $data['watchlist_brand_id'] === null) {
            $object->setWatchlistBrandId(null);
        }
        if (\array_key_exists('brand_name', $data) && $data['brand_name'] !== null) {
            $object->setBrandName($data['brand_name']);
        }
        elseif (\array_key_exists('brand_name', $data) && $data['brand_name'] === null) {
            $object->setBrandName(null);
        }
        if (\array_key_exists('signal', $data) && $data['signal'] !== null) {
            $object->setSignal($data['signal']);
        }
        elseif (\array_key_exists('signal', $data) && $data['signal'] === null) {
            $object->setSignal(null);
        }
        if (\array_key_exists('claim', $data) && $data['claim'] !== null) {
            $object->setClaim($this->denormalizer->denormalize($data['claim'], \MessageBird\Wire\Model\EmailCompetitiveNotableCampaignClaim::class, 'json', $context));
        }
        elseif (\array_key_exists('claim', $data) && $data['claim'] === null) {
            $object->setClaim(null);
        }
        if (\array_key_exists('evidence', $data) && $data['evidence'] !== null) {
            $object->setEvidence($this->denormalizer->denormalize($data['evidence'], \MessageBird\Wire\Model\EmailCompetitiveNotableEvidence::class, 'json', $context));
        }
        elseif (\array_key_exists('evidence', $data) && $data['evidence'] === null) {
            $object->setEvidence(null);
        }
        if (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] !== null) {
            $object->setMailboxProvider($data['mailbox_provider']);
        }
        elseif (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] === null) {
            $object->setMailboxProvider(null);
        }
        if (\array_key_exists('campaign', $data) && $data['campaign'] !== null) {
            $object->setCampaign($this->denormalizer->denormalize($data['campaign'], \MessageBird\Wire\Model\EmailCompetitiveCampaign::class, 'json', $context));
        }
        elseif (\array_key_exists('campaign', $data) && $data['campaign'] === null) {
            $object->setCampaign(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['watchlist_brand_id'] = $data->getWatchlistBrandId();
        $dataArray['signal'] = $data->getSignal();
        $dataArray['evidence'] = $this->normalizer->normalize($data->getEvidence(), 'json', $context);
        $dataArray['campaign'] = $this->normalizer->normalize($data->getCampaign(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailCompetitiveNotableCampaign::class => false];
    }
}
