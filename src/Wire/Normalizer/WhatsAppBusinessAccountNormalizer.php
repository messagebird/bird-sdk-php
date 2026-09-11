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
class WhatsAppBusinessAccountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppBusinessAccount::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppBusinessAccount::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppBusinessAccount();
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
        if (\array_key_exists('waba', $data) && $data['waba'] !== null) {
            $object->setWaba($data['waba']);
        }
        elseif (\array_key_exists('waba', $data) && $data['waba'] === null) {
            $object->setWaba(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('account_review_status', $data) && $data['account_review_status'] !== null) {
            $object->setAccountReviewStatus($data['account_review_status']);
        }
        elseif (\array_key_exists('account_review_status', $data) && $data['account_review_status'] === null) {
            $object->setAccountReviewStatus(null);
        }
        if (\array_key_exists('business_verification_status', $data) && $data['business_verification_status'] !== null) {
            $object->setBusinessVerificationStatus($data['business_verification_status']);
        }
        elseif (\array_key_exists('business_verification_status', $data) && $data['business_verification_status'] === null) {
            $object->setBusinessVerificationStatus(null);
        }
        if (\array_key_exists('marketing_messages_onboarding_status', $data) && $data['marketing_messages_onboarding_status'] !== null) {
            $object->setMarketingMessagesOnboardingStatus($data['marketing_messages_onboarding_status']);
        }
        elseif (\array_key_exists('marketing_messages_onboarding_status', $data) && $data['marketing_messages_onboarding_status'] === null) {
            $object->setMarketingMessagesOnboardingStatus(null);
        }
        if (\array_key_exists('portfolio', $data) && $data['portfolio'] !== null) {
            $object->setPortfolio($this->denormalizer->denormalize($data['portfolio'], \MessageBird\Wire\Model\WhatsAppBusinessAccountPortfolio::class, 'json', $context));
        }
        elseif (\array_key_exists('portfolio', $data) && $data['portfolio'] === null) {
            $object->setPortfolio(null);
        }
        if (\array_key_exists('ban', $data) && $data['ban'] !== null) {
            $object->setBan($this->denormalizer->denormalize($data['ban'], \MessageBird\Wire\Model\WhatsAppBusinessAccountBan::class, 'json', $context));
        }
        elseif (\array_key_exists('ban', $data) && $data['ban'] === null) {
            $object->setBan(null);
        }
        if (\array_key_exists('meta_synced_at', $data) && $data['meta_synced_at'] !== null) {
            $object->setMetaSyncedAt(new \DateTime($data['meta_synced_at']));
        }
        elseif (\array_key_exists('meta_synced_at', $data) && $data['meta_synced_at'] === null) {
            $object->setMetaSyncedAt(null);
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
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppBusinessAccount::class => false];
    }
}
