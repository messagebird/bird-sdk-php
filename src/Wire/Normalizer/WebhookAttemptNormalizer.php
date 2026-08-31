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
class WebhookAttemptNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WebhookAttempt::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WebhookAttempt::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WebhookAttempt();
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
        if (\array_key_exists('event_id', $data) && $data['event_id'] !== null) {
            $object->setEventId($data['event_id']);
        }
        elseif (\array_key_exists('event_id', $data) && $data['event_id'] === null) {
            $object->setEventId(null);
        }
        if (\array_key_exists('event_type', $data) && $data['event_type'] !== null) {
            $object->setEventType($data['event_type']);
        }
        elseif (\array_key_exists('event_type', $data) && $data['event_type'] === null) {
            $object->setEventType(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('response_status_code', $data) && $data['response_status_code'] !== null) {
            $object->setResponseStatusCode($data['response_status_code']);
        }
        elseif (\array_key_exists('response_status_code', $data) && $data['response_status_code'] === null) {
            $object->setResponseStatusCode(null);
        }
        if (\array_key_exists('response_body', $data) && $data['response_body'] !== null) {
            $object->setResponseBody($data['response_body']);
        }
        elseif (\array_key_exists('response_body', $data) && $data['response_body'] === null) {
            $object->setResponseBody(null);
        }
        if (\array_key_exists('response_duration_ms', $data) && $data['response_duration_ms'] !== null) {
            $object->setResponseDurationMs($data['response_duration_ms']);
        }
        elseif (\array_key_exists('response_duration_ms', $data) && $data['response_duration_ms'] === null) {
            $object->setResponseDurationMs(null);
        }
        if (\array_key_exists('attempted_at', $data) && $data['attempted_at'] !== null) {
            $object->setAttemptedAt(new \DateTime($data['attempted_at']));
        }
        elseif (\array_key_exists('attempted_at', $data) && $data['attempted_at'] === null) {
            $object->setAttemptedAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('eventId')) {
            $dataArray['event_id'] = $data->getEventId();
        }
        $dataArray['event_type'] = $data->getEventType();
        $dataArray['status'] = $data->getStatus();
        $dataArray['url'] = $data->getUrl();
        $dataArray['response_status_code'] = $data->getResponseStatusCode();
        if ($data->isInitialized('responseBody') && null !== $data->getResponseBody()) {
            $dataArray['response_body'] = $data->getResponseBody();
        }
        $dataArray['response_duration_ms'] = $data->getResponseDurationMs();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WebhookAttempt::class => false];
    }
}
