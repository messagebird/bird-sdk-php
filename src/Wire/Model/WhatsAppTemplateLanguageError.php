<?php

namespace MessageBird\Wire\Model;

/**
 * Why the submission itself did not complete. Distinct from `rejection`, which is Meta refusing the content it was given.
 */
class WhatsAppTemplateLanguageError extends WhatsAppTemplateSubmissionError
{
}
