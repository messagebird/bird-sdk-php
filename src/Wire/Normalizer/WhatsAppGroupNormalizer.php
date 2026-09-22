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
class WhatsAppGroupNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \MessageBird\Wire\Model\WhatsAppGroup::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \MessageBird\Wire\Model\WhatsAppGroup::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \MessageBird\Wire\Model\WhatsAppGroup();
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
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('whatsapp_number_id', $data) && $data['whatsapp_number_id'] !== null) {
            $object->setWhatsappNumberId($data['whatsapp_number_id']);
            unset($data['whatsapp_number_id']);
        }
        elseif (\array_key_exists('whatsapp_number_id', $data) && $data['whatsapp_number_id'] === null) {
            $object->setWhatsappNumberId(null);
        }
        if (\array_key_exists('waba', $data) && $data['waba'] !== null) {
            $object->setWaba($data['waba']);
            unset($data['waba']);
        }
        elseif (\array_key_exists('waba', $data) && $data['waba'] === null) {
            $object->setWaba(null);
        }
        if (\array_key_exists('subject', $data) && $data['subject'] !== null) {
            $object->setSubject($data['subject']);
            unset($data['subject']);
        }
        elseif (\array_key_exists('subject', $data) && $data['subject'] === null) {
            $object->setSubject(null);
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
            unset($data['description']);
        }
        elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('join_approval_mode', $data) && $data['join_approval_mode'] !== null) {
            $object->setJoinApprovalMode($data['join_approval_mode']);
            unset($data['join_approval_mode']);
        }
        elseif (\array_key_exists('join_approval_mode', $data) && $data['join_approval_mode'] === null) {
            $object->setJoinApprovalMode(null);
        }
        if (\array_key_exists('invite_link', $data) && $data['invite_link'] !== null) {
            $object->setInviteLink($data['invite_link']);
            unset($data['invite_link']);
        }
        elseif (\array_key_exists('invite_link', $data) && $data['invite_link'] === null) {
            $object->setInviteLink(null);
        }
        if (\array_key_exists('participants', $data) && $data['participants'] !== null) {
            $values = [];
            foreach ($data['participants'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \MessageBird\Wire\Model\WhatsAppGroupParticipant::class, 'json', $context);
            }
            $object->setParticipants($values);
            unset($data['participants']);
        }
        elseif (\array_key_exists('participants', $data) && $data['participants'] === null) {
            $object->setParticipants(null);
        }
        if (\array_key_exists('participant_count', $data) && $data['participant_count'] !== null) {
            $object->setParticipantCount($data['participant_count']);
            unset($data['participant_count']);
        }
        elseif (\array_key_exists('participant_count', $data) && $data['participant_count'] === null) {
            $object->setParticipantCount(null);
        }
        if (\array_key_exists('pinned_messages', $data) && $data['pinned_messages'] !== null) {
            $values_1 = [];
            foreach ($data['pinned_messages'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \MessageBird\Wire\Model\WhatsAppGroupPinnedMessage::class, 'json', $context);
            }
            $object->setPinnedMessages($values_1);
            unset($data['pinned_messages']);
        }
        elseif (\array_key_exists('pinned_messages', $data) && $data['pinned_messages'] === null) {
            $object->setPinnedMessages(null);
        }
        if (\array_key_exists('profile_picture_url', $data) && $data['profile_picture_url'] !== null) {
            $object->setProfilePictureUrl($data['profile_picture_url']);
            unset($data['profile_picture_url']);
        }
        elseif (\array_key_exists('profile_picture_url', $data) && $data['profile_picture_url'] === null) {
            $object->setProfilePictureUrl(null);
        }
        if (\array_key_exists('last_operation', $data) && $data['last_operation'] !== null) {
            $object->setLastOperation($this->denormalizer->denormalize($data['last_operation'], \MessageBird\Wire\Model\WhatsAppGroupOperation::class, 'json', $context));
            unset($data['last_operation']);
        }
        elseif (\array_key_exists('last_operation', $data) && $data['last_operation'] === null) {
            $object->setLastOperation(null);
        }
        if (\array_key_exists('suspended_at', $data) && $data['suspended_at'] !== null) {
            $object->setSuspendedAt(new \DateTime($data['suspended_at']));
            unset($data['suspended_at']);
        }
        elseif (\array_key_exists('suspended_at', $data) && $data['suspended_at'] === null) {
            $object->setSuspendedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt(new \DateTime($data['created_at']));
            unset($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt(new \DateTime($data['updated_at']));
            unset($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['subject'] = $data->getSubject();
        if ($data->isInitialized('description')) {
            $dataArray['description'] = $data->getDescription();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\MessageBird\Wire\Model\WhatsAppGroup::class => false];
    }
}
