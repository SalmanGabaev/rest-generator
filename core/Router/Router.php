<?php

declare(strict_types=1);

namespace Core\Router;

use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter
{
    public static function start(): void
    {
        require_once (__DIR__ . '/../../routes/routes.php');
        parent::setCustomClassLoader(new RouterClassLoader());
        parent::setDefaultNamespace('App\Action');

        parent::start();
    }
}
