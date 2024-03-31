<?php

namespace Framework;

use Exception;

class Application
{
    public static Application $app;

    public function __construct(public string $uri = '', public ?Request $request = null, public ?Response $response = null, public ?Router $router = null, public View|string|null $view = LAYOUT)
    {
        self::$app = $this;
        $this->uri = $_SERVER['QUERY_STRING'];
        $this->request = new Request($this->uri);
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View(LAYOUT);
    }

    /**
     * @throws Exception
     */
    public function run(): void
    {
        $this->router->dispatch();
    }
}