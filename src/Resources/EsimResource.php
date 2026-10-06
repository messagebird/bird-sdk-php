<?php

declare(strict_types=1);

namespace MessageBird\Resources;

use MessageBird\Bird;

final class EsimResource extends EsimResourceBase
{
    public readonly EsimAssignmentResource $assignment;
    public readonly EsimCredentialsResource $credentials;
    public readonly EsimDeliveries $deliveries;
    public readonly EsimInstallLinks $installLinks;
    public readonly EsimOffers $offers;
    public readonly EsimOrders $orders;
    public readonly EsimPackages $packages;
    public readonly EsimRecurringSubscriptions $recurringSubscriptions;
    public readonly EsimSettingsResource $settings;
    public readonly EsimSubscribers $subscribers;
    public readonly EsimZones $zones;

    public function __construct(Bird $client)
    {
        parent::__construct($client);
        $this->assignment = new EsimAssignmentResource($client);
        $this->credentials = new EsimCredentialsResource($client);
        $this->deliveries = new EsimDeliveries($client);
        $this->installLinks = new EsimInstallLinks($client);
        $this->offers = new EsimOffers($client);
        $this->orders = new EsimOrders($client);
        $this->packages = new EsimPackages($client);
        $this->recurringSubscriptions = new EsimRecurringSubscriptions($client);
        $this->settings = new EsimSettingsResource($client);
        $this->subscribers = new EsimSubscribers($client);
        $this->zones = new EsimZones($client);
    }
}
