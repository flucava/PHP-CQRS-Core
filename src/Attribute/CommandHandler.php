<?php

namespace Flucava\Core\Attribute;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
final class CommandHandler
{
    public function __construct(public string $command)
    {
    }
}
