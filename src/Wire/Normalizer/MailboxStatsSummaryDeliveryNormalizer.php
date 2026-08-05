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
class MailboxStatsSummaryDeliveryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\MailboxStatsSummaryDelivery::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\MailboxStatsSummaryDelivery::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\MailboxStatsSummaryDelivery();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('oob_rate', $data) && \is_int($data['oob_rate'])) {
            $data['oob_rate'] = (float) $data['oob_rate'];
        }
        if (\array_key_exists('delivery_rate', $data) && \is_int($data['delivery_rate'])) {
            $data['delivery_rate'] = (float) $data['delivery_rate'];
        }
        if (\array_key_exists('bounce_rate', $data) && \is_int($data['bounce_rate'])) {
            $data['bounce_rate'] = (float) $data['bounce_rate'];
        }
        if (\array_key_exists('complaint_rate', $data) && \is_int($data['complaint_rate'])) {
            $data['complaint_rate'] = (float) $data['complaint_rate'];
        }
        if (\array_key_exists('accepted', $data) && $data['accepted'] !== null) {
            $object->setAccepted($data['accepted']);
            unset($data['accepted']);
        }
        elseif (\array_key_exists('accepted', $data) && $data['accepted'] === null) {
            $object->setAccepted(null);
        }
        if (\array_key_exists('processed', $data) && $data['processed'] !== null) {
            $object->setProcessed($data['processed']);
            unset($data['processed']);
        }
        elseif (\array_key_exists('processed', $data) && $data['processed'] === null) {
            $object->setProcessed(null);
        }
        if (\array_key_exists('delivered', $data) && $data['delivered'] !== null) {
            $object->setDelivered($data['delivered']);
            unset($data['delivered']);
        }
        elseif (\array_key_exists('delivered', $data) && $data['delivered'] === null) {
            $object->setDelivered(null);
        }
        if (\array_key_exists('bounced', $data) && $data['bounced'] !== null) {
            $object->setBounced($data['bounced']);
            unset($data['bounced']);
        }
        elseif (\array_key_exists('bounced', $data) && $data['bounced'] === null) {
            $object->setBounced(null);
        }
        if (\array_key_exists('bounces', $data) && $data['bounces'] !== null) {
            $object->setBounces($this->denormalizer->denormalize($data['bounces'], \MessageBird\Wire\Model\EmailDeliveryStatsBounces::class, 'json', $context));
            unset($data['bounces']);
        }
        elseif (\array_key_exists('bounces', $data) && $data['bounces'] === null) {
            $object->setBounces(null);
        }
        if (\array_key_exists('complained', $data) && $data['complained'] !== null) {
            $object->setComplained($data['complained']);
            unset($data['complained']);
        }
        elseif (\array_key_exists('complained', $data) && $data['complained'] === null) {
            $object->setComplained(null);
        }
        if (\array_key_exists('deferred', $data) && $data['deferred'] !== null) {
            $object->setDeferred($data['deferred']);
            unset($data['deferred']);
        }
        elseif (\array_key_exists('deferred', $data) && $data['deferred'] === null) {
            $object->setDeferred(null);
        }
        if (\array_key_exists('rejected', $data) && $data['rejected'] !== null) {
            $object->setRejected($data['rejected']);
            unset($data['rejected']);
        }
        elseif (\array_key_exists('rejected', $data) && $data['rejected'] === null) {
            $object->setRejected(null);
        }
        if (\array_key_exists('oob_bounces', $data) && $data['oob_bounces'] !== null) {
            $object->setOobBounces($data['oob_bounces']);
            unset($data['oob_bounces']);
        }
        elseif (\array_key_exists('oob_bounces', $data) && $data['oob_bounces'] === null) {
            $object->setOobBounces(null);
        }
        if (\array_key_exists('effective_delivered', $data) && $data['effective_delivered'] !== null) {
            $object->setEffectiveDelivered($data['effective_delivered']);
            unset($data['effective_delivered']);
        }
        elseif (\array_key_exists('effective_delivered', $data) && $data['effective_delivered'] === null) {
            $object->setEffectiveDelivered(null);
        }
        if (\array_key_exists('all_bounces', $data) && $data['all_bounces'] !== null) {
            $object->setAllBounces($data['all_bounces']);
            unset($data['all_bounces']);
        }
        elseif (\array_key_exists('all_bounces', $data) && $data['all_bounces'] === null) {
            $object->setAllBounces(null);
        }
        if (\array_key_exists('oob_rate', $data) && $data['oob_rate'] !== null) {
            $object->setOobRate($data['oob_rate']);
            unset($data['oob_rate']);
        }
        elseif (\array_key_exists('oob_rate', $data) && $data['oob_rate'] === null) {
            $object->setOobRate(null);
        }
        if (\array_key_exists('delivery_rate', $data) && $data['delivery_rate'] !== null) {
            $object->setDeliveryRate($data['delivery_rate']);
            unset($data['delivery_rate']);
        }
        elseif (\array_key_exists('delivery_rate', $data) && $data['delivery_rate'] === null) {
            $object->setDeliveryRate(null);
        }
        if (\array_key_exists('bounce_rate', $data) && $data['bounce_rate'] !== null) {
            $object->setBounceRate($data['bounce_rate']);
            unset($data['bounce_rate']);
        }
        elseif (\array_key_exists('bounce_rate', $data) && $data['bounce_rate'] === null) {
            $object->setBounceRate(null);
        }
        if (\array_key_exists('complaint_rate', $data) && $data['complaint_rate'] !== null) {
            $object->setComplaintRate($data['complaint_rate']);
            unset($data['complaint_rate']);
        }
        elseif (\array_key_exists('complaint_rate', $data) && $data['complaint_rate'] === null) {
            $object->setComplaintRate(null);
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
        return [\MessageBird\Wire\Model\MailboxStatsSummaryDelivery::class => false];
    }
}
