<?php
// TODO: Удалить, если не понадоится использовать этот контроллер

namespace Framework;

use Exception;

abstract class Controller
{
    /**
     * @throws Exception
     */
    public function render($view, $data = [], $layout = LAYOUT): void
    {
        app()->view->render($view, $data, $layout);
    }
}