<?php

declare(strict_types=1);

use App\Action\GenerationAction;
use App\Action\GetGenerationAction;
use App\Middleware\ProccessRawBody;
use Core\Router\Router;

Router::group([
    'prefix' => 'api/',
    'middleware' => [ProccessRawBody::class],
], static function () {
    Router::post('/generation', [GenerationAction::class, 'action']);
    Router::get('/generation/{id}', [GetGenerationAction::class, 'action']);
});
