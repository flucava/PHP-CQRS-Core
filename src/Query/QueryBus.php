<?php

namespace Flucava\Core\Query;

use Flucava\Core\AbstractHandlerBus;
use Flucava\Core\Attribute\Query;
use Flucava\Core\Attribute\QueryHandler;
use Psr\Container\ContainerInterface;

/**
 * @author Philipp Marien
 */
class QueryBus extends AbstractHandlerBus
{
    public function __construct(ContainerInterface $serviceLocator)
    {
        parent::__construct(
            QueryHandler::class,
            'query',
            Query::class,
            $serviceLocator
        );
    }
}
