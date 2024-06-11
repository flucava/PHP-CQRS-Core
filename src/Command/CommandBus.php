<?php

namespace Flucava\CqrsCore\Command;

use Flucava\CqrsCore\AbstractHandlerBus;
use Flucava\CqrsCore\Attribute\Command;
use Flucava\CqrsCore\Attribute\CommandHandler;
use Psr\Container\ContainerInterface;

/**
 * @author Philipp Marien
 */
class CommandBus extends AbstractHandlerBus
{
    public function __construct(ContainerInterface $serviceLocator)
    {
        parent::__construct(
            CommandHandler::class,
            'command',
            Command::class,
            $serviceLocator
        );
    }
}
