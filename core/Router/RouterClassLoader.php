<?php

declare(strict_types=1);

namespace Core\Router;

use DI\ContainerBuilder;
use Pecee\SimpleRouter\ClassLoader\IClassLoader;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

class RouterClassLoader implements IClassLoader
{
    protected $container;

    public function __construct()
    {
        $this->container = (new ContainerBuilder())
            ->useAutowiring(true)
            ->build();
    }

    public function loadClass(string $class): object
    {
        if (class_exists($class) === false) {
            throw new NotFoundHttpException(sprintf('Class "%s" does not exist', $class), 404);
        }

        try {
            return $this->container->get($class);
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage(), (int)$e->getCode(), $e->getPrevious());
        }
    }

    public function loadClassMethod($class, string $method, array $parameters): object
    {
        try {
            return $this->container->call([$class, $method], $parameters);
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage(), (int)$e->getCode(), $e->getPrevious());
        }
    }

    public function loadClosure(callable $closure, array $parameters): mixed
    {
        try {
            return $this->container->call($closure, $parameters);
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage(), (int)$e->getCode(), $e->getPrevious());
        }
    }
}
