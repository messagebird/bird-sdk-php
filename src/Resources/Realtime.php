<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\Core\RealtimeCrypto;
use MessageBird\RealtimeOptions;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\RealtimeBatchPublish;
use MessageBird\Wire\Model\RealtimeBatchPublishResult;
use MessageBird\Wire\Model\RealtimePublish;
use MessageBird\Wire\Model\RealtimePublishResult;

/**
 * Publish events to a realtime app and inspect its channels. Reached as
 * `$bird->realtime`; channel and member reads hang off `->channels` and
 * `->members`. Every call takes the app id (`rap_…`) first.
 *
 * The app's own key and secret authenticate every call on top of the workspace
 * key. Configure them once on the client (`new Bird(..., realtime: new
 * RealtimeOptions(key: ..., secret: ...))`), or override them for one call with a
 * RealtimeOptions on the request options.
 *
 * A `private-encrypted-` channel is end-to-end encrypted: this class seals such a
 * publish locally under the configured `encryptionMasterKey` and hands
 * subscribers the matching key through `authorizeChannel()`. Bird moves the
 * ciphertext without holding the key.
 */
final class Realtime extends RealtimeBase
{
    public readonly RealtimeChannels $channels;
    public readonly RealtimeMembers $members;

    public function __construct(Bird $client, private readonly ?RealtimeOptions $options = null)
    {
        parent::__construct($client);
        $this->channels = new RealtimeChannels($client);
        $this->members = new RealtimeMembers($client);
    }

    /**
     * Publish an event, sealing the payload first when the channel asks for it: a
     * `private-encrypted-` channel's data is encrypted in this process, so what
     * leaves is `{nonce, ciphertext}`.
     *
     * An encrypted publish names exactly that one channel — every channel derives
     * its own key, so a fan-out would hand the other channels ciphertext their
     * subscribers cannot open. Publish per channel instead.
     */
    public function publish(string $realtimeAppId, RealtimePublish $params, ?RequestOptions $options = null): RealtimePublishResult
    {
        $channels = $params->getChannels() ?? [];
        $encrypted = array_values(array_filter(
            $channels,
            static fn (string $channel): bool => RealtimeCrypto::isEncryptedChannel($channel),
        ));
        if ($encrypted === []) {
            return parent::publish($realtimeAppId, $params, $options);
        }
        if (\count($channels) > 1) {
            throw new \InvalidArgumentException(
                'a publish to a private-encrypted- channel must name exactly that one channel: every channel derives its own key, so a multi-channel publish would hand the other channels undecryptable ciphertext — publish per channel instead',
            );
        }

        $masterKey = RealtimeCrypto::decodeMasterKey($this->encryptionMasterKey($options));
        $sealed = (clone $params)->setData(
            RealtimeCrypto::sealPayload($encrypted[0], $params->getData(), $masterKey),
        );

        return parent::publish($realtimeAppId, $sealed, $options);
    }

    /**
     * Publish a batch, sealing each event addressed to a `private-encrypted-`
     * channel under that channel's own key. A batch event carries one channel, so
     * the items encrypt independently and plain events ride along untouched.
     */
    public function publishBatch(string $realtimeAppId, RealtimeBatchPublish $params, ?RequestOptions $options = null): RealtimeBatchPublishResult
    {
        $events = $params->getEvents() ?? [];
        $anyEncrypted = false;
        foreach ($events as $event) {
            if (RealtimeCrypto::isEncryptedChannel($event->getChannel() ?? '')) {
                $anyEncrypted = true;

                break;
            }
        }
        if (!$anyEncrypted) {
            return parent::publishBatch($realtimeAppId, $params, $options);
        }

        $masterKey = RealtimeCrypto::decodeMasterKey($this->encryptionMasterKey($options));
        $sealedEvents = [];
        foreach ($events as $event) {
            $channel = $event->getChannel() ?? '';
            $sealedEvents[] = RealtimeCrypto::isEncryptedChannel($channel)
                ? (clone $event)->setData(RealtimeCrypto::sealPayload($channel, $event->getData(), $masterKey))
                : $event;
        }

        return parent::publishBatch($realtimeAppId, (clone $params)->setEvents($sealedEvents), $options);
    }

    /**
     * Sign a channel subscription for a client — the JSON body your auth endpoint
     * returns, field names already on the wire spelling. Runs locally: no request
     * is made.
     *
     * The signature is `HMAC-SHA256(secret, "<connectionId>:<channelName>")`,
     * prefixed with the app key. For a presence channel pass $memberData, the
     * exact JSON string carrying `member_id` (and optionally `member_info`) — it
     * is signed and echoed byte-identical, so build it once and pass that string.
     * For a `private-encrypted-` channel the response also carries the channel's
     * `shared_secret`, derived from the configured encryption master key.
     *
     * @return array{auth: string, member_data?: string, shared_secret?: string}
     */
    public function authorizeChannel(string $connectionId, string $channelName, ?string $memberData = null): array
    {
        $app = $this->options;
        $key = $app?->key;
        $secret = $app?->secret;
        if ($app === null || $key === null || $key === '' || $secret === null || $secret === '') {
            throw new \InvalidArgumentException(
                'authorizeChannel signs with the Realtime app credentials: pass realtime: new RealtimeOptions(key: ..., secret: ...) to the Bird constructor',
            );
        }

        $toSign = $memberData === null
            ? $connectionId . ':' . $channelName
            : $connectionId . ':' . $channelName . ':' . $memberData;

        $out = ['auth' => $key . ':' . hash_hmac('sha256', $toSign, $secret)];
        if ($memberData !== null) {
            $out['member_data'] = $memberData;
        }
        if (RealtimeCrypto::isEncryptedChannel($channelName)) {
            $out['shared_secret'] = base64_encode(RealtimeCrypto::deriveSharedSecret(
                $channelName,
                RealtimeCrypto::decodeMasterKey($app->encryptionMasterKey),
            ));
        }

        return $out;
    }

    /**
     * The master key this call seals under. Resolved per field like the app
     * credentials in the core, so a per-call RealtimeOptions addressing a second
     * app can bring that app's key too.
     */
    private function encryptionMasterKey(?RequestOptions $options): ?string
    {
        $perCall = $options?->realtime?->encryptionMasterKey;

        return $perCall ?? $this->options?->encryptionMasterKey;
    }
}
