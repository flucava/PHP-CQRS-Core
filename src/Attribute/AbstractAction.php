<?php

namespace Flucava\Core\Attribute;

abstract readonly class AbstractAction
{
    public function __construct(private bool $resultRequired = false, private ?string $resultClass = null)
    {
    }

    public function isResultRequired(): bool
    {
        return $this->resultRequired;
    }

    public function getResultClass(): ?string
    {
        return $this->resultClass;
    }
}
