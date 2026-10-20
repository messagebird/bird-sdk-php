<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\ComplianceFile;
use MessageBird\RequestOptions;

/**
 * The blank forms registration requirements name in their `template_url`.
 * Reached as `$bird->complianceDocumentTemplates`. Hand-written whole: its only
 * operation returns raw bytes.
 */
final class ComplianceDocumentTemplates extends Resource
{
    /**
     * Download the blank form a requirement's `template_url` names, as a PDF,
     * Word document, JPEG or PNG. Complete it and upload the result with
     * `$bird->complianceAttachments->create()`; export a Word form to PDF first.
     */
    public function get(string $templateId, ?RequestOptions $options = null): ComplianceFile
    {
        return ComplianceAttachments::complianceFile($this->client->dispatchRaw(
            'GET',
            \sprintf('/v1/compliance/document-templates/%s', rawurlencode($templateId)),
            $options,
        ));
    }
}
