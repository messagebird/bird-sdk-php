<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\Tag;
use MessageBird\Wire\Model\WhatsAppContactCardSend;
use MessageBird\Wire\Model\WhatsAppMessage;
use MessageBird\Wire\Model\WhatsAppMessageSendRequest;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestAudio;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestDocument;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestImage;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestInteractive;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestLocation;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestSticker;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestTemplate;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestText;
use MessageBird\Wire\Model\WhatsAppMessageSendRequestVideo;
use MessageBird\Wire\Model\WhatsAppMessageTemplateComponent;

/**
 * The WhatsApp channel. get, list, and listEvents are generated on WhatsappBase;
 * this parent hand-writes the flagship `send`, sugaring the template handle into
 * the nested template object, and adds the nested `$bird->whatsapp->messages`.
 */
final class Whatsapp extends WhatsappBase
{
    public readonly WhatsappMessages $messages;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->messages = new WhatsappMessages($client);
    }

    /**
     * Send one WhatsApp message and return the created message.
     *
     * A send carries exactly one kind of content: a template, or one free-form
     * arm — $interactive being the arm that gives the recipient something to
     * tap, $contactCards up to five contact cards, where a card's name needs
     * formattedName plus at least one other part and a phone number in E.164
     * earns the card a button that opens a chat. Free-form content is
     * deliverable only inside an open 24-hour customer service window, and
     * every send but a Bird-managed template needs $from. Pass
     * $inReplyToMessageId to quote an earlier message from the same
     * conversation.
     *
     * @param string|null                                 $template   the template's id (`wat_…`) or its stable handle (e.g. `bird_otp`)
     * @param list<WhatsAppMessageTemplateComponent>|null $components fills the template's placeholders
     * @param list<WhatsAppContactCardSend>|null          $contactCards
     * @param list<Tag>|null                              $tags
     * @param array<string, mixed>|null                   $metadata
     */
    public function send(
        string $to,
        ?string $template = null,
        ?string $language = null,
        ?array $components = null,
        ?string $from = null,
        ?WhatsAppMessageSendRequestText $text = null,
        ?WhatsAppMessageSendRequestImage $image = null,
        ?WhatsAppMessageSendRequestVideo $video = null,
        ?WhatsAppMessageSendRequestAudio $audio = null,
        ?WhatsAppMessageSendRequestSticker $sticker = null,
        ?WhatsAppMessageSendRequestDocument $document = null,
        ?WhatsAppMessageSendRequestLocation $location = null,
        ?WhatsAppMessageSendRequestInteractive $interactive = null,
        ?array $contactCards = null,
        ?string $inReplyToMessageId = null,
        ?array $tags = null,
        ?array $metadata = null,
        ?RequestOptions $options = null,
    ): WhatsAppMessage {
        $request = (new WhatsAppMessageSendRequest())->setTo($to);
        if ($template !== null) {
            $tmpl = new WhatsAppMessageSendRequestTemplate();
            // A wat_-prefixed value is the id; anything else is the slug handle.
            if (str_starts_with($template, 'wat_')) {
                $tmpl->setId($template);
            } else {
                $tmpl->setSlug($template);
            }
            if ($language !== null) {
                $tmpl->setLanguage($language);
            }
            if ($components !== null) {
                $tmpl->setComponents($components);
            }
            $request->setTemplate($tmpl);
        }
        if ($from !== null) {
            $request->setFrom($from);
        }
        if ($text !== null) {
            $request->setText($text);
        }
        if ($image !== null) {
            $request->setImage($image);
        }
        if ($video !== null) {
            $request->setVideo($video);
        }
        if ($audio !== null) {
            $request->setAudio($audio);
        }
        if ($sticker !== null) {
            $request->setSticker($sticker);
        }
        if ($document !== null) {
            $request->setDocument($document);
        }
        if ($location !== null) {
            $request->setLocation($location);
        }
        if ($interactive !== null) {
            $request->setInteractive($interactive);
        }
        if ($contactCards !== null) {
            $request->setContactCards($contactCards);
        }
        if ($inReplyToMessageId !== null) {
            $request->setInReplyToMessageId($inReplyToMessageId);
        }
        if ($tags !== null) {
            $request->setTags($tags);
        }
        if ($metadata !== null) {
            $request->setMetadata($metadata);
        }

        return $this->single('POST', '/v1/whatsapp/messages', WhatsAppMessage::class, $request, null, $options);
    }
}
