<?php

use Framework\Application;

if(PHP_MAJOR_VERSION < 8) {
    die('PHP version 8.0 or higher is required');
}

require_once __DIR__ . '/../config/init.php';
require_once ROOT . '/vendor/autoload.php';

$app = new Application();
require_once CONFIG . '/routes.php';
require_once HELPERS . '/helpers.php';

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}