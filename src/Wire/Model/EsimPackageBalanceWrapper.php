<?php

namespace MessageBird\Wire\Model;

/**
 * Package allowance and reported consumption. `total_bytes` is the purchased allowance. `used_bytes`, `remaining_bytes`, and `used_percent` are null until usage is reported. Reports can lag device usage; use `as_of` to show when the balance was updated.
 */
class EsimPackageBalanceWrapper extends EsimPackageBalance
{
}
