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
class EmailStatsQueryFiltersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsQueryFilters::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsQueryFilters::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsQueryFilters();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('sending_domain', $data) && $data['sending_domain'] !== null) {
            $object->setSendingDomain($this->denormalizer->denormalize($data['sending_domain'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('sending_domain', $data) && $data['sending_domain'] === null) {
            $object->setSendingDomain(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($this->denormalizer->denormalize($data['category'], \MessageBird\Wire\Model\EmailStatsQueryCategoryFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('template_id', $data) && $data['template_id'] !== null) {
            $object->setTemplateId($this->denormalizer->denormalize($data['template_id'], \MessageBird\Wire\Model\EmailStatsQueryTemplateFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('template_id', $data) && $data['template_id'] === null) {
            $object->setTemplateId(null);
        }
        if (\array_key_exists('tag', $data) && $data['tag'] !== null) {
            $object->setTag($this->denormalizer->denormalize($data['tag'], \MessageBird\Wire\Model\EmailStatsQueryTagFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('tag', $data) && $data['tag'] === null) {
            $object->setTag(null);
        }
        if (\array_key_exists('recipient_domain', $data) && $data['recipient_domain'] !== null) {
            $object->setRecipientDomain($this->denormalizer->denormalize($data['recipient_domain'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('recipient_domain', $data) && $data['recipient_domain'] === null) {
            $object->setRecipientDomain(null);
        }
        if (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] !== null) {
            $object->setMailboxProvider($this->denormalizer->denormalize($data['mailbox_provider'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] === null) {
            $object->setMailboxProvider(null);
        }
        if (\array_key_exists('mailbox_provider_region', $data) && $data['mailbox_provider_region'] !== null) {
            $object->setMailboxProviderRegion($this->denormalizer->denormalize($data['mailbox_provider_region'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('mailbox_provider_region', $data) && $data['mailbox_provider_region'] === null) {
            $object->setMailboxProviderRegion(null);
        }
        if (\array_key_exists('sending_ip', $data) && $data['sending_ip'] !== null) {
            $object->setSendingIp($this->denormalizer->denormalize($data['sending_ip'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('sending_ip', $data) && $data['sending_ip'] === null) {
            $object->setSendingIp(null);
        }
        if (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] !== null) {
            $object->setIpPoolId($this->denormalizer->denormalize($data['ip_pool_id'], \MessageBird\Wire\Model\EmailStatsQueryIPPoolFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] === null) {
            $object->setIpPoolId(null);
        }
        if (\array_key_exists('broadcast_id', $data) && $data['broadcast_id'] !== null) {
            $object->setBroadcastId($this->denormalizer->denormalize($data['broadcast_id'], \MessageBird\Wire\Model\EmailStatsQueryBroadcastFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('broadcast_id', $data) && $data['broadcast_id'] === null) {
            $object->setBroadcastId(null);
        }
        if (\array_key_exists('country', $data) && $data['country'] !== null) {
            $object->setCountry($this->denormalizer->denormalize($data['country'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('country', $data) && $data['country'] === null) {
            $object->setCountry(null);
        }
        if (\array_key_exists('region', $data) && $data['region'] !== null) {
            $object->setRegion($this->denormalizer->denormalize($data['region'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('region', $data) && $data['region'] === null) {
            $object->setRegion(null);
        }
        if (\array_key_exists('city', $data) && $data['city'] !== null) {
            $object->setCity($this->denormalizer->denormalize($data['city'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('city', $data) && $data['city'] === null) {
            $object->setCity(null);
        }
        if (\array_key_exists('agent_family', $data) && $data['agent_family'] !== null) {
            $object->setAgentFamily($this->denormalizer->denormalize($data['agent_family'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('agent_family', $data) && $data['agent_family'] === null) {
            $object->setAgentFamily(null);
        }
        if (\array_key_exists('os_family', $data) && $data['os_family'] !== null) {
            $object->setOsFamily($this->denormalizer->denormalize($data['os_family'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('os_family', $data) && $data['os_family'] === null) {
            $object->setOsFamily(null);
        }
        if (\array_key_exists('device_family', $data) && $data['device_family'] !== null) {
            $object->setDeviceFamily($this->denormalizer->denormalize($data['device_family'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('device_family', $data) && $data['device_family'] === null) {
            $object->setDeviceFamily(null);
        }
        if (\array_key_exists('smtp_error_code', $data) && $data['smtp_error_code'] !== null) {
            $object->setSmtpErrorCode($this->denormalizer->denormalize($data['smtp_error_code'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('smtp_error_code', $data) && $data['smtp_error_code'] === null) {
            $object->setSmtpErrorCode(null);
        }
        if (\array_key_exists('feedback_type', $data) && $data['feedback_type'] !== null) {
            $object->setFeedbackType($this->denormalizer->denormalize($data['feedback_type'], \MessageBird\Wire\Model\EmailStatsQueryStringFilter::class, 'json', $context));
        }
        elseif (\array_key_exists('feedback_type', $data) && $data['feedback_type'] === null) {
            $object->setFeedbackType(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('sendingDomain') && null !== $data->getSendingDomain()) {
            $dataArray['sending_domain'] = $this->normalizer->normalize($data->getSendingDomain(), 'json', $context);
        }
        if ($data->isInitialized('category') && null !== $data->getCategory()) {
            $dataArray['category'] = $this->normalizer->normalize($data->getCategory(), 'json', $context);
        }
        if ($data->isInitialized('templateId') && null !== $data->getTemplateId()) {
            $dataArray['template_id'] = $this->normalizer->normalize($data->getTemplateId(), 'json', $context);
        }
        if ($data->isInitialized('tag') && null !== $data->getTag()) {
            $dataArray['tag'] = $this->normalizer->normalize($data->getTag(), 'json', $context);
        }
        if ($data->isInitialized('recipientDomain') && null !== $data->getRecipientDomain()) {
            $dataArray['recipient_domain'] = $this->normalizer->normalize($data->getRecipientDomain(), 'json', $context);
        }
        if ($data->isInitialized('mailboxProvider') && null !== $data->getMailboxProvider()) {
            $dataArray['mailbox_provider'] = $this->normalizer->normalize($data->getMailboxProvider(), 'json', $context);
        }
        if ($data->isInitialized('mailboxProviderRegion') && null !== $data->getMailboxProviderRegion()) {
            $dataArray['mailbox_provider_region'] = $this->normalizer->normalize($data->getMailboxProviderRegion(), 'json', $context);
        }
        if ($data->isInitialized('sendingIp') && null !== $data->getSendingIp()) {
            $dataArray['sending_ip'] = $this->normalizer->normalize($data->getSendingIp(), 'json', $context);
        }
        if ($data->isInitialized('ipPoolId') && null !== $data->getIpPoolId()) {
            $dataArray['ip_pool_id'] = $this->normalizer->normalize($data->getIpPoolId(), 'json', $context);
        }
        if ($data->isInitialized('broadcastId') && null !== $data->getBroadcastId()) {
            $dataArray['broadcast_id'] = $this->normalizer->normalize($data->getBroadcastId(), 'json', $context);
        }
        if ($data->isInitialized('country') && null !== $data->getCountry()) {
            $dataArray['country'] = $this->normalizer->normalize($data->getCountry(), 'json', $context);
        }
        if ($data->isInitialized('region') && null !== $data->getRegion()) {
            $dataArray['region'] = $this->normalizer->normalize($data->getRegion(), 'json', $context);
        }
        if ($data->isInitialized('city') && null !== $data->getCity()) {
            $dataArray['city'] = $this->normalizer->normalize($data->getCity(), 'json', $context);
        }
        if ($data->isInitialized('agentFamily') && null !== $data->getAgentFamily()) {
            $dataArray['agent_family'] = $this->normalizer->normalize($data->getAgentFamily(), 'json', $context);
        }
        if ($data->isInitialized('osFamily') && null !== $data->getOsFamily()) {
            $dataArray['os_family'] = $this->normalizer->normalize($data->getOsFamily(), 'json', $context);
        }
        if ($data->isInitialized('deviceFamily') && null !== $data->getDeviceFamily()) {
            $dataArray['device_family'] = $this->normalizer->normalize($data->getDeviceFamily(), 'json', $context);
        }
        if ($data->isInitialized('smtpErrorCode') && null !== $data->getSmtpErrorCode()) {
            $dataArray['smtp_error_code'] = $this->normalizer->normalize($data->getSmtpErrorCode(), 'json', $context);
        }
        if ($data->isInitialized('feedbackType') && null !== $data->getFeedbackType()) {
            $dataArray['feedback_type'] = $this->normalizer->normalize($data->getFeedbackType(), 'json', $context);
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsQueryFilters::class => false];
    }
}
