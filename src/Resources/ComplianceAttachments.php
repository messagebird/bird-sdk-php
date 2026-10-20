<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\ComplianceFile;
use MessageBird\Core\Multipart;
use MessageBird\RequestOptions;
use MessageBird\Wire\Model\Attachment;
use Psr\Http\Message\ResponseInterface;

/**
 * Documents uploaded for registrations. Reached as `$bird->complianceAttachments`.
 * List and delete are generated; the upload and the byte read are written here
 * because one sends a multipart body and the other returns raw bytes.
 */
final class ComplianceAttachments extends ComplianceAttachmentsBase
{
    /**
     * Upload a supporting document for a registration and get back the
     * attachment to cite by id in a submission's answers. PNG, JPEG, and PDF
     * files up to 10 MB are accepted; the contents determine the type.
     *
     * Uploading bytes identical to an existing attachment returns that
     * attachment instead of a second one, so retrying an upload whose outcome
     * is unknown is safe. An attachment no registration cites expires after
     * seven days.
     */
    public function create(string $contents, string $filename, ?string $description = null, ?RequestOptions $options = null): Attachment
    {
        $body = Multipart::file('file', $filename, $contents, $description === null ? [] : ['description' => $description]);

        return $this->single('POST', '/v1/compliance/attachments', Attachment::class, $body, null, $options);
    }

    /**
     * Download the bytes of an uploaded registration attachment, with the
     * content type and filename it was stored under.
     */
    public function get(string $attachmentId, ?RequestOptions $options = null): ComplianceFile
    {
        return self::complianceFile($this->client->dispatchRaw(
            'GET',
            \sprintf('/v1/compliance/attachments/%s', rawurlencode($attachmentId)),
            $options,
        ));
    }

    /**
     * @internal shared with ComplianceDocumentTemplates
     */
    public static function complianceFile(ResponseInterface $response): ComplianceFile
    {
        $contentType = $response->getHeaderLine('Content-Type');

        return new ComplianceFile(
            (string) $response->getBody(),
            $contentType === '' ? 'application/octet-stream' : $contentType,
            self::dispositionFilename($response->getHeaderLine('Content-Disposition')),
        );
    }

    // The server sends an ASCII `filename` fallback and the RFC 5987
    // `filename*` original; the original wins when it is there.
    private static function dispositionFilename(string $header): ?string
    {
        if (preg_match("/filename\\*\\s*=\\s*UTF-8''([^;]+)/i", $header, $extended) === 1) {
            $decoded = rawurldecode(trim($extended[1]));
            if (preg_match('//u', $decoded) === 1) {
                return $decoded;
            }
        }
        if (preg_match('/filename\s*=\s*(?:"([^"]*)"|([^;]+))/i', $header, $plain) !== 1) {
            return null;
        }
        $name = $plain[1] !== '' ? $plain[1] : trim($plain[2] ?? '');

        return $name === '' ? null : $name;
    }
}
