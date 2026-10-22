<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RequestOptions;
use MessageBird\Wire\Model\WhatsAppConversation;
use MessageBird\Wire\Model\WhatsAppConversationUpdateRequest;

final class WhatsappConversations extends WhatsappConversationsBase
{
    public function update(string $conversationId, WhatsAppConversationUpdateRequest $params, ?RequestOptions $options = null): WhatsAppConversation
    {
        $body = [];
        if ($params->isInitialized('assignedTo')) {
            $body['assigned_to'] = $params->getAssignedTo();
        }
        if ($params->isInitialized('inboxStatus') && $params->getInboxStatus() !== null) {
            $body['inbox_status'] = $params->getInboxStatus();
        }
        if ($params->isInitialized('labels') && $params->getLabels() !== null) {
            $body['labels'] = $params->getLabels();
        }
        if ($params->isInitialized('read') && $params->getRead() !== null) {
            // The wire normalizer drops fractional seconds, changing the inclusive read cutoff.
            $body['read'] = self::formatRfc3339($params->getRead());
        }

        return $this->single('PATCH', '/v1/whatsapp/conversations/' . rawurlencode($conversationId), WhatsAppConversation::class, (object) $body, null, $options);
    }
}
