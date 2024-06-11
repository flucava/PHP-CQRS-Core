<?php

namespace Flucava\CqrsCore;

/**
 * @author Philipp Marien
 */
interface HandlerInterface
{
    public function handle(object $action): ?object;
}
