<?php

namespace Framework;

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
        $this->routes['GET']["/{$uri}"] = $callback;
    }

    public function post($uri, $callback): void
    {
        $uri = trim($uri, '/');
        $this->routes['POST']["/{$uri}"] = $callback;
    }

    public function dispatch(): string
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $callback = $this->routes[$method]["/{$path}"] ?? false;

        if($callback === false) {
            $this->response->setResponseCode(404);
            return 'Page not found';
        }

        return call_user_func($callback);
    }
}