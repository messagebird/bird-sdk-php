<?php

namespace MessageBird\Wire\Model;

/**
 * An upload session owned by the workspace and the OAuth connection or API key that created it. Its file and metadata are frozen. Sessions expire after one hour; receipts remain available for at least 24 hours after expiry while cleanup finishes.
 */
class AssetUploadBrowserHandoffSession extends AssetUploadSessionDetails
{
}
