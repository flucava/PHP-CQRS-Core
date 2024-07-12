<?php

namespace Flucava\CqrsCore;

use LogicException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Flucava\CqrsCore\Attribute\AbstractAction;

/**
 * @author Philipp Marien
 */
abstract class AbstractHandlerBus
{
    private array $map = [];

    public function __construct(
        private readonly string $serviceAttribute,
        private readonly string $serviceProperty,
        private readonly string $actionAttribute,
        private readonly ContainerInterface $serviceLocator
    ) {
    }

    /**
     * @throws ReflectionException
     */
    final public function register(string $service): void
    {
        $reflectedService = new ReflectionClass($service);
        if (!$reflectedService->implementsInterface(HandlerInterface::class)) {
            throw new LogicException('Service must implement ' . HandlerInterface::class, 20240610214642);
        }

        foreach ($reflectedService->getAttributes($this->serviceAttribute) as $attribute) {
            $this->map[$attribute->newInstance()->{$this->serviceProperty}] = $service;
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    final public function handle(object $action): ?object
    {
        $serviceId = $this->map[get_class($action)] ?? null;
        if (!$serviceId) {
            throw new LogicException('Invalid service id provided', 20240610211939);
        }

        $service = $this->serviceLocator->get($serviceId);
        if (!$service) {
            throw new LogicException('Service not found', 20240610215115);
        }

        $attributes = (new ReflectionClass($action))->getAttributes($this->actionAttribute);
        if (count($attributes) !== 1) {
            throw new LogicException('Invalid action provided', 20240610221234);
        }

        $result = $service->handle($action);

        /** @var AbstractAction $attribute */
        $attribute = $attributes[0]->newInstance();
        $resultClass = $attribute->getResultClass();
        if (($result && $resultClass && !$result instanceof $resultClass) || (!$result && $attribute->isResultRequired())) {
            throw new LogicException('Invalid result provided', 20240610222016);
        }

        return $result;
    }
}
