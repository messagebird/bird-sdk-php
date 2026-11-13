<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Exception\ConnectionException;
use MessageBird\RequestOptions;
use MessageBird\WhatsAppMedia;
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
     * Media expires with its message, 30 days after it arrives, and this
     * throws a 404 ApiException from then on. A 410 ApiException means only the
     * file expired: the message still lists the media's mime_type and caption.
     * Messages sent through Bird carry no stored media.
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

        return self::mediaFrom($this->fetchStored($location, 'media'));
    }

    private static function mediaFrom(ResponseInterface $response): WhatsAppMedia
    {
        $data = (string) $response->getBody();
        $contentType = $response->getHeaderLine('Content-Type');

        return new WhatsAppMedia($data, $contentType === '' ? 'application/octet-stream' : $contentType, \strlen($data));
    }
}
