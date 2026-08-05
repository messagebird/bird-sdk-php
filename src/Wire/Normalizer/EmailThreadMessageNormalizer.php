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
class EmailThreadMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailThreadMessage::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailThreadMessage::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailThreadMessage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('spf_pass', $data) && \is_int($data['spf_pass'])) {
            $data['spf_pass'] = (bool) $data['spf_pass'];
        }
        if (\array_key_exists('dkim_pass', $data) && \is_int($data['dkim_pass'])) {
            $data['dkim_pass'] = (bool) $data['dkim_pass'];
        }
        if (\array_key_exists('dmarc_pass', $data) && \is_int($data['dmarc_pass'])) {
            $data['dmarc_pass'] = (bool) $data['dmarc_pass'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('direction', $data) && $data['direction'] !== null) {
            $object->setDirection($data['direction']);
        }
        elseif (\array_key_exists('direction', $data) && $data['direction'] === null) {
            $object->setDirection(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('thread_id', $data) && $data['thread_id'] !== null) {
            $object->setThreadId($data['thread_id']);
        }
        elseif (\array_key_exists('thread_id', $data) && $data['thread_id'] === null) {
            $object->setThreadId(null);
        }
        if (\array_key_exists('from', $data) && $data['from'] !== null) {
            $object->setFrom($data['from']);
        }
        elseif (\array_key_exists('from', $data) && $data['from'] === null) {
            $object->setFrom(null);
        }
        if (\array_key_exists('to', $data) && $data['to'] !== null) {
            $values = [];
            foreach ($data['to'] as $value) {
                $values[] = $value;
            }
            $object->setTo($values);
        }
        elseif (\array_key_exists('to', $data) && $data['to'] === null) {
            $object->setTo(null);
        }
        if (\array_key_exists('cc', $data) && $data['cc'] !== null) {
            $values_1 = [];
            foreach ($data['cc'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCc($values_1);
        }
        elseif (\array_key_exists('cc', $data) && $data['cc'] === null) {
            $object->setCc(null);
        }
        if (\array_key_exists('delivered_to', $data) && $data['delivered_to'] !== null) {
            $object->setDeliveredTo($data['delivered_to']);
        }
        elseif (\array_key_exists('delivered_to', $data) && $data['delivered_to'] === null) {
            $object->setDeliveredTo(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('preview', $data) && $data['preview'] !== null) {
            $object->setPreview($data['preview']);
        }
        elseif (\array_key_exists('preview', $data) && $data['preview'] === null) {
            $object->setPreview(null);
        }
        if (\array_key_exists('extracted_text', $data) && $data['extracted_text'] !== null) {
            $object->setExtractedText($data['extracted_text']);
        }
        elseif (\array_key_exists('extracted_text', $data) && $data['extracted_text'] === null) {
            $object->setExtractedText(null);
        }
        if (\array_key_exists('labels', $data) && $data['labels'] !== null) {
            $values_2 = [];
            foreach ($data['labels'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setLabels($values_2);
        }
        elseif (\array_key_exists('labels', $data) && $data['labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('recipients', $data) && $data['recipients'] !== null) {
            $values_3 = [];
            foreach ($data['recipients'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \MessageBird\Wire\Model\EmailThreadMessageRecipient::class, 'json', $context);
            }
            $object->setRecipients($values_3);
        }
        elseif (\array_key_exists('recipients', $data) && $data['recipients'] === null) {
            $object->setRecipients(null);
        }
        if (\array_key_exists('authentication', $data) && $data['authentication'] !== null) {
            $object->setAuthentication($data['authentication']);
        }
        elseif (\array_key_exists('authentication', $data) && $data['authentication'] === null) {
            $object->setAuthentication(null);
        }
        if (\array_key_exists('spf_pass', $data) && $data['spf_pass'] !== null) {
            $object->setSpfPass($data['spf_pass']);
        }
        elseif (\array_key_exists('spf_pass', $data) && $data['spf_pass'] === null) {
            $object->setSpfPass(null);
        }
        if (\array_key_exists('dkim_pass', $data) && $data['dkim_pass'] !== null) {
            $object->setDkimPass($data['dkim_pass']);
        }
        elseif (\array_key_exists('dkim_pass', $data) && $data['dkim_pass'] === null) {
            $object->setDkimPass(null);
        }
        if (\array_key_exists('dmarc_pass', $data) && $data['dmarc_pass'] !== null) {
            $object->setDmarcPass($data['dmarc_pass']);
        }
        elseif (\array_key_exists('dmarc_pass', $data) && $data['dmarc_pass'] === null) {
            $object->setDmarcPass(null);
        }
        if (\array_key_exists('purge_at', $data) && $data['purge_at'] !== null) {
            $object->setPurgeAt(new \DateTime($data['purge_at']));
        }
        elseif (\array_key_exists('purge_at', $data) && $data['purge_at'] === null) {
            $object->setPurgeAt(null);
        }
        if (\array_key_exists('attachment_count', $data) && $data['attachment_count'] !== null) {
            $object->setAttachmentCount($data['attachment_count']);
        }
        elseif (\array_key_exists('attachment_count', $data) && $data['attachment_count'] === null) {
            $object->setAttachmentCount(null);
        }
        if (\array_key_exists('attachment_manifest', $data) && $data['attachment_manifest'] !== null) {
            $values_4 = [];
            foreach ($data['attachment_manifest'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \MessageBird\Wire\Model\EmailThreadMessageAttachment::class, 'json', $context);
            }
            $object->setAttachmentManifest($values_4);
        }
        elseif (\array_key_exists('attachment_manifest', $data) && $data['attachment_manifest'] === null) {
            $object->setAttachmentManifest(null);
        }
        if (\array_key_exists('reference_ids', $data) && $data['reference_ids'] !== null) {
            $values_5 = [];
            foreach ($data['reference_ids'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setReferenceIds($values_5);
        }
        elseif (\array_key_exists('reference_ids', $data) && $data['reference_ids'] === null) {
            $object->setReferenceIds(null);
        }
        if (\array_key_exists('contact_id', $data) && $data['contact_id'] !== null) {
            $object->setContactId($data['contact_id']);
        }
        elseif (\array_key_exists('contact_id', $data) && $data['contact_id'] === null) {
            $object->setContactId(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($this->denormalizer->denormalize($data['source'], \MessageBird\Wire\Model\EmailThreadMessageSource::class, 'json', $context));
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('occurred_at', $data) && $data['occurred_at'] !== null) {
            $object->setOccurredAt(new \DateTime($data['occurred_at']));
        }
        elseif (\array_key_exists('occurred_at', $data) && $data['occurred_at'] === null) {
            $object->setOccurredAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['thread_id'] = $data->getThreadId();
        $values = [];
        foreach ($data->getLabels() as $value) {
            $values[] = $value;
        }
        $dataArray['labels'] = $values;
        $dataArray['contact_id'] = $data->getContactId();
        $dataArray['source'] = $this->normalizer->normalize($data->getSource(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailThreadMessage::class => false];
    }
}
