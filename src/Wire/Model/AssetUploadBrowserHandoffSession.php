<?php

namespace MessageBird\Wire\Model;

/**
 * An upload session owned by the workspace and the OAuth connection or API key that created it. Its metadata is frozen. The file identifies the active upload source; a signed-in person can bind their selected file when preparing the browser fallback. Completion validates the bytes against the active source. Sessions expire after one hour; receipts remain available for at least 24 hours after expiry while cleanup finishes.
 */
class AssetUploadBrowserHandoffSession extends AssetUploadSessionDetails
{
}
