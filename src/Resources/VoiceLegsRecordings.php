<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Exception\ConnectionException;
use MessageBird\RequestOptions;
use MessageBird\VoiceRecordingAudio;
use Psr\Http\Message\ResponseInterface;

/**
 * The recordings of one leg. Reach this via `$bird->voice->legs->recordings`.
 */
final class VoiceLegsRecordings extends Resource
{
    /**
     * Download one recording as a WAV file. $legId and $recordingId are the
     * leg_id and id of an entry in recordings, which
     * $bird->voice->calls->recordings->list() returns.
     *
     * A 425 ApiException means the leg is still recording: call again in a few
     * seconds. A 404 ApiException means the capture failed, or the recording
     * is older than 30 days.
     */
    public function audio(string $legId, string $recordingId, ?RequestOptions $options = null): VoiceRecordingAudio
    {
        $response = $this->client->dispatchRaw(
            'GET',
            \sprintf('/v1/voice/legs/%s/recordings/%s/audio', rawurlencode($legId), rawurlencode($recordingId)),
            $options,
        );

        // A 200 is either an edge answering directly or a PSR-18 client that
        // followed the redirect itself, which PSR-18 leaves to the client. It is
        // also the only arm the conformance corpus can script, whose responses
        // carry only status and body.
        if ($response->getStatusCode() !== 302) {
            return self::audioFrom($response);
        }

        $location = $response->getHeaderLine('Location');
        if ($location === '') {
            throw new ConnectionException('recording redirect carried no Location header');
        }

        return self::audioFrom($this->fetchStored($location, 'audio'));
    }

    private static function audioFrom(ResponseInterface $response): VoiceRecordingAudio
    {
        $data = (string) $response->getBody();
        $contentType = $response->getHeaderLine('Content-Type');

        return new VoiceRecordingAudio($data, $contentType === '' ? 'application/octet-stream' : $contentType, \strlen($data));
    }
}
