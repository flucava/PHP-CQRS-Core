<?php

namespace Flucava\CqrsCore\Attribute;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
final class QueryHandler
{
    public function __construct(public string $query)
    {
    }
}
