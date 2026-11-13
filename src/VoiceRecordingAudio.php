<?php

declare(strict_types=1);

namespace MessageBird;

/**
 * The downloaded audio of one recording. $contentType is what storage
 * declared, audio/wav.
 */
final class VoiceRecordingAudio
{
    public function __construct(
        public readonly string $data,
        public readonly string $contentType,
        public readonly int $contentLength,
    ) {
    }
}
