<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class Assets extends AssetsBase
{
    public readonly AssetsFolders $folders;
    public readonly AssetsReferences $references;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->folders = new AssetsFolders($client);
        $this->references = new AssetsReferences($client);
    }
}
