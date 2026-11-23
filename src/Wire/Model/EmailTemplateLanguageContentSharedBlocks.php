<?php

namespace MessageBird\Wire\Model;

/**
 * Reusable block links in one template language, keyed by occurrence UUID. Each key matches one HTML comment marker `bird:shared-block:UUID` in the language's HTML. The template language selects the block language, and a link follows the block's latest publication in that language.
 */
class EmailTemplateLanguageContentSharedBlocks extends EmailTemplateSharedBlocks
{
}
