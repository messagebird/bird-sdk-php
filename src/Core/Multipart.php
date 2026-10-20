<?php

declare(strict_types=1);

namespace MessageBird\Core;

/**
 * A multipart/form-data body, encoded once so every retry attempt resends the
 * same bytes under the same boundary.
 *
 * @internal built by a resource facade, not part of the public surface
 */
final class Multipart
{
    private function __construct(
        public readonly string $contentType,
        public readonly string $body,
    ) {
    }

    /**
     * One file part plus text fields, in that order.
     *
     * @param array<string, string> $fields
     */
    public static function file(string $name, string $filename, string $contents, array $fields = []): self
    {
        $boundary = bin2hex(random_bytes(16));
        $body = self::part($boundary, \sprintf('form-data; name="%s"; filename="%s"', self::quote($name), self::quote($filename)), $contents, 'application/octet-stream');
        foreach ($fields as $field => $value) {
            $body .= self::part($boundary, \sprintf('form-data; name="%s"', self::quote($field)), $value, null);
        }

        return new self('multipart/form-data; boundary=' . $boundary, $body . '--' . $boundary . "--\r\n");
    }

    private static function part(string $boundary, string $disposition, string $contents, ?string $type): string
    {
        $head = '--' . $boundary . "\r\nContent-Disposition: " . $disposition . "\r\n";
        if ($type !== null) {
            $head .= 'Content-Type: ' . $type . "\r\n";
        }

        return $head . "\r\n" . $contents . "\r\n";
    }

    // A quote or a line break in a name would end the header parameter early.
    private static function quote(string $value): string
    {
        return str_replace(['\\', '"', "\r", "\n"], ['\\\\', '\\"', '', ''], $value);
    }
}
