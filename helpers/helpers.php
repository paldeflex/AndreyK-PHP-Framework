<?php

use Framework\Application as Application;

function app(): Application
{
    return Application::$app;
}


/**
 * @throws Exception
 */
function view($view = '', $data = [], $layout = LAYOUT): void
{
    if ($view) {
        app()->view->render($view, $data, $layout);
    }

    app()->view;
}
