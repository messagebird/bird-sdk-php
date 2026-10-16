<?php

namespace MessageBird\Wire\Model;

/**
 * Supported services for the eSIM. These values describe capabilities; package balances and current eSIM status determine whether service can be used now. Optional phone service can remain `unknown` until a number is assigned. Data packages do not establish call or SMS allowances.
 */
class EsimCapabilities extends EsimServiceCapabilities
{
}
