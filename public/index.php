<?php

declare(strict_types=1);

use Core\Router\Router;
use DI\Container;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container();
Router::start();