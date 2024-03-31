<?php

if(PHP_MAJOR_VERSION < 8) {
    die('PHP version 8.0 or higher is required');
}

require_once __DIR__ . '/../config/init.php';
require_once ROOT . '/vendor/autoload.php';

$app = new \Framework\Application();
require_once CONFIG . '/routes.php';

$app->run();