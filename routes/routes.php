<?php

declare(strict_types=1);

use App\Action\GenerationAction;
use App\Action\GetGenerationAction;
use App\Middleware\ProccessRawBody;
use Core\Router\Router;
use Pecee\Http\Request;

Router::group([
    'prefix' => 'api/',
    'middleware' => [ProccessRawBody::class],
], static function () {
    Router::post('/generation', [GenerationAction::class, 'action']);
    Router::get('/generation/{id}', [GetGenerationAction::class, 'action']);
});

Router::error(function(Request $request, Exception $exception) {
    $response = Router::response();
    switch (get_class($exception)) {
        case Exception::class: {
            $response->httpCode(500);
            break;
        }
    }

    return $response->json([
        'status' => 'error',
        'message' => $exception->getMessage()
    ], JSON_PRETTY_PRINT);
});