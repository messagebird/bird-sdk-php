<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\EmailDefaults;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\EmailAddress;
use MessageBird\Wire\Model\EmailAttachment;
use MessageBird\Wire\Model\EmailMessage;
use MessageBird\Wire\Model\EmailMessageBatchResponse;
use MessageBird\Wire\Model\EmailMessageSendRequest;
use MessageBird\Wire\Model\EmailMessageSendRequestTemplate;
use MessageBird\Wire\Model\Tag;

/**
 * The email channel. Most operations (get, list, cancel, sendBatch) are generated
 * on EmailBase; this parent hand-writes the flagship `send` with ergonomic named
 * arguments, and adds the nested resources reached as `$bird->email->stats`,
 * `->mailboxes`, and `->threads`.
 */
final class Email extends EmailBase
{
    public readonly EmailStats $stats;
    public readonly EmailMailboxes $mailboxes;
    public readonly EmailThreads $threads;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->stats = new EmailStats($client);
        $this->mailboxes = new EmailMailboxes($client);
        $this->threads = new EmailThreads($client);
    }

    /**
     * Send an email and return the created message.
     *
     * Each address ($from, $to, $cc, $bcc, $replyTo) accepts a plain email string,
     * an RFC 5322 mailbox string ("Jane <jane@x.com>"), an ['email' => ..., 'name'
     * => ...] array, or an EmailAddress — all serialize to the same wire object.
     * An unset optional argument is omitted from the request. Any field left unset
     * here falls back to the client's EmailDefaults when one is configured.
     *
     * @param string|array<string, string>|EmailAddress|null            $from
     * @param list<string|array<string, string>|EmailAddress>            $to
     * @param list<string|array<string, string>|EmailAddress>|null       $cc
     * @param list<string|array<string, string>|EmailAddress>|null       $bcc
     * @param list<string|array<string, string>|EmailAddress>|null       $replyTo
     * @param array<string, string>|null                                $headers
     * @param list<Tag>|null                                            $tags
     * @param array<string, mixed>|null                                 $metadata
     * @param array<string, mixed>|null                                 $parameters inline {{ … }} personalization variables
     * @param list<EmailAttachment>|null                                $attachments
     */
    public function send(
        string|array|EmailAddress|null $from = null,
        array $to = [],
        ?string $subject = null,
        ?string $html = null,
        ?string $text = null,
        ?array $cc = null,
        ?array $bcc = null,
        ?array $replyTo = null,
        ?array $headers = null,
        ?array $tags = null,
        ?array $metadata = null,
        ?array $parameters = null,
        ?bool $trackOpens = null,
        ?bool $trackClicks = null,
        ?string $category = null,
        ?string $ipPoolId = null,
        ?array $attachments = null,
        // TODO(sdk-php): flatten to $template (id/slug string) + $language + $parameters and build the
        // model here, matching Python/Go; the EmailMessageSendRequestTemplate param is a stopgap.
        ?EmailMessageSendRequestTemplate $template = null,
        ?RequestOptions $options = null,
    ): EmailMessage {
        $defaults = $this->client->emailDefaults;
        if ($defaults !== null) {
            $from ??= $defaults->from;
            $replyTo ??= $defaults->replyTo;
            $category ??= $defaults->category;
            $trackOpens ??= $defaults->trackOpens;
            $trackClicks ??= $defaults->trackClicks;
            $headers ??= $defaults->headers;
            $tags ??= $defaults->tags;
            $metadata ??= $defaults->metadata;
        }
        if ($from === null) {
            throw new \InvalidArgumentException('email send requires a "from" address: pass from:, or configure EmailDefaults(from: …) on the client');
        }
        if ($to === []) {
            throw new \InvalidArgumentException('email send requires at least one "to" recipient');
        }

        $request = (new EmailMessageSendRequest())->setFrom($from)->setTo($to);
        if ($subject !== null) {
            $request->setSubject($subject);
        }
        if ($html !== null) {
            $request->setHtml($html);
        }
        if ($text !== null) {
            $request->setText($text);
        }
        if ($cc !== null) {
            $request->setCc($cc);
        }
        if ($bcc !== null) {
            $request->setBcc($bcc);
        }
        if ($replyTo !== null) {
            $request->setReplyTo($replyTo);
        }
        if ($headers !== null) {
            $request->setHeaders($headers);
        }
        if ($tags !== null) {
            $request->setTags($tags);
        }
        if ($metadata !== null) {
            $request->setMetadata($metadata);
        }
        if ($parameters !== null) {
            $request->setParameters($parameters);
        }
        if ($trackOpens !== null) {
            $request->setTrackOpens($trackOpens);
        }
        if ($trackClicks !== null) {
            $request->setTrackClicks($trackClicks);
        }
        if ($category !== null) {
            $request->setCategory($category);
        }
        if ($ipPoolId !== null) {
            $request->setIpPoolId($ipPoolId);
        }
        if ($attachments !== null) {
            $request->setAttachments($attachments);
        }
        if ($template !== null) {
            $request->setTemplate($template);
        }

        return $this->single('POST', '/v1/email/messages', EmailMessage::class, $request, null, $options);
    }

    /**
     * Send up to a full batch of emails in one call. Returns one entry per
     * message, in submission order, each with its own id and accept/reject
     * outcome. Any field a message leaves unset is filled from the client's
     * EmailDefaults, exactly as single send does.
     *
     * @param list<EmailMessageSendRequest> $messages
     */
    public function sendBatch(array $messages, ?RequestOptions $options = null): EmailMessageBatchResponse
    {
        $defaults = $this->client->emailDefaults;
        if ($defaults !== null) {
            foreach ($messages as $message) {
                self::applyEmailDefaults($message, $defaults);
            }
        }

        return $this->single('POST', '/v1/email/batches', EmailMessageBatchResponse::class, $messages, null, $options);
    }

    /**
     * Fill any field a batch message left unset from the configured defaults; a
     * value already set on the message always wins. The batch body is a list of
     * built wire models rather than flat args, so the merge is at the wire level
     * (the single send merges its named arguments before building the model).
     */
    private static function applyEmailDefaults(EmailMessageSendRequest $message, EmailDefaults $defaults): void
    {
        if (!$message->isInitialized('from') && $defaults->from !== null) {
            $message->setFrom($defaults->from);
        }
        if (!$message->isInitialized('replyTo') && $defaults->replyTo !== null) {
            $message->setReplyTo($defaults->replyTo);
        }
        if (!$message->isInitialized('category') && $defaults->category !== null) {
            $message->setCategory($defaults->category);
        }
        if (!$message->isInitialized('trackOpens') && $defaults->trackOpens !== null) {
            $message->setTrackOpens($defaults->trackOpens);
        }
        if (!$message->isInitialized('trackClicks') && $defaults->trackClicks !== null) {
            $message->setTrackClicks($defaults->trackClicks);
        }
        if (!$message->isInitialized('headers') && $defaults->headers !== null) {
            $message->setHeaders($defaults->headers);
        }
        if (!$message->isInitialized('tags') && $defaults->tags !== null) {
            $message->setTags($defaults->tags);
        }
        if (!$message->isInitialized('metadata') && $defaults->metadata !== null) {
            $message->setMetadata($defaults->metadata);
        }
    }
}
