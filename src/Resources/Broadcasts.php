<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\RequestOptions;
use MessageBird\Wire\Model\EmailAddress;
use MessageBird\Wire\Model\EmailBroadcast;

/**
 * One piece of template content sent to a stored audience. The reads plus
 * `cancel` and `delete` are generated on BroadcastsBase; this parent
 * hand-writes `create`, `update` and `send`. `create` and `send` carry a
 * `scheduled_at` the generated normalizer would render with a "+00:00" offset
 * where every other surface writes "Z"; `update` takes a plain array because
 * the generated request model turns an unset `reply_to` into an empty list
 * rather than a clear.
 */
final class Broadcasts extends BroadcastsBase
{
    /**
     * Create a broadcast and return it.
     *
     * It is a draft unless `$send` is true, in which case it goes out
     * immediately, or at `$scheduledAt` when one is given. A send needs a
     * `$from` on a verified domain, an `$audienceId`, and a `$template` with a
     * published version; without them the call is refused with a 422 rather
     * than saved as a draft.
     *
     * @param string|array<string, string>|EmailAddress|null $from the address the broadcast sends from: a plain email string, an RFC 5322 mailbox string, an `['email' => …, 'name' => …]` array, or an EmailAddress
     * @param string|null $template the template's id (`emt_…`)
     * @param list<string|array<string, string>|EmailAddress>|null $replyTo where replies should go, up to 25 addresses, each in any of the forms `$from` takes
     * @param array<string, string>|null $headers custom email headers, up to 25
     * @param list<array{name: string, value: string}>|null $tags labels on the broadcast, up to 20
     * @param array<string, mixed>|null $metadata arbitrary JSON kept on the broadcast, up to 2 KB serialized
     * @param string|null $category `marketing` or `transactional`; decides which suppressions apply and whether the unsubscribe headers are added
     * @param \DateTimeInterface|null $scheduledAt when to send: at least 30 seconds and at most 365 days out, and only meaningful alongside `$send`
     */
    public function create(
        string|array|EmailAddress|null $from = null,
        ?string $audienceId = null,
        ?string $template = null,
        ?array $replyTo = null,
        ?array $headers = null,
        ?array $tags = null,
        ?array $metadata = null,
        ?bool $trackOpens = null,
        ?bool $trackClicks = null,
        ?string $ipPoolId = null,
        ?string $category = null,
        ?bool $send = null,
        ?\DateTimeInterface $scheduledAt = null,
        ?RequestOptions $options = null,
    ): EmailBroadcast {
        // A per-call value always wins; an unset field falls back to the client
        // default, so a broadcast sends under the same policy as the client's
        // other email. Create only -- an update leaves an unset field at
        // whatever the draft holds, so a default filled there would overwrite a
        // stored value the caller never named.
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
            $ipPoolId ??= $defaults->ipPoolId;
        }

        // A plain array rather than the generated EmailBroadcastCreateRequest:
        // that model's normalizer formats a date via `format('Y-m-d\TH:i:sP')`,
        // which PHP renders as "+00:00" for UTC where every other surface — and
        // the shared conformance vector — writes "Z".
        $body = [];
        if ($from !== null) {
            $body['from'] = $from;
        }
        if ($audienceId !== null) {
            $body['audience_id'] = $audienceId;
        }
        if ($template !== null) {
            $body['template'] = ['id' => $template];
        }
        if ($replyTo !== null) {
            $body['reply_to'] = $replyTo;
        }
        if ($headers !== null) {
            $body['headers'] = $headers;
        }
        if ($tags !== null) {
            $body['tags'] = $tags;
        }
        if ($metadata !== null) {
            $body['metadata'] = $metadata;
        }
        if ($trackOpens !== null) {
            $body['track_opens'] = $trackOpens;
        }
        if ($trackClicks !== null) {
            $body['track_clicks'] = $trackClicks;
        }
        if ($ipPoolId !== null) {
            $body['ip_pool_id'] = $ipPoolId;
        }
        if ($category !== null) {
            $body['category'] = $category;
        }
        if ($send !== null) {
            $body['send'] = $send;
        }
        if ($scheduledAt !== null) {
            $body['scheduled_at'] = self::formatRfc3339($scheduledAt);
        }

