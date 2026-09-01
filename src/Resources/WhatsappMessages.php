<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;
use MessageBird\Exception\ConnectionException;
use MessageBird\RequestOptions;
use MessageBird\WhatsAppMedia;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Subresources of one WhatsApp message. The channel's own message verbs stay on
 * `$bird->whatsapp`; reach this via `$bird->whatsapp->messages`.
 */
final class WhatsappMessages extends Resource
{
    /**
     * Download the media on a received WhatsApp message — an image, video,
     * audio clip, sticker or document. $mediaId is the `id` on the message's
     * content object, which $bird->whatsapp->get() returns.
     *
     * Media is kept for 30 days after the message arrives; after that the
     * message still lists the media's mime_type and caption, and this throws a
     * 410 ApiException. Outbound messages carry no stored media.
     */
    public function media(string $messageId, string $mediaId, ?RequestOptions $options = null): WhatsAppMedia
    {
        $response = $this->client->dispatchRaw(
            'GET',
            \sprintf('/v1/whatsapp/messages/%s/media/%s', rawurlencode($messageId), rawurlencode($mediaId)),
            $options,
        );

        // A 200 is either an edge answering directly or a PSR-18 client that
        // followed the redirect itself, which PSR-18 leaves to the client. It is
        // also the only arm the conformance corpus can script, whose responses
        // carry only status and body.
        if ($response->getStatusCode() !== 302) {
            return self::mediaFrom($response);
        }

        $location = $response->getHeaderLine('Location');
        if ($location === '') {
            throw new ConnectionException('media redirect carried no Location header');
        }

        return self::fetchStored($this->client, $location);
    }

    /**
     * The second leg. Its failures surface as ConnectionException rather than
     * through ApiException::fromResponse — a storage XML body is no Bird error
     * envelope, and a 403 mapped that way would report the caller's own key as
     * lacking permission.
     */
    private static function fetchStored(Bird $client, string $location): WhatsAppMedia
    {
        try {
            $stored = $client->sendUnauthenticated($location);
        } catch (ClientExceptionInterface $e) {
            throw new ConnectionException(
                'downloading media failed: ' . $e->getMessage() . '; call media again for a fresh link',
                0,
                $e,
            );
        }
        if ($stored->getStatusCode() >= 300) {
            throw new ConnectionException(\sprintf(
                'storage refused the download link (status %d): the link expired or was refused, call media again for a fresh link',
                $stored->getStatusCode(),
            ));
        }

        return self::mediaFrom($stored);
    }

    private static function mediaFrom(ResponseInterface $response): WhatsAppMedia
    {
        $data = (string) $response->getBody();
        $contentType = $response->getHeaderLine('Content-Type');

        return new WhatsAppMedia($data, $contentType === '' ? 'application/octet-stream' : $contentType, \strlen($data));
    }
}
