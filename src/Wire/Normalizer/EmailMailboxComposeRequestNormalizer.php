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
class EmailMailboxComposeRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\EmailMailboxComposeRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\EmailMailboxComposeRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\EmailMailboxComposeRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('bcc', $data) && $data['bcc'] !== null) {
            $values_2 = [];
            foreach ($data['bcc'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setBcc($values_2);
        }
        elseif (\array_key_exists('bcc', $data) && $data['bcc'] === null) {
            $object->setBcc(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
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
        if (\array_key_exists('reply_to', $data) && $data['reply_to'] !== null) {
            $values_3 = [];
            foreach ($data['reply_to'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setReplyTo($values_3);
        }
        elseif (\array_key_exists('reply_to', $data) && $data['reply_to'] === null) {
            $object->setReplyTo(null);
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
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_5 = [];
            foreach ($data['tags'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, \MessageBird\Wire\Model\Tag::class, 'json', $context);
            }
            $object->setTags($values_5);
        }
        elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value_6) {
                $values_6[$key] = $value_6;
            }
            $object->setMetadata($values_6);
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
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $values = [];
        foreach ($data->getTo() as $value) {
            $values[] = $value;
        }
        $dataArray['to'] = $values;
        if ($data->isInitialized('cc') && null !== $data->getCc()) {
            $values_1 = [];
            foreach ($data->getCc() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['cc'] = $values_1;
        }
        if ($data->isInitialized('bcc') && null !== $data->getBcc()) {
            $values_2 = [];
            foreach ($data->getBcc() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['bcc'] = $values_2;
        }
        $dataArray['subject'] = $data->getSubject();
        if ($data->isInitialized('html') && null !== $data->getHtml()) {
            $dataArray['html'] = $data->getHtml();
        }
        if ($data->isInitialized('text') && null !== $data->getText()) {
            $dataArray['text'] = $data->getText();
        }
        if ($data->isInitialized('replyTo') && null !== $data->getReplyTo()) {
            $values_3 = [];
            foreach ($data->getReplyTo() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['reply_to'] = $values_3;
        }
        if ($data->isInitialized('attachments') && null !== $data->getAttachments()) {
            $values_4 = [];
            foreach ($data->getAttachments() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['attachments'] = $values_4;
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values_5 = [];
            foreach ($data->getTags() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $dataArray['tags'] = $values_5;
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values_6 = [];
            foreach ($data->getMetadata() as $key => $value_6) {
                $values_6[$key] = $value_6;
            }
            $dataArray['metadata'] = $values_6;
        }
        if ($data->isInitialized('category') && null !== $data->getCategory()) {
            $dataArray['category'] = $data->getCategory();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\EmailMailboxComposeRequest::class => false];
    }
}
