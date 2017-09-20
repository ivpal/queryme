<?php

namespace Core\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class XRuntimeBackend
 * @package Core\Http\Middleware
 */
class XRuntimeBackend
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response {
        /** @var Response $response */
        $response = $next($request);
        $response->headers->set('X-Runtime-Backend', microtime(true) - LARAVEL_START);
        return $response;
    }
}