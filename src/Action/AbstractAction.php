<?php

declare(strict_types=1);

namespace App\Action;

use Core\Router\Router;
use Pecee\Http\Request;
use Pecee\Http\Response;

abstract class AbstractAction
{
    public function getRequest(): Request
    {
        return Router::router()->getRequest();
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return new Response($this->getRequest());
    }

    protected function respond(mixed $response): Response
    {
        return $this->getResponse()->json($response, JSON_PRETTY_PRINT);
    }
}
