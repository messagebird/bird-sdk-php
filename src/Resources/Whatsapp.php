<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RequestOptions;
use MessageBird\Wire\Model\WhatsAppMessage;
use MessageBird\Wire\Model\WhatsAppMessageSendRequest;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestTemplate;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponent;

/**
 * The WhatsApp channel. get, list, and listEvents are generated on WhatsappBase;
 * this parent hand-writes the flagship `send`, sugaring the template handle into
 * the nested template object. Templates are currently the only supported content.
 */
final class Whatsapp extends WhatsappBase
{
    /**
     * Send a WhatsApp template message and return the created message.
     *
     * $components fills the template's placeholders.
     *
     * @param string                                     $template   the template's stable handle (e.g. `bird_otp`)
     * @param list<WhatsAppMessageTemplateComponent>|null $components
     */
    public function send(
        string $to,
        string $template,
        ?string $language = null,
        ?array $components = null,
        ?RequestOptions $options = null,
    ): WhatsAppMessage {
        $tmpl = (new WhatsAppMessageSendRequestTemplate())->setSlug($template);
        if ($language !== null) {
            $tmpl->setLanguage($language);
        }
        if ($components !== null) {
            $tmpl->setComponents($components);
        }
        $request = (new WhatsAppMessageSendRequest())->setTo($to)->setTemplate($tmpl);

        return $this->single('POST', '/v1/whatsapp/messages', WhatsAppMessage::class, $request, null, $options);
    }
}
