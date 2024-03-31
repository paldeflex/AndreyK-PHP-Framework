<?php

namespace Framework;

use Exception;

class Router
{
    protected array $routes = [];

    public function __construct(public ?Request $request = null, public ?Response $response = null)
    {
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function get($uri, $callback): void
    {
        $uri = trim($uri, '/');
        $this->routes['GET']["/$uri"] = $callback;
    }

    public function post($uri, $callback): void
    {
        $uri = trim($uri, '/');
        $this->routes['POST']["/$uri"] = $callback;
    }

    /**
     * @throws Exception
     */
    public function dispatch(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method]["/$path"] ?? null;
        if (is_null($callback)) {
            $this->response->setResponseCode(404);
            view('errors/404');
            return;
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        call_user_func($callback);
    }
}