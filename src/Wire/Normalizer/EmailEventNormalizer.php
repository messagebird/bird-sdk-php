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
class EmailEventNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailEvent::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailEvent::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailEvent();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_prefetched', $data) && \is_int($data['is_prefetched'])) {
            $data['is_prefetched'] = (bool) $data['is_prefetched'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
        }
        elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('occurred_at', $data) && $data['occurred_at'] !== null) {
            $object->setOccurredAt(new \DateTime($data['occurred_at']));
        }
        elseif (\array_key_exists('occurred_at', $data) && $data['occurred_at'] === null) {
            $object->setOccurredAt(null);
        }
        if (\array_key_exists('recipient_id', $data) && $data['recipient_id'] !== null) {
            $object->setRecipientId($data['recipient_id']);
        }
        elseif (\array_key_exists('recipient_id', $data) && $data['recipient_id'] === null) {
            $object->setRecipientId(null);
        }
        if (\array_key_exists('bounce_type', $data) && $data['bounce_type'] !== null) {
            $object->setBounceType($data['bounce_type']);
        }
        elseif (\array_key_exists('bounce_type', $data) && $data['bounce_type'] === null) {
            $object->setBounceType(null);
        }
        if (\array_key_exists('bounce_class', $data) && $data['bounce_class'] !== null) {
            $object->setBounceClass($data['bounce_class']);
        }
        elseif (\array_key_exists('bounce_class', $data) && $data['bounce_class'] === null) {
            $object->setBounceClass(null);
        }
        if (\array_key_exists('bounce_code', $data) && $data['bounce_code'] !== null) {
            $object->setBounceCode($data['bounce_code']);
        }
        elseif (\array_key_exists('bounce_code', $data) && $data['bounce_code'] === null) {
            $object->setBounceCode(null);
        }
        if (\array_key_exists('bounce_description', $data) && $data['bounce_description'] !== null) {
            $object->setBounceDescription($data['bounce_description']);
        }
        elseif (\array_key_exists('bounce_description', $data) && $data['bounce_description'] === null) {
            $object->setBounceDescription(null);
        }
        if (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] !== null) {
            $object->setRejectionReason($data['rejection_reason']);
        }
        elseif (\array_key_exists('rejection_reason', $data) && $data['rejection_reason'] === null) {
            $object->setRejectionReason(null);
        }
        if (\array_key_exists('sending_ip', $data) && $data['sending_ip'] !== null) {
            $object->setSendingIp($data['sending_ip']);
        }
        elseif (\array_key_exists('sending_ip', $data) && $data['sending_ip'] === null) {
            $object->setSendingIp(null);
        }
        if (\array_key_exists('is_prefetched', $data) && $data['is_prefetched'] !== null) {
            $object->setIsPrefetched($data['is_prefetched']);
        }
        elseif (\array_key_exists('is_prefetched', $data) && $data['is_prefetched'] === null) {
            $object->setIsPrefetched(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('country', $data) && $data['country'] !== null) {
            $object->setCountry($data['country']);
        }
        elseif (\array_key_exists('country', $data) && $data['country'] === null) {
            $object->setCountry(null);
        }
        if (\array_key_exists('ip_address', $data) && $data['ip_address'] !== null) {
            $object->setIpAddress($data['ip_address']);
        }
        elseif (\array_key_exists('ip_address', $data) && $data['ip_address'] === null) {
            $object->setIpAddress(null);
        }
        if (\array_key_exists('user_agent', $data) && $data['user_agent'] !== null) {
            $object->setUserAgent($data['user_agent']);
        }
        elseif (\array_key_exists('user_agent', $data) && $data['user_agent'] === null) {
            $object->setUserAgent(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        $dataArray['occurred_at'] = $data->getOccurredAt()->format('Y-m-d\TH:i:sP');
        $dataArray['recipient_id'] = $data->getRecipientId();
        if ($data->isInitialized('bounceType')) {
            $dataArray['bounce_type'] = $data->getBounceType();
        }
        if ($data->isInitialized('bounceClass')) {
            $dataArray['bounce_class'] = $data->getBounceClass();
        }
        if ($data->isInitialized('bounceCode')) {
            $dataArray['bounce_code'] = $data->getBounceCode();
        }
        if ($data->isInitialized('bounceDescription')) {
            $dataArray['bounce_description'] = $data->getBounceDescription();
        }
        if ($data->isInitialized('rejectionReason')) {
            $dataArray['rejection_reason'] = $data->getRejectionReason();
        }
        if ($data->isInitialized('sendingIp')) {
            $dataArray['sending_ip'] = $data->getSendingIp();
        }
        if ($data->isInitialized('isPrefetched')) {
            $dataArray['is_prefetched'] = $data->getIsPrefetched();
        }
        if ($data->isInitialized('url')) {
            $dataArray['url'] = $data->getUrl();
        }
        if ($data->isInitialized('country')) {
            $dataArray['country'] = $data->getCountry();
        }
        if ($data->isInitialized('ipAddress')) {
            $dataArray['ip_address'] = $data->getIpAddress();
        }
        if ($data->isInitialized('userAgent')) {
            $dataArray['user_agent'] = $data->getUserAgent();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailEvent::class => false];
    }
}