        return $this->single('POST', '/v1/email/broadcasts', EmailBroadcast::class, self::objectifyEmptyMaps($body), null, $options);
    }

    /**
     * Change a broadcast that is still a draft or is scheduled, and return it.
     *
     * `$changes` is the wire body verbatim: a key present with a value sets it,
     * `template`, `reply_to` and `ip_pool_id` present with `null` clear it, and
     * an absent key leaves the stored value alone. Taken as an array rather
     * than named parameters because those three fields need all three states,
     * which a nullable PHP parameter cannot express. A broadcast that has
     * started sending can no longer be edited and is refused with a 409.
     *
     * @param array{
     *     from?: string|array<string, mixed>|EmailAddress,
     *     audience_id?: string,
     *     template?: array{id: string}|null,
     *     reply_to?: list<string|array<string, string>|EmailAddress>|null,
     *     headers?: array<string, string>,
     *     tags?: list<array{name: string, value: string}>,
     *     metadata?: array<string, mixed>,
     *     track_opens?: bool,
     *     track_clicks?: bool,
     *     ip_pool_id?: string|null,
     *     category?: string,
     * } $changes
     */
    public function update(string $broadcastId, array $changes, ?RequestOptions $options = null): EmailBroadcast
    {
        // A plain array rather than the generated EmailBroadcastUpdateRequest:
        // that model's normalizer renders an initialized-but-null `reply_to` as
        // `[]`, which the server reads as an empty list rather than a clear.
        return $this->single('PATCH', '/v1/email/broadcasts/' . rawurlencode($broadcastId), EmailBroadcast::class, self::objectifyEmptyMaps($changes), null, $options);
    }

    /**
     * The body itself, and `headers` and `metadata` inside it, are maps on the
     * wire, and PHP cannot tell an empty map from an empty list, so an empty one
     * would encode as a JSON array the server refuses with a 400 — on `update`
     * that loses the clear an empty collection expresses, and on `create` and
     * `send` it loses a request built in a loop that yielded nothing. `tags` is a
     * list on the wire, so its `[]` is already right. The distinction is drawn
     * here rather than in `Serializer` so the escape-hatch verbs on `Bird` can
     * still send a genuinely empty JSON list.
     *
     * @param array<string, mixed> $body
     *
     * @return array<string, mixed>|\stdClass
     */
    private static function objectifyEmptyMaps(array $body): array|\stdClass
    {
        // Cast every present map, not just an empty one: a PHP array whose keys
        // happen to be sequential integers ('0' => ...) encodes as a JSON list,
        // which the API rejects for an object-typed field.
        foreach (['headers', 'metadata'] as $mapField) {
            if (is_array($body[$mapField] ?? null)) {
                $body[$mapField] = (object) $body[$mapField];
            }
        }

        return $body === [] ? new \stdClass() : $body;
    }

    /**
     * Send a draft broadcast, immediately or at `$scheduledAt`, and return it.
     *
     * The broadcast needs a `from` on a verified domain, an `audience_id`, and
     * a `template` with a published version. One that has already started
     * sending or has reached a final state is refused with a 409.
     *
     * @param \DateTimeInterface|null $scheduledAt when to send: at least 30 seconds and at most 365 days out; omit to send straight away
     */
    public function send(
        string $broadcastId,
        ?\DateTimeInterface $scheduledAt = null,
        ?RequestOptions $options = null,
    ): EmailBroadcast {
        // Same "Z" offset reason as create above.
        $body = $scheduledAt === null ? [] : ['scheduled_at' => self::formatRfc3339($scheduledAt)];

        return $this->single('POST', '/v1/email/broadcasts/' . rawurlencode($broadcastId) . '/send', EmailBroadcast::class, self::objectifyEmptyMaps($body), null, $options);
    }
}
