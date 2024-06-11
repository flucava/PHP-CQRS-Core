<?php

namespace Flucava\CqrsCore\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class Query extends AbstractAction
{

}
