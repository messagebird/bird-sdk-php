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
class AMBBusinessAccountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\AMBBusinessAccount::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\AMBBusinessAccount::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\AMBBusinessAccount();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('invitations_enabled', $data) && \is_int($data['invitations_enabled'])) {
            $data['invitations_enabled'] = (bool) $data['invitations_enabled'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('apple_business_id', $data) && $data['apple_business_id'] !== null) {
            $object->setAppleBusinessId($data['apple_business_id']);
        }
        elseif (\array_key_exists('apple_business_id', $data) && $data['apple_business_id'] === null) {
            $object->setAppleBusinessId(null);
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
        if (\array_key_exists('status_reason', $data) && $data['status_reason'] !== null) {
            $object->setStatusReason($data['status_reason']);
        }
        elseif (\array_key_exists('status_reason', $data) && $data['status_reason'] === null) {
            $object->setStatusReason(null);
        }
        if (\array_key_exists('invitations_enabled', $data) && $data['invitations_enabled'] !== null) {
            $object->setInvitationsEnabled($data['invitations_enabled']);
        }
        elseif (\array_key_exists('invitations_enabled', $data) && $data['invitations_enabled'] === null) {
            $object->setInvitationsEnabled(null);
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
        if (\array_key_exists('next', $data) && $data['next'] !== null) {
            $values = [];
            foreach ($data['next'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\NextAction::class, 'json', $context);
            }
            $object->setNext($values);
        }
        elseif (\array_key_exists('next', $data) && $data['next'] === null) {
            $object->setNext(null);
        }
        if (\array_key_exists('account_review_status', $data) && $data['account_review_status'] !== null) {
            $object->setAccountReviewStatus($data['account_review_status']);
        }
        elseif (\array_key_exists('account_review_status', $data) && $data['account_review_status'] === null) {
            $object->setAccountReviewStatus(null);
        }
        if (\array_key_exists('finish_setup_url', $data) && $data['finish_setup_url'] !== null) {
            $object->setFinishSetupUrl($data['finish_setup_url']);
        }
        elseif (\array_key_exists('finish_setup_url', $data) && $data['finish_setup_url'] === null) {
            $object->setFinishSetupUrl(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['name'] = $data->getName();
        $dataArray['status'] = $data->getStatus();
        if ($data->isInitialized('accountReviewStatus') && null !== $data->getAccountReviewStatus()) {
            $dataArray['account_review_status'] = $data->getAccountReviewStatus();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\AMBBusinessAccount::class => false];
    }
}
