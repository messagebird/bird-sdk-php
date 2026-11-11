<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

/**
 * The organization's workspaces. The workspace operations are generated on
 * OrganizationWorkspacesBase; this parent adds the nested resource reached as
 * `$bird->organization->workspaces->whatsappNumbers`, which connects a number a
 * multi-partner solution onboarded into a workspace.
 */
final class OrganizationWorkspaces extends OrganizationWorkspacesBase
{
    public readonly OrganizationWorkspacesWhatsappNumbers $whatsappNumbers;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->whatsappNumbers = new OrganizationWorkspacesWhatsappNumbers($client);
    }
}
