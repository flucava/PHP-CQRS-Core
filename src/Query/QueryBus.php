<?php

namespace Flucava\CqrsCore\Query;

use Flucava\CqrsCore\AbstractHandlerBus;
use Flucava\CqrsCore\Attribute\Query;
use Flucava\CqrsCore\Attribute\QueryHandler;
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
