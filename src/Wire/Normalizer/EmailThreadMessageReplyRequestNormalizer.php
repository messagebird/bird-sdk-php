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
class EmailThreadMessageReplyRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailThreadMessageReplyRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailThreadMessageReplyRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailThreadMessageReplyRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('reply_all', $data) && \is_int($data['reply_all'])) {
            $data['reply_all'] = (bool) $data['reply_all'];
        }
        if (\array_key_exists('cancel_on_reply', $data) && \is_int($data['cancel_on_reply'])) {
            $data['cancel_on_reply'] = (bool) $data['cancel_on_reply'];
        }
        if (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] !== null) {
            $object->setScheduledAt(new \DateTime($data['scheduled_at']));
        }
        elseif (\array_key_exists('scheduled_at', $data) && $data['scheduled_at'] === null) {
            $object->setScheduledAt(null);
        }
        if (\array_key_exists('html', $data) && $data['html'] !== null) {
            $object->setHtml($data['html']);
        }
        elseif (\array_key_exists('html', $data) && $data['html'] === null) {
            $object->setHtml(null);
        }
        if (\array_key_exists('text', $data) && $data['text'] !== null) {
            $object->setText($data['text']);
        }
        elseif (\array_key_exists('text', $data) && $data['text'] === null) {
            $object->setText(null);
        }
        if (\array_key_exists('cc', $data) && $data['cc'] !== null) {
            $values = [];
            foreach ($data['cc'] as $value) {
                $values[] = $value;
            }
            $object->setCc($values);
        }
        elseif (\array_key_exists('cc', $data) && $data['cc'] === null) {
            $object->setCc(null);
        }
        if (\array_key_exists('bcc', $data) && $data['bcc'] !== null) {
            $values_1 = [];
            foreach ($data['bcc'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setBcc($values_1);
        }
        elseif (\array_key_exists('bcc', $data) && $data['bcc'] === null) {
            $object->setBcc(null);
        }
        if (\array_key_exists('reply_all', $data) && $data['reply_all'] !== null) {
            $object->setReplyAll($data['reply_all']);
        }
        elseif (\array_key_exists('reply_all', $data) && $data['reply_all'] === null) {
            $object->setReplyAll(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_2 = [];
            foreach ($data['tags'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_2);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value_3) {
                $values_3[$key] = $value_3;
            }
            $object->setMetadata($values_3);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('category', $data) && $data['category'] !== null) {
            $object->setCategory($data['category']);
        }
        elseif (\array_key_exists('category', $data) && $data['category'] === null) {
            $object->setCategory(null);
        }
        if (\array_key_exists('attachments', $data) && $data['attachments'] !== null) {
            $values_4 = [];
            foreach ($data['attachments'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \MessageBird\Wire\Model\EmailAttachment::class, 'json', $context);
            }
            $object->setAttachments($values_4);
        }
        elseif (\array_key_exists('attachments', $data) && $data['attachments'] === null) {
            $object->setAttachments(null);
        }
        if (\array_key_exists('cancel_on_reply', $data) && $data['cancel_on_reply'] !== null) {
            $object->setCancelOnReply($data['cancel_on_reply']);
        }
        elseif (\array_key_exists('cancel_on_reply', $data) && $data['cancel_on_reply'] === null) {
            $object->setCancelOnReply(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('scheduledAt') && null !== $data->getScheduledAt()) {
            $dataArray['scheduled_at'] = $data->getScheduledAt()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('html') && null !== $data->getHtml()) {
            $dataArray['html'] = $data->getHtml();
        }
        if ($data->isInitialized('text') && null !== $data->getText()) {
            $dataArray['text'] = $data->getText();
        }
        if ($data->isInitialized('cc') && null !== $data->getCc()) {
            $values = [];
            foreach ($data->getCc() as $value) {
                $values[] = $value;
            }
            $dataArray['cc'] = $values;
        }
        if ($data->isInitialized('bcc') && null !== $data->getBcc()) {
            $values_1 = [];
            foreach ($data->getBcc() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['bcc'] = $values_1;
        }
        if ($data->isInitialized('replyAll') && null !== $data->getReplyAll()) {
            $dataArray['reply_all'] = $data->getReplyAll();
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values_2 = [];
            foreach ($data->getTags() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['tags'] = $values_2;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_3 = [];
            foreach ($data->getMetadata() as $key => $value_3) {
                $values_3[$key] = $value_3;
            }
            $dataArray['metadata'] = (object) $values_3;
        }
        if ($data->isInitialized('category') && null !== $data->getCategory()) {
            $dataArray['category'] = $data->getCategory();
        }
        if ($data->isInitialized('attachments') && null !== $data->getAttachments()) {
            $values_4 = [];
            foreach ($data->getAttachments() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['attachments'] = $values_4;
        }
        if ($data->isInitialized('cancelOnReply') && null !== $data->getCancelOnReply()) {
            $dataArray['cancel_on_reply'] = $data->getCancelOnReply();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailThreadMessageReplyRequest::class => false];
    }
}
