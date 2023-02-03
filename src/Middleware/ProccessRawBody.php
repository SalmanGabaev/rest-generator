<?php

declare(strict_types=1);

namespace App\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class ProccessRawBody implements IMiddleware
{
    public function handle(Request $request): void
    {
        $rawBody = file_get_contents('php://input');

        if ($rawBody) {
            try {
                $body = json_decode($rawBody, true);
                foreach ($body as $key => $value) {
                    $request->$key = $value;
                }
            } catch (\Throwable $e) {

            }
        }
    }
}
