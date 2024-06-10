<?php

namespace Flucava\Core\Command;

use Flucava\Core\AbstractHandlerBus;
use Flucava\Core\Attribute\Command;
use Flucava\Core\Attribute\CommandHandler;
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
