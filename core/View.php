<?php

namespace Framework;

use Exception;

class View
{
    public function __construct(public string $layout = LAYOUT, public string $content = '')
    {
    }

    /**
     * @throws Exception
     */
    public function render($view, $data = [], $layout = LAYOUT): void
    {
        extract($data);
        $view_file = VIEWS . "/$view.php";
        if (file_exists($view_file)) {
            require_once $view_file;
        } else {
            app()->response->setResponseCode(500);
            view('errors/500');
        }
    }
}