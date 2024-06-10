<?php

namespace Flucava\Core\Query;

/**
 * @author Philipp Marien
 */
interface HandlerInterface
{
    public function handle(object $query): ?object;
}
