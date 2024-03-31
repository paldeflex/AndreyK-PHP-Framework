<?php

namespace Framework;

class Application
{

    public function __construct(public string $uri = '', public ?Request $request = null, public ?Response $response = null, public ?Router $router = null)
    {
        $this->uri = $_SERVER['QUERY_STRING'];
        $this->request = new Request($this->uri);
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(): void
    {
        echo $this->router->dispatch();
    }
}