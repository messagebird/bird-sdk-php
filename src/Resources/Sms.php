<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\SMSMessage;
use MessageBird\Wire\Model\SMSMessageBatchResponse;
use MessageBird\Wire\Model\SMSMessageSendRequest;
use MessageBird\Wire\Model\SMSMessageSendRequestOptions;
use MessageBird\Wire\Model\SMSMessageSendRequestTemplate;
use MessageBird\Wire\Model\Tag;

/**
 * The SMS channel. Use `send` for a single free-text or template message,
 * `sendBatch` for multiple messages, and `$bird->sms->stats` for aggregate
 * statistics.
 */
final class Sms extends SmsBase
{
    public readonly SmsStats $stats;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->stats = new SmsStats($client);
    }

    /**
     * Send an SMS and return the created message.
     *
     * Provide either $text (with $category and $from) or a $template (by id
     * `smt_…` or slug, with $parameters). The two are mutually exclusive. An
     * unset optional argument is omitted from the request.
     *
     * @param string|null                $template   stored template id (`smt_…`) or slug
     * @param array<string, mixed>|null  $parameters template variable values; template sends only
     * @param list<Tag>|null             $tags
     * @param array<string, mixed>|null  $metadata
     * @param bool|null                  $smartEncoding replace non-GSM-7 characters with their closest equivalent, lowering the segment count; off unless set
     */
    public function send(
        string $to,
        ?string $from = null,
        ?string $text = null,
        ?string $category = null,
        ?string $template = null,
        ?string $language = null,
        ?array $parameters = null,
        ?array $tags = null,
        ?array $metadata = null,
        ?bool $smartEncoding = null,
        ?RequestOptions $options = null,
    ): SMSMessage {
        $request = (new SMSMessageSendRequest())->setTo($to);
        if ($from !== null) {
            $request->setFrom($from);
        }
        if ($text !== null) {
            $request->setText($text);
        }
        if ($category !== null) {
            $request->setCategory($category);
        }
        if ($template !== null || $language !== null || $parameters !== null) {
            $tmpl = new SMSMessageSendRequestTemplate();
            if ($template !== null) {
                // An `smt_`-prefixed value is the stored id; anything else is the slug handle.
                str_starts_with($template, 'smt_') ? $tmpl->setId($template) : $tmpl->setSlug($template);
            }
            if ($language !== null) {
                $tmpl->setLanguage($language);
            }
            if ($parameters !== null) {
                $tmpl->setParameters($parameters);
            }
            $request->setTemplate($tmpl);
        }
        if ($tags !== null) {
            $request->setTags($tags);
        }
        if ($metadata !== null) {
            $request->setMetadata($metadata);
        }
        if ($smartEncoding !== null) {
            $request->setOptions((new SMSMessageSendRequestOptions())->setSmartEncoding($smartEncoding));
        }

        return $this->single('POST', '/v1/sms/messages', SMSMessage::class, $request, null, $options);
    }

    /**
     * Send up to a full batch of SMS messages in one call. Each item is an
     * independent send; the whole batch is validated before any item is queued.
     * The result preserves submission order.
     *
     * @param list<SMSMessageSendRequest> $messages
     */
    public function sendBatch(array $messages, ?RequestOptions $options = null): SMSMessageBatchResponse
    {
        return $this->single('POST', '/v1/sms/batches', SMSMessageBatchResponse::class, $messages, null, $options);
    }
}
