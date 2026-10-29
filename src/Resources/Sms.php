<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\SMSMessage;
use MessageBird\Wire\Model\SMSMessageBatchRequest;
use MessageBird\Wire\Model\SMSMessageBatchResponse;
use MessageBird\Wire\Model\SMSMessageSendRequest;
use MessageBird\Wire\Model\SMSMessageSendRequestBinary;
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
     * Provide one of $text (with $category and $from), a $template (by id
     * `smt_…` or slug, with $parameters), or a $binary payload (with the
     * `transactional` $category). A workspace template requires an owned $from;
     * a built-in template selects its sender and rejects $from. The content
     * forms are mutually exclusive. An unset optional argument is omitted from
     * the request.
     *
     * @param string|null                $template   stored template id (`smt_…`) or slug
     * @param array<string, mixed>|null  $parameters template variable values; template sends only
     * @param list<Tag>|null             $tags
     * @param array<string, mixed>|null  $metadata
     * @param bool|null                  $smartEncoding replace non-GSM-7 characters with their closest equivalent, lowering the segment count; off unless set
     * @param string|null                $messagingProfileId supplies the sender and defaults when `$from`, `$category` or an option is left out
     * @param string|null                $reference your own identifier for the message, such as an order number; the message list filters on it
     * @param string|null                $toCountryCode the ISO 3166-1 alpha-2 country whose national numbering plan `$to` is written in, such as `NL` for `0612345678`
     * @param int|null                   $validityPeriod seconds (60-172800) the message may wait for delivery
     * @param string|null                $costCenter your accounting identifier for the message
     * @param SMSMessageSendRequestBinary|null $binary an 8-bit payload sent instead of text or a template; needs the `transactional` category
     * @param SMSMessageSendRequestOptions|null $sendOptions the message's other options. Call `setCallbackUrl('https://…')` to send its events to that URL instead of your webhook endpoints, `setCallbackUrl(null)` to send them to your webhook subscriptions, or leave it uncalled to use the messaging profile's URL. `setIgnoreSuppression(true)` sends even if the recipient is suppressed for the sender; only authentication and transactional messages can use it, and it must be enabled for your workspace first. When `$smartEncoding` is also given it is applied onto these options, so the explicit argument wins. Without `$smartEncoding` or any option set, no options are sent.
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
        ?string $messagingProfileId = null,
        ?string $reference = null,
        ?string $toCountryCode = null,
        ?int $validityPeriod = null,
        ?string $costCenter = null,
        ?SMSMessageSendRequestBinary $binary = null,
        ?SMSMessageSendRequestOptions $sendOptions = null,
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
        if ($messagingProfileId !== null) {
            $request->setMessagingProfileId($messagingProfileId);
        }
        if ($reference !== null) {
            $request->setReference($reference);
        }
        if ($toCountryCode !== null) {
            $request->setToCountryCode($toCountryCode);
        }
        if ($validityPeriod !== null) {
            $request->setValidityPeriod($validityPeriod);
        }
        if ($costCenter !== null) {
            $request->setCostCenter($costCenter);
        }
        if ($binary !== null) {
            $request->setBinary($binary);
        }
        if ($smartEncoding !== null) {
            // A clone, so a caller reusing its options object across sends keeps its own value.
            $sendOptions = $sendOptions === null ? new SMSMessageSendRequestOptions() : clone $sendOptions;
            $sendOptions->setSmartEncoding($smartEncoding);
        }
        if ($sendOptions !== null) {
            $request->setOptions($sendOptions);
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
        $request = (new SMSMessageBatchRequest())->setMessages($messages);

        return $this->single('POST', '/v1/sms/batches', SMSMessageBatchResponse::class, $request, null, $options);
    }
}
