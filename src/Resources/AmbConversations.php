<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RequestOptions;
use MessageBird\Wire\Model\AMBConversation;
use MessageBird\Wire\Model\AMBConversationUpdate;

final class AmbConversations extends AmbConversationsBase
{
    public function update(string $conversationId, AMBConversationUpdate $params, ?RequestOptions $options = null): AMBConversation
    {
        $body = [];
        if ($params->isInitialized('assignedTo')) {
            $body['assigned_to'] = $params->getAssignedTo();
        }
        if ($params->isInitialized('inboxStatus')) {
            $body['inbox_status'] = $params->getInboxStatus();
        }
        if ($params->isInitialized('labels')) {
            $body['labels'] = $params->getLabels();
        }
        if ($params->isInitialized('read') && $params->getRead() !== null) {
            // The wire normalizer drops fractional seconds, changing the inclusive read cutoff.
            $body['read'] = self::formatRfc3339($params->getRead());
        }
        if ($params->isInitialized('queue')) {
            $body['queue'] = $params->getQueue();
        }
        if ($params->isInitialized('routingChange') && $params->getRoutingChange() !== null) {
            $decision = $params->getRoutingChange();
            $body['routing_change'] = ['action' => $decision->getAction(), 'message_id' => $decision->getMessageId()];
        }

        return $this->single('PATCH', '/v1/amb/conversations/' . rawurlencode($conversationId), AMBConversation::class, (object) $body, null, $options);
    }
}
