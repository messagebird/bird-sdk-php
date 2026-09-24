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
class EmailStatsQueryDimensionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailStatsQueryDimensions::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailStatsQueryDimensions::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailStatsQueryDimensions();
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
            $object->setSendingDomain($data['sending_domain']);
        }
        elseif (\array_key_exists('sending_domain', $data) && $data['sending_domain'] === null) {
            $object->setSendingDomain(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('template_id', $data) && $data['template_id'] !== null) {
            $object->setTemplateId($data['template_id']);
        }
        elseif (\array_key_exists('template_id', $data) && $data['template_id'] === null) {
            $object->setTemplateId(null);
        }
        if (\array_key_exists('tag', $data) && $data['tag'] !== null) {
            $object->setTag($data['tag']);
        }
        elseif (\array_key_exists('tag', $data) && $data['tag'] === null) {
            $object->setTag(null);
        }
        if (\array_key_exists('recipient_domain', $data) && $data['recipient_domain'] !== null) {
            $object->setRecipientDomain($data['recipient_domain']);
        }
        elseif (\array_key_exists('recipient_domain', $data) && $data['recipient_domain'] === null) {
            $object->setRecipientDomain(null);
        }
        if (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] !== null) {
            $object->setMailboxProvider($data['mailbox_provider']);
        }
        elseif (\array_key_exists('mailbox_provider', $data) && $data['mailbox_provider'] === null) {
            $object->setMailboxProvider(null);
        }
        if (\array_key_exists('mailbox_provider_region', $data) && $data['mailbox_provider_region'] !== null) {
            $object->setMailboxProviderRegion($data['mailbox_provider_region']);
        }
        elseif (\array_key_exists('mailbox_provider_region', $data) && $data['mailbox_provider_region'] === null) {
            $object->setMailboxProviderRegion(null);
        }
        if (\array_key_exists('sending_ip', $data) && $data['sending_ip'] !== null) {
            $object->setSendingIp($data['sending_ip']);
        }
        elseif (\array_key_exists('sending_ip', $data) && $data['sending_ip'] === null) {
            $object->setSendingIp(null);
        }
        if (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] !== null) {
            $object->setIpPoolId($data['ip_pool_id']);
        }
        elseif (\array_key_exists('ip_pool_id', $data) && $data['ip_pool_id'] === null) {
            $object->setIpPoolId(null);
        }
        if (\array_key_exists('broadcast_id', $data) && $data['broadcast_id'] !== null) {
            $object->setBroadcastId($data['broadcast_id']);
        }
        elseif (\array_key_exists('broadcast_id', $data) && $data['broadcast_id'] === null) {
            $object->setBroadcastId(null);
        }
        if (\array_key_exists('country', $data) && $data['country'] !== null) {
            $object->setCountry($data['country']);
        }
        elseif (\array_key_exists('country', $data) && $data['country'] === null) {
            $object->setCountry(null);
        }
        if (\array_key_exists('region', $data) && $data['region'] !== null) {
            $object->setRegion($data['region']);
        }
        elseif (\array_key_exists('region', $data) && $data['region'] === null) {
            $object->setRegion(null);
        }
        if (\array_key_exists('city', $data) && $data['city'] !== null) {
            $object->setCity($data['city']);
        }
        elseif (\array_key_exists('city', $data) && $data['city'] === null) {
            $object->setCity(null);
        }
        if (\array_key_exists('agent_family', $data) && $data['agent_family'] !== null) {
            $object->setAgentFamily($data['agent_family']);
        }
        elseif (\array_key_exists('agent_family', $data) && $data['agent_family'] === null) {
            $object->setAgentFamily(null);
        }
        if (\array_key_exists('os_family', $data) && $data['os_family'] !== null) {
            $object->setOsFamily($data['os_family']);
        }
        elseif (\array_key_exists('os_family', $data) && $data['os_family'] === null) {
            $object->setOsFamily(null);
        }
        if (\array_key_exists('device_family', $data) && $data['device_family'] !== null) {
            $object->setDeviceFamily($data['device_family']);
        }
        elseif (\array_key_exists('device_family', $data) && $data['device_family'] === null) {
            $object->setDeviceFamily(null);
        }
        if (\array_key_exists('smtp_error_code', $data) && $data['smtp_error_code'] !== null) {
            $object->setSmtpErrorCode($data['smtp_error_code']);
        }
        elseif (\array_key_exists('smtp_error_code', $data) && $data['smtp_error_code'] === null) {
            $object->setSmtpErrorCode(null);
        }
        if (\array_key_exists('feedback_type', $data) && $data['feedback_type'] !== null) {
            $object->setFeedbackType($data['feedback_type']);
        }
        elseif (\array_key_exists('feedback_type', $data) && $data['feedback_type'] === null) {
            $object->setFeedbackType(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('sendingDomain')) {
            $dataArray['sending_domain'] = $data->getSendingDomain();
        }
        if ($data->isInitialized('category')) {
            $dataArray['category'] = $data->getCategory();
        }
        if ($data->isInitialized('templateId')) {
            $dataArray['template_id'] = $data->getTemplateId();
        }
        if ($data->isInitialized('tag')) {
            $dataArray['tag'] = $data->getTag();
        }
        if ($data->isInitialized('recipientDomain')) {
            $dataArray['recipient_domain'] = $data->getRecipientDomain();
        }
        if ($data->isInitialized('mailboxProvider')) {
            $dataArray['mailbox_provider'] = $data->getMailboxProvider();
        }
        if ($data->isInitialized('mailboxProviderRegion')) {
            $dataArray['mailbox_provider_region'] = $data->getMailboxProviderRegion();
        }
        if ($data->isInitialized('sendingIp')) {
            $dataArray['sending_ip'] = $data->getSendingIp();
        }
        if ($data->isInitialized('ipPoolId')) {
            $dataArray['ip_pool_id'] = $data->getIpPoolId();
        }
        if ($data->isInitialized('broadcastId')) {
            $dataArray['broadcast_id'] = $data->getBroadcastId();
        }
        if ($data->isInitialized('country')) {
            $dataArray['country'] = $data->getCountry();
        }
        if ($data->isInitialized('region')) {
            $dataArray['region'] = $data->getRegion();
        }
        if ($data->isInitialized('city')) {
            $dataArray['city'] = $data->getCity();
        }
        if ($data->isInitialized('agentFamily')) {
            $dataArray['agent_family'] = $data->getAgentFamily();
        }
        if ($data->isInitialized('osFamily')) {
            $dataArray['os_family'] = $data->getOsFamily();
        }
        if ($data->isInitialized('deviceFamily')) {
            $dataArray['device_family'] = $data->getDeviceFamily();
        }
        if ($data->isInitialized('smtpErrorCode')) {
            $dataArray['smtp_error_code'] = $data->getSmtpErrorCode();
        }
        if ($data->isInitialized('feedbackType')) {
            $dataArray['feedback_type'] = $data->getFeedbackType();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailStatsQueryDimensions::class => false];
    }
}
